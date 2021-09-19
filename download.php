<?php $pname="download"; include_once "lab/useraction.php";

    if (isset($_GET['pic']) and is_numeric($_GET['pic'])) {
        $us= $_SESSION['id'];
        $sql="SELECT  o.image, i.path FROM `im_order` o,`im_image` i WHERE user=$us and o.image=i.id; ";  
        $res=$db->query($sql);
        $resu=$res->fetch_all(1);
        foreach ($resu as $value) {
            if ($value['image']==$_GET['pic']) {
                $path=$value['path'];
                $info=getimagesize($path);
                $mim=$info['mime'];
                $base=basename($path);

                
                header("Content-Type:$mim");
                header("Content-Lenght:".filesize($path));
                header("Content-Transfer-Encoding:binary");
                header("Content-Disposition:attachment: filename='$base.jpg' ");
                // header("Cache-control:must-revalidate,post-chech=0,pre-chech=0");
                readfile($path);
                exit();
            }
        }
        echo "<pre>";
        print_r($info);

        
    echo "</pre>";
    }
    


?>