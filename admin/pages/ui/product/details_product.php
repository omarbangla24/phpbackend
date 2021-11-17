<?php
if(isset($_POST["btnDetails"])){
	$product_id=$_POST["txtId"];
	$obj=Product::get_product($product_id);
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><div class='card-header'>
				<a href='manage-product' class='btn btn-success'>Manage Product</a>
			</div>
				<div class='card-body'>
<?php
$html="<table class='table'>";
$html.="<tr><th>Id</th><td>$obj->id</td></tr>
<tr><th>Name</th><td>$obj->name</td></tr>
<tr><th>Category_id</th><td>$obj->category_id</td></tr>
<tr><th>Regular_price</th><td>$obj->regular_price</td></tr>
<tr><th>Offer_price</th><td>$obj->offer_price</td></tr>
<tr><th>Discount</th><td>$obj->discount</td></tr>
<tr><th>Photo</th><td>$obj->photo</td></tr>
<tr><th>Vat</th><td>$obj->vat</td></tr>
<tr><th>Uom</th><td>$obj->uom</td></tr>
<tr><th>Barcode</th><td>$obj->barcode</td></tr>
<tr><th>Weight</th><td>$obj->weight</td></tr>
";
$html.="</table>";
		echo $html;
?>
			</div>
				<div class='card-footer'>
			</div>

</section>
    <!-- /.content -->