<!-- Sidebar -->

<div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
          <div id="sidebar-menu" class="sidebar-menu">
            <ul>
              <li class="{{request()->segment(1) == 'admin' && request()->segment(2) == null ? 'active' : ''}}">
                <a href="{{url('/admin')}}">
                  <i class="feather-home"></i>
                  <span class="shape1"></span>
                  <span class="shape2"></span>
                  <span>Dashboard</span>
                </a>
              </li>
             
              <li>
                <a>
                  <span class="text-muted">Schedule</span>
                </a>
              </li> 
              <li class="{{request()->segment(1) == 'admin' && request()->segment(2) == 'absensi' ? 'active' : ''}}">
                <a href="{{url('admin/absensi')}}">
                  <i class="fa fa-calendar-check"></i>
                  <span>Absensi Karyawan</span>
                </a>
              </li>
              <li class="{{request()->segment(1) == 'admin' && request()->segment(2) == 'pengajuan-cuti' ? 'active' : ''}}">
                <a href="{{url('admin/pengajuan-cuti')}}">
                  <i class="fa fa-briefcase"></i>
                  <span>Pengajuan Cuti</span>
                </a>
              </li>
              <li class="{{request()->segment(1) == 'admin' && request()->segment(2) == 'libur-bersama' ? 'active' : ''}}">
                <a href="{{url('admin/libur-bersama')}}">
                  <i class="fa fa-calendar-day"></i>
                  <span>Hari Libur</span>
                </a>
              </li>
              <li>
                <a>
                  <span class="text-muted">Asset</span>
                </a>
              </li> 
              <li class="{{request()->segment(1) == 'admin' && request()->segment(2) == 'asset' ? 'active' : ''}}">             
                  <a href="{{url('admin/asset')}}">
                  <i class="fa fa-laptop"></i>
                  <span>List Asset</span>
                </a>
              </li>
              <li class="{{request()->segment(1) == 'admin' && request()->segment(2) == 'peminjaman-asset' ? 'active' : ''}}">
                <a href="{{url('admin/peminjaman-asset')}}">
                  <i class="fa fa-shopping-basket"></i>
                  <span>Peminjaman Asset</span>
                </a>
              </li>
              <li>
                <a>
                  <span class="text-muted">User Management</span>
                </a>
              </li> 
              <li class="{{request()->segment(1) == 'admin' && request()->segment(2) == 'user' ? 'active' : ''}}">
                <a href="{{url('admin/user')}}">
                  <i class="fa fa-user"></i>
                  <span>User</span>
                </a>
              </li>
              <li class="submenu">
                <a href="#">
                  <i class="fa fa-file-archive"></i>
                  <span> Report</span>
                  <span class="menu-arrow"></span>
                </a>
                <ul style="display: none;">
                  <li>
                    <a href="{{url('admin/report/peminjaman-asset')}}">Report Peminjaman Asset</a>
                  </li>
                  <li>
                    <a href="{{url('admin/report/absensi')}}">Report Absensi</a>
                  </li>
                </ul>
              </li>
              <li class="{{request()->segment(1) == 'admin' && request()->segment(2) == 'log' ? 'active' : ''}}">
                <a href="{{url('admin/log-activity')}}">
                  <i class="fa fa-history"></i>
                  <span>Log Activity</span>
                </a>
              </li>
            </ul>
          </div> 
        </div>
      </div>

        
