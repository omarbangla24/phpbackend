<?php
if($page=="home"){
    $found=include("pages/dashboard.php");

}
if($page=="contact"){
    $found=include("pages/contact_us.php");
    
}
if($page=="profile"){
    $found=include("pages/profile.php");
    
}
?>