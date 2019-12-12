<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard | Barista</title>
    <!-- base:css -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?=base_url()?>assets/template/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/template/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?=base_url()?>assets/template/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?=base_url()?>assets/template/images/favicon.png" />

    <!-- data tables -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/template/Datatables/DataTables-1.10.18/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/template/Datatables/Buttons-1.5.6/css/buttons.dataTables.min.css">

    <script src="<?=base_url()?>assets/alert/sweetalert2.all.min.js"></script>

    <script src="<?=base_url()?>assets/template/jquery/dist/jquery.min.js"></script>




  </head>
  <body>
    <div class="container-scroller">
		<!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="<?=base_url()?>assets/template/index.html"><img src="<?=base_url()?>assets/template/images/logo.svg" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="<?=base_url()?>assets/template/index.html"><img src="<?=base_url()?>assets/template/images/logo-mini.svg" alt="logo"/></a>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item">
                  <a href="<?=base_url('index.php/auth/logout')?>" class="log-out">
                    <button type="button" class="btn btn-inverse-primary btn-sm">Log Out </button>
                  </a>                  
                </li>
                <li class="nav-item">
                  <button type="button" class="btn btn-inverse-primary btn-sm">Acount</button>
                </li>
                <li class="nav-item dropdown d-lg-flex d-none">
                    <span class="nav-profile-name" style="color : black;"><?=$this->fungsi->user_login()->Nama?></span>
                    <span class="online-status"></span>
                    <img src="<?=base_url()?>assets/template/images/faces/face28.png" alt="profile"/>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('index.php/c_barista/index')?>">
                  <i class="mdi mdi-home menu-icon"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                  <a href="<?=base_url('index.php/c_barista/pesanan')?>" class="nav-link">
                    <i class="mdi mdi-file-document-box menu-icon"></i>
                    <span class="menu-title">Pesanan</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="<?=base_url('index.php/c_barista/cek_order')?>" class="nav-link">
                    <i class="mdi mdi-glass-tulip menu-icon"></i>
                    <span class="menu-title">Cek Pesanan</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="<?=base_url('index.php/c_barista/bubble')?>" class="nav-link">
                    <i class="mdi mdi-food menu-icon"></i>
                    <span class="menu-title">Bubble</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="<?=base_url('index.php/c_barista/stok')?>" class="nav-link">
                    <i class="mdi mdi-equal-box menu-icon"></i>
                    <span class="menu-title">Stok</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="<?=base_url('index.php/c_barista/history')?>" class="nav-link">
                    <i class="mdi mdi-history menu-icon"></i>
                    <span class="menu-title">History</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
            </ul>
        </div>
      </nav>
    </div>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">

				<div class="content-wrapper">
                    <?=$contents?>
				</div>


				<!-- content-wrapper ends -->
				<!-- partial:partials/_footer.html -->
				<footer class="footer">
          <div class="footer-wrap">
              <div class="w-100 clearfix">
                <span class="d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018 <a href="<?=base_url()?>assets/template/https://www.templatewatch.com/" target="_blank">templatewatch</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart-outline"></i></span>
              </div>
          </div>
        </footer>
				<!-- partial -->
      </div>		
		<!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- jquery -->
    
    <!-- datatables -->
    <script src="<?=base_url()?>assets/template/Datatables/jQuery-3.3.1/jquery-3.3.1.js"></script>
    <script src="<?=base_url()?>assets/template/Datatables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/template/Datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="<?=base_url()?>assets/template/Datatables/Buttons-1.5.6/js/buttons.flash.min.js"></script>
    <script src="<?=base_url()?>assets/template/Datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="<?=base_url()?>assets/template/Datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="<?=base_url()?>assets/template/Datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="<?=base_url()?>assets/template/Datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
    <script src="<?=base_url()?>assets/template/Datatables/Buttons-1.5.6/js/buttons.print.min.js"></script>

    <script type="text/javascript">
      $(document).ready( function () {
        var nama = '<?=$this->fungsi->user_login()->Nama?>';
        

        var namedays = ['Minggu', 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
        var thisDay = new Date().getDay();
        var day = namedays[thisDay];

        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        var tanggal = new Date().getDate()+'-'+months[(new Date().getMonth())]+'-'+new Date().getFullYear();

          $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
              {
                extend: 'pdf'
              },
              {
                extend: 'print',
                title: '',
                messageTop: '<h3 align="center">Transaksi Hari Ini</h3><br>'+
                            '<table>'+
                              '<tr>'+
                                '<td>Nama Kasir</td>'+
                                '<td>:</td>'+
                                '<td>'+nama+'</td>'+
                              '</tr>'+
                              '<tr>'+
                                '<td>Tanggal</td>'+
                                '<td>:</td>'+
                                '<td>'+day+', '+tanggal+'</td>'+
                              '</tr>'+
                            '</table>'
              }
            ]
          });

          $('#myTable2').DataTable();
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

    <!-- base:js -->
    <!-- <script src="<?=base_url()?>assets/template/vendors/base/vendor.bundle.base.js"></script> -->
    <!-- endinject -->
    <!-- inject:js -->
    <script src="<?=base_url()?>assets/template/js/template.js"></script>
    <!-- endinject -->
    <script src="<?=base_url()?>assets/template/vendors/chart.js/Chart.min.js"></script>
    <script src="<?=base_url()?>assets/template/vendors/progressbar.js/progressbar.min.js"></script>
		<script src="<?=base_url()?>assets/template/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
		<script src="<?=base_url()?>assets/template/vendors/justgage/raphael-2.1.4.min.js"></script>
		<script src="<?=base_url()?>assets/template/vendors/justgage/justgage.js"></script>
    <!-- Custom js for this page-->
    <script src="<?=base_url()?>assets/template/js/dashboard.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>