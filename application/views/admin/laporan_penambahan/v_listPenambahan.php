						<div class="page-title">
              <div class="title_left">
                <h3>Transaksi Penambahan</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Tabs <small>Transaksi Penambahan</small></h2>
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
                        <li role="presentation" class="active"><a href="#tab_content1" id="day-tab" role="tab" data-toggle="tab" aria-expanded="true">Penambahan Hari Ini</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="Custom-tab" data-toggle="tab" aria-expanded="false">Custom </a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="day-tab">
                         	<table  class="table table-responsive jambo_table bulk_action display">
							              <thead>
							                <tr class="headings">
							                  <th class="column-title">No </th>
							                  <th class="column-title">Tanggal </th>
							                  <th class="column-title">Waktu </th>
							                  <th class="column-title">Nama Powder </th>
							                  <th class="column-title">Nama ekstra </th>
							                  <th class="column-title">Nama topping </th>
							                  <th class="column-title">Penambahan </th>
							                  <th class="column-title">Cabang </th>
							                </tr>
							              </thead>

							              <tbody>
							              	<?php
							              		$no = 1;
							              		foreach ($data as $key => $value) {
							              			?>

							              				<tr>
							              					<td style="width: 5%;" align="center"><?=$no++?></td>
							              					<td><?=$value->tanggal?></td>
							              					<td><?=$value->waktu?></td>
							              					<td><?=($value->nama_varian != null ? $value->nama_varian : '---')?></td>
							              					<td><?=($value->nama_ekstra != null ? $value->nama_ekstra : '---')?></td>
							              					<td><?=($value->nama_topping != null ? $value->nama_topping : '---')?></td>
							              					<td><?=($value->id_ekstra != null ? $value->penambahan_stok.' '.$value->satuan : $value->penambahan_stok.'  Cup' )?></td>
							              					<td><?=$value->nama_region?></td>
							              				</tr>

							              			<?php
							              		}
							              	?>
							              </tbody>
							            </table>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="Custom-tab">
                          <form data-parsley-validate class="form-horizontal form-label-left input-mask" style="padding-bottom: 20px;">
                          	<div class="row">
							            		<label class="control-label col-md-1 col-sm-1 col-xs-12" for="last-name">Cari Tanggal <span class="required">*</span></label>
							            		<div class='col-lg-2 col-md-2 col-sm-2 col-xs-12 input-group date' id='myDatepicker2'>
		                            <input type="text" class="form-control" name="tanggal" id="tanggal" />
		                            <span class="input-group-addon">
		                               <span class="glyphicon glyphicon-calendar"></span>
		                            </span>
			                        </div>
							            	</div>
							            	<div class="row" style="padding-left: 10px;">
							            		<button type="button" class="btn btn-primary btn-sm">Tampilkan</button>
							            	</div>
                          </form>

                          <table  class="table table-striped jambo_table bulk_action display">
							              <thead>
							                <tr class="headings">
							                  <th class="column-title">No </th>
							                  <th class="column-title">Tanggal </th>
							                  <th class="column-title">Waktu </th>
							                  <th class="column-title">Nama Powder </th>
							                  <th class="column-title">Nama ekstra </th>
							                  <th class="column-title">Nama topping </th>
							                  <th class="column-title">Penambahan </th>
							                  <th class="column-title">Cabang </th>
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
            </div>

            <script>
            	$(document).ready(function() {

								$('input').change(function() {

									var tanggal = $(this).val();
									$.ajax({
										url: "<?= base_url('index.php/c_admin/get_transaksi_penambahan') ?>",
										type: "post",
										data: {
											tanggal : tanggal
										},
										async: false,
										dataType: "json",
										success: function(data) {
											var html = '';
											var i;
											for (i = 0; i < data.length; i++) {
												html += '<tr>' +
																	'<td>' + (i + 1) + '</td>' +
																	'<td>' + data[i].tanggal + '</td>' +
																	'<td>' + data[i].waktu + '</td>' +
																	'<td>' + data[i].nama_varian + '</td>' +
																	'<td>' + data[i].nama_ekstra + '</td>' +
																	'<td>' + data[i].nama_topping + '</td>' +
																	'<td>' + data[i].penambahan_stok + '</td>' +
																	'<td>' + data[i].nama_region+ '</td>' +
																'</tr>';
											}
											$('#show_data').html(html);
										}
									});

								});
								return false;
							});

							$('button').click(function(){
								var tanggal = $("#tanggal").val();

								if (tanggal == '') {
									Swal.fire({
										type: 'warning',
										title: 'Halllooo ...',
										text: 'Tanggal Belum Diisi'
									})
								}
								else{
									$.ajax({
										url: "<?= base_url('index.php/c_admin/get_transaksi_penambahan') ?>",
										type: "post",
										data: {
											tanggal : tanggal
										},
										async: false,
										dataType: "json",
										success: function(data) {
											var html = '';
											var i;
											var varian;
											var ekstra;
											var topping;
											var satuan;

											for (i = 0; i < data.length; i++) {
												if (data[i].nama_varian != null) {
													varian = data[i].nama_varian;
												}
												else{
													varian = '---';
												}

												if (data[i].nama_ekstra != null) {
													ekstra = data[i].nama_ekstra;
												}
												else{
													ekstra = '---';
												}

												if (data[i].nama_topping != null) {
													topping = data[i].nama_topping;
												}
												else{
													topping = '---';
												}

												if (data[i].id_ekstra != null) {
													satuan = data[i].satuan;
												}
												else{
													satuan = 'cup';
												}

												html += '<tr>' +
																	'<td>' + (i + 1) + '</td>' +
																	'<td>' + data[i].tanggal + '</td>' +
																	'<td>' + data[i].waktu + '</td>' +
																	'<td>' + varian +'</td>' +
																	'<td>' + ekstra + '</td>' +
																	'<td>' + topping + '</td>' +
																	'<td>' + data[i].penambahan_stok +' '+ satuan + '</td>' +
																	'<td>' + data[i].nama_region+ '</td>' +
																'</tr>';
											}
											$('#show_data').html(html);
										}
									});
								}								
							})
            </script>

            