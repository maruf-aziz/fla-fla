		<div class="page-title">
			<div class="title_left">
				<h3>Form Update Data Ekstra</h3>
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
						<h2>Update Data <small>Ekstra</small></h2>
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
							<a href="#" onclick="enable()" class="btn btn-warning btn-xs" id="active"><i class="fa fa-pencil"></i> Update</a>
						</div>
						<br />
						<form name="form_update" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left input-mask" method="post" action="<?= base_url('index.php/c_admin/update_ekstra/' . $ekstra->id_ekstra) ?>">
							<div class="row">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Ekstra <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-10 form-group has-feedback">
									<input type="text" class="form-control" id="inputSuccess3" placeholder="ex : Bubble" name="nama" required="" disabled="" value="<?= $ekstra->nama_ekstra ?>">
								</div>
								<!-- <div class="col-md-1 col-lg-1">
									<a class="btn btn-sm btn-info" onclick="enable_nama();"><i class="fa fa-pencil"></i></a>
								</div> -->
							</div>

							<div class="row">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Sisa Stok <span class="required">*</span></label>
								<div class="col-md-2 col-sm-2 col-xs-10 form-group has-feedback">
									<input type="number" class="form-control" id="inputSuccess2" placeholder="ex: 50000" name="stok" required="" disabled="" value="<?= $ekstra->sisa ?>">
									<input type="hidden" name="sisa" value="<?= $ekstra->sisa ?>">
								</div>

								<label class="control-label col-md-1 col-sm-1 col-xs-12" for="last-name">Satuan <span class="required">*</span></label>
								<div class="col-md-3 col-sm-3 col-xs-10 form-group has-feedback">
									<select class="form-control" name="satuan" required="" disabled="">
										<option value="<?= null ?>">-- PIlih Satuan --</option>
										<optgroup label="Satuan">
											<?php
											$options = array('Cup', 'Liter', 'Bungkus', 'Botol');

											for ($i = 0; $i < count($options); $i++) {
												$selected = ($ekstra->satuan == $options[$i]) ? 'selected' : '';
											?>

												<option value="<?= $options[$i] ?>" <?= $selected; ?> class=""><?= $options[$i] ?></option>

											<?php
											}
											?>
										</optgroup>
									</select>
								</div>
								<!-- <div class="col-md-1 col-lg-1">
									<a class="btn btn-sm btn-info" onclick="enable_satuan();"><i class="fa fa-pencil"></i></a>
								</div> -->
							</div>

							<div class="row">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Penambahan <span class="required">*</span></label>
								<div class="col-md-2 col-sm-2 col-xs-10 form-group has-feedback">
									<input type="number" class="form-control" id="inputSuccess3" placeholder="ex : 20" name="penambahan" required="" disabled="">
								</div>
								<!-- <div class="col-md-1 col-lg-1">
									<a class="btn btn-sm btn-info" onclick="enable_penambahan();"><i class="fa fa-pencil"></i></a>
								</div> -->
							</div>

							<div class="row">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Cabang <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-10 form-group has-feedback">
									<input type="hidden" name="id_region" value="<?= $ekstra->id_region ?>">
									<select class="form-control" required="" disabled="">
										<option>-- PIlih Region --</option>
										<optgroup label="Region">
											<?php
											foreach ($region as $key => $value) {
												$selected = ($ekstra->id_region == $value->id_region) ? 'selected' : '';
											?>
												<option value="<?= $value->id_region ?>" <?= $selected ?> class=""><?= $value->nama_region ?></option>
											<?php
											}
											?>
										</optgroup>
									</select>
								</div>
							</div>

							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<a href="<?= base_url('index.php/c_admin/inventory') ?>"><button class="btn btn-primary" type="button">Cancel</button></a>
									<button class="btn btn-primary" type="reset" id="reset">Reset</button>
									<button type="submit" name="submit" class="btn btn-success" id="submit">Submit</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			function enable() {
				document.form_update.nama.disabled = false;
				document.form_update.satuan.disabled = false;
				document.form_update.penambahan.disabled = false;
			}
			$(document).ready(function() {
           		$("#reset").hide();
           		$("#submit").hide();

           		$("#active").click(function() {
           			$("#reset").show();
           			$("#submit").show();
					$("#active").disabled = true;
           		})
           	})
		</script>