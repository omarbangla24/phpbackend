<?php
class Product{
	public $id;
	public $name;
	public $category_id;
	public $regular_price;
	public $offer_price;
	public $discount;
	public $photo;
	public $vat;
	public $uom;
	public $barcode;
	public $weight;

	function __construct($_id,$_name,$_category_id,$_regular_price,$_offer_price,$_discount,$_photo,$_vat,$_uom,$_barcode,$_weight){
		$this->id=$_id;
		$this->name=$_name;
		$this->category_id=$_category_id;
		$this->regular_price=$_regular_price;
		$this->offer_price=$_offer_price;
		$this->discount=$_discount;
		$this->photo=$_photo;
		$this->vat=$_vat;
		$this->uom=$_uom;
		$this->barcode=$_barcode;
		$this->weight=$_weight;
	}

	public function set_id($id){
		$this->id=$id;
	}

	public function set_name($name){
		$this->name=$name;
	}

	public function set_category_id($category_id){
		$this->category_id=$category_id;
	}

	public function set_regular_price($regular_price){
		$this->regular_price=$regular_price;
	}

	public function set_offer_price($offer_price){
		$this->offer_price=$offer_price;
	}

	public function set_discount($discount){
		$this->discount=$discount;
	}

	public function set_photo($photo){
		$this->photo=$photo;
	}

	public function set_vat($vat){
		$this->vat=$vat;
	}

	public function set_uom($uom){
		$this->uom=$uom;
	}

	public function set_barcode($barcode){
		$this->barcode=$barcode;
	}

	public function set_weight($weight){
		$this->weight=$weight;
	}

	public function get_id(){
		return $this->id;
	}

	public function get_name(){
		return $this->name;
	}

	public function get_category_id(){
		return $this->category_id;
	}

	public function get_regular_price(){
		return $this->regular_price;
	}

	public function get_offer_price(){
		return $this->offer_price;
	}

	public function get_discount(){
		return $this->discount;
	}

	public function get_photo(){
		return $this->photo;
	}

	public function get_vat(){
		return $this->vat;
	}

	public function get_uom(){
		return $this->uom;
	}

	public function get_barcode(){
		return $this->barcode;
	}

	public function get_weight(){
		return $this->weight;
	}

	static function get_last_id(){
		global $db;
		$db->query("select max(id) from products");
		list($last_id)=$result->fetch_row();
		return $last_id;
	}

	function save($file="",$path="img"){
		global $db;
		$db->query("insert into products(name,category_id,regular_price,offer_price,discount,photo,vat,uom,barcode,weight)values('$this->name','$this->category_id','$this->regular_price','$this->offer_price','$this->discount','$this->photo','$this->vat','$this->uom','$this->barcode','$this->weight')");
		if(is_array($file)){
			$ext=pathinfo($file["name"],PATHINFO_EXTENSION);
			$size=$file["size"]/1024;
			$type=$file["type"];
			if($type=="image/png" || $type=="image/jpeg"){
				if($size<=1000){
					//$name=slugify($file["name"]);
					$name=slugify($this->name);
					move_uploaded_file($file["tmp_name"],"$path/{$name}.{$ext}");
				}else{
					return -2;
				}
			}else{
				return -1;
			}
		}
		return $db->insert_id;
	}

	function update($file="",$path="img"){
		global $db;
		$db->query("update products set name='$this->name',category_id='$this->category_id',regular_price='$this->regular_price',offer_price='$this->offer_price',discount='$this->discount',photo='$this->photo',vat='$this->vat',uom='$this->uom',barcode='$this->barcode',weight='$this->weight' where id='$this->id'");
		if(is_array($file)){
			$ext=pathinfo($file["name"],PATHINFO_EXTENSION);
			$size=$file["size"]/1024;
			$type=$file["type"];
			if($type=="image/png" || $type=="image/jpeg"){
				if($size<=1000){
					//$name=slugify($file["name"]);
					$name=slugify($this->name);
					move_uploaded_file($file["tmp_name"],"$path/{$name}.{$ext}");
				}else{
					return -2;
				}
			}else{
				return -1;
			}
		}
	}

	static function delete($id){
		global $db;
		$db->query("delete from products where id='$id'");
	}

	static function get_product($id){
		global $db;
		$result=$db->query("select name,category_id,regular_price,offer_price,discount,photo,vat,uom,barcode,weight from products where id='$id'");
		list($name,$category_id,$regular_price,$offer_price,$discount,$photo,$vat,$uom,$barcode,$weight)=$result->fetch_row();
		$product=new Product($id,$name,$category_id,$regular_price,$offer_price,$discount,$photo,$vat,$uom,$barcode,$weight);
		return $product;
	}

	static function product_selectbox($name="cmbProduct"){
		global $db;
		$result=$db->query("select id,name from products");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_products(){
		global $db;
		$result=$db->query("select id,name,category_id,regular_price,offer_price,discount,photo,vat,uom,barcode,weight from products ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Category_id</th><th>Regular_price</th><th>Offer_price</th><th>Discount</th><th>Photo</th><th>Vat</th><th>Uom</th><th>Barcode</th><th>Weight</th></tr>";
		while(list($id,$name,$category_id,$regular_price,$offer_price,$discount,$photo,$vat,$uom,$barcode,$weight)=$result->fetch_row()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-product"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-product"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-product"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td><img src='img/$photo' width='150'/>$name</td><td>$category_id</td><td>$regular_price</td><td>$offer_price</td><td>$discount</td><td>$photo</td><td>$vat</td><td>$uom</td><td>$barcode</td><td>$weight</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_products(){
		global $db;
		$result=$db->query("select id,name,category_id,regular_price,offer_price,discount,photo,vat,uom,barcode,weight from products ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Category_id</th><th>Regular_price</th><th>Offer_price</th><th>Discount</th><th>Photo</th><th>Vat</th><th>Uom</th><th>Barcode</th><th>Weight</th></tr>";
		while(list($id,$name,$category_id,$regular_price,$offer_price,$discount,$photo,$vat,$uom,$barcode,$weight)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$name</td><td>$category_id</td><td>$regular_price</td><td>$offer_price</td><td>$discount</td><td>$photo</td><td>$vat</td><td>$uom</td><td>$barcode</td><td>$weight</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

}
?>