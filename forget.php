<?php $pname="forget"; include_once "lab/useraction.php" ?>
<!DOCTYPE html>
<html lang="en">
<head  id="body">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" media="screen and (min-width:700px) " href="css/701.css">
    <link rel="stylesheet" media="screen and  (max-width:700px) " href="css/699.css">
    <link rel="stylesheet" href="fancybox/dist/jquery.fancybox.min.css">
    <script src="fancybox/dist/jquery.fancybox.min.js"></script>
</head>
<body style="border:0; background:url('icon/back.jpg') no-repeat;background-size:100% ;">
 

   <!-- forget form -->
   <?php if (!isset($_GET['id'])) { ?>
    <div class="cont">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  >
            <fieldset>
            <legend><b><em> forget password </em> </b></legend>
                <div >  <input class="input full" placeholder="email"  type="email" name="namef" required> </div>            
                <div> <input class="input full"   type="submit" name="submitf" value="send email">         </div>
            </fieldset>
        </form>        
    </div>
    
    <!-- join form -->
    <div class="cont">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  >
        <fieldset>
        <legend><b><em> join </em> </b></legend>
                <div >     <input class="input full" placeholder="name"  type="text" name="namej" > </div>
                <div>   <input class="input full"  placeholder="password" type="text" name="password" > </div>
                <div>      <input class="input full" placeholder="Email" type="text" name="email" > </div>
                <div><input class="input full" placeholder="Phone Number (optional)" type="text" name="number" > </div>
                <div> <input class="input full"   type="submit" name="submitj" value="join">         </div>
       </fieldset>
            </form>
    </div>

    <div  class="cont"><a class="a"  href="<?php echo HOME_URL; ?>">back to HOME page   </a></div>
   <?php }else{?>
    <div class="cont">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  >
            <fieldset>
            <legend><b><em> forget password </em> </b></legend>
                <div >  <input class="input full" placeholder="new password"  type="text" name="passwordf" required> </div>            
                <div><input type="text" name="id" hidden value="<?php echo $_GET['id']; ?>"></div>
                <div> <input class="input full"   type="submit" name="submitff" value="set password">         </div>
            </fieldset>
        </form>        
    </div>

   <?php }    ?>

</body>
</html>






