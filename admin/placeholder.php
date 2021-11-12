<?php
if(isset($_GET["page"])){
    $page=$_GET["page"];
    //$found=0;
    if($page=="home"){
        $found=include("pages/dashboard.php");
        // $not_found=0;
    }
    if($page=="contact"){
        $found=include("pages/contact_us.php");
    }
    if($page=="profile"){
        $found=include("pages/profile.php");
    }

    include("placeholders/system_placeholder.php");
    include("placeholders/developer_placeholder.php");
    
    if(!isset($found)){
        include("pages/404.php");
    }
}

?>