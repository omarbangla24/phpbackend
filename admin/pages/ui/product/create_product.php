<?php
if(isset($_POST["btnCreate"])){

		$name=$_POST["txtName"];
	$category_id=$_POST["cmbCategory"];
	$regular_price=$_POST["txtRegular_price"];
	$offer_price=$_POST["txtOffer_price"];
	$discount=$_POST["txtDiscount"];
	//$photo=$_POST["txtPhoto"];
	$vat=$_POST["txtVat"];
	$uom=$_POST["txtUom"];
	$barcode=$_POST["txtBarcode"];
	$weight=$_POST["txtWeight"];

	$file=$_FILES["file"];
	$ext=pathinfo($file["name"],PATHINFO_EXTENSION);
	$photo=slugify($name).".".$ext;
	$obj=new Product("",$name,$category_id,$regular_price,$offer_price,$discount,$photo,$vat,$uom,$barcode,$weight);
	$obj->save($file);
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='create-product' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-product' class='btn btn-success'>Manage Product</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["label"=>"Name","name"=>"txtName"]);
$html.=select_field(["label"=>"Category","name"=>"cmbCategory","table"=>"categories"]);
$html.=input_field(["label"=>"Regular_price","name"=>"txtRegular_price"]);
$html.=input_field(["label"=>"Offer_price","name"=>"txtOffer_price"]);
$html.=input_field(["label"=>"Discount","name"=>"txtDiscount"]);
$html.=input_field(["label"=>"Photo","type"=>"file","name"=>"file"]);
$html.=input_field(["label"=>"Vat","name"=>"txtVat"]);
$html.=input_field(["label"=>"Uom","name"=>"txtUom"]);
$html.=input_field(["label"=>"Barcode","name"=>"txtBarcode"]);
$html.=input_field(["label"=>"Weight","name"=>"txtWeight"]);

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