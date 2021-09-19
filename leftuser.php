<div class="left">
    <button id="b" class="dropbtn" >menu</button>
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

    
        
            <!-- categories list -->
        <div class="cat">
            <?php  if ($cat==0) { ?>
                <p class="leftaa">all categories</p>
            <?php }else{ ?>
            <a class="lefta aa" href="<?php echo HOME_URL."?cat=0"; ?>">all categories</a>
            <?php }; foreach ($get_cat as $value) { if ($cat==$value['id']) {
                echo "<p class='leftaa'>".$value['name']."</p>";
            }else{ ?>
                <a class="lefta aa" href="<?php echo HOME_URL."?cat=".$value['id'] ?>"><?php echo $value['name'] ?></a>
            <?php  }} ?>
        </div>            
    </section>
</div>