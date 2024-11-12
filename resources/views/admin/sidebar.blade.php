  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Green Gardern</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{ Auth::user()->name }}</a>
          <form action="{{ route('logout') }}" method="POST" style="display: inline;">
          
          @csrf
          <button type="submit" class="btn btn-link text-white p-0" style="font-size: 14px; text-decoration: none;">
            <i class="fas fa-sign-out-alt"></i> Logout
          </button>
        </form>
        
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
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-list"></i>


              <p>
                Animal Type
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/category/addcategory" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Animal Type</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="/admin/category/listcategory" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Animal Type</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="fas fa-leaf"></i>

                        <p> Animals
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                             <li class="nav-item">
                              <a href="/admin/animal/addanimal" class="nav-link">
                               <i class="far fa-circle nav-icon"></i>
                               <p>Add Animal</p>
                           </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/animal/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Animal</p>
                            </a>
                        </li>

                    </ul>
                </li>



                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="fas fa-blog"></i>

                        <p> Blog
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                             <li class="nav-item">
                              <a href="/admin/Post/addpost" class="nav-link">
                               <i class="far fa-circle nav-icon"></i>
                               <p>Add blog</p>
                           </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/Post/listpost" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List blog</p>
                            </a>
                        </li>

                    </ul>
                </li>     
          
        </ul>



        
      </nav>

      <!-- Navbar -->

      

    @csrf
</form>




      
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>