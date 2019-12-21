		<?php

	  	$query = new mysqli('localhost', 'root','', 'db_pos');

	  ?>

		<div class="page-title">
	    <div class="title_left">
	      <h3>Form Add Data Menu</h3>
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

	  <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Input Data <small>Menu</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content"> 
          	<div class="pull-right">          		
	            <a href="<?=base_url('index.php/c_admin/inventory')?>" class="btn btn-warning btn-xs"><i class="fa fa-mail-reply"></i> Back</a>
          	</div>         	
            <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="#">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jenis Menu <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<select class="form-control" id="exampleFormControlSelect1" name="id_jenis" required>
                		<option>-- Pilih Jenis --</option>
                		<?php
                			foreach ($jenis_menu as $key => $value) {
                				# code...
                				?>
                					<option value="<?=$value->id_jenis?>"><?=$value->nama_jenis?></option>
                				<?php
                			}
                		?>
                	</select>
                </div>
              </div>

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Menu <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="nama_menu" required="required" placeholder="ex : choco">
                </div>
              </div>

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cabang <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<select class="form-control" id="exampleFormControlSelect1" name="id_region" required>
                		<option>-- Pilih Cabang --</option>
                		<?php
                			foreach ($region as $key => $value) {
                				?>
                					<option value="<?=$value->id_region?>"><?=$value->nama_region?></option>
                				<?php
                			}
                		?>
                	</select>
                </div>
              </div>

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Pemakaian Powder <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<select class="form-control" name="pemakaian_powder" id="pemakaian_powder" required>
										<option value="">-- Silahkan Pilih --</option>
										<option value="stock">Powder Baru</option>
										<option value="powder">Powder yang ada</option>
									</select>
                </div>
              </div>

              <div class="form-group form stok" id="stock" style="display:none;">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Stok <span class="required">*</span></label>
                
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
	                <input type="number" class="form-control" placeholder="ex : 10" name="stock" id="stock">
	                <span class="form-control-feedback right" aria-hidden="true">pcs</span>
	              </div>
                
              </div>

              <div class="form-group form powder" id="powder" style="display:none;">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Powder Yang Digunakan <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="id_powder" id="powder">
										<option>-- Pilih Powder --</option>
									</select>
                </div>
              </div>

              <!-- .... -->

              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Penyajian <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                	<select class="form-control" id="adi" multiple="multiple" data-plugin-multiselect id="ms_example0" name="penyajian[]" required>
										<?php

										foreach ($sajian as $key => $value) {
											?>
												<option value="<?=$value->id_penyajian?>" id="<?=$value->id_penyajian?>"><?=$value->nama_penyajian?></option>
											<?php
										}
										?>
									</select>
                </div>
              </div>

              <div class="form-group aktif" id="form-basic" style="display:none;">
            		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga Basic <span class="required">*</span></label>
            		<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
	                <input type="number" class="form-control has-feedback-left" id="inputSuccess2" placeholder="ex: 5000" name="basic">
	                <span class="form-control-feedback left" aria-hidden="true">Rp.</span>
	              </div>
            	</div>  

            	<div class="form-group aktif" id="form-pm" style="display:none;">
            		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga PM <span class="required">*</span></label>
            		<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
	                <input type="number" class="form-control has-feedback-left" id="inputSuccess2" placeholder="ex: 5000" name="pm">
	                <span class="form-control-feedback left" aria-hidden="true">Rp.</span>
	              </div>
            	</div>

            	<div class="form-group aktif" id="form-hot" style="display:none;">
            		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga Basic <span class="required">*</span></label>
            		<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
	                <input type="number" class="form-control has-feedback-left" id="inputSuccess2" placeholder="ex: 5000" name="hot">
	                <span class="form-control-feedback left" aria-hidden="true">Rp.</span>
	              </div>
            	</div>

            	<div class="form-group aktif" id="form-yakult" style="display:none;">
            		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga Basic <span class="required">*</span></label>
            		<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
	                <input type="number" class="form-control has-feedback-left" id="inputSuccess2" placeholder="ex: 5000" name="yakult">
	                <span class="form-control-feedback left" aria-hidden="true">Rp.</span>
	              </div>
            	</div>

            	<div class="form-group aktif" id="form-juice" style="display:none;">
            		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga Basic <span class="required">*</span></label>
            		<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
	                <input type="number" class="form-control has-feedback-left" id="inputSuccess2" placeholder="ex: 5000" name="juice">
	                <span class="form-control-feedback left" aria-hidden="true">Rp.</span>
	              </div>
            	</div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="<?=base_url('index.php/c_admin/inventory')?>"><button class="btn btn-primary" type="button">Cancel</button></a>
		  						<button class="btn btn-primary" type="reset">Reset</button>
                  <button type="submit" name="kirim" class="btn btn-success">Submit</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
				if (isset($_POST["kirim"])) 
				{
					$idJenis = $_POST['id_jenis'];
					$namaMenu = $_POST['nama_menu'];
					$region = $_POST['id_region'];
					$powder = $_POST['pemakaian_powder'];
					$varian = $_POST['id_powder'];

					if ($powder == 'stock') {
						$stock = $_POST['stock'];
						$tambah = $query->query("INSERT INTO varian_powder(nama_varian, stok_awal, penambahan, total, sisa, id_region) VALUES ('$namaMenu', '$stock', 0, '$stock', '$stock', '$region')");
						$data = $query->query("SELECT id_varian FROM varian_powder WHERE nama_varian = '$namaMenu' AND stok_awal = '$stock' AND id_region = '$region' ORDER BY id_varian DESC");
						$out = mysqli_fetch_array($data);
						$id_varian = $out[0];
						$queryTambah = $query->query("INSERT INTO powder(id_jenis, nama_powder, id_varian) VALUES ('$idJenis', '$namaMenu', '$id_varian');");
						$result = $query->query("SELECT id_powder FROM powder WHERE id_jenis = '$idJenis' AND nama_powder = '$namaMenu' AND id_varian = '$id_varian' ORDER BY id_powder DESC");

						$row = mysqli_fetch_assoc($result);

						if (isset($_POST['penyajian'])) {
							$arr = $_POST['penyajian'];
							$harga = [];
							if (isset($_POST['basic']))
								$harga[1] = $_POST['basic'];
							if (isset($_POST['pm']))
								$harga[2] = $_POST['pm'];
							if (isset($_POST['hot']))
								$harga[3] = $_POST['hot'];
							if (isset($_POST['yakult']))
								$harga[4] = $_POST['yakult'];
							if (isset($_POST['juice']))
								$harga[5] = $_POST['juice'];

							foreach ($arr as $cel) {
								$add = mysqli_query($query, "INSERT INTO detail_penyajian(id_powder, id_penyajian, harga) VALUES('$row[id_powder]', '$cel', '$harga[$cel]')");
							}
						}

						$this->session->set_flashdata('flash','Data Menu Berhasil Ditambah');
					} 
					else  
					{
						$queryTambah = $query->query("INSERT INTO powder(id_jenis, nama_powder, id_varian) VALUES ('$idJenis', '$namaMenu', '$varian');");
						$result = $query->query("SELECT id_powder FROM powder WHERE id_jenis = '$idJenis' AND nama_powder = '$namaMenu' AND id_varian = '$varian' ORDER BY id_powder DESC");

						$row = mysqli_fetch_assoc($result);

						if (isset($_POST['penyajian'])) 
						{
							$arr = $_POST['penyajian'];
							$harga = [];
							if (isset($_POST['basic']))
								$harga[1] = $_POST['basic'];
							if (isset($_POST['pm']))
								$harga[2] = $_POST['pm'];
							if (isset($_POST['hot']))
								$harga[3] = $_POST['hot'];
							if (isset($_POST['yakult']))
								$harga[4] = $_POST['yakult'];
							if (isset($_POST['juice']))
								$harga[5] = $_POST['juice'];

							foreach ($arr as $cel) 
							{
								$add = mysqli_query($query, "INSERT INTO detail_penyajian(id_powder, id_penyajian, harga) VALUES('$row[id_powder]', '$cel', '$harga[$cel]')");
							}
						}

						$this->session->set_flashdata('flash','Data Menu Berhasil Ditambah');
					}

					echo "<script>window.location='".base_url('index.php/c_admin/inventory')."'</script>";
				}
				?>

				<script>
					
					$(document).ready(function() {
						$("#adi").multiselect({
							onChange: function(element, checked) {
								var brands = $('#adi option:selected');
								var selected = [];
								$(brands).each(function(index, brand) {
									selected.push([$(this).val()]);
								});
								$(".aktif").css("display", "none");
								$.each(selected, (k, v) => {
									console.log(v[0]);
									if (v[0] == 1)
										$("#form-basic").css("display", "block");
									else if (v[0] == 2)
										$("#form-pm").css("display", "block");
									else if (v[0] == 3)
										$("#form-hot").css("display", "block");
									else if (v[0] == 4)
										$("#form-yakult").css("display", "block");
									else if (v[0] == 5)
										$("#form-juice").css("display", "block");
								})
							}
						});
						$(function() {
							$('#pemakaian_powder').change(function() {
								$('.form').hide();
								$('#' + $(this).val()).show();
								$('#' + $(this)).required = true;
							});
						});
					});
					<?php
					$data = $query->query("SELECT id_varian, nama_varian, id_region FROM varian_powder");
					$result = [];
					while ($d = $output = mysqli_fetch_array($data)) {
						array_push($result, [$d["id_varian"], $d["nama_varian"], $d["id_region"]]);
					};
					$encode = json_encode($result);
					// print_r($encode);

					echo "var temp=JSON.parse('$encode');console.log(temp);";
					// echo $data;
					?>
					$('select[name=id_region]').on('change', function() {
						// alert(this.value);
						let id_region = this.value;
						$('select[name=id_powder]').html("");

						$('select[name=id_powder]').append("<option>-- Pilih Powder --</option>");
						$.each(temp, (k, v) => {
							if (v[2] == id_region)
								// console.log(v);
								$('select[name=id_powder]').append("<option value='" + v[0] + "'>" + v[1] + "</option>");

						})
					});
				</script>