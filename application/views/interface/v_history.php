<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">History Penjualan</h3>
				<div class="col-lg-4 col-md-4">
					<div class="row">
						<div class="col-lg-4 col-md-4">
							<h5>Total Penjualan</h5>
						</div>
						<div class="col-lg-8 col-md-8">
							<span>Rp. <?=$total?></span>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4">
							<h5>Tanggal</h5>
						</div>
						<div class="col-lg-8 col-md-8">
							<span><?=date("D - M - Y")?></span>
						</div>
					</div>
				</div>
				<div class="table-responsive" style="margin-top: 20px;">
					<table class="table table-striped" id="myTable">
						<thead>
							<tr bgcolor="">
								<th>No</th>
								<th>Nama Pembeli</th>
								<th>Tanggal</th>
								<th>Waktu</th>
								<th>Nama Menu</th>
								<th>Sajian</th>
								<th>Topping</th>
								<th>Harga</th>
								<th>Gojek</th>
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
	$(document).ready(function(){

		tampil_data();

		function tampil_data(){
			var id = '<?=$this->fungsi->user_login()->id_staff?>';
			var tanggal = new Date().getFullYear()+'-'+(new Date().getMonth() + 1)+'-'+new Date().getDate();
			$.ajax({
				type : 'post',
				url : '<?=base_url('index.php/c_barista/list_history')?>',
				data : {id:id,tanggal:tanggal},
				async : false,
				dataType : 'json',
				success : function(data){
					var html = '';
					var i ;

					for(i = 0 ; i < data.length ; i++){
						var id_p = data[i].id_penyajian;
						var nama_p ;
						$.ajax({
							type : 'post',
							url : '<?=base_url('index.php/c_barista/get_nama_sajian')?>',
							data : {id_p:id_p},
							dataType : 'json',
							async : false,
							success : function(data){
								nama_p = data.nama_penyajian;																						
							}
						});

						var id_t = data[i].id_topping;
						var nama_t ;
						$.ajax({
							type : 'post',
							url : '<?=base_url('index.php/c_barista/get_nama_topping')?>',
							data : {id_t:id_t},
							dataType : 'json',
							async : false,
							success : function(data){
								nama_t = data.nama_topping;																						
							}
						});


						html += '<tr>'+
									'<td>'+(i+1)+'</td>'+
									'<td>'+data[i].nama_pembeli+'</td>'+
									'<td>'+data[i].tanggal+'</td>'+
									'<td>'+data[i].waktu+'</td>'+
									'<td>'+data[i].nama_powder+'</td>'+
									'<td>'+nama_p+'</td>'+
									'<td>'+nama_t+'</td>'+
									'<td>'+data[i].jumlah+'</td>'+
									'<td>'+data[i].pesanan_gojek+'</td>'+
								'</tr>';
					}
					$('#show_data').html(html);
				}
			});
		}

	});
</script>