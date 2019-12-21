<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?=base_url()?>assets_admin/production/images/favicon.png" type="image/ico" />

    <title>Administrator | Fla - Fla Milkshakes</title>

    <link rel="stylesheet" href="<?=base_url()?>assets_admin/bootstrap-multiselect/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets_admin/select2/select2.css" />
    <!-- Bootstrap -->
    <link href="<?=base_url()?>assets_admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url()?>assets_admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url()?>assets_admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?=base_url()?>assets_admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?=base_url()?>assets_admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?=base_url()?>assets_admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?=base_url()?>assets_admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url()?>assets_admin/build/css/custom.min.css" rel="stylesheet">

    <!-- data tables -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets_admin/Datatables/DataTables-1.10.18/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets_admin/Datatables/Buttons-1.5.6/css/buttons.dataTables.min.css">

    <link href="<?=base_url()?>assets_admin/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    

    <!-- jQuery -->
    <script src="<?=base_url()?>assets_admin/vendors/jquery/dist/jquery.min.js"></script>



  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col" style="position: fixed;">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title">
                <img src="<?=base_url()?>assets_admin/production/images/favicon.png" style="width: 35px; margin-left: 5px;">
                <span style="font-size: 20px;">Fla - Fla Milkshake</span>
              </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=base_url()?>assets_admin/production/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=$this->fungsi->user_login()->Nama?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu Admin</h3>
                <ul class="nav side-menu">
                  <li><a href="<?=base_url('index.php/c_admin')?>"><i class="fa fa-home"></i> Home</a></li>
                  <li><a><i class="fa fa-edit"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url('index.php/c_admin/shift1')?>">Shift 1</a></li>
                      <li><a href="<?=base_url('index.php/c_admin/shift2')?>">Shift 2</a></li>
                      <li><a href="<?=base_url('index.php/c_admin/total_transaksi')?>">Total Transaksi</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-list"></i> Inventaris <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url('index.php/c_admin/inventory')?>">Daftar Stok</a></li>
                      <li><a href="<?=base_url('index.php/c_admin/upload_file')?>">Import Data Stok</a></li>
                    </ul>
                  </li>
                  <li><a href="<?=base_url('index.php/c_admin/discount')?>"><i class="fa fa-money"></i> Diskon</a></li>
                  <li><a href="<?=base_url('index.php/c_admin/region')?>"><i class="fa fa-building-o"></i> Region</a></li>
                  <li><a href="<?=base_url('index.php/c_admin/karyawan')?>"><i class="fa fa-user"></i>Karyawan</a></li>
                  <li><a href="<?=base_url('index.php/c_admin/list_penambahan')?>"><i class="fa fa-bar-chart-o "></i>Transaksi Penambahan</a></li>
                  <li><a href="<?=base_url('index.php/c_admin/get_laporan_pemakaian')?>"><i class="fa fa-book"></i>Laporan Pemakaian</a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen" onclick="toggleFullScreen ();">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?=base_url('index.php/auth/logout')?>" class="log-out">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav" style="position: relative;">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?=base_url()?>assets_admin/production/images/img.jpg" alt=""><?=$this->fungsi->user_login()->Nama?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?=base_url('index.php/c_admin/profil')?>"> Profile</a></li>
                    <!-- <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li> -->
                    <li><a href="<?=base_url('index.php/auth/logout')?>" class="log-out"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <!-- <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="<?=base_url()?>assets_admin/production/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?=base_url()?>assets_admin/production/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?=base_url()?>assets_admin/production/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?=base_url()?>assets_admin/production/images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li> -->
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main"> 
          
          <!-- top tiles -->
          <div class="flash-data" data-flashdata="<?=$this->session->flashdata('flash')?>"></div>
          <?=$contents?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    

    <!-- datatables -->
    <!-- <script src="<?=base_url()?>assets_admin/Datatables/jQuery-3.3.1/jquery-3.3.1.js"></script> -->
    <script src="<?=base_url()?>assets_admin/Datatables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets_admin/Datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="<?=base_url()?>assets_admin/Datatables/Buttons-1.5.6/js/buttons.flash.min.js"></script>
    <script src="<?=base_url()?>assets_admin/Datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="<?=base_url()?>assets_admin/Datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="<?=base_url()?>assets_admin/Datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="<?=base_url()?>assets_admin/Datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
    <script src="<?=base_url()?>assets_admin/Datatables/Buttons-1.5.6/js/buttons.print.min.js"></script>

    <script type="text/javascript">
      $(document).ready( function () {
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
              {
                extend: 'pdf'
              },
              {
                extend: 'print',
              },
              {
                extend: 'excel'
              }
            ]
          });

          $('table.sider').DataTable({
            dom: 'Bfrtip',
            buttons: [
              
            ]
          });
          $('table.display').DataTable({
            dom: 'Bfrtip',
            buttons: [
              {
                extend: 'pdf'
              },
              {
                extend: 'print',
              },
              {
                extend: 'excel'
              }
            ]
          });
      } );
    </script>

    <script>
      
      $('.log-out').on('click', function(e){
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
          title: 'Apakah Anda Yakin?',
          text: "Log Out ",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes !'
        }).then((result) => {
          if (result.value) {
              document.location.href = href;
          }
        })
      });

    </script>

    <script type="text/javascript">
        function toggleFullScreen() {
          if ((document.fullScreenElement && document.fullScreenElement !== null) ||  
           (!document.mozFullScreen && !document.webkitIsFullScreen)) {
            if (document.documentElement.requestFullScreen) {
              document.documentElement.requestFullScreen();
            } else if (document.documentElement.mozRequestFullScreen) {
              document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullScreen) {
              document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            }
          } else {
            if (document.cancelFullScreen) {
              document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
              document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
              document.webkitCancelFullScreen();
            }
          }
        }
    </script>



    <script src="<?=base_url()?>assets_admin/bootstrap-multiselect/bootstrap-multiselect.js"></script>
    <script src="<?=base_url()?>assets_admin/select2/select2.js"></script>
    <!-- Bootstrap -->
    <script src="<?=base_url()?>assets_admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url()?>assets_admin/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?=base_url()?>assets_admin/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?=base_url()?>assets_admin/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?=base_url()?>assets_admin/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?=base_url()?>assets_admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?=base_url()?>assets_admin/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?=base_url()?>assets_admin/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?=base_url()?>assets_admin/vendors/Flot/jquery.flot.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?=base_url()?>assets_admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?=base_url()?>assets_admin/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?=base_url()?>assets_admin/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?=base_url()?>assets_admin/vendors/moment/min/moment.min.js"></script>
    <script src="<?=base_url()?>assets_admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?=base_url()?>assets_admin/build/js/custom.min.js"></script>

    <script src="<?=base_url()?>assets/alert/sweetalert2.all.min.js"></script>
    <script src="<?=base_url()?>assets/alert/myscript.js"></script>

    <script src="<?=base_url()?>assets_admin/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <script>
      $('#myDatepicker2').datetimepicker({
          format: 'YYYY-MM-DD'
      });
    </script>


	
  </body>
</html>
