<?php include_once "function.php";

if ($pname=="index") {
    if (isset($_GET['cat']) and is_numeric($_GET['cat'])) {
        $cat=$_GET['cat'];
       $result= getimageshow($_GET['cat']);
    }else{
        $result= getimageshow(0);
    }
    $get_cat=get_categories();
    if (isset($_POST['login'])) {        
       if (isset($_POST['email']) and isset($_POST['pas'])) {     
           $user=strtolower(isvalid($_POST['email']));
           $pass=strtolower(isvalid($_POST['pas']));          
        global $db;       
        get_user($user,$pass) ;       
       }
    } 
    if (isset($_GET['log']) and $_GET['log']=="out") {
        unset($_SESSION['adminaz'],$_SESSION['useraz']);
    } 
    if (isset($_GET['add2cart']) and is_numeric($_GET['add2cart'])) {
        if (!isset($_SESSION['cart'])) {            
            $_SESSION['cart']=array($_GET['add2cart']);
            $_SESSION['status']="open";
        }else{
            if ($_SESSION['status']=="open") {
                $_SESSION['cart'][]=$_GET['add2cart'];
                $_SESSION['cart']=array_unique($_SESSION['cart']);
            }else{
                echo "your cart is closed for payment";
            }
           
        }
    } 
    
}


if ($pname=="cart") {
    $get_cat=get_categories();    
    if (isset($_GET['del']) and is_numeric($_GET['del'])) {
        $del=$_GET['del'];
        if ($_SESSION['status']=="open") {            
            if (in_array($del,$_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    if ($value==$del) {
                        unset($_SESSION['cart'][$key]);
                    }                
                }
            }
        }else{
            echo "your cart is close";
        }
    }
    if (!isset($_SESSION['cart'])) {
        $rescart=array();
    }else{
        $rescart=getcart($_SESSION['cart']);
    }
    if (isset($_POST['login'])) {        
        if (isset($_POST['email']) and isset($_POST['pas'])) {     
            $user=strtolower(isvalid($_POST['email']));
            $pass=strtolower(isvalid($_POST['pas']));          
         global $db;       
         get_user($user,$pass) ;       
        }
     } 
}


if ($pname=="profile") {
    $uid=$_SESSION['id'];   
    $sql="SELECT o.date ,i.id , i.url , i.title , i.price from im_order o, im_image i where o.user=$uid and i.id=o.image;";
    $o=$db->query($sql);
    $or=$o->fetch_all(1);
}

if ($pname=="forget") {
    if (isset($_POST['submitf']) and isset($_POST['namef'])) {
        $email=filter_var($_POST['namef'],FILTER_VALIDATE_EMAIL);        
        if ($email) {
            getforgetemail($email);            
        }
        
    }

    if (isset($_POST['submitj'])) {
        $nam=isvalid($_POST['namej']);
        $pas=isvalid($_POST['password']);
        $em=filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);        
        $phon=isvalid($_POST['number']);        
        if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) and strlen($nam)>=4 and strlen($pas)>=6) {
            adduser($nam,$pas,$em,$phon);
        }
    }

    if (isset($_POST['submitff']) and isset($_POST['passwordf'])) {
        $cod=$_POST['id'];
        $newpass=$_POST['passwordf'];
        $bbb=setnewpassword($cod,$newpass);
        $_SESSION['a']=$bbb;
    }   
}






?>