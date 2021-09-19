<?php $pname="upload" ;include_once "../lab/adminAction.php"; if (isadmin()) { ?>
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
            <div class="left">
            <h2>upload picture</h2>
                <form class="left" enctype="multipart/form-data" action="" method="post">
                    <select class="input" name="cat" required >                    
                        <option value=""  selected hidden >choice a gategory</option>
                        <?php foreach ( get_categories() as $key) {  ?>
                        <option value="<?php echo $key['id']; ?>"> <?php echo $key['name']; ?></option>
                        <?php } ?>                        
                    </select>

                    <input class="input" type="text" name="title" placeholder="name (title)" required>
                    <input class="input" type="number" name="price" placeholder="price  TL" required>
                    <input class="input" type="file" name="image" required>
                    <input class="input" type="submit" value="Upload" name="upload">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php }else{header("location:".HOME_URL."/admin/1".$pname.".php");
  } ?>