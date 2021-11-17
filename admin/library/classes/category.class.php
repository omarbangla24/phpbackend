<?php
class Categorie{
	public $id;
	public $name;

	function __construct($_id,$_name){
		$this->id=$_id;
		$this->name=$_name;
	}

	public function set_id($id){
		$this->id=$id;
	}

	public function set_name($name){
		$this->name=$name;
	}

	public function get_id(){
		return $this->id;
	}

	public function get_name(){
		return $this->name;
	}

	static function get_last_id(){
		global $db;
		$db->query("select max(id) from categories");
		list($last_id)=$result->fetch_row();
		return $last_id;
	}

	function save($file="",$path="img"){
		global $db;
		$db->query("insert into categories(name)values('$this->name')");
		if(is_array($file)){
			$ext=pathinfo($file["name"],PATHINFO_EXTENSION);
			$size=$file["size"]/1024;
			$type=$file["type"];
			if($type=="image/png" || $type=="image/jpeg"){
				if($size<=1000){
					$name=slugify($file["name"]);
					//$name=slugify($this->name);
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
		$db->query("update categories set name='$this->name' where id='$this->id'");
		if(is_array($file)){
			$ext=pathinfo($file["name"],PATHINFO_EXTENSION);
			$size=$file["size"]/1024;
			$type=$file["type"];
			if($type=="image/png" || $type=="image/jpeg"){
				if($size<=1000){
					$name=slugify($file["name"]);
					//$name=slugify($this->name);
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
		$db->query("delete from categories where id='$id'");
	}

	static function get_categorie($id){
		global $db;
		$result=$db->query("select name from categories where id='$id'");
		list($name)=$result->fetch_row();
		$categorie=new Categorie($id,$name);
		return $categorie;
	}

	static function categorie_selectbox($name="cmbCategorie"){
		global $db;
		$result=$db->query("select id,name from categories");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_categories(){
		global $db;
		$result=$db->query("select id,name from categories ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th></tr>";
		while(list($id,$name)=$result->fetch_row()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-categorie"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-categorie"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-categorie"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$name</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_categories(){
		global $db;
		$result=$db->query("select id,name from categories ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th></tr>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$name</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

}
?>