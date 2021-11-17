<?php
 
 if(isset($_GET["page"])){
  
   $page=$_GET["page"];    

    $folder="placeholders";
    foreach (glob("{$folder}/*.php") as $filename)
    {
        include $filename;
    }

    if(!isset($found)){
        include("pages/404.php");
    }

 }

?>