<script>
	function printDiv(divName)
	{
		var printContent = document.getElementById(divName).innerHTML;
		var originalContent = document.body.innerHTML;

		document.body.innerHTML = printContent;

		window.print();

		document.body.innerHTML = originalContent;
	}
</script>

<div class="page-title">
	<div class="title_left">
		<h3>Laporan Pemakaian</h3>
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
	<button onclick="printDiv('content')" class="btn btn-primary"><i class="fa fa-print"> &nbsp; &nbsp; Print</i></button>
	<button onclick="window.history.back()" class="btn btn-danger"><i class="fa fa-reply"> &nbsp; &nbsp; Back</i></button>

		<div class="x_panel">
			<div class="x_title">
				<h2><i class="fa fa-bars"></i> Laporan Pemakaian</h2>
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
			<div class="x_content" id="content">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<div class="table-responsive">
							<center><span>Powder</span></center>
							<table class="table table-striped jambo_table bulk_action" id="myTable1">
								<thead>
									<tr class="headings">
										<th class="column-title">Powder </th>
										<th class="column-title">Stok Awal </th>
										<th class="column-title">Penambahan </th>
										<th class="column-title">Basic </th>
										<th class="column-title">Pm </th>
										<th class="column-title">Hot </th>
										<th class="column-title">Yakult </th>
										<th class="column-title">Juice </th>
										<th class="column-title">Sisa </th>
									</tr>
								</thead>

								<tbody>
									<?php
									foreach ($powder as $key => $value) {
									?>
										<tr>
											<td><?= $value->nama_powder ?></td>
											<td style="text-align: center"><?= $value->stok_awal ?></td>
											<td style="text-align: center"><?= $value->penambahan ?></td>
											<td style="text-align: center"><?= ($value->basic_use != NULL ? $value->basic_use : '-') ?></td>
											<td style="text-align: center"><?= ($value->pm_use != NULL ? $value->pm_use : '-') ?></td>
											<td style="text-align: center"><?= ($value->hot_use != NULL ? $value->hot_use : '-') ?></td>
											<td style="text-align: center"><?= ($value->yakult_use != NULL ? $value->yakult_use : '-') ?></td>
											<td style="text-align: center"><?= ($value->juice_use != NULL ? $value->juice_use : '-') ?></td>
											<td style="text-align: center"><?= $value->sisa ?></td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="table-responsive">
							<center><span>Topping</span></center>
							<table class="table table-striped jambo_table bulk_action" id="myTable1">
								<thead>
									<tr class="headings">
										<th class="column-title">Nama </th>
										<th class="column-title">Pemakaian </th>
										<th class="column-title">Harga </th>
										<th class="column-title">Penjualan</th>
									</tr>
								</thead>

								<tbody>
									<?php
									$harga = 0;
									foreach ($topping as $key => $value) {
										if ($value->harga_jual != 0) {
											$harga = $value->harga_jual;
										}
										else{
											$harga = $value->harga;
										}
									?>
										<tr>
											<td><?= $value->nama_topping ?></td>
											<td><?= ($value->pakai != null ? $value->pakai : 0) ?></td>
											<td><?= 'Rp ' . number_format($harga, '0', ',', '.') ?></td>
											<td><?= 'Rp ' . number_format(($value->pakai != null ? $value->pakai * $harga : 0), '0', ',', '.') ?></td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
						<div class="table-responsive">
							<center><span>Masak Bubble</span></center>
							<table class="table table-striped jambo_table bulk_action" id="myTable1">
								<thead>
									<tr class="headings">
										<th class="column-title">Masak Bubble </th>
										<th class="column-title">Stok awal </th>
										<th class="column-title">Pemakaian </th>
										<th class="column-title">Sisa</th>
									</tr>
								</thead>

								<tbody>
									<?php
									foreach ($bubble as $key => $value) {
										$shift;
										if ($value->waktu >= '07:00:00' && $value->waktu <= '16:00:00') {
											$shift = 'Shift 1';
										} else if ($value->waktu > '16:00:00' && $value->waktu <= '22:00:00') {
											$shift = 'Shift 2';
										}
									?>
										<tr>
											<td><?= $shift ?></td>
											<td><?= $value->stock_awal ?></td>
											<td><?= $value->pakai ?></td>
											<td><?= $value->stock_awal - $value->pakai ?></td>
										</tr>

									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>

					<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
						<div class="table-responsive">
							<center><span>Penjualan</span></center>
							<table class="table table-striped jambo_table bulk_action" id="myTable1">
								<thead>
									<tr class="headings">
										<th class="column-title">Masak Sajian </th>
										<th class="column-title">Penjualan </th>
										<th class="column-title">Harga </th>
										<th class="column-title">Total</th>
									</tr>
								</thead>

								<tbody>
									<?php
									foreach ($penjualan as $key => $value) {
									?>
										<tr>
											<td><?= $value->nama_jenis . ' ' . $value->nama_penyajian ?></td>
											<td><?= ($value->pakai != null ? $value->pakai : 0) ?></td>
											<td><?= 'Rp ' . number_format($value->harga_jual, '0', ',', '.') ?></td>
											<td><?= 'Rp ' . number_format(($value->pakai != null ? $value->pakai * $value->harga_jual : 0), '0', ',', '.') ?></td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="table-responsive">
							<center><span>Pemakaian Susu Putih</span></center>
							<table class="table table-striped jambo_table bulk_action" id="myTable1">
								<thead>
									<tr class="headings">
										<th class="column-title">Susu Putih </th>
										<th class="column-title">Basic </th>
										<th class="column-title">PM </th>
									</tr>
								</thead>

								<tbody>
									<?php
									$total_bs = 0;
									$total_pm = 0;
									foreach ($susu_putih as $key => $value) {
									?>

										<tr>
											<td><?= $value->nama_jenis ?></td>
											<td><?= $value->basic + $value->yakult?></td>
											<td><?= $value->pm ?></td>
										</tr>

									<?php
										$total_pm = $total_pm + $value->pm;
										$total_bs = $total_bs + $value->basic + $value->yakult;
									}

									?>
									<tr colspan="3"></tr>
									<tr style="background-color: #00CED1; color: #ffffff;">
										<td>Total</td>
										<td><?= $total_bs ?></td>
										<td><?= $total_pm ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="table-responsive">
							<center><span>Pemakaian Susu Coklat</span></center>
							<table class="table table-striped jambo_table bulk_action" id="myTable1">
								<thead>
									<tr class="headings">
										<th class="column-title">Susu Coklat </th>
										<th class="column-title">Basic </th>
										<th class="column-title">PM </th>
									</tr>
								</thead>

								<tbody>
									<?php
									$total_bs = 0;
									$total_pm = 0;
									foreach ($susu_coklat as $key => $value) {
									?>

										<tr>
											<td><?= $value->nama_jenis ?></td>
											<td><?= $value->basic ?></td>
											<td><?= $value->pm ?></td>
										</tr>

									<?php
										$total_pm = $total_pm + $value->pm;
										$total_bs = $total_bs + $value->basic;
									}

									?>
									<tr colspan="3"></tr>
									<tr style="background-color: #00CED1; color: #ffffff;">
										<td>Total</td>
										<td><?= $total_bs ?></td>
										<td><?= $total_pm ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="table-responsive">
							<center><span>Stok Ekstra</span></center>
							<table class="table table-striped jambo_table bulk_action" id="myTable1">
								<thead>
									<tr class="headings">
										<th class="column-title">Nama Ekstra </th>
										<th class="column-title">Stok Awal </th>
										<th class="column-title">Penambahan </th>
										<th class="column-title">Pemakaian</th>
										<th class="column-title">Sisa</th>
									</tr>
								</thead>

								<tbody>
									<?php

									foreach ($ekstra as $key => $value) {

										$pemakaian = 0;
										if ($value->nama_ekstra == "Susu Putih" || $value->nama_ekstra == "Susu Coklat") {
											$pemakaian = $value->pakai_susu;
										} 
										else if($value->nama_ekstra == "Hazel" || $value->nama_ekstra == "Rum" || $value->nama_ekstra == "Lychee"){
											$pemakaian = $value->sirup;
										}
										else {
											$pemakaian = $value->pakai;
										}
									?>

										<tr>
											<td><?= $value->nama_ekstra ?></td>
											<td><?= $value->stock_awal ?></td>
											<td><?= $value->penambahan ?></td>
											<td><?= ($pemakaian != null ? $pemakaian : 0) ?></td>
											<td><?= $value->sisa ?></td>
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
					tanggal: tanggal
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
							'<td>' + data[i].nama_region + '</td>' +
							'</tr>';
					}
					$('#show_data').html(html);
				}
			});

		});
		return false;
	});

	$('button').click(function() {
		var tanggal = $("#tanggal").val();

		if (tanggal == '') {
			Swal.fire({
				type: 'warning',
				title: 'Halllooo ...',
				text: 'Tanggal Belum Diisi'
			})
		} else {
			$.ajax({
				url: "<?= base_url('index.php/c_admin/get_transaksi_penambahan') ?>",
				type: "post",
				data: {
					tanggal: tanggal
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
						} else {
							varian = '---';
						}

						if (data[i].nama_ekstra != null) {
							ekstra = data[i].nama_ekstra;
						} else {
							ekstra = '---';
						}

						if (data[i].nama_topping != null) {
							topping = data[i].nama_topping;
						} else {
							topping = '---';
						}

						if (data[i].id_ekstra != null) {
							satuan = data[i].satuan;
						} else {
							satuan = 'cup';
						}

						html += '<tr>' +
							'<td>' + (i + 1) + '</td>' +
							'<td>' + data[i].tanggal + '</td>' +
							'<td>' + data[i].waktu + '</td>' +
							'<td>' + varian + '</td>' +
							'<td>' + ekstra + '</td>' +
							'<td>' + topping + '</td>' +
							'<td>' + data[i].penambahan_stok + ' ' + satuan + '</td>' +
							'<td>' + data[i].nama_region + '</td>' +
							'</tr>';
					}
					$('#show_data').html(html);
				}
			});
		}
	})
</script>