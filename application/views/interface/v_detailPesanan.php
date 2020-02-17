<div class="row">
    <div class="col-sm-6 mb-4 mb-xl-0">
        <div class="d-lg-flex align-items-center">
            <div>
                <h3 class="text-dark font-weight-bold mb-2">Cek Detail Pesanan!</h3>
                <h6 class="font-weight-normal mb-2">Last login was 23 hours ago. View details</h6>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="d-flex align-items-center justify-content-md-end">
            <div class="pr-1 mb-3 mb-xl-0">
               	<a href="<?=base_url('index.php/c_barista/cek_order')?>">
               		<button type="submit" class="btn btn-social-icon-text btn-google">
                    	<i class="mdi mdi-reply-all"></i> Back
                    </button>                   		
               	</a>                    
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
	<div class="col-lg-6 grid-margin stretch-card">
		<div class="card">
            <div class="card-body">
            	<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4">
						<label class="card-title">Nama Pembeli</label>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8">
						<input type="text" name="pembeli" id="pembeli" value="<?=$row->nama_pembeli?>" readonly="" class="form-control">
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-lg-4 col-md-4 col-sm-4">
						<label class="card-title">Tanggal Beli</label>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8">
						<input type="text" name="pembeli" id="pembeli" value="<?=$row->tanggal.' '.$row->waktu?>" readonly="" class="form-control">
					</div>
				</div>	
				<div class="row mt-4">
					<div class="col-lg-4 col-md-4 col-sm-4">
						<label class="card-title">Kasir</label>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8">
						<input type="text" name="pembeli" id="pembeli" value="<?=$row->Nama?>" readonly="" class="form-control">
					</div>
				</div>	
            </div>
        </div>
    </div>

    <div class="col-lg-6 grid-margin stretch-card">
		<div class="card">
            <div class="card-body">
            	<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4">
						<label class="card-title">Sub Total</label>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8">
						<input type="text" name="pembeli" id="pembeli" value="Rp. <?=$row->total_awal?>" readonly="" class="form-control">
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-lg-4 col-md-4 col-sm-4">
						<label class="card-title">Diskon</label>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8">
						<input type="text" name="pembeli" id="pembeli" value="<?=$row->diskon?> %" readonly="" class="form-control">
					</div>
				</div>	
				<div class="row mt-4">
					<div class="col-lg-4 col-md-4 col-sm-4">
						<label class="card-title">Pesanan Gojek</label>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8">
						<input type="text" name="pembeli" id="pembeli" value="Rp. <?=$row->pesanan_gojek?>" readonly="" class="form-control">
						<br>
						<label for=""><i>Notice : pesanan gojek @cup + Rp. 2000</i></label>
					</div>
				</div>	
				<div class="row mt-4">
					<div class="col-lg-4 col-md-4 col-sm-4">
						<label class="card-title">Total</label>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8">
						<input type="text" name="pembeli" id="pembeli" value="Rp. <?=$row->total?>" readonly="" class="form-control">
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">Detail Pesanan</h3>
				<div class="table-responsive">
					<table class="table table-striped" id="myTable2">
						<thead>
							<tr bgcolor="">
								<th>No</th>
								<th>Nama Menu</th>
								<th>Sajian</th>
								<th>Topping</th>
								<th>Harga</th>
							</tr>
						</thead>
						<tbody id="show_data">

							<?php
								$connect = mysqli_connect('localhost','root','','db_pos');
								$no = 1;
								foreach ($result as $key => $value) {
									?>
										<tr>
											<td><?=$no++?></td>
											<td>
												<?php
													$id = $value->id_powder;
													$sql = mysqli_query($connect,"SELECT nama_powder FROM powder WHERE id_powder = $id ");
													while($data = mysqli_fetch_array($sql)){
														echo $data['nama_powder'];
													}
												?>
											</td>
											<td>
												<?php
													$id = $value->id_penyajian;
													if($id == null){
														$id = 0;
														echo "--";
													}
													else{
														$id = $value->id_penyajian;
														$sql = mysqli_query($connect,"SELECT nama_penyajian FROM penyajian WHERE id_penyajian = $id ");
														while($data = mysqli_fetch_array($sql)){
															echo $data['nama_penyajian'];
														}
													}													
												?>
											</td>
											<td>
												<?php
													$id = $value->id_topping;
													if($id == null){
														$id = 0;
														echo "--";
													}
													else{
														$id = $value->id_topping;
														$sql = mysqli_query($connect,"SELECT nama_topping FROM topping WHERE id_topping = $id ");
														while($data = mysqli_fetch_array($sql)){
															echo $data['nama_topping'];
														}
													}													
												?>
											</td>
											<td><?=$value->jumlah?></td>
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