            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-archive"></i> Barang</a></li>
                  <li><a href=""><i class="fa fa-building"></i> Gudang</a></li>
                  <li class="{{ active('users.*') }}"><a href="{{ route('users.index') }}"><i class="fa fa-male"></i> Users</a></li>
                  <li><a><i class="fa fa-book"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="">Laporan In</a></li>
                      <li><a href="">Laporan Out</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

{{--               <div class="menu_section">
                <h3>General Settings</h3>
                <ul class="nav side-menu">
                  <li><a href=""><i class="fa fa-cogs"></i> General POS Settings </a></li>
                </ul>
              </div> --}}

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                {{-- <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> --}}
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                {{-- <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span> --}}
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                {{-- <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> --}}
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                {{-- <span class="glyphicon glyphicon-off" aria-hidden="true"></span> --}}
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <!-- <span style="font-size:2em;">VapeThrough</span> -->
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">{{$nama}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->