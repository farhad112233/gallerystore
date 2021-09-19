<?php $pname="categories" ;include_once "../lab/adminAction.php" ; if (isadmin()) {?>
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
            <h2>categories</h2>
            <?php if (isset($cate)) {?>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input class="input" type="text" name="name" placeholder="name" value="<?php echo $cate['0']['name'];  ?>">                
                <input class="input" type="text" name="noe" placeholder="no" value="<?php echo $cate['0']['no'];  ?>">  
                <input hidden type="text" name="id" value="<?php echo $_GET['edit']; ?>">                              
                <input style="width:80px;"  class="input"  type="submit" value="set" name="sete">
            </form>
                
           <?php  }else{?>                
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input class="input" type="text" name="nam" placeholder="name">
                <input class="input" type="text" name="no" placeholder="no">
                <input style="width:80px;" class="input" type="submit" value="set" name="set">
            </form>
            <?php }?>

            <section>
                <table class="table">                    
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>sort by no</th>
                        <th>action</th>
                    </tr>
                    <?php  $re=get_categories();$a=1;   foreach ($re as $key) { $i=$key['id']; ?>
                    <tr class="tr" id="<?php echo $key['id']; ?>">
                        <td><?php echo $a;$a++; ?></td>
                        <td><?php echo $key['name']; ?></td>
                        <td><?php echo $key['no']; ?></td>
                        <td><span><a class="a" title="Remove" href='<?php echo "?del=$i";  ?>' onclick="return confirm('are you sure');"> <span style="color:red;">&#215;&emsp;</span></a></span> 
                        <span><a class="a" style="color:blue;" title="Edit" href='<?php echo "?edit=$i"; ?>'>E</a></span> </td>
                    </tr>
                    <?php       } ?>        


                </table>
            </section>
        </div>
    </div>
</body>
</html>
<?php }else{header("location:".HOME_URL."/admin/1".$pname.".php");
  } ?>