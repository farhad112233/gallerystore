<?php $pname="index"; include_once "lab/useraction.php" ?>
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
<body  >
     
    <div class="container">
        <?php include_once "leftuser.php"; ?>
            


        <section class="right">
            
            <?php foreach ($result as $key ) { ?>
                <div class="a">    
                    <a href="#">
                        <img src="<?php echo $key['url'] ?>" alt="">                    
                    </a>
                    <p class="title"><?php echo $key['title'] ?></p>
                    <a class="title a"  href="<?php echo HOME_URL.'?page='.$page.'&cat='.$cat.'&add2cart='.$key['id'] ?>">
                         add to cart <span style='color:red'><?php echo $key['price'].' TL'; ?></span>
                    </a>
                   
                </div>    
            <?php } ?>
            
           
        </section>        
    </div>    
    <span id="sp">sasa</span>
    <script src="css/user.js"></script>              
    <!-- <script>
        function tog(){
            $("#myDropdown").toggleClass("hide");
        }
    </script> -->
</body>
</html>