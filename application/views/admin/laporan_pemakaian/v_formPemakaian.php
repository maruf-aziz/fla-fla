<div class="page-title">
	<div class="title_left">
		<h3>Tampil Laporan Pemakaian</h3>
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
				<h2><i class="fa fa-bars"></i> Isikan Data</h2>
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
				<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/c_admin/get_laporan_pemakaian') ?>">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tanggal <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 input-group date' id='myDatepicker2'>
								<input type="text" class="form-control" name="tanggal" id="tanggal" required="" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
            </div>
          </div>

          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Shift <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<select name="shift" id="shift" class="form-control" required>
            		<option value="">-- Pilih Shift --</option>
            		<option value="shift1">Shift 1</option>
            		<option value="shift2">Shift 2</option>
            		<option value="all">All</option>
            	</select>
            </div>
          </div>

          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Region <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            	<select class="form-control" name="reg" id="reg" required>
            		<option value="">-- Pilih Region --</option>
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

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button class="btn btn-primary" type="reset">Reset</button>
              <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>
          </div>

        </form>
			</div>
		</div>
	</div>
</div>
