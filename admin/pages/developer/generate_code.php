<?php        
      if(isset($_POST["btnCreate"])){
        $table=$_POST["txtTable"];

        //echo $table;
        generate_code($table);
        echo "Success";
      }   
            
 ?>

  
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Generate Code</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Generate Code</li>
            </ol>
          </div>
        </div>
      </div>
  </section>
     
  <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
        
        <form action="generate-code" class="form-horizontal" method="post">
                <div class="card-body">
                   <?php                   
                            
                   echo input_field(["label"=>"Table Name","name"=>"txtTable","type"=>"text","placeholder"=>"Enter Table","required"=>"required"]);
                                      
                   ?>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   <div class="btn-group">
                    <?php
                    echo input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Generate"]);
                    echo input_button(["type"=>"reset","name"=>"btnClear","value"=>"Clear"]);
                    ?>   
                  </div>              
                </div>
                <!-- /.card-footer -->
          </form>
         
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
 </section>
