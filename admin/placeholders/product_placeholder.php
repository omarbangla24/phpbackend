<?php
if($page=="create-product"){
	$found=include("pages/ui/product/create_product.php");
}elseif($page=="edit-product"){
	$found=include("pages/ui/product/edit_product.php");
}elseif($page=="manage-product"){
	$found=include("pages/ui/product/manage_product.php");
}elseif($page=="details-product"){
	$found=include("pages/ui/product/details_product.php");
}elseif($page=="view-product"){
	$found=include("pages/ui/product/view_product.php");
}
?>
