<?php
if(isset($_POST["btnEdit"])){
	$user_id=$_POST["txtId"];
	$obj=User::get_user($user_id);
}
if(isset($_POST["btnUpdate"])){
	$user_id=$_POST["txtId"];
		$username=$_POST["txtUsername"];
	$role_id=$_POST["cmbRole"];
	$password=$_POST["txtPassword"];
	$email=$_POST["txtEmail"];

	$obj=new User($user_id,$username,$role_id,$password,$email);
	$obj->update();
}
?>
<form class='form-horizontal' action='edit-user' method='post'><div class='card-header'>
				<a href='manage-user' class='btn btn-success'>Manage User</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->id]);
$html.=input_field(["label"=>"Username","name"=>"txtUsername","value"=>$obj->username]);
$html.=select_field(["label"=>"Role","name"=>"cmbRole","table"=>"roles","value"=>$obj->role_id]);
$html.=input_field(["label"=>"Password","name"=>"txtPassword","value"=>$obj->password]);
$html.=input_field(["label"=>"Email","name"=>"txtEmail","value"=>$obj->email]);

		echo $html;
?>
			</div>
				<div class='card-footer'>
<?php
	$html=input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]);
		echo $html;
?>
			</div>
</form>
</section>
    <!-- /.content -->