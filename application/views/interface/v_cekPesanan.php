<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Antrean Pesanan</h3>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr bgcolor="">
								<th width="15%">#</th>
								<th>No</th>
								<th>Nama Pemesan</th>
								<th>Total Awal</th>
								<th>Diskon</th>
								<th>Total_Akhir</th>
								<th>Order Gojek</th>
								<th width="15%">Status</th>
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

<script type="text/javascript">
	$(document).ready(function() {

		tampil_data();
		
		function tampil_data() {
			var tanggal = new Date().getFullYear()+'-'+(new Date().getMonth() + 1)+'-'+new Date().getDate();
			// console.log(tanggal);
			$.ajax({
				type: 'post',
				url: '<?= base_url('index.php/c_barista/cek_pesanan') ?>',
				data : {
					tanggal : tanggal
				},
				async: false,
				dataType: 'json',
				success: function(data) {
					var html = '';
					var i;

					for (i = 0; i < data.length; i++) {
						html += '<tr>' +
							'<td><a href="<?= base_url('index.php/c_barista/detail/') ?>' + data[i].no_nota + '"><button type="submit" class="btn btn-success detail" data="' + data[i].no_nota + '"><i class="mdi mdi-reply-all"></i> Detail</button></a></td>' +
							'<td>' + (i + 1) + '</td>' +
							'<td>' + data[i].nama_pembeli + '</td>' +
							'<td>' + data[i].total_awal + '</td>' +
							'<td>' + data[i].diskon + '</td>' +
							'<td>' + data[i].total + '</td>' +
							'<td>' + data[i].pesanan_gojek + '</td>' +
							'<td><button class="btn btn-primary proses" data="' + data[i].no_nota + '"><i class="mdi mdi-rotate-left"></i> Konfirmasi</button></td>' +
							'</tr>';
					}
					// alert(html);
					$('#show_data').html(html);
				}
			});
		}

		$('#show_data').on('click', '.proses', function() {
			var id = $(this).attr('data');

			// console.log(id);

			$.ajax({
				type: 'post',
				url: '<?= base_url('index.php/c_barista/update_status') ?>',
				data: {
					id: id
				},
				dataType: 'json',
				success: function(data) {
					Swal.fire({
						type: 'success',
						title: 'Konfirmasi Pesanan',
						text: 'Success'
					})
					tampil_data();
				}
			});
			return false;

		});

		// $('#show_data').on('click','.detail', function(){
		// 	var id = $(this).attr('data');

		// 	// console.log(id);

		// 	$.ajax({
		// 		type : 'post',
		// 		url : '<?= base_url('index.php/c_barista/detail') ?>',
		// 		data : {id:id},
		// 		dataType : 'json',
		// 		success : function(data){
		// 			location.replace("<?= base_url('index.php/c_barista/detail') ?>");
		// 		}
		// 	});
		// });

	});
</script>