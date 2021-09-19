<?php include_once "lab/function.php" ;
if ($_POST['txt']=="ok") {
    print_r($_SESSION['cart']);    
    $user=$_SESSION['id'];
    foreach (getcart($_SESSION['cart']) as $key) {
        $price=$key['price'];
        $image=$key['id'];
       $sql="INSERT INTO `im_order`( `user`, `image`, `price`) 
            VALUES ($user,$image,$price);";
        $result=$db->query($sql);
        $_SESSION['cart']=array();
    }
}else{
    $_SESSION['status']="open";
    header("location: cart.php?note=no")   ;

}



?>