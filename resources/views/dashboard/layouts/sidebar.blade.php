<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{auth()->guard('admin')->user()->image}}" class="img-circle" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->guard('admin')->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
              <a href="{{route('dashboard.admin.index')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                المشرفين
              </p>
              <i class="right fas fa-angle-left"></i>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                المنشورات
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('dashboard.success_stories.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>قصص النجاح</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.blogs.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> المدونات</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a> --}}
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
              <a href="{{route('dashboard.support_chats.index')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                رسائل الدعم
              </p>
              <i class="right fas fa-angle-left"></i>
            </a>
          </li>

          {{-- بيانات الموقع --}}

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                بيانات الموقع
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('dashboard.success_stories.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>لون البشره</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dashboard.blogs.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> المدونات</p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>