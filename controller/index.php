<?php
//viet select case
if(isset($_REQUEST['act'])){
    $act=$_REQUEST['act'];
    switch($act){
        case "themdm":
            include "../view/danhmuc.php";
            $valided = true;
            $name_er="";
            include "../view/menu.php";
            break;
        case "header":
            
            break;
    }
} else{
    include "../view/header.php";
    include "../view/menu.php";
    include "../view/sanpham.php";
    include "../view/footer.php";
    
}
    include "../view/index3COMBO.php";
    
    
    
    
?>