<?php $pname="orders" ;include_once "../lab/adminAction.php" ; if (isadmin()) {?>
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
                <table class="table">
                    <tr> <th>#</th> <th>user</th> <th>image</th><th></th> <th>price</th> <th>date</th> </tr>
                    <?php foreach ($orders as $value) {    
                        $a=getimpic($value['image']);                         
                          ?>
                    <tr class="tr"> 
                        <td><?php echo $value['id']?></td>  
                        <td><?php echo $value['user']?></td> 
                        <td><img src="<?php echo $a[0]['url']; ?>" alt=""></td>  
                        <td><?php echo $value['image'].": ".$a[0]['title']; ?></td>
                        <td><?php echo $value['price']?></td> 
                        <td><?php echo $value['date']?></td> 
                    </tr>
                    <?php } ?>                    
                </table>
        </div>
    </div>
</body>
</html>
<?php }else{header("location:".HOME_URL."/admin/1".$pname.".php");
  } ?>