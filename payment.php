<?php include_once "lab/function.php" ;

 $rescart=getcart($_SESSION['cart']);

$sumprice=0;
foreach ($rescart as $key) {
    $sumprice+=$key['price'];
}
$_SESSION['status']="close";


?>

<html>      
    <form action="payback.php" method="post">
        value:  <input type="text" name="txt" ><br>
                <input type="submit" name="submit" value="send">
    </form>
</html>