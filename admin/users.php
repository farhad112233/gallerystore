<?php $pname="users" ;include_once "../lab/adminAction.php"; if (isadmin()) { ?>
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
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <input class="input" type="text" name="namee" id="" placeholder="name">

                user:<input type="radio" name="notee" id="" value="user" checked>&emsp;
                admin:<input type="radio" name="notee" id="" value="admin">

                
                <input class="input" type="text" name="pass" id="" placeholder="password">
                <input class="input" type="text" name="mail" id="" placeholder="email addres">
                <input class="input" type="text" name="no" id="" placeholder="mobile no">
                <input style="width:50px;" class="input" type="submit" name="adduser" value="add">
            </form>
            <table class="table" id="user">
                <tr> <th>#</th>   <th>name</th>  <th>post</th>  <th>mobile</th>
                <th>email</th>  <th>date</th>  <th>action</th> </tr>
                    <?php   foreach ($user as $key) { ?>
                        <tr class="tr">
                            <td><?php echo $key['id'] ?></td>
                            <td><?php echo $key['name'] ?></td>
                            <td><?php echo $key['note'] ?></td>
                            <td><?php echo $key['phone'] ?></td>
                            <td><?php echo $key['email'] ?></td>
                            <td><?php echo $key['date'] ?></td>
                            <td><a class="a" href="?deluser=<?php echo $key['id'] ?>" title="remove user" onclick="return confirm('are you sure to remove <?php  echo $key['name']; ?>');"><b style="color:red;">&#215;</b></a> </td>                        </tr>
                    <?php } ?>
                
            </table>
               
        </div>
    </div>    
</body>
</html>
<?php }else{header("location:".HOME_URL."/admin/1".$pname.".php");
  } ?>