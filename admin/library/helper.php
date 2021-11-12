<?php
// Debug Functions
  function debug($data){
    file_put_contents("debug.txt",$data.PHP_EOL,FILE_APPEND); 
  } 

// Nav Functions
   function nav_link($url,$text,$css="far fa-circle"){
      
    $html="<a href='$url' class='nav-link'>";
    $html.="<i class='$css nav-icon'></i>";
    $html.="<p>$text</p>";               
    $html.="</a>";

    return $html;
   }

   function nav_link_dropdown($url,$text,$css="far fa-circle",$options=array()){
      
      $html="<a href='$url' class='nav-link'>";
      $html.="<i class='$css nav-icon'></i>";
      $html.="<p>$text</p>";   
      
      if(count($options)){
         $html.="<i class='fas fa-angle-left right'></i>";  
      } 
      $html.="</a>";
      
      if(count($options)){
         $html.=nav_dropdown($options);
      }
      
       return $html;
  
     }
   
   function nav_dropdown($options){    

        $html="<ul class='nav nav-treeview'>";
        foreach($options as $option){
             $html.="<li class='nav-item'>";
             $html.=nav_link($option["url"],$option["value"],$option["css"]);
             $html.="</li>";
        }
        $html.="</ul>";      

        return $html;
   }

// Form Functions
   function select_field($config){
   $config["value"]=isset($config["value"])?$config["value"]:""; 
   global $db; 
 
   $ucname=ucfirst($config["name"]);
   
   $result=$db->query("select id,name from {$config["table"]}");
   $html="<div class='form-group row'>";
   $html.="<label class='col-sm-2 col-form-label'>{$config["label"]}</label>";
   $html.="<div class='col-sm-10'>"; 
   $html.="<select name='{$config["name"]}' class='form-control'>";
   while(list($id,$name)=$result->fetch_row()){
    
     if($id==$config["value"]){
       $html.="<option value='$id' selected>$name</option>";  
     }else{
       $html.="<option value='$id'>$name</option>";  
     }
 
   }
   $html.="</select>";
   $html.="</div>";
   $html.="</div>";
 
   return $html;
 
 }
 
   function input_button($config){
      $html="<input type='{$config["type"]}' value='{$config["value"]}' name='{$config["name"]}' class='btn btn-info' />";
      return $html;
   }

   function input_field($config){

      $config["required"]=isset($config["required"])?$config["required"]:"";
      $config["placeholder"]=isset($config["placeholder"])?$config["placeholder"]:"";
      $config["value"]=isset($config["value"])?$config["value"]:"";     
      $config["type"]=isset($config["type"])?$config["type"]:"text"; 
  
      $html="<div class='form-group row'>";

       if($config["type"]!="hidden"){
        $html.="<label for='{$config["name"]}' class='col-sm-2 col-form-label'>{$config["label"]}</label>";
       }

      $html.="<div class='col-sm-10'>";
      $html.="<input type='{$config["type"]}' class='form-control' name='{$config["name"]}' id='{$config["name"]}' value='{$config["value"]}' placeholder='{$config["placeholder"]}' {$config["required"]}>";
      $html.="</div>";
      $html.="</div>";  
  
      return $html;
  
   }
   
   function PrintDate($day="cmbDay",$month="cmbMonth",$year="cmbYear"){

    $html="";
    $html.="<select name='$day'>";
    for($d=1;$d<=30;$d++){
        $d=str_pad($d,2, '0', STR_PAD_LEFT); 

        if($d==str_pad(date("d"),2,'0',STR_PAD_LEFT)){
          $html.="<option value='$d' selected>$d</option>";
        }else{
          $html.="<option value='$d'>$d</option>";
        }
        
 
    }
    $html.="</select>";
 
    $html.="<select name='$month'>";
     $months=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
    for($d=1;$d<=12;$d++){
        $d=str_pad($d,2,'0',STR_PAD_LEFT); 
        if($d==str_pad(date("m"),2,'0',STR_PAD_LEFT)){
          $html.="<option value='$d' selected>{$months[$d-1]}</option>";
        }else{
          $html.="<option value='$d'>{$months[$d-1]}</option>";
        }
 
    }
    $html.="</select>";
    $html.="<select name='$year'>";
    
   for($d=date("Y")-60;$d<=date("Y")+3;$d++){    

       if(date("Y")==$d){
         $html.="<option value='$d' selected>$d</option>";
       }else{
         $html.="<option value='$d'>$d</option>";
       }


   }
   $html.="</select>";
    return $html;
 }
 
   function PrintTime($hour="cmbHour",$min="cmbMin",$ampm="cmbAMPM"){
 
    $html="<select name='$hour'>";
    for($h=1;$h<=12;$h++){
       $h=str_pad($h,2, '0', STR_PAD_LEFT); 
       $html.="<option value='$h'>$h</option>";
    }
    $html.="</select>";
 
    $html.="<select name='$min'>";
    for($h=1;$h<=60;$h++){
        $h=str_pad($h,2, '0', STR_PAD_LEFT); 
       $html.="<option value='$h'>$h</option>";
    }
    $html.="</select>";
 
    $html.="<select name='$ampm'>";
    $html.="<option value='AM'>AM</option>";
    $html.="<option value='PM'>PM</option>";
    $html.="</select>";
   
     return $html;
 
 
 }

   
// Event Functions 
   function action_button($config){
   $config["url"]=isset($config["url"])?$config["url"]:"#";
   
   $config["class"]=isset($config["class"])?$config["class"]:"";
   $html="<form action='{$config["url"]}' method='post' style='float:left;margin-right:10px'>";
   $html.="<input type='hidden' name='txtId' value='{$config["id"]}' />";
   $html.="<input type='submit' class='btn btn-{$config["class"]}' name='btn{$config["name"]}' value='{$config["value"]}' />";
   $html.="</form>";
   return $html;
 }
	
   function success_message($config){
    $html="";

    $html.="<div class='alert alert-success alert-dismissible'>";
    //$html.="<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
   // $html.="<h5><i class='icon fas fa-check'></i> Success!</h5>";
    $html.=$config["message"];
    $html.="</div>";

    return $html;
  }


// Page Functions
   function page_header($title,$breadcrumb){
	  $html="";
	  $html.="<section class='content-header'>";
	  $html.="<div class='container-fluid'>";
	  $html.="<div class='row mb-2'>";
	  $html.="<div class='col-sm-6'>";
	  $html.="<h1>$title</h1>";
	  $html.="</div>";
	  $html.="<div class='col-sm-6'>";
	  $html.="<ol class='breadcrumb float-sm-right'>";
     foreach($breadcrumb as $link){
       $html.="<li class='breadcrumb-item'><a href='{$link['url']}'>{$link['name']}</a></li>";            
     }
  $html.="</ol>";
  $html.="</div>";
  $html.="</div>";
  $html.="</div>";
  $html.="</section>";
  return $html;
}


//URL Functions 
   function slugify($text, string $divider = '-'){
    // replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
  
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
  
    // trim
    $text = trim($text, $divider);
  
    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);
  
    // lowercase
    $text = strtolower($text);
  
    if (empty($text)) {
      return 'n-a';
    }
  
    return $text;
  }


// Dev Functions
   function generate_code($table){   

    define("PAGE_PATH","pages/ui");
    define("CLASS_PATH","library/classes");  
    define("TEMPLATE_PATH","library/template");
  
     global $db;//=new mysqli("localhost","root","","test");  
  
     $result=$db->query("desc $table");   
  
     $class_name=ucfirst(rtrim($table,"s"));
     $obj=strtolower($class_name);
  
     $code="<?php".PHP_EOL;
     $code.="class $class_name{".PHP_EOL;
    
     $parameters="";
     $init="";
     $fields="";
     $values="";
     $set="";
     $vars="";
     $table_heads="";
     $table_data="";
     $superglobals="";
     $inputs="";
     $inputs_new="";
     $details="";
  
     //add properties
    while(list($name,$type)=$result->fetch_row()){
      $code.="\tpublic \$$name".";".PHP_EOL;
      $parameters.="\$_$name,";
      $init.="\t\t\$this->$name=\$_$name;".PHP_EOL;
      if($name!="id"){
       $ucname=ucfirst($name);
       
      // if(str_contains($name,"_id")){ 
      if (strpos($name, '_id') !== false) { 
         $rtrim=rtrim($name,"_id")."s";  
         $ucrtrim=ucfirst(rtrim($name,"_id"));  
  
         $inputs.="\$html.=select_field([\"label\"=>\"$ucrtrim\",\"name\"=>\"cmb$ucrtrim\",\"table\"=>\"$rtrim\",\"value\"=>\$obj->$name]);".PHP_EOL;  
         $inputs_new.="\$html.=select_field([\"label\"=>\"$ucrtrim\",\"name\"=>\"cmb$ucrtrim\",\"table\"=>\"$rtrim\"]);".PHP_EOL;  
         $superglobal="cmb".ucfirst($ucrtrim);  
  
       }else{
         $superglobal="txt".ucfirst($name);  
         $inputs.="\$html.=input_field([\"label\"=>\"$ucname\",\"name\"=>\"txt$ucname\",\"value\"=>\$obj->$name]);".PHP_EOL;  
         $inputs_new.="\$html.=input_field([\"label\"=>\"$ucname\",\"name\"=>\"txt$ucname\"]);".PHP_EOL;
  
       }
       
  
       $fields.="$name,";
       $values.="'\$this->$name',";
       $set.="$name='\$this->$name',";
       $vars.="\$$name,";
           
       $superglobals.="\t\$$name=\$_POST[\"{$superglobal}\"];".PHP_EOL;
      }
  
      $table_heads.="<th>".ucfirst($name)."</th>";
      $table_data.="<td>\$$name</td>";
      $details.="<tr><th>".ucfirst($name)."</th><td>\$obj->$name</td></tr>".PHP_EOL;
     
    }
   
    $code.="".PHP_EOL;
    //remove comma
    $parameters=rtrim($parameters,",");
    $fields=rtrim($fields,",");
    $values=rtrim($values,",");
    $set=rtrim($set,",");
    $vars=rtrim($vars,",");
    
    //add constructor 
  
    $code.="\tfunction __construct($parameters){".PHP_EOL;
    $code.=$init;
    $code.="\t}".PHP_EOL.PHP_EOL;
  
   //CRUD functions
   
    $code.="\tstatic function get_last_id(){".PHP_EOL;
    $code.="\t\tglobal \$db;".PHP_EOL;  
    $code.="\t\t\$db->query(\"select max(id) from $table\");".PHP_EOL;
    $code.="\t\tlist(\$last_id)=\$result->fetch_row();".PHP_EOL;
    $code.="\t\treturn \$last_id;".PHP_EOL;
    $code.="\t}".PHP_EOL.PHP_EOL;
  
     $code.="\tfunction save(){".PHP_EOL;
     $code.="\t\tglobal \$db;".PHP_EOL;
     $code.="\t\t\$db->query(\"insert into $table($fields)values($values)\");".PHP_EOL;
     $code.="\t\treturn \$db->insert_id;".PHP_EOL;
     $code.="\t}".PHP_EOL.PHP_EOL;  
     
     $code.="\tfunction update(){".PHP_EOL;
     $code.="\t\tglobal \$db;".PHP_EOL;
     $field="id";
     $code.="\t\t\$db->query(\"update $table set $set where $field='\$this->$field'\");".PHP_EOL;
     $code.="\t}".PHP_EOL.PHP_EOL;
  
     $code.="\tstatic function delete(\$id){".PHP_EOL;
     $code.="\t\tglobal \$db;".PHP_EOL;
     $code.="\t\t\$db->query(\"delete from $table where id='\$id'\");".PHP_EOL;
     $code.="\t}".PHP_EOL.PHP_EOL;  
     
  
     $code.="\tstatic function get_$obj(\$id){".PHP_EOL;
     $code.="\t\tglobal \$db;".PHP_EOL;
     $code.="\t\t\$result=\$db->query(\"select $fields from $table where id='\$id'\");".PHP_EOL;
     $code.="\t\tlist($vars)=\$result->fetch_row();".PHP_EOL;
     $code.="\t\t\$$obj=new $class_name(\$id,$vars);".PHP_EOL;
     $code.="\t\treturn \$$obj;".PHP_EOL;
     $code.="\t}".PHP_EOL.PHP_EOL;

//--------------funtion select box-----------------//
      $cmbName=ucfirst($obj);
      $code.="\tstatic function {$obj}_selectbox(\$name=\"cmb{$cmbName}\"){".PHP_EOL;
      $code.="\t\tglobal \$db;".PHP_EOL;
      $code.="\t\t\$result=\$db->query(\"select id,name from $table\");".PHP_EOL;
      $code.="\t\t\$html=\"<select id='\$name' name='\$name'>\";".PHP_EOL;
      $code.="\t\twhile(list(\$id,\$name)=\$result->fetch_row()){".PHP_EOL;
      $code.="\t\t\t\$html.=\"<option value='\$id'>\$name</option>\";".PHP_EOL;
      $code.="\t\t}".PHP_EOL;
      $code.="\t\t\$html.=\"</select>\";".PHP_EOL;
      $code.="\t\treturn \$html;".PHP_EOL;
      $code.="\t}".PHP_EOL.PHP_EOL;
        
  //---------------------- function manage----------------------//
     $code.="\tstatic function manage_{$obj}s(){".PHP_EOL;
     $code.="\t\tglobal \$db;".PHP_EOL;
     $code.="\t\t\$result=\$db->query(\"select id,$fields from $table \");".PHP_EOL;
     $code.="\t\t\$html=\"<table class='table'>\";".PHP_EOL;
     $code.="\t\t\$html.=\"<tr>$table_heads</tr>\";".PHP_EOL;
     $code.="\t\twhile(list(\$id,$vars)=\$result->fetch_row()){".PHP_EOL;
  
     $code.="\t\t\t\$action_buttons=\"<div class='clearfix'>\";".PHP_EOL;
     $tmp_name=str_replace("_","-",$obj);
     $code.="\t\t\t\$action_buttons.=action_button([\"id\"=>\$id,\"name\"=>\"Details\",\"value\"=>\"Detials\",\"class\"=>\"info\",\"url\"=>\"details-$tmp_name\"]);".PHP_EOL;   
     $code.="\t\t\t\$action_buttons.=action_button([\"id\"=>\$id,\"name\"=>\"Edit\",\"value\"=>\"Edit\",\"class\"=>\"primary\",\"url\"=>\"edit-$tmp_name\"]);".PHP_EOL;      
     $code.="\t\t\t\$action_buttons.=action_button([\"id\"=>\$id,\"name\"=>\"Delete\",\"value\"=>\"Delete\",\"class\"=>\"danger\",\"url\"=>\"manage-$tmp_name\"]);".PHP_EOL;
     $code.="\t\t\t\$action_buttons.=\"</div>\";".PHP_EOL;
  
     $code.="\t\t\t\$html.=\"<tr>$table_data<td>\$action_buttons</td></tr>\";".PHP_EOL;
     $code.="\t\t}".PHP_EOL;
  
     $code.="\t\t\$html.=\"</table>\";".PHP_EOL;
  
     $code.="\t\treturn \$html;".PHP_EOL;
     $code.="\t}".PHP_EOL.PHP_EOL;
  
     //----------------------get_---------------------------//
     $code.="\tstatic function get_{$obj}s(){".PHP_EOL;
     $code.="\t\tglobal \$db;".PHP_EOL;
     $code.="\t\t\$result=\$db->query(\"select id,$fields from $table \");".PHP_EOL;
     $code.="\t\t\$html=\"<table class='table'>\";".PHP_EOL;
     $code.="\t\t\$html.=\"<tr>$table_heads</tr>\";".PHP_EOL;
     $code.="\t\twhile(list(\$id,$vars)=\$result->fetch_row()){".PHP_EOL;
            
     
     $code.="\t\t\t\$html.=\"<tr>$table_data</tr>\";".PHP_EOL;
     $code.="\t\t}".PHP_EOL;
     
     $code.="\t\t\$html.=\"</table>\";".PHP_EOL;
     
     $code.="\t\treturn \$html;".PHP_EOL;
     $code.="\t}".PHP_EOL.PHP_EOL;
  
  
    $code.="}".PHP_EOL;
    $code.="?>";
    $singular=rtrim($table,"s");
    file_put_contents(CLASS_PATH."/_{$singular}.class.php",$code);
      
    
   if(!file_exists(PAGE_PATH."/".$obj)){
     mkdir(PAGE_PATH."/".$obj, 0777, true);
   }
    
   //-------Manage Page with Delete ---------

   $code="<?php".PHP_EOL;
   $code.="if(isset(\$_POST[\"btnDelete\"])){".PHP_EOL;
   $code.="\t\${$obj}_id=\$_POST[\"txtId\"];".PHP_EOL;
   $code.="\t$class_name::delete(\${$obj}_id);";
   $code.="}".PHP_EOL;;
   $code.="?>".PHP_EOL;
   $code.=str_replace("Blank Page","Manage $class_name",file_get_contents(TEMPLATE_PATH."/manage_header.php"));
   
   $code.="<div class='card-header'>".PHP_EOL;
   $code.="\t\t\t\t<a href='create-{$obj}' class='btn btn-success'>New $class_name</a>".PHP_EOL;
   $code.="\t\t\t</div>".PHP_EOL;
   $code.="\t\t\t\t<div class='card-body'>".PHP_EOL;
   $code.="\t\t<?php".PHP_EOL;
   $code.="\t\t\techo $class_name::manage_{$obj}s();".PHP_EOL;
   $code.="\t\t?>".PHP_EOL;
   $code.="\t\t\t</div>".PHP_EOL;
   $code.=file_get_contents(TEMPLATE_PATH."/manage_footer.php");
  
   file_put_contents(PAGE_PATH."/$obj/manage_{$obj}.php",$code);
  
    //View Page  
   $code=str_replace("Blank Page","View $class_name",file_get_contents(TEMPLATE_PATH."/manage_header.php"));
   
  
   $code.="\t\t\t\t<div class='card-body'>".PHP_EOL;
   $code.="\t\t<?php".PHP_EOL;
   $code.="\t\t\techo $class_name::get_{$obj}s();".PHP_EOL;
   $code.="\t\t?>".PHP_EOL;
   $code.="\t\t\t</div>".PHP_EOL;
   $code.=file_get_contents(TEMPLATE_PATH."/manage_footer.php");
   file_put_contents(PAGE_PATH."/$obj/view_{$obj}.php",$code);
  
  
  //---------------Create Page--------------
  
  $code="<?php".PHP_EOL;
  $code.="if(isset(\$_POST[\"btnCreate\"])){".PHP_EOL.PHP_EOL;
  $code.="\t".$superglobals.PHP_EOL;
  $code.="\t\$obj=new $class_name(\"\",$vars);".PHP_EOL;
  $code.="\t\$obj->save();".PHP_EOL;
  $code.="}".PHP_EOL;
  $code.="?>".PHP_EOL;
  $code.=str_replace("Blank Page","Create $class_name",file_get_contents(TEMPLATE_PATH."/create_header.php"));
  $code.="<form class='form-horizontal' action='create-$obj' method='post'>";
  $code.="<div class='card-header'>".PHP_EOL;
 
  $ext_table=str_replace("_","-",$obj);
  $code.="\t\t\t\t<a href='manage-{$ext_table}' class='btn btn-success'>Manage $class_name</a>".PHP_EOL;
  $code.="\t\t\t</div>".PHP_EOL;
  $code.="\t\t\t\t<div class='card-body'>".PHP_EOL;
  
  $code.="<?php".PHP_EOL;
  $code.="\$html=\"\";".PHP_EOL;
  $code.=$inputs_new.PHP_EOL;
  $code.="\t\techo \$html;".PHP_EOL;
  $code.="?>".PHP_EOL;
  $code.="\t\t\t</div>".PHP_EOL;
  $code.="\t\t\t\t<div class='card-footer'>".PHP_EOL;
  $code.="<?php".PHP_EOL;
  $code.="\t\$html=input_button([\"type\"=>\"submit\",\"name\"=>\"btnCreate\",\"value\"=>\"Create\"]);".PHP_EOL;
  $code.="\t\techo \$html;".PHP_EOL;
  $code.="?>".PHP_EOL;
  $code.="\t\t\t</div>".PHP_EOL;
  $code.="</form>";
  
  $code.=file_get_contents(TEMPLATE_PATH."/create_footer.php");
   
  file_put_contents(PAGE_PATH."/$obj/create_{$obj}.php",$code);
    
  //------------------------Update Page-----------------------
  $code="";
  $code="<?php".PHP_EOL;
  $code.="if(isset(\$_POST[\"btnEdit\"])){".PHP_EOL;
  $code.="\t\${$obj}_id=\$_POST[\"txtId\"];".PHP_EOL;
  $code.="\t\$obj=$class_name::get_$obj(\${$obj}_id);".PHP_EOL;
  $code.="}".PHP_EOL;
  $code.="if(isset(\$_POST[\"btnUpdate\"])){".PHP_EOL;
  $code.="\t\${$obj}_id=\$_POST[\"txtId\"];".PHP_EOL;
  $code.="\t".$superglobals.PHP_EOL;
  $code.="\t\$obj=new $class_name(\${$obj}_id,$vars);".PHP_EOL;
  $code.="\t\$obj->update();".PHP_EOL;
  
  $code.="}".PHP_EOL;
  $code.="?>".PHP_EOL;
  $code.=str_replace("Blank Page","Update $class_name",file_get_contents(TEMPLATE_PATH."/update_header.php"));
  $code.="<form class='form-horizontal' action='edit-$obj' method='post'>";
  $code.="<div class='card-header'>".PHP_EOL;
  $code.="\t\t\t\t<a href='manage-{$obj}' class='btn btn-success'>Manage $class_name</a>".PHP_EOL;
  $code.="\t\t\t</div>".PHP_EOL;
  $code.="\t\t\t\t<div class='card-body'>".PHP_EOL;
  
  $code.="<?php".PHP_EOL;
  $code.="\$html=\"\";".PHP_EOL;
  $code.="\$html.=input_field([\"type\"=>\"hidden\",\"name\"=>\"txtId\",\"value\"=>\$obj->id]);".PHP_EOL;
  $code.=$inputs.PHP_EOL;
  $code.="\t\techo \$html;".PHP_EOL;
  $code.="?>".PHP_EOL;
  $code.="\t\t\t</div>".PHP_EOL;
  $code.="\t\t\t\t<div class='card-footer'>".PHP_EOL;
  $code.="<?php".PHP_EOL;
  $code.="\t\$html=input_button([\"type\"=>\"submit\",\"name\"=>\"btnUpdate\",\"value\"=>\"Update\"]);".PHP_EOL;
  $code.="\t\techo \$html;".PHP_EOL;
  $code.="?>".PHP_EOL;
  $code.="\t\t\t</div>".PHP_EOL;
  $code.="</form>";
  
  $code.=file_get_contents(TEMPLATE_PATH."/update_footer.php");
   file_put_contents(PAGE_PATH."/$obj/update_{$obj}.php",$code);

//------------------Details Page------------------//

$code="";
$code="<?php".PHP_EOL;
$code.="if(isset(\$_POST[\"btnDetails\"])){".PHP_EOL;
$code.="\t\${$obj}_id=\$_POST[\"txtId\"];".PHP_EOL;
$code.="\t\$obj=$class_name::get_$obj(\${$obj}_id);".PHP_EOL;
$code.="}".PHP_EOL;

$code.="?>".PHP_EOL;
$code.=str_replace("Blank Page","$class_name Details",file_get_contents(TEMPLATE_PATH."/details_header.php"));

$code.="<div class='card-header'>".PHP_EOL;
$code.="\t\t\t\t<a href='manage-{$obj}' class='btn btn-success'>Manage $class_name</a>".PHP_EOL;
$code.="\t\t\t</div>".PHP_EOL;
$code.="\t\t\t\t<div class='card-body'>".PHP_EOL;

$code.="<?php".PHP_EOL;
$code.="\$html=\"<table class='table'>\";".PHP_EOL;

$code.="\$html.=\"$details\";".PHP_EOL;
$code.="\$html.=\"</table>\";".PHP_EOL;
$code.="\t\techo \$html;".PHP_EOL;
$code.="?>".PHP_EOL;
$code.="\t\t\t</div>".PHP_EOL;
$code.="\t\t\t\t<div class='card-footer'>".PHP_EOL;

$code.="\t\t\t</div>".PHP_EOL;


$code.=file_get_contents(TEMPLATE_PATH."/details_footer.php");
 file_put_contents(PAGE_PATH."/$obj/details_{$obj}.php",$code);

  
}
 
 



?>

