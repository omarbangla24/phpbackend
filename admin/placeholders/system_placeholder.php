<?php
if($page=="create-role"){
    $found=include("pages/system/role/create_role.php");
}elseif($page=="edit-role"){
    $found=include("pages/system/role/update_role.php");
}elseif($page=="manage-role"){
    $found=include("pages/system/role/manage_role.php");
}elseif($page=="details-role"){
    $found=include("pages/system/role/details_role.php");

}elseif($page=="create-user"){
    $found=include("pages/system/user/create_user.php");
}elseif($page=="edit-user"){
    $found=include("pages/system/user/update_user.php");
}elseif($page=="manage-user"){
    $found=include("pages/system/user/manage_user.php");
}elseif($page=="details-user"){
    $found=include("pages/system/user/details_user.php");

}elseif($page=="change-password"){
    $found=include("pages/system/user/change_password.php");
}elseif($page=="activity-log"){

}elseif($page=="settings"){
    
}elseif($page=="signout"){
    
}

?>