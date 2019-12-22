						<div class="row top_tiles">
							<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="tile-stats">
									<div class="icon"><i class="fa fa-beer"></i></div>
									<div class="count"><?= $varian->nama_varian ?></div>
									<br>
									<h3>Powder</h3>
								</div>
							</div>
							<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="tile-stats">
									<div class="icon"><i class="fa fa-thumb-tack"></i></div>
									<div class="count"><small><?= $varian->nama_region ?></small></div>
									<br>
									<h3>Cabang</h3>
								</div>
							</div>
							<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="tile-stats">
									<div class="icon"><i class="fa fa-cubes"></i></div>
									<div class="count">
										<?= $varian->sisa ?>
										<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalForm"><i class="fa fa-plus"></i> Tambah Stok</button>
									</div>
									<br>
									<h3>Sisa Stok</h3>
								</div>
							</div>
						</div>

						<div class="modal fade" id="modalForm" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<!-- Modal Header -->
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">
											<span aria-hidden="true">&times;</span>
											<span class="sr-only">Tutup</span>
										</button>
										<h4 class="modal-title" id="labelModalKu">Contact Form</h4>
									</div>
									<!-- Modal Body -->
									<div class="modal-body">
										<p class="statusMsg"></p>
										<form role="form">
											<div class="form-group">
												<label for="masukkanNama">Nama Powder</label>
												<input type="text" class="form-control" id="nama" placeholder="ex : Nama Powder" value="<?= $varian->nama_varian ?>" readonly />
											</div>
											<div class="form-group">
												<label for="masukkanEmail">Stok</label>
												<input type="number" class="form-control" id="sisa" name="sisa" placeholder="ex : 50" value="<?= $varian->sisa ?>" readonly />
											</div>
											<div class="form-group">
												<label for="masukkanPesan">Penambahan Stok</label>
												<input type="number" class="form-control" id="penambahan" name="penambahan" placeholder="ex : 20" autofocus="">
											</div>
										</form>
									</div>
									<!-- Modal Footer -->
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary submitBtn" id="konfirmasi">Submit</button>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2>Data <small>Powder</small></h2>
										<ul class="nav navbar-right panel_toolbox">
											<li><a class="collapse-link" title="Hide"><i class="fa fa-chevron-up"></i></a>
											</li>
											<li><a class="close-link" title="Close"><i class="fa fa-close"></i></a>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>

									<div class="x_content">
										<a href="<?= base_url('index.php/c_admin/insert_powder') ?>" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Add</a>

										<div class="pull-right">
											<a href="<?= base_url('index.php/c_admin/inventory') ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit</a>
											<a href="<?= base_url('index.php/c_admin/inventory') ?>" class="btn btn-danger btn-sm"><i class="fa fa-mail-reply"></i> Back</a>
										</div>

										<div class="table-responsive">
											<table class="table table-striped jambo_table bulk_action" id="myTable">
												<thead>
													<tr class="headings">
														<th class="column-title">No</th>
														<th class="column-title">Nama Menu</th>
														<th class="column-title">Nama Penyajian </th>
														<th class="column-title">Harga </th>
														<th class="column-title" style="width: 10%;">Actions</th>
													</tr>
												</thead>

												<tbody>
													<?php
													$no = 1;
													foreach ($powder as $key => $value) {
													?>
														<tr>
															<td><?= $no++ ?></td>
															<td><?= $value->nama_powder ?></td>
															<td><?= $value->nama_penyajian ?></td>
															<td><?= $value->harga ?></td>
															<td align="center">
																<a href="#" class="tombol-hapus btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
															</td>
														</tr>
													<?php
													}
													?>
												</tbody>
											</table>
										</div>

									</div>
								</div>
							</div>
						</div>

						<script type="text/javascript">
							$(function() {
								$('#konfirmasi').click(function() {
									var id = '<?= $varian->id_varian ?>';
									var sisa = $('#sisa').val();
									var penambahan = $('#penambahan').val();
									var region = '<?= $varian->id_region ?>';

									$.ajax({
										type: 'post',
										url: '<?= base_url('index.php/c_admin/action_update_varian') ?>',
										data: {
											id: id,
											sisa: sisa,
											penambahan: penambahan,
											region: region
										},
										dataType: 'json',
										success: function(result) {

											if (result.status == 'success') {

												Swal.fire({
													type: 'success',
													title: 'Penambahan Stok',
													text: 'Success'
												}).then((result) => {
													location.replace("<?= base_url('index.php/c_admin/inventory') ?>");
												})
											} else {
												Swal.fire(
													'Konfirmasi Masak Bubble',
													'Gagal !!',
													'error'
												)
											}
										}
									});
								});
							});
						</script>