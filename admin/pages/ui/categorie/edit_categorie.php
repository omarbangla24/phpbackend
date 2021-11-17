<?php
if(isset($_POST["btnEdit"])){
	$categorie_id=$_POST["txtId"];
	$obj=Categorie::get_categorie($categorie_id);
}
if(isset($_POST["btnUpdate"])){
	$categorie_id=$_POST["txtId"];
		$name=$_POST["txtName"];

	//$file=$_FILES["file"];
	//$ext=pathinfo($file["name"],PATHINFO_EXTENSION);
	//$photo=slugify($name).".".$ext;
	$obj=new Categorie($categorie_id,$name);
	$obj->update();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Categorie</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Categorie</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='edit-categorie' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-categorie' class='btn btn-success'>Manage Categorie</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->id]);
$html.=input_field(["label"=>"Name","name"=>"txtName","value"=>$obj->name]);

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