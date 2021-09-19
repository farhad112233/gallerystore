<?php include_once "function.php";
if (isadmin()) {
    //categories page
    if ($pname=="categories"){
        //set new field of categories
        if (isset($_POST['set'])) {
                $nam=isvalid($_POST['nam']);                
                $no=isvalid($_POST['no']);                
            if ( (isset($nam)  &&  isset($no)) and (strlen($no)>0 && strlen($nam)>0) and is_numeric($no) ) {                                
                set_categories($nam,$no);
            }else{
                echo "<script> alert ('please enter name and no'); </script>";
            }
        } 
        if (isset($_POST['sete'])) {
                $name=isvalid($_POST['name']);                
                $noe=isvalid($_POST['noe']);
                $ide= $_POST['id'];
            if ( (isset($name)  &&  isset($noe)) and (strlen($noe)>0 && strlen($name)>0) and is_numeric($noe) and is_numeric($ide) ) {                                
                set_categories($name,$noe,$ide);
            }else{
                echo "<script> alert ('please enter name and no'); </script>";
            }
        }
        //edit dellete of categories
        if (isset($_GET['del']) and isadmin() and is_numeric($_GET['del'])) {
            $id=$_GET['del'];
            $sql="DELETE FROM `im_cat` WHERE id='$id';";
            if ($db->query($sql)) {
                echo "the item was deleted";
            }else{
                echo "please try again";
            }
        }
        //edit field of categories
        if (isset($_GET['edit']) and isadmin() and is_numeric($_GET['edit'])) {
            $id=$_GET['edit'];
            $cate=get_categories($id);             
        }       
        
    }

    //upload file page
    if ($pname=="upload") {
        if (isset($_POST['upload'],$_FILES['image'])) {            
            $tit=isvalid($_POST['title']);
            $cat=isvalid($_POST['cat']);            
            $price=isvalid($_POST['price']);
            if (strlen($tit)>0 && strlen($cat)>0 && strlen($price)>0 && $_FILES['image']['error']== 0 && is_numeric($price) ) {                                
                if ($_FILES['image']['type']=="image/jpeg" or $_FILES['image']['type']=="image/png" or $_FILES['image']['type']=="image/jpg") {
                    $file=$_FILES['image'];
                     setpic($tit,$cat,$price,$file);
                }                
            }else{
                echo "please fill all of the fields";
            }    
        }       
    }

    //orders file page
    if ($pname=="orders") {
        $orders=getorders();              
    }

    // dashbord file page
    if ($pname=="index") {
        $catnum=getfild("count(*)","im_cat");
        $imgnum=getfild("count(*)","im_image");
        $usrnum=getfild("count(*)","im_user");
        $ordnum=getfild("count(*)","im_order");
    }

    if ($pname=="users") {
       $user=getfild("*","im_user");
       if (isset($_GET['deluser']) and is_numeric($_GET['deluser'])) {
           $uidd=$_GET['deluser'];
           $sql="DELETE FROM `im_user` WHERE id='$uidd' ;";
           if ($db->query($sql)) {
               echo "the user removed";
               header("location:".HOME_URL."/admin/users.php");
           }else{
               echo "I'm sorry! user not removed ";
           }
       }
       if (isset($_POST['adduser'])) {
        $nam=isvalid($_POST['namee']);
        $post=$_POST['notee'];
        $pas=isvalid($_POST['pass']);
        $em=filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL);        
        $phon=isvalid($_POST['no']);        
        if (filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL) and strlen($nam)>=4 and strlen($pas)>=6) {            
            adduser($nam,$pas,$em,$phon,$post);
            }
        }              
    }





}
?>