<?php
if(isset($_POST["btnDetails"])){
	$user_id=$_POST["txtId"];
	$obj=User::get_user($user_id);
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><div class='card-header'>
				<a href='manage-user' class='btn btn-success'>Manage User</a>
			</div>
				<div class='card-body'>
<?php
$html="<table class='table'>";
$html.="<tr><th>Id</th><td>$obj->id</td></tr>
<tr><th>Username</th><td>$obj->username</td></tr>
<tr><th>Role_id</th><td>$obj->role_id</td></tr>
<tr><th>Password</th><td>$obj->password</td></tr>
<tr><th>Email</th><td>$obj->email</td></tr>
";
$html.="</table>";
		echo $html;
?>
			</div>
				<div class='card-footer'>
			</div>

</section>
    <!-- /.content -->