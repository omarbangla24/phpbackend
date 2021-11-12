<?php
class Role{
	public $id;
	public $name;

	function __construct($_id,$_name){
		$this->id=$_id;
		$this->name=$_name;
	}

	static function get_last_id(){
		global $db;
		$db->query("select max(id) from roles");
		list($last_id)=$result->fetch_row();
		return $last_id;
	}

	function save(){
		global $db;
		$db->query("insert into roles(name)values('$this->name')");
		return $db->insert_id;
	}

	function update(){
		global $db;
		$db->query("update roles set name='$this->name' where id='$this->id'");
	}

	static function delete($id){
		global $db;
		$db->query("delete from roles where id='$id'");
	}

	static function get_role($id){
		global $db;
		$result=$db->query("select name from roles where id='$id'");
		list($name)=$result->fetch_row();
		$role=new Role($id,$name);
		return $role;
	}

	static function role_selectbox($name="cmbRole"){
		global $db;
		$result=$db->query("select id,name from roles");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_roles(){
		global $db;
		$result=$db->query("select id,name from roles ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th></tr>";
		while(list($id,$name)=$result->fetch_row()){
			$action_buttons="<div class='clearfix'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-role"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-role"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-role"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$name</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_roles(){
		global $db;
		$result=$db->query("select id,name from roles ");
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