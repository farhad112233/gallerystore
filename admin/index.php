<?php $pname="index" ;include_once "../lab/adminAction.php"; if (isadmin()) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen and (min-width:700px) " href="../css/701.css">
    <link rel="stylesheet" media="screen and  (max-width:700px) " href="../css/699.css">
    <title>categories</title>
</head>
<body class="body">
    <div class="home">
    <h1><a class="a" href="<?php echo HOME_URL; ?>">welcome admin</a></h1>
    </div>
    <div class="container" >
         <?php include_once "leftadmin.php"; ?>

        <div class="right">
                <P class="font table">number of categorys: <span style="color:red;"><?php echo $catnum; ?></span></P>
                <P class="font table">number of image in galery: <span style="color:red;"><?php echo $imgnum; ?></span></P>
                <P class="font table">number of users: <span style="color:red;"><?php echo $usrnum; ?></span></P>
                <P class="font table">number of orders: <span style="color:red;"> <?php echo $ordnum; ?></span></P>
               

        </div>
    </div>
</body>
</html>
<?php }else{header("location:".HOME_URL."/admin/1".$pname.".php");
  } ?>