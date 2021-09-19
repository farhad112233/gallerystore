<?php
session_start();
include_once "config.php";
$cat="0";
$page="0";

function isvalid($input){
    $a=trim($input);
    $a=strip_tags($input);
    $a=htmlspecialchars($input);
    $output=htmlentities($input);
    return $output;
 }



function get_categories($id=null){
    if (isset($id)) {
        $wh="id=$id";
    }else{
        $wh="1";
    }
    global $db;
    $sql="SELECT * FROM `im_cat` WHERE $wh ORDER by no";
    if ( $res=$db->query($sql)) {        
        $cat=$res->fetch_all(1);
        return $cat;
    }else{
        echo "<p class='note error'>something is wrong!!!</p>";
    }   
}
function set_categories($nam,$no,$act=null){
    global $db;
     
    if (isset($act)) {        
        $sql="UPDATE `im_cat` SET `name`='$nam',`no`='$no' WHERE id='$act';";
    }else{
        $sql="INSERT INTO `im_cat`(`name`, `no`) VALUES ('$nam','$no');";
    }
    if ($db->query($sql)) {
        echo "<p class='note'>the category was set</p>";
    }else{
        echo "<p class='note error'>something is wrong!!!</p>";
    }
}

function setpic($tit,$cat,$price,$file){
    global $db;
    $fname=rand(1000,9999)."-".$file['name'];
   $tname="th=".rand(10000,99999).$file['name'];
   $pat=HOME_DIR."/ori-image/".$fname;
   $pat=str_replace("\\","/",$pat);
   move_uploaded_file($file['tmp_name'],HOME_DIR."/ori-image/".$fname);
   createtmpimage( $pat,$file,$tname);
   $url=HOME_URL."/image/".$tname;   
   $sql="INSERT INTO `im_image`( `cat_id`, `path`, `url`, `title`, `price`) VALUES ('$cat','$pat','$url','$tit','$price');";
    if ($db->query($sql)) {
        echo "<p class='note'>the image was saved</p>";
    }else{
        echo "<p class='note error'>there was a problem saving the image!</p>";
    }    
}

function createtmpimage( $pat,$file,$tname){
    list($w,$h)=getimagesize($pat);
    if ($file['type']=="image/jpeg") {
        $image=imagecreatefromjpeg($pat);    
    }elseif ($file['type']=="image/png") {
        $image=imagecreatefrompng($pat);  
    }  
    $i=imagecreatetruecolor(200, 200);
    $c=imagecolorallocate($i, 250, 250, 250);
    imagecopyresized($i, $image, 0, 0, 0, 0, 200, 200, $w, $h);
    imagestring($i, 5, 70, 100, SIT_TITLE, $c);
    if ($file['type']=="image/jpeg") {
          imagejpeg($i,HOME_DIR."/image/".$tname);
    }elseif ($file['type']=="image/png") {
         imagepng($i,HOME_DIR."/image/".$tname);
    }    
    imagedestroy($i);
    imagedestroy($image);
}

function getorders($userid="all"){
    global $db;
    if ($userid=="all") {
        $i="1";
    }else{
        $i="user=".$userid;
    }
    $sql="SELECT * FROM `im_order` WHERE $i ORDER by id DESC;";
    $order=$db->query($sql);
    $orders=$order->fetch_all(1);
    return $orders;
}

function getimpic($i){
    global $db;
    $sql = "SELECT  `url`, `title` FROM `im_image` WHERE id='$i'";
    $imp=$db->query($sql);
    $impic=$imp->fetch_all(1);
    return $impic;
}

function getfild($field,$name){
    global $db;
    $sql="SELECT $field FROM `$name` WHERE 1  order by id DESC;;";
    $cou=$db->query($sql);
    if ($field=="count(*)") {
         $count=$cou->fetch_assoc();
        return $count['count(*)'];
    }else{
         return $cou->fetch_all(1);
    }   
}

function getimageshow($cat){
    global $db;
    if ($cat==0) {
        $cat_id=1;
    }else{
        $cat_id="cat_id='$cat'";
    }
    $sql="SELECT * FROM `im_image` WHERE $cat_id order by 'id' DESC;";
    $res=$db->query($sql);
    return $res->fetch_all(1);    
}

function get_user($name,$pass){
    if (filter_var($name,FILTER_VALIDATE_EMAIL)) {
        global $db;
        $sql="SELECT `id`,`note`, `pas`,`name`  FROM `im_user` WHERE `email`='$name';";
        $res=$db->query($sql);
        $rows=mysqli_num_rows($res);
        if ($rows==1) {
            $resu=$res->fetch_assoc();
            if ($resu['pas']==$pass) {
                if ($resu['note']=="admin") {  $_SESSION['adminaz']=$name; }else{   $_SESSION['useraz']=$name;     }                        
                $_SESSION['name']=$resu['name'];
                $_SESSION['id']=$resu['id'];
                $url= HOME_URL;
                header("location: $url");
            }else{
                echo "password or user name is wrong";
            }
        }else{
            echo "password or user name is wrong";
        }
    }else{
        echo "password or user name is wrong";
    }    
    echo "ok";
}

function adduser($nam,$pas,$em,$phon=null,&$post=null){       
        global $db;
        $n=mysqli_real_escape_string($db,$nam);
        $p=mysqli_real_escape_string($db,$pas);
        $e=mysqli_real_escape_string($db,$em);
        $ph=mysqli_real_escape_string($db,$phon);                
        if ($post=="admin") {
            if (strlen($ph)>1) {
                $sql="INSERT INTO `im_user`( `note`, `name`, `pas`, `email`, `phone`) 
                VALUES ('$post','$n','$p','$e','$ph');";                                
            }else{
                $sql="INSERT INTO `im_user`( `note`, `name`, `pas`, `email`) 
                VALUES ('$post','$n','$p','$e');";
            }
            
        }else{
            $sql="INSERT INTO `im_user`( `name`, `pas`, `email`, `phone`) 
            VALUES ('$n','$p','$e','$ph');";
        }
        if ($db->query($sql)) { 
            if (isadmin()) {
               header("location:".HOME_URL."/admin/users.php");
            }else{
                get_user($e,$p);
            }
            
            // echo "<div style='color:green;text-align: center;'><p>saved your information</p><a   href=".HOME_URL.">go to home page</a></div>";
        }else{
            echo "some thing wrong";
        }       
}

function getcart($se){
    global $db;
    $cart=array();
    foreach ($se as $key) {
        $sql="SELECT `id`, `url`, `title`, `price` FROM `im_image` WHERE id='$key';";
        $res=$db->query($sql);
        $res=$res->fetch_all(1);
        foreach ($res as $key ) {
            $cart[]=$key;
        }
        
    }
    return $cart;
}

function isadmin(){
    if (isset($_SESSION['adminaz'])) {
        return true;
    }else{
        return false;
    }    
}

function getforgetemail($email){
    global $db;
    $sql="SELECT  `id` FROM `im_user` WHERE email='$email'; ";
    $res=$db->query($sql);
    $result=$res->fetch_assoc();
    $usid=$result['id'];    
    $code=md5(md5($email.rand(1000,9999))); 
    $link=HOME_URL."/forget.php?id=$code";    
    $sqll="SELECT COUNT(*) FROM `im_recovery` WHERE user_id='$usid' ;";
    $ser=$db->query($sqll);
    $row=$ser->fetch_row();    
    print_r($row);
    if ($row['0']=="0") {
        $sqlll="INSERT INTO `im_recovery`( `user_id`, `code`,`date`) VALUES ('$usid','$code',CURRENT_TIMESTAMP); ";
    }else{
        $sqlll="UPDATE `im_recovery` SET `code`='$code' ,`date`=CURRENT_TIMESTAMP WHERE `user_id`='$usid' ";
    }
    if ($db->query($sqlll)) {
        mail($email,"recovery password","please click to below link to change your password<br>".$link);
        echo "recovery email was send to your email address";
    }else{
        echo "som thing is wrong! please try again later";
    }
    echo $link;
}

function setnewpassword($cod,$newpass){
    global $db;
    $cod=mysqli_real_escape_string($db,$cod);
    $newpass=mysqli_real_escape_string($db,$newpass);
    $sql="SELECT  `user_id`  FROM `im_recovery` WHERE `code`='$cod' ;";
    $rid=$db->query($sql);
    $ruid=$rid->fetch_assoc();
    $id=$ruid['user_id'];
    $sqll="UPDATE `im_user` SET `pas`='$newpass' WHERE id='$id';";
    if ($db->query($sqll)) {
        echo "changing password was succsess ";
    }else{
        echo "please try again";
    }
    
}





?>