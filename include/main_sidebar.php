<style>
  .bga{
    background-color:#151927;
  }
  .text{
    color:white;
  }
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4 bga" >
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="img/logo2.jpg" alt="logo2" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light" style="color:white">BikeBD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/habib.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="home" class="d-block"><?php echo $_SESSION["s_username"];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
               <li class="nav-item">
                <a href="home" class="nav-link">
                <i class="material-icons" style="font-size:17px">dashboard</i>
                  <p>Dashboard</p>
                </a>
              </li>

            <!--stock-->
           

              <li class="nav-item has-treeview">
            <a href="stock-product" class="nav-link">
            <i class="material-icons" style="font-size:17px">dashboard</i>
              <p>
              Stock
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="stock-product" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock products</p>
                </a>
              </li>
             
            </ul>
          </li>
            <!--stock End-->

          <!--Inventory-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              &nbsp;<i class='far fa-file-alt'> </i>
              <p>
                Inventory 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="product-entry" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Entery </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage-product" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage-category" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Category</p>
                </a>
              </li>
            </ul>
          </li>
          <!--Enventory end-->

          <!--Supplier-->
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class='fas fa-truck'></i>
              <p>
                Supplier
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="manage-supplier" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Supplier</p>
                </a>
              </li>
             
            </ul>
          </li>
        <!--Supplier End-->


          <!--Purchase--->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class='far fa-window-restore'></i>
              <p>
                Purchase
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="create-invoice" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage-invoice" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All purchase</p>
                </a>
              </li>
            </ul>
          </li>
          <!--End--->

          <!--SELLS -->
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="material-icons">local_grocery_store</i>
              <p>
                Sells
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="sells" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>bills/invoice</p>
                </a>
              </li>
             
            </ul>
          </li>
        <!--Supplier End-->

        <!--reports-->
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            &nbsp;<i class='far fa-file-alt'> </i>
              <p>
                Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="daily-reports" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Report </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="monthly-reports" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Report </p>
                </a>
              </li>
             
            </ul>
          </li>
        <!--reports End-->


        <!--user-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class='far fa-user'> </i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="create-user" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage-user" class="nav-link">
                <!-- <i class="fa fa-sign-out" style="color:white"></i> -->
                <i class="far fa-circle nav-icon"></i>
                  <p>Manage User</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
                <a href="index.php" class="nav-link">
                <!-- <i class="fa fa-sign-out" style="color:white"></i> -->
                <i class='fas fa-sign-out-alt'></i>
                  <p>Sign out</p>
                </a>
              </li>
          



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>