<?php
if(isset($_POST["btnEdit"])){
	$product_id=$_POST["txtId"];
	$obj=Product::get_product($product_id);
}
if(isset($_POST["btnUpdate"])){
	$product_id=$_POST["txtId"];
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
	$obj=new Product($product_id,$name,$category_id,$regular_price,$offer_price,$discount,$photo,$vat,$uom,$barcode,$weight);
	$obj->update($file);
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='edit-product' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-product' class='btn btn-success'>Manage Product</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->id]);
$html.=input_field(["label"=>"Name","name"=>"txtName","value"=>$obj->name]);
$html.=select_field(["label"=>"Category","name"=>"cmbCategory","table"=>"categories","value"=>$obj->category_id]);
$html.=input_field(["label"=>"Regular_price","name"=>"txtRegular_price","value"=>$obj->regular_price]);
$html.=input_field(["label"=>"Offer_price","name"=>"txtOffer_price","value"=>$obj->offer_price]);
$html.=input_field(["label"=>"Discount","name"=>"txtDiscount","value"=>$obj->discount]);
$html.=input_field(["label"=>"Photo","type"=>"file","name"=>"file","value"=>$obj->photo]);
$html.=input_field(["label"=>"Vat","name"=>"txtVat","value"=>$obj->vat]);
$html.=input_field(["label"=>"Uom","name"=>"txtUom","value"=>$obj->uom]);
$html.=input_field(["label"=>"Barcode","name"=>"txtBarcode","value"=>$obj->barcode]);
$html.=input_field(["label"=>"Weight","name"=>"txtWeight","value"=>$obj->weight]);

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