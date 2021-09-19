<?php $pname="cart"; include_once "lab/useraction.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" media="screen and (min-width:700px) " href="css/701.css">
    <link rel="stylesheet" media="screen and  (max-width:700px) " href="css/699.css">
    <script src="css/jquery-min.js"></script>
</head>
<body >
    <div class="container">
    <div class="left">
    <button id="b" class="dropbtn">menu</button>
    <section id="myDropdown" class="left dropbtn hide">
        <div class="home">
            <a class="center" href="<?php echo HOME_URL ; ?>"><b>home page</b></a>
        </div>
        <?php if (isadmin()) {?>
            <div class="sabad">
                <a id="w"  class="a" href="admin/index.php">admin panel</a>
            </div>

        <?php };if (isadmin() or isset($_SESSION['useraz'])) {?>
            <div class="sabad" style="padding:0;">
                <a id="ac"  href="profile.php" >
                <table>
                    <tr>
                        <td><img width="80px" src="icon/user.png" alt=""></td>                        
                        <td ><?php echo "welcome <b>".$_SESSION['name']."</b>";  ?></td>
                    </tr>                        
                </table>
                </a>
            </div>                        
        <?php }?>

        <div class="sabad" style="padding:0;">
            <a id="ac"  href="cart.php" >
                <table>
                    <tr>
                        <th><img class="icon" src="icon/26.png" alt=""></th>
                        <th id="w"> your cart </th>
                        <th><span><?php echo isset($_SESSION['cart'])?count($_SESSION['cart']):0; ?></span></th>
                    </tr>
                </table>
            </a>                
        </div>
            
        <?php if (isset($_SESSION['adminaz']) or isset($_SESSION['useraz'])) { ?>
            <div> <a class="alert center" href="<?php echo HOME_URL.'?log=out'; ?>">log out</a>  </div>
        <?php }else{?>
                        <!-- login form list -->
            <div class="br">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" > 
                    <input class="input dropbtn" type="email" name="email" placeholder="name">
                    <input class="input dropbtn" type="password" name="pas" placeholder="password">
                    <div><input class="input dropbtn" type="submit" name="login" value="login"></div>                                        
                </form>
                <div class="join">
                    <a class="a" href="forget.php">join</a>
                    <a class="a" href="forget.php">forget password</a> 
                </div>                                
            </div>
        <?php }?>                     
    </section>
</div>
            


        <section class="right">
        <p style="color:red;"><?php if (isset($_GET['note'])) {echo "Im sorry! there was a problem with the payment!";   } ?></p>
            <table class="table">
                <?php if (isset($_SESSION['cart']) and count($_SESSION['cart'])>0) {?>
                            <tr> <th>id</th>  <th>image</th>  <th>title</th>  <th>price</th> <th>action</th></tr>
                            <?php $sum=0; foreach ($rescart as $key ) {?>
                                <tr> <td><?php echo $key['id'] ?></td> 
                                    <td><img src="<?php echo $key['url'] ?>" alt=""></td> 
                                    <td><?php echo $key['title'] ?></td>  
                                    <td><?php echo $key['price']." TL" ?></td>  
                                    <td><a href="?del=<?php echo $key['id']; ?>">del</a></td> 
                                    <?php $sum+=$key['price']; ?>
                                </tr>
                            <?php } ?>
                            <tr  style="background:yellow; font-size:+1.4em">  <th colspan="3"><strong>sum</strong></th> 
                            <th><?php echo $sum." TL" ?></th> </tr>
                    </table>
                            <?php }else{ echo "<th>your cart is empety yet!</th></table>";} ?>
                    <?php if (isadmin() or isset($_SESSION['useraz'])) { ?>    
                        <div>           
                            <a class="a inp"   href="payment.php" >to payment</a>         
                        </div>
                    <?php }else{ echo "<p style='color:red;'>please log in for countinue to your payment</p>"; }?>
        </section>       
    </div>
    <script src="css/user.js"></script>  
</body>
</html>