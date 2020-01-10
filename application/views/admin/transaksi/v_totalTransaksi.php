						<div class="row top_tiles" style="margin: 1px;">
						  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						    <div class="tile-stats">
						      <div class="icon"><i class="fa fa-shopping-cart"></i></div>
						      <div class="count"><?= $jumlah ?></div>
						      <br>
						      <h3>Total Penjualan</h3>
						    </div>
						  </div>
						  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						    <div class="tile-stats">
						      <div class="icon"><i class="fa fa-money"></i></div>
						      <div class="count"><?= 'Rp ' . number_format($omset, '0', ',', '.') ?></div>
						      <br>
						      <h3>Omset Penjualan</h3>
						    </div>
						  </div>
						  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						    <div class="tile-stats">
						      <div class="icon"><i class="fa fa-circle-o-notch"></i></div>
						      <div class="count"><?= $proses ?></div>
						      <br>
						      <h3>Dalam Proses</h3>
						    </div>
						  </div>
						  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
						    <div class="tile-stats">
						      <div class="icon"><i class="fa fa-check-square-o"></i></div>
						      <div class="count"><?= $success ?></div>
						      <br>
						      <h3>Pesanan Selesai</h3>
						    </div>
						  </div>
						</div>

						<div class="col-md-12 col-sm-12 col-xs-12">
						  <div class="x_panel">
						    <div class="x_title">
						      <h2><i class="fa fa-bars"></i> Total Transaksi</h2>
						      <ul class="nav navbar-right panel_toolbox">
						        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						        </li>
						        <li class="dropdown">
						          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
						          <ul class="dropdown-menu" role="menu">
						            <li><a href="#">Settings 1</a>
						            </li>
						            <li><a href="#">Settings 2</a>
						            </li>
						          </ul>
						        </li>
						        <li><a class="close-link"><i class="fa fa-close"></i></a>
						        </li>
						      </ul>
						      <div class="clearfix"></div>
						    </div>
						    <div class="x_content">


						      <div class="" role="tabpanel" data-example-id="togglable-tabs">
						        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
						          <?php
                      foreach ($region as $key => $value) {
                      ?>
						            <li role="presentation" <?php if ($key == 0) { ?> class="active" <?php } ?>>
						              <a href="#tab_content<?= $value->id_region ?>" id="<?= $value->nama_region ?>-tab" role="tab" data-toggle="tab" aria-expanded="true"><?= $value->nama_region ?></a>
						            </li>
						          <?php
                      }
                      ?>
						          <li role="presentation"><a href="#tab_content_search" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Search </a>
						          </li>
						        </ul>
						        <div id="myTabContent" class="tab-content">
						          <?php
                      $query = new mysqli('localhost', 'root', '', 'db_pos');
                      foreach ($region as $key => $value) {
                        # code...
                      ?>

						            <div role="tabpanel" <?php if ($key == 0) { ?> class="tab-pane fade active in" <?php } else { ?> class="tab-pane fade" <?php } ?> id="tab_content<?= $value->id_region ?>" aria-labelledby="<?= $value->nama_region ?>-tab">
						              <table class="table table-striped jambo_table bulk_action display">
						                <thead>
						                  <tr class="headings">
						                    <th class="column-title">No </th>
						                    <th class="column-title">Karyawan </th>
						                    <th class="column-title">Nama Pembeli </th>
						                    <th class="column-title">Tanggal</th>
						                    <th class="column-title">Waktu</th>
						                    <th class="column-title">Nama Menu</th>
						                    <th class="column-title">Sajian</th>
						                    <th class="column-title">Nama Topping</th>
						                    <th class="column-title">Harga</th>
						                    <th class="column-title">Status</th>
						                  </tr>
						                </thead>

						                <tbody>
						                  <?php
                              $currentDate = date('Y/m/d');
                              $hasil = $query->query("SELECT dt.no_nota, s.Nama, j.tanggal, j.waktu, j.nama_pembeli, p.nama_powder, sj.nama_penyajian, t.nama_topping, dt.jumlah, j.status 
																					   FROM detail_transaksi dt
																					   JOIN jual j ON dt.no_nota = j.no_nota
																					   JOIN staff s ON s.id_staff = j.id_staff
																					   JOIN powder p ON p.id_powder = dt.id_powder
																					   LEFT JOIN penyajian sj ON sj.id_penyajian = dt.id_penyajian
																					   LEFT JOIN topping t ON t.id_topping = dt.id_topping
																					   WHERE (j.tanggal = '$currentDate') AND dt.id_region = " . $value->id_region);
                              for ($i = 1; $i <= $out = mysqli_fetch_array($hasil); $i++) {
                              ?>
						                    <tr class="gradeX">
						                      <td><?php echo $i ?></td>
						                      <td><?php echo $out['Nama']; ?></td>
						                      <td><?php echo $out['nama_pembeli']; ?></td>
						                      <td><?php echo $out['tanggal']; ?></td>
						                      <td><?php echo $out['waktu']; ?></td>
						                      <td><?php echo $out['nama_powder']; ?></td>
						                      <td>
						                        <?php
                                    if ($out['nama_penyajian'] == NULL) {
                                      echo "--";
                                    } else {
                                      echo $out['nama_penyajian'];
                                    }
                                    ?>
						                      </td>
						                      <td>
						                        <?php
                                    if ($out['nama_topping'] == NULL) {
                                      echo "--";
                                    } else {
                                      echo $out['nama_topping'];
                                    }
                                    ?>
						                      </td>
						                      <td><?= 'Rp ' . number_format($out['jumlah'], '0', ',', '.'); ?>
						                      <td>
						                        <?php
                                    if ($out['status'] == "Success") {
                                      echo '<span class="label label-success">Success</span>';
                                    } else {
                                      echo '<span class="label label-warning">Process</span>';
                                    }
                                    ?>
						                      </td>
						                    </tr>
						                  <?php }
                              ?>
						                </tbody>
						              </table>
						            </div>

						          <?php
                      }
                      ?>

						          <div role="tabpanel" class="tab-pane fade" id="tab_content_search" aria-labelledby="Custom-tab">

						          	<div class="col-lg-12 col-md-12 col-12" style="padding-bottom: 20px;">
						          		<div class="col-lg-4 col-md-4">
						          			<div class="row">
							                <label class="col-md-4 col-sm-4 col-xs-12" for="last-name" style="margin-top: 8px;">Tanggal Mulai <span class="required">*</span></label>
							                <div class='col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group date' id='myDatepicker2'>
							                  <input type="text" class="form-control" name="tanggal" id="tanggal" />
							                  <span class="input-group-addon">
							                    <span class="glyphicon glyphicon-calendar"></span>
							                  </span>
							                </div>
							              </div>

							              <div class="row">
							                <label class="col-md-4 col-sm-4 col-xs-12" for="last-name" style="margin-top: 8px;">Region <span class="required">*</span></label>
							                <div class='col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group'>
							                  <select class="form-control" name="region" id="region">
							                    <option value="">-- Pilih Region --</option>
							                    <?php
	                                foreach ($region as $key => $value) {
	                                ?>
							                      <option value="<?= $value->id_region ?>"><?= $value->nama_region ?></option>
							                    <?php
	                                }
	                                ?>
							                  </select>
							                </div>
							              </div>

							              <input type="hidden" name="id_shift" id="id_shift" value="total">
							              <div class="row" style="padding-left: 10px;">
							                <button type="button" class="btn btn-primary btn-sm">Tampilkan</button>
							              </div>

						          		</div>

						          		<div class="col-lg-4 col-md-4">
						          			<div class="row">
							                <label class="col-md-4 col-sm-4 col-xs-12" for="last-name" style="margin-top: 8px;">Tanggal Selesai <span class="required"></span></label>
							                <div class='col-lg-8 col-md-8 col-sm-8 col-xs-12 input-group date' id='myDatepicker3'>
							                  <input type="text" class="form-control" name="tanggal_selesai" id="tanggal_selesai" />
							                  <span class="input-group-addon">
							                    <span class="glyphicon glyphicon-calendar"></span>
							                  </span>
							                </div>
							              </div>
						          		</div>
						          	</div>

						            <!-- <form data-parsley-validate class="form-horizontal form-label-left input-mask" style="padding-bottom: 20px;">
						              <div class="row">
						                <label class="col-md-2 col-sm-2 col-xs-12" for="last-name">Tanggal Mulai <span class="required">*</span></label>
						                <div class='col-lg-4 col-md-4 col-sm-4 col-xs-12 input-group date' id='myDatepicker2'>
						                  <input type="text" class="form-control" name="tanggal" id="tanggal" />
						                  <span class="input-group-addon">
						                    <span class="glyphicon glyphicon-calendar"></span>
						                  </span>
						                </div>
						              </div>

						              <div class="row">
						                <label class="col-md-2 col-sm-2 col-xs-12" for="last-name">Tanggal Selesai <span class="required"></span></label>
						                <div class='col-lg-4 col-md-4 col-sm-4 col-xs-12 input-group date' id='myDatepicker3'>
						                  <input type="text" class="form-control" name="tanggal_selesai" id="tanggal" />
						                  <span class="input-group-addon">
						                    <span class="glyphicon glyphicon-calendar"></span>
						                  </span>
						                </div>
						              </div>

						              <div class="row">
						                <label class="col-md-2 col-sm-2 col-xs-12" for="last-name">Region <span class="required">*</span></label>
						                <div class='col-lg-4 col-md-4 col-sm-4 col-xs-12 input-group'>
						                  <select class="form-control" name="region" id="region">
						                    <option value="">-- Pilih Region --</option>
						                    <?php
                                foreach ($region as $key => $value) {
                                ?>
						                      <option value="<?= $value->id_region ?>"><?= $value->nama_region ?></option>
						                    <?php
                                }
                                ?>
						                  </select>
						                </div>
						              </div>
						              <input type="hidden" name="id_shift" id="id_shift" value="total">
						              <div class="row" style="padding-left: 10px;">
						                <button type="button" class="btn btn-primary btn-sm">Tampilkan</button>
						              </div>
						            </form> -->

						            <table class="table table-striped jambo_table bulk_action display">
						              <thead>
						                <tr class="headings">
						                  <th class="column-title">No </th>
						                  <th class="column-title">Karyawan </th>
						                  <th class="column-title">Nama Pembeli </th>
						                  <th class="column-title">Tanggal</th>
						                  <th class="column-title">Waktu</th>
						                  <th class="column-title">Nama Menu</th>
						                  <th class="column-title">Sajian</th>
						                  <th class="column-title">Nama Topping</th>
						                  <th class="column-title">Harga</th>
						                  <th class="column-title">Status</th>
						                </tr>
						              </thead>

						              <tbody id="show_data">

						              </tbody>
						            </table>
						          </div>

						        </div>
						      </div>

						    </div>
						  </div>
						</div>

						<script>
						  $('button').click(function() {
						    var tanggal = $("#tanggal").val();
						    var id = $("#id_shift").val();
						    var region = $("#region").val();
						    var tgl_selesai = $("#tanggal_selesai").val();

						    if (tanggal == '') {
						      Swal.fire({
						        type: 'warning',
						        title: 'Halllooo ...',
						        text: 'Tanggal Belum Diisi'
						      })
						    }

						    if (region == '') {
						      Swal.fire({
						        type: 'warning',
						        title: 'Halllooo ...',
						        text: 'Region Belum Dipilih'
						      })
						    } else {
						      $.ajax({
						        url: "<?= base_url('index.php/c_admin/get_search_transaksi') ?>",
						        type: "post",
						        data: {
						          tanggal: tanggal,
						          region: region,
						          id: id,
						          tgl_selesai : tgl_selesai
						        },
						        async: false,
						        dataType: "json",
						        success: function(data) {
						          var html = '';
						          var i;
						          var topping;
						          var status;

						          for (i = 0; i < data.length; i++) {


						            if (data[i].nama_topping != null) {
						              topping = data[i].nama_topping;
						            } else {
						              topping = '--';
						            }

						            if (data[i].status == "Success") {
						              status = '<span class="label label-success">Success</span>';
						            } else {
						              status = '<span class="label label-warning">Process</span>';
						            }

						            html += '<tr>' +
						              '<td>' + (i + 1) + '</td>' +
						              '<td>' + data[i].username + '</td>' +
						              '<td>' + data[i].nama_pembeli + '</td>' +
						              '<td>' + data[i].tanggal + '</td>' +
						              '<td>' + data[i].waktu + '</td>' +
						              '<td>' + data[i].nama_powder + '</td>' +
						              '<td>' + data[i].nama_penyajian + '</td>' +
						              '<td>' + topping + '</td>' +
						              '<td>' + data[i].jumlah + '</td>' +
						              '<td>' + status + '</td>' +
						              '</tr>';
						          }
						          $('#show_data').html(html);
						        }
						      });
						    }
						  })
						</script>