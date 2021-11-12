<?php
class User{
	public $id;
	public $username;
	public $role_id;
	public $password;
	public $email;

	function __construct($_id,$_username,$_role_id,$_password,$_email){
		$this->id=$_id;
		$this->username=$_username;
		$this->role_id=$_role_id;
		$this->password=$_password;
		$this->email=$_email;
	}

	static function get_last_id(){
		global $db;
		$db->query("select max(id) from users");
		list($last_id)=$result->fetch_row();
		return $last_id;
	}

	function save(){
		global $db;
		$db->query("insert into users(username,role_id,password,email)values('$this->username','$this->role_id','$this->password','$this->email')");
		return $db->insert_id;
	}

	function update(){
		global $db;
		$db->query("update users set username='$this->username',role_id='$this->role_id',password='$this->password',email='$this->email' where id='$this->id'");
	}

	static function delete($id){
		global $db;
		$db->query("delete from users where id='$id'");
	}

	static function get_user($id){
		global $db;
		$result=$db->query("select username,role_id,password,email from users where id='$id'");
		list($username,$role_id,$password,$email)=$result->fetch_row();
		$user=new User($id,$username,$role_id,$password,$email);
		return $user;
	}

	static function user_selectbox($name="cmbUser"){
		global $db;
		$result=$db->query("select id,name from users");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_users(){
		global $db;
		$result=$db->query("select id,username,role_id,password,email from users ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Username</th><th>Role_id</th><th>Password</th><th>Email</th></tr>";
		while(list($id,$username,$role_id,$password,$email)=$result->fetch_row()){
			$action_buttons="<div class='clearfix'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-user"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-user"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-user"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$username</td><td>$role_id</td><td>$password</td><td>$email</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_users(){
		global $db;
		$result=$db->query("select id,username,role_id,password,email from users ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Username</th><th>Role_id</th><th>Password</th><th>Email</th></tr>";
		while(list($id,$username,$role_id,$password,$email)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$username</td><td>$role_id</td><td>$password</td><td>$email</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

}
?>