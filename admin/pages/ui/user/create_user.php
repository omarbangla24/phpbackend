<?php
if(isset($_POST["btnCreate"])){

		$username=$_POST["txtUsername"];
	$role_id=$_POST["cmbRole"];
	$password=$_POST["txtPassword"];
	$email=$_POST["txtEmail"];

	$obj=new User("",$username,$role_id,$password,$email);
	$obj->save();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='create-user' method='post'><div class='card-header'>
				<a href='manage-user' class='btn btn-success'>Manage User</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["label"=>"Username","name"=>"txtUsername"]);
$html.=select_field(["label"=>"Role","name"=>"cmbRole","table"=>"roles"]);
$html.=input_field(["label"=>"Password","name"=>"txtPassword"]);
$html.=input_field(["label"=>"Email","name"=>"txtEmail"]);

		echo $html;
?>
			</div>
				<div class='card-footer'>
<?php
	$html=input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Create"]);
		echo $html;
?>
			</div>
</form>

</section>
    <!-- /.content -->