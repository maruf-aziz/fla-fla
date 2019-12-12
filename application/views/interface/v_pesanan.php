<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="card">
			<div class="card-body">
				<div class="form-group">
					<label class="card-title">Nama Pembeli</label>
					<div class="input-group">

						<div class="input-group-prepend">
							<span class="input-group-text bg-primary text-white"><i class="mdi mdi-account"></i></span>
						</div>
						<input type="text" class="form-control" name="pembeli" id="pembeli" placeholder="Pembeli" value="" aria-label="Amount (to the nearest dollar)">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row mt-4">
	<div class="col-lg-8 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<label class="card-title">Pilihan Menu Basic , Premium , Soklat , Yakult </label>
				<table class="table table-bordered">
					<thead>
						<tr bgcolor="aqua">
							<th width="40%" class="card-title">Varian Menu</th>
							<th width="20%" class="card-title">Sajian</th>
							<th width="40%" class="card-title">Toping</th>
						</tr>
					</thead>
					<tbody>
						<tr class="table-primary">
							<td>
								<select style="width: 100%; height : 30px; border-radius: 5px;" id="menu">
									<option value="0">-- Pilih Menu --</option>
									<optgroup label="Menu Basic">
										<?php //tambah untuk menambah id_varian untuk mengupdate stok
										foreach ($basic as $key => $value) {
											?> 
											<option value="<?= $value->id_powder ?>" id_varian="<?=$value->id_varian?>" id_jenis="<?= $value->id_jenis ?>" nama="<?= $value->nama_powder ?>" ><?= $value->nama_powder ?></option>
										<?php
										}
										?>
									</optgroup>

									<optgroup label="Menu Premium">
										<?php
										foreach ($premium as $key => $value) {
											?>
											<option value="<?= $value->id_powder ?>" id_varian="<?=$value->id_varian?>" id_jenis="<?= $value->id_jenis ?>" nama="<?= $value->nama_powder ?>" ><?= $value->nama_powder ?></option>
										<?php
										}
										?>
									</optgroup>

									<optgroup label="Menu Soklat">
										<?php
										foreach ($soklat as $key => $value) {
											?>
											<option value="<?= $value->id_powder ?>" id_varian="<?=$value->id_varian?>" id_jenis="<?= $value->id_jenis ?>" nama="<?= $value->nama_powder ?>" ><?= $value->nama_powder ?></option>
										<?php
										}
										?>
									</optgroup>

									<optgroup label="Choco Premium">
										<?php
											foreach ($choco_pm as $key => $value) {
												?>
												<option value="<?= $value->id_powder ?>" id_varian="<?=$value->id_varian?>" id_jenis="<?= $value->id_jenis ?>" nama="<?= $value->nama_powder ?>" ><?= $value->nama_powder ?></option>
											<?php
											}
										?>
									</optgroup>			
									
									<optgroup label="Menu Yakult">
										<?php
											foreach ($yakult as $key => $value) {
												?>
													<option value="<?= $value->id_powder ?>" id_varian="<?=$value->id_varian?>" id_jenis="<?= $value->id_jenis ?>" nama="<?= $value->nama_powder ?>" ><?= $value->nama_powder ?></option>
												<?php
											}
										?>
									</optgroup>

								</select>
							</td>
							<td>
								<select style="width: 100%; height : 30px; border-radius: 5px;" id="sajian">
									<option value="0">-- Pilih --</option>
								</select>
							</td>
							<td>
								<select style="width: 100%; height : 30px; border-radius: 5px;" id="topping">
									<option value="0">-- Pilih Topping --</option>
									<optgroup label="All Topping">
										<?php
										foreach ($topping as $key => $value) {
											?>
											<option value="<?= $value->id_topping ?>" nama="<?= $value->nama_topping ?>" harga="<?= $value->harga ?>"><?= $value->nama_topping ?></option>
										<?php
										}
										?>
									</optgroup>
								</select>
							</td>
						</tr>
					</tbody>
				</table>
				<button type="text" class="btn btn-social-icon-text btn-facebook" style="margin-top: 10px;" id="add_data"><i class="mdi mdi-plus"></i>Tambah List</button>
			</div>
		</div>
	</div>

	<div class="col-lg-4 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<label class="card-title">Pilihan Menu Fresh And Juice</label>
				<table class="table table-bordered">
					<thead>
						<tr bgcolor="aqua">
							<th class="card-title">Varian Menu</th>
						</tr>
					</thead>
					<tbody>
						<tr class="table-primary">
							<td>
								<select style="width: 100%; height : 30px; border-radius: 5px;" id="menu2">
									<option value="0">-- Pilih Menu --</option>
									<optgroup label="menu Juice">
										<?php
										foreach ($juice as $key => $value) {
											?>
											<option value="<?= $value->id_powder ?>" id_varian="<?=$value->id_varian?>" id_jenis="<?= $value->id_jenis ?>" nama="<?= $value->nama_powder ?>" ><?= $value->nama_powder ?></option>
										<?php
										}
										?>
									</optgroup>
								</select>
								<input type="hidden" id="harga_hrg" value="" >
							</td>
						</tr>
					</tbody>
				</table>
				<button type="text" id="add_data2" class="btn btn-social-icon-text btn-facebook" style="margin-top: 10px;"><i class="mdi mdi-plus"></i>Tambah List</button>
			</div>
		</div>
	</div>
</div>

<div class="row mt-4">
	<div class="col-lg-12 col-md-12 col-sm-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<label class="card-title">List Pesanan</label>
				<table class="table table-striped" id="data_pesanan">
					<thead>
						<tr bgcolor="aqua">
							<th width="5%" class="card-title">#</th>
							<th width="25%" class="card-title">Menu</th>
							<th width="25%" class="card-title">Sajian</th>
							<th width="25%" class="card-title">Topping</th>
							<th width="20%" class="card-title">Harga</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<form name="myform">
	<div class="row mt-4">
		<div class="col-lg-8 col-md-8"></div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-4">
					<h4 class="text-dark font-weight-bold mb-2">Total</h4>
				</div>
				<div class="col-md-8">
					<input type="text" name="total" id="total" value="" class="form-control" readonly>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-4">
		<div class="col-lg-8 col-md-8"></div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-4">
					<h4 class="text-dark font-weight-bold mb-2">Diskon (%)</h4>
				</div>
				<div class="col-md-8">
					<input type="text" name="diskon" id="diskon" value="" class="form-control" readonly>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-4">
		<div class="col-lg-8 col-md-8"></div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-4">
					<h4 class="text-dark font-weight-bold mb-2">Total Bayar</h4>
				</div>
				<div class="col-md-8">
					<input type="text" name="total_akhir" id="total_akhir" value="" class="form-control" readonly>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-4">
		<div class="col-lg-8 col-md-8"></div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-4">
					<h4 class="text-dark font-weight-bold mb-2">Gojek</h4>
				</div>
				<div class="col-md-8 form-check form-check-flat form-check-primary" style="top : -10px; left: 20px;">
					<label class="form-check-label">
						<input type="checkbox" class="form-check-input" name="gojek" id="gojek" value="2000" onClick="this.form.total_akhir.value=checkChoice();">
						Orderan Gojek @2000						
					</label>
					<input type="hidden" name="status_order" id="status_order" value="No">
				</div>
				<!-- <div class="col-md-8">
					<button class="btn btn-social-icon-text btn-facebook" onclick="gojek();"><i class="mdi mdi-cash-multiple"></i>Gojek</button>
					<input type="text" name="status_order" id="status_order" value="No">
				</div> -->
			</div>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col-lg-8 col-md-8"></div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-4">
					<h4 class="text-dark font-weight-bold mb-2">Uang Bayar</h4>
				</div>
				<div class="col-md-8">
					<input type="number" name="bayar" id="bayar" value="" class="form-control">
					<br>
					<!-- <button class="btn btn-social-icon-text btn-facebook" onclick="bayar_cash();"><i class="mdi mdi-cash-multiple"></i>Uang Cash</button> -->
				</div>
			</div>
		</div>
	</div>
</form>
<div class="row mt-4">
	<div class="col-lg-8 col-md-8"></div>
	<div class="col-md-4">
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-8">
				<button class="btn btn-social-icon-text btn-facebook" onclick="bayar_cash();"><i class="mdi mdi-cash-multiple"></i>Uang Cash</button>
			</div>
		</div>
	</div>
</div>
<div class="row mt-4">
	<div class="col-lg-8 col-md-8"></div>
	<div class="col-md-4">
		<div class="row">
			<div class="col-md-4">
				<h4 class="text-dark font-weight-bold mb-2">Kembali</h4>
			</div>
			<div class="col-md-8">
				<input type="text" name="kembali" id="kembali" value="" class="form-control" readonly>
			</div>
		</div>
	</div>
</div>
<div class="row mt-4">
	<div class="col-lg-8 col-md-8"></div>
	<div class="col-md-4">
		<div align="center">
			<button class="btn btn-social-icon-text btn-twitter" id="konfirmasi"><i class="mdi mdi-checkbox-multiple-marked-circle-outline"></i>Konfirrmasi Pesanan</button>
		</div>
	</div>
</div>

<!-- <input type="text" id="id_nota" name="id_nota" value=""> -->

<!-- Java Script -->

<script type="text/javascript">
	// ---------------------------------------- FUNGSI CHANGE SAJIAN DARI PILIHAN MENU ----------------------------------------------------
	$(document).ready(function() {

		$('#menu').change(function() {

			var id = $(this).val();
			$.ajax({
				url: "<?= base_url('index.php/c_barista/get_sajian') ?>",
				type: "post",
				data: {
					id: id
				},
				async: true,
				dataType: "json",
				success: function(data) {
					var html = '';
					var id;
					// html += '<option value="0">-- Pilih --</option>';
					// html += '<optgroup label = "Sajian">';
					for (i = 0; i < data.length; i++) {
						html += '<option value=' + data[i].id_penyajian + ' nama="' + data[i].nama_penyajian + '" harga="' + data[i].harga + '" >' + data[i].nama_penyajian + '</option>';
					}
					// html += '</optgroup>';
					$('#sajian').html(html);
				}
			});

		});
		return false;
	});
	// ---------------------------------------- END FUNGSI  -------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI CHANGE SAJIAN DARI PILIHAN MENU 2 --------------------------------------------------
	$(document).ready(function() {

		$('#menu2').change(function() {

			var id = $(this).val();
			$.ajax({
				url: "<?= base_url('index.php/c_barista/get_sajian') ?>",
				type: "post",
				data: {
					id: id
				},
				async: true,
				dataType: "json",
				success: function(data) {
					var html = '';
					var id;
					for (i = 0; i < data.length; i++) {
						html += data[i].harga;
					}
					// $('#sajian').html(html);
					$('#harga_hrg').val(html);
				}
			});

		});
		return false;
	});

	// ---------------------------------------- END FUNGSI --------------------------------------------------------------------------------


	// ---------------------------------------- FUNGSI SET INPUT DI AWAL RELOAD -----------------------------------------------------------
	$(document).ready(function() {

		$('#total').val(0);
		$('#diskon').val(0);
		$('#total_akhir').val(0);
		// $('#bayar').val(0);
		// $('#kembali').val(0);

	});
	// ---------------------------------------- END FUNGSI  -------------------------------------------------------------------------------

	function formatCurrency(num){
		num = num.toString().replace(/\$|\,/g,'');
		if(isNaN(num)) num = "0";
		cents = Math.floor((num*100+0.5)%100);
		num = Math.floor((num*100+0.5)/100).toString();
		if(cents < 10) cents = "0" + cents;
		for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
		num = num.substring(0,num.length-(4*i+3))+'.'+num.substring(num.length-(4*i+3));
		return ("Rp. " + num + "," + cents);
		}

	// ---------------------------------------- FUNGSI MENGHITUNG TOTAL HARGA DARI SEMUA MENU ---------------------------------------------
	var total = 0;

	function set_total() {

		var harga;
		var data = [];

		$('#data_pesanan tr').each(function(row, tr) {

			var x = $(tr).find('td:eq(4)').text();

			data.push(x);

			// console.log(data);

			var i;

			for (i = 0; i < data.length; i++) {
				if (data[i] == '') {
					total = 0;
				} else {
					total += parseInt(data[i]);
				}
			}
			$('#total').val(total);

		})

	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENGHITUNG DISKON -------------------------------------------------------------------
	function diskon() {

		var disc1 = 10;
		var disc2 = 0;
		var total_diskon;

		var total_harga = parseInt($('#total').val());

		if (total_harga == 0) {
			$('#diskon').val(0);
			$('#total_akhir').val(0);
		} else if (total_harga >= 50000) {
			total_diskon = total_harga - (total_harga * disc1 / 100);
			$('#diskon').val(disc1);
			$('#total_akhir').val(total_diskon);
		} else {
			total_diskon = total_harga - (total_harga * disc2 / 100);
			$('#diskon').val(disc2);
			$('#total_akhir').val(total_diskon);
		}

	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI GOJEK -------------------------------------------------------------------------------
	// function gojek(){
	// 	var harga = parseInt($('#total_akhir').val());
	// 	var baris = document.getElementById("data_pesanan").rows.length;
	// 	var gojek = harga + ((baris-1) * 2000);
	// 	var status = 'Ya';
	// 	$('#total_akhir').val(gojek);
	// 	$('#status_order').val(status);
	// }

	function checkChoice(){	
			var baris = document.getElementById("data_pesanan").rows.length;			
			if (gojek.checked == false){
				total_akhir.value = eval(total_akhir.value) - ( eval(gojek.value) * (baris -1) );
				$('#status_order').val("No");
			}
			else{
				total_akhir.value = eval(total_akhir.value) + ( eval(gojek.value) * (baris -1) );
				$('#status_order').val("Ya");
			}
			return(total_akhir.value);
	}

	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------	

	// ---------------------------------------- FUNGSI MASUKAN BAYAR -----------------------------------------------------------------------
	function bayar_click() {		

		$('#bayar').on('keyup', function() {
			var bayar = $(this).val();
			var ttl = $('#total_akhir').val();
			var kembali = 0;

			if (bayar == '') {
				$('#kembali').val('');
			} else {
				kembali = bayar - ttl;
				$('#kembali').val(kembali);
			}
		});

	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI BAYAR CASH --------------------------------------------------------------------------
	function bayar_cash() {

		var harga = $('#total_akhir').val();
		$('#bayar').val(harga);
		$('#kembali').val(0);

	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENGURANGI SISA POWDER --------------------------------------------------------------
	function powder_min(id) {
		$.ajax({
			type: "post",
			url: "<?= base_url('index.php/c_barista/powder_min') ?>",
			data: {
				id: id
			},
			dataType: "json"
		});
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENAMBAH SISA POWDER ----------------------------------------------------------------
	function powder_plus(id) {
		$.ajax({
			type: "post",
			url: "<?= base_url('index.php/c_barista/powder_plus') ?>",
			data: {
				id: id
			},
			dataType: "json"
		});
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENURANGI SISA TOPPING --------------------------------------------------------------
	function topping_min() {
		var id = $('#topping').val();
		$.ajax({
			type: 'post',
			url: '<?= base_url('index.php/c_barista/topping_min') ?>',
			data: {
				id: id
			},
			dataType: 'json'
		});
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENAMBAH SISA TOPPING ---------------------------------------------------------------
	function topping_plus(id) {
		$.ajax({
			type: 'post',
			url: '<?= base_url('index.php/c_barista/topping_plus') ?>',
			data: {
				id: id
			},
			dataType: 'json'
		});
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENGURANGI STOK EKSTRA --------------------------------------------------------------
	function basic_min(id,qty,id_jenis,sajian=null) {
		var id_ekstra;
		$.ajax({
			type: 'post',
			url: '<?= base_url('index.php/c_barista/ekstra_min') ?>',
			data: {
				id: id,
				qty:qty,
				id_jenis : id_jenis,
				sajian : sajian
			},
			dataType: 'json'
		});		
	}	
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENAMBAH STOK EKSTRA ----------------------------------------------------------------
	function basic_plus(id,qty,id_jenis,sajian=null) {
		var id_ekstra;
		$.ajax({
			type: 'post',
			url: '<?= base_url('index.php/c_barista/ekstra_plus') ?>',
			data: {
				id: id,
				qty:qty,
				id_jenis : id_jenis,
				sajian : sajian
			},
			dataType: 'json'
		});		
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENGURANGI STOK CUP -----------------------------------------------------------------
	function cup_min(id_jenis) {
		var id = 'Cup';
		var qty = 1;
		$.ajax({
			type: 'post',
			url: '<?= base_url('index.php/c_barista/cup_min') ?>',
			data : {
				id: id,
				qty:qty,
				id_jenis : id_jenis
			},
			dataType: 'json'
		});
		// console.log(id)
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENAMBAH STOK CUP -------------------------------------------------------------------
	function cup_plus(id_jenis) {
		var id = 'Cup';
		var qty = 1;
		$.ajax({
			type: 'post',
			url: '<?= base_url('index.php/c_barista/cup_plus') ?>',
			data : {
				id: id,
				qty:qty,
				id_jenis : id_jenis
			},
			dataType: 'json'
		});
		// console.log(id)
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MEMASUKKAN MENU PILIHAN KE TABEL ----------------------------------------------------
	var data = [];
	$(function() {

		$('#add_data').click(function() {
			$('#bayar').val('');
			$('#kembali').val('');

			var id_menu = $('#menu').val();
			var nama_menu = $('#menu option:selected').attr('nama');
			// var harga_menu = $('#menu option:selected').attr('harga');
			var id_jenis = $('#menu option:selected').attr('id_jenis');
			var id_varian = $('#menu option:selected').attr('id_varian'); //untuk mengurangi stok powder

			var id_sajian = $('#sajian').val();
			var nama_sajian = $('#sajian option:selected').attr('nama');
			var harga_menu = $('#sajian option:selected').attr('harga');

			var id_topping = $('#topping').val();
			var nama_topping = $('#topping option:selected').attr('nama');
			var harga_topping = $('#topping option:selected').attr('harga');

			if(nama_topping != null){
				var nama_topping = $('#topping option:selected').attr('nama');
			}
			else{
				var nama_topping = "--";
			}

			if(id_topping != 0){
				var id_topping = $('#topping').val();
			}
			else{
				var id_topping = '';
			}

			// -----------------------------------------------------------------
			if(harga_topping != null){
				var harga_topping = $('#topping option:selected').attr('harga');
			}
			else{
				var harga_topping = 0;
			}

			var harga = parseInt(harga_menu) + parseInt(harga_topping);

			// -----------------------------------------------------------------
			if (id_menu == 0) {

				Swal.fire({
					type: 'warning',
					title: 'Halllooo ...',
					text: 'Harap Memilih Menu'
				})

				return false;
			}

			else {
				powder_min.call(this, id_varian); //fungsi set sisa powder
				topping_min.call();
				cup_min.call(this, id_jenis);

				var ss_pth = 'Susu Putih';
				var ss_ckt = 'Susu Coklat';
				var qty_basic = 0.1;
				var qty_pm = 0.2;
				var yakult = 'Yakult';
				var qty_yakult = 1;
				
				if(nama_menu == 'Choco Hazel' || nama_menu == 'choco hazel' || nama_menu == 'Choco hazel'){
				    basic_min.call(this, 'Hazel', 1, id_jenis);
				}
				else if(nama_menu == 'Choco Rum' || nama_menu == 'choco rum' || nama_menu == 'Choco rum'){
				    basic_min.call(this, 'Rum', 1, id_jenis);
				}

				if (id_jenis == 1 || id_jenis == 2) {
					if (id_sajian == 1) {
						basic_min.call(this, ss_pth, qty_basic,id_jenis,nama_sajian);
					} else if (id_sajian == 2) {
						basic_min.call(this, ss_pth, qty_pm,id_jenis, nama_sajian);
					}
				} else if (id_jenis == 3 || id_jenis == 4) {
					if (id_sajian == 1) {
						basic_min.call(this, ss_ckt, qty_basic,id_jenis, nama_sajian);
					} else if (id_sajian == 2) {
						basic_min.call(this, ss_ckt, qty_pm, id_jenis, nama_sajian);
					}
				}
				else if (id_jenis == 5) {
					basic_min.call(this, ss_pth,qty_basic,id_jenis,nama_sajian);
					basic_min.call(this, yakult,qty_yakult,id_jenis);
				}

				$('#data_pesanan tbody:last-child').append(
					'<tr>' +
					'<td>' +
					'<input type="hidden" name="id_menu" id="id_menu" value="' + id_menu + '">' +
					'<input type="hidden" name="id_varian" id="id_varian" value="' + id_varian + '">' + //new : menangkap id varian untuk mengupdate stok
					'<input type="hidden" name="id_topping" id="id_tp" value="' + id_topping + '">' +
					'<input type="hidden" name="id_jenis" id="id_jenis" value="' + id_jenis + '">' +
					'<input type="hidden" name="id_sajian" id="id_sajian" value="' + id_sajian + '">' +
					'<input type="hidden" name="nama_sajian" id="nama_sajian" value="' + nama_sajian + '">' +
					'<input type="hidden" name="nama_menu" id="nama_menu" value="' + nama_menu + '">' +
					'<button type="button" class="btn btn-warning btn-sm btn-icon" onclick="del_data(this)"><i class="mdi mdi-delete-forever"></i></button>' +
					'</td>' +
					'<td>' + nama_menu + '</td>' +
					'<td>' + nama_sajian + '<input type="hidden" id="id_sajian" value="' + id_sajian + '"></td>' +
					'<td>' + nama_topping + '</td>' +
					'<td>' + harga + '</td>' +
					'</tr>'
				);

				set_total.call();
				diskon.call();
				bayar_click.call();

			}


			$('#menu').val(0);
			$('#sajian').val(0);
			$('#topping').val(0);

		});

		$('#add_data2').click(function() {
			$('#bayar').val('');
			$('#kembali').val('');

			var id_menu = $('#menu2').val();
			var nama_menu = $('#menu2 option:selected').attr('nama');			
			var id_jenis = $('#menu2 option:selected').attr('id_jenis');
			var id_varian = $('#menu option:selected').attr('id_varian'); //untuk mengurangi stok powder

			var harga_menu = $('#harga_hrg').val();
			

			if (id_menu == 0) {

				Swal.fire({
					type: 'warning',
					title: 'Halllooo ...',
					text: 'Harap Memilih Menu'
				})

				return false;
			} else {
				// var ss_pth = 'Susu Putih';
				// var juice = 'Lychee';
				// var qty_basic = 0.1;
				// var qty_juice = 1;
				// var yakult = 'Yakult';
				// var qty_yakult = 1;
				var lychee = 'Lychee';
				var qty_lyc = 0.2;

				powder_min.call(this, id_varian);
				cup_min.call(this, id_jenis);

				
				if(id_jenis == 6){
					basic_min.call(this, lychee, qty_lyc,id_jenis);
				}

				$('#data_pesanan tbody:last-child').append(
					'<tr>' +
					'<td>' +
					'<input type="hidden" name="id_menu" id="id_menu" value="' + id_menu + '">' +
					'<input type="hidden" name="id_varian" id="id_varian" value="' + id_varian + '">' + //new : menangkap id varian untuk mengupdate stok
					'<input type="hidden" name="id_jenis" id="id_jenis" value="' + id_jenis + '">' +
					'<input type="hidden" name="id_topping" id="id_tp" value="">' +
					'<input type="hidden" name="id_sajian" id="id_sajian" value="">' +
					'<input type="hidden" name="nama_menu" id="nama_menu" value="' + nama_menu + '">' +
					'<button type="button" class="btn btn-warning btn-sm btn-icon" onclick="del_data(this)"><i class="mdi mdi-delete-forever"></i></button>' +
					'</td>' +
					'<td>' + nama_menu + '</td>' +
					'<td>--</td>' +
					'<td>--</td>' +
					'<td>' + harga_menu + '</td>' +
					'</tr>'
				);

				set_total.call();
				diskon.call();
				bayar_click.call();

			}

			$('#menu2').val(0);

		});

		$('#konfirmasi').click(function() {
			var bayar = $('#bayar').val();
			var nama = $('#pembeli').val();
			if (nama == '') {
				Swal.fire({
					type: 'warning',
					title: 'Halllooo ...',
					text: 'Harap Nama Pembeli Diisi'
				});
				// window.setTimeout(function() {
				// 	document.getElementById('pembeli').focus();
				// }, 0);
				// document.pembeli.focus();

			} else if (bayar == '') {
				Swal.fire({
					type: 'warning',
					title: 'Halllooo ...',
					text: 'Harap Mengisi Uang Bayar'
				})

				return false;
			} else {
				konfirmasi.call();
				var tgl_id;
				var wkt_id;

				var pembeli = $('#pembeli').val();
				var sub_total = $('#total').val();
				var dis = $('#diskon').val();
				var total_akhir = $('#total_akhir').val();

				var id_staff = '<?= $this->fungsi->user_login()->id_staff ?>';

				var order_gojek = $('#status_order').val();

				// id untuk menyimpan transaksi {
				var tanggal = new Date().getFullYear() + '-' + (new Date().getMonth() + 1) + '-' + new Date().getDate();
				var waktu = new Date().getHours() + ':' + new Date().getMinutes() + ':' + new Date().getSeconds();
				// }
				
				// console.log(tanggal,waktu);


				// location.reload(true);


				// membuat nota baru
				$.ajax({

					url: "<?= base_url('index.php/c_barista/new_nota') ?>",
					type: "get",
					dataType: "json",
					data: {
						pembeli: pembeli,
						tanggal: tanggal,
						waktu: waktu,
						sub_total: sub_total,
						dis: dis,
						total_akhir: total_akhir,
						id_staff: id_staff,
						order_gojek : order_gojek
					},
					success: function(result) {

						// console.log(result.tgl , result.wkt);
						tgl_id = result.tgl;
						wkt_id = result.wkt;
						
				// 		console.log(tgl_id,wkt_id);

						var id_n;
						$.ajax({

							url: "<?= base_url('index.php/c_barista/get_new_nota') ?>",
							type: "post",
							data: {
								tanggal: tgl_id,
								waktu: wkt_id
							},
							async: true,
							dataType: "json",
							success: function(x) {

								$.each(data, function(id) {
									// $('#id_nota').val(x.id);
									id_n = x.id;
								});


								$.ajax({

									data: {
										data_pesanan: data,
										id_n: id_n,
										order_gojek: order_gojek
									},
									url: "<?= base_url('index.php/c_barista/save_detail') ?>",
									type: "post",
									crossOrigin: false,
									dataType: "json",
									success: function(result) {

										if (result.status == 'failed') {
											Swal.fire(
												'Konfirmasi Pesanan',
												'Gagal !!',
												'error'
											)
										} else {
											Swal.fire({
												type: 'success',
												title: 'Konfirmasi Pesanan',
												text: 'Success'
											}).then((result) => {
												location.replace("<?= base_url('index.php/c_barista/cek_order') ?>");
											})
										}
									}
								});

							}
						});
					}

				});


			}

		});

	});
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI MENGHAPUS PILIHAN DARI DALAM TABEL --------------------------------------------------
	function del_data(id) {

		var id_m = $('#id_menu').val();
		var id_var = $('#id_varian').val();
		var id_t = $('#id_tp').val();
		var id_jenis = $('#id_jenis').val();
		var id_sajian = parseInt($('#id_sajian').val());
		var nama_sajian = $('#nama_sajian').val();
		var nama_menu = $('#nama_menu').val();

		var ss_pth = 'Susu Putih';
		var ss_ckt = 'Susu Coklat';
		var juice = 'Sirup';
		var lychee = 'Lychee';
		var qty_lyc = 1;
		var qty_basic = 0.1;
		var qty_pm = 0.2;
		var qty_juice = 20;
		var yakult = 'Yakult';
		var qty_yakult = 1;
		
		if(nama_menu == 'Choco Hazel' || nama_menu == 'choco hazel' || nama_menu == 'Choco hazel'){
		    basic_plus.call(this, 'Hazel', 1, id_jenis);
		}
		else if(nama_menu == 'Choco Rum' || nama_menu == 'choco rum' || nama_menu == 'Choco rum'){
		    basic_plus.call(this, 'Rum', 1, id_jenis);
		}

		if (id_jenis == 1 || id_jenis == 2) {


			if (id_sajian == 1) {
				basic_plus.call(this, ss_pth, qty_basic,id_jenis, nama_sajian);
			} else if (id_sajian == 2) {
				basic_plus.call(this, ss_pth, qty_pm,id_jenis, nama_sajian);
			}
		} 
		
		else if (id_jenis == 3 || id_jenis == 4) {

			if (id_sajian == 1) {
				basic_plus.call(this, ss_ckt, qty_basic,id_jenis, nama_sajian);
			} else if (id_sajian == 2) {
				basic_plus.call(this, ss_ckt, qty_pm,id_jenis, nama_sajian);
			}
		} 
		
		else if (id_jenis == 5) {
			basic_plus.call(this, ss_pth, qty_basic,id_jenis, nama_sajian);
			basic_plus.call(this, yakult, qty_yakult,id_jenis);
		}

		else if (id_jenis == 6){
			basic_plus.call(this, lychee, qty_lyc,id_jenis);
		}

		powder_plus.call(this, id_var);
		topping_plus.call(this, id_t);
		cup_plus.call(this, id_jenis);


		id.closest('tr').remove();

		set_total.call();
		diskon.call();
		bayar_click.call();

		$('#bayar').val('');
		$('#kembali').val('');

	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------

	// ---------------------------------------- FUNGSI KONFIRMASI PESANAN ------------------------------------------------------------------
	function konfirmasi() {


		$('#data_pesanan tr').each(function(row, tr) {
			if ($(tr).find('td:eq(1)').text() == '') {

			} else {
				var x = {
					'id_menu': $(tr).find('#id_menu').val(),
					'menu': $(tr).find('td:eq(1)').text(),
					'id_sajian': $(tr).find('#id_sajian').val(),
					'sajian': $(tr).find('td:eq(2)').text(),
					'id_topping': $(tr).find('#id_tp').val(),
					'topping': $(tr).find('td:eq(3)').text(),
					'harga': $(tr).find('td:eq(4)').text(),
				};

				data.push(x);
			}
		});
// 		console.log(data);
	}
	// ---------------------------------------- END FUNGSI ---------------------------------------------------------------------------------
</script>