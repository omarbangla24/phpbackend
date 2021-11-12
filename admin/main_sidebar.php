 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="asset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['uname'],",", $_SESSION['urole'];?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <?php include("menus/inventory_menu.php");?>
        <?php include("menus/dev_menu.php");?>
        <?php include("menus/system_menu.php");?>
        <?php //include("menus/dashboard_menu.php");?>
        <?php //include("menus/widget_menu.php");?>
        <?php //include("menus/layout_menu.php");?>
        <?php //include("menus/charts_menu.php");?>
        <?php //include("menus/ui_menu.php");?>
        <?php //include("menus/forms_menu.php");?>
        <?php //include("menus/tables_menu.php");?>
        <?php //include("menus/calender_menu.php");?>
        <?php //include("menus/gallery_menu.php");?>
        <?php //include("menus/mailbox_menu.php");?>
        <?php //include("menus/pages_menu.php");?>
        <?php //include("menus/extra_menu.php");?>
        <?php //include("menus/search_menu.php");?>
        <?php //include("menus/tabbed_menu.php");?>
        <?php //include("menus/documentation_menu.php");?>
        <?php //include("menus/level_one_menu.php");?>
        <?php //include("menus/labels_menu.php");?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>