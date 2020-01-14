           <div class="page-title">
           	<div class="title_left">
           		<h3>User <small>Profil</small></h3>
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

           <div class="row top_tiles">
           	<?php
				function formatRupiah($omset_hari)
				{
					if (is_numeric($omset_hari)) {
						$format_rupiah = 'Rp ' . number_format($omset_hari, '0', ',', '.');
						return $format_rupiah;
					} else {
						echo "Rp 0";
					}
				}

				function formatRupiah1($omset_bulanan)
				{
					if (is_numeric($omset_bulanan)) {
						$format_rupiah = 'Rp ' . number_format($omset_bulanan, '0', ',', '.');
						return $format_rupiah;
					} else {
						echo "Rp 0";
					}
				}
				?>
           	<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
           		<div class="tile-stats">
           			<div class="icon"><i class="fa fa-shopping-cart"></i></div>
           			<div class="count"><?= $total_penjualan ?></div>
           			<br>
           			<h3>Total Penjualan Hari Ini</h3>
           		</div>
           	</div>
           	<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
           		<div class="tile-stats">
           			<div class="icon"><i class="fa fa-money"></i></div>
           			<div class="count"><?= formatRupiah($omset_hari) ?></div>
           			<br>
           			<h3>Omset Hari Ini</h3>
           		</div>
           	</div>
           	<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
           		<div class="tile-stats">
           			<div class="icon"><i class="fa fa-money"></i></div>
           			<div class="count"><?= formatRupiah1($omset_bulanan) ?></div>
           			<br>
           			<h3>Omset Bulan Ini</h3>
           		</div>
           	</div>
           </div>

           <div class="clearfix"></div>

           <div class="row">
           	<div class="col-md-12 col-sm-12 col-xs-12">
           		<div class="x_panel">
           			<div class="x_title">
           				<h2>Profile <small><?= $this->fungsi->user_login()->Nama ?></small></h2>
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

           				<div class="pull-right">
           					<a href="#" onclick="enable()" class="btn btn-warning btn-xs" id="active"><i class="fa fa-pencil"></i> Update</a>
           					<a href="#" onclick="disable()" class="btn btn-danger btn-xs" id="deactive"><i class="fa fa-reply"></i> Cancel</a>
           				</div>

           				<form id="demo-form2" name="form_profile" data-parsley-validate class="form-horizontal form-label-left input-mask" method="post" action="<?= base_url('index.php/c_admin/update_profil/' . $admin->id_staff) ?>">
           					<div class="row">
           						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama <span class="required">*</span></label>
           						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
           							<input type="text" class="form-control" id="inputSuccess3" placeholder="ex : maruf" name="nama" disabled="" value="<?= $admin->Nama ?>">
           						</div>
           					</div>

           					<div class="row">
           						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username <span class="required">*</span></label>
           						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
           							<input type="text" class="form-control" id="inputSuccess3" placeholder="ex : wisemajor" name="username" disabled="" value="<?= $admin->username ?>">
           						</div>
           					</div>

           					<div class="row">
           						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email <span class="required">*</span></label>
           						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
           							<input type="text" class="form-control" id="inputSuccess3" placeholder="ex : maruf@gmail.com" name="email" disabled="" value="<?= $admin->email ?>">
           						</div>
           					</div>

           					<div class="row">
           						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Contact <span class="required">*</span></label>
           						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
           							<input type="text" class="form-control" id="inputSuccess3" placeholder="ex : 0823232325" name="contact" disabled="" value="<?= $admin->contact ?>">
           						</div>
           					</div>

           					<div class="row">
           						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat <span class="required">*</span></label>
           						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
           							<input type="text" class="form-control" id="inputSuccess3" placeholder="ex : jl super raya no.166" name="alamat" disabled="" value="<?= $admin->alamat ?>">
           						</div>
           					</div>

           					<div class="row">
           						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name" style="margin-top: 20px;">Password <span class="required">*</span></label>
           						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
           							<label style="color: red;"><small><i>Kosongkan Jika Tidak Ingin Mengubah Password</i></small></label>
           							<input type="password" class="form-control" id="inputSuccess3" placeholder="ex : xxxxxxxx" name="password" disabled="">
           						</div>
           					</div>


           					<div class="ln_solid"></div>
           					<div class="form-group">
           						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
           							<a href="<?= base_url('index.php/c_admin') ?>"><button class="btn btn-primary" type="button">Back</button></a>
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
           		document.form_profile.nama.disabled = false;
           		document.form_profile.username.disabled = false;
           		document.form_profile.email.disabled = false;
           		document.form_profile.contact.disabled = false;
           		document.form_profile.alamat.disabled = false;
           		document.form_profile.password.disabled = false;
           	}

           	function disable() {
           		document.form_profile.nama.disabled = true;
           		document.form_profile.username.disabled = true;
           		document.form_profile.email.disabled = true;
           		document.form_profile.contact.disabled = true;
           		document.form_profile.alamat.disabled = true;
           		document.form_profile.password.disabled = true;
           	}

           	$(document).ready(function() {
           		$("#reset").hide();
           		$("#submit").hide();
           		$("#deactive").hide();
           	})

           	$("#active").click(function() {
           		$("#reset").show();
           		$("#submit").show();
           		$("#deactive").show();
           		$("#active").hide();
           	})

           	$("#deactive").click(function() {
           		$("#reset").hide();
           		$("#submit").hide();
           		$("#deactive").hide();
           		$("#active").show();
           	})
           </script>