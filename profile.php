<?php $pname="profile"; include_once "lab/useraction.php"; if (isadmin() or isset($_SESSION['useraz'])) { ?>
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
<body>
     
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
            
        
            <div> <a class="alert center" href="<?php echo HOME_URL.'?log=out'; ?>">log out</a>  </div>
        
                       
                   
    </section>
</div>
            


        <section class="right">        
            <table class="table">        
                <tr>  <th>image</th>  <th>title</th>  <th>link download</th> <th>price</th> <th>date</th> </tr>
                   <?php foreach ($or as $key) {?>
                      <tr>
                        <td><img src="<?php echo $key['url']; ?>" alt=""></td>
                        <td><?php echo $key['title']; ?></td>
                        <td><a href="<?php echo HOME_URL."/download.php?pic=".$key['id'];   ?>">download</a></td>
                        <td><?php echo $key['price']; ?></td>
                        <td><?php echo $key['date'];  ?></td>
                      </tr>
                   <?php }?>
                   
            </table>
        </section>
        
    </div>
    <script src="css/user.js"></script>  
</body>
</html>
<?php }else{ header("location:".HOME_URL."/admin/1".$pname.".php") ;}

?>