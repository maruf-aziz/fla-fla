<style>
	th {
		padding: 5px;
		border-bottom: 2px solid #8ebf42;
		text-align: center;
	}
</style>

<div class="page-title">
	<div class="title_left">
		<h3>Form Upload </h3>
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
			<label style="margin-top:5px;float: left;font-weight: normal;font-size: 20px;">Download Format Import</label>
			<div class="col-sm-offset-7">
				<a href="#" class="mb-xs mt-xs mr-xs modal-basic btn btn-info info">Info &nbsp; <i class="fa fa-info-circle"></i></a>
				<a href="<?= base_url() . 'index.php/C_admin/powder' ?>" download="Powder.csv"><button class="btn btn-primary" id="powder">Powder &nbsp; <i class="fa fa-cloud-download"></i></button></a>&nbsp;
				<a href="<?= base_url() . 'index.php/C_admin/topping' ?>" download="Topping.csv"><button class="btn btn-warning" id="topping">Topping &nbsp; <i class="fa fa-cloud-download"></i></button></a>&nbsp;
				<a href="<?= base_url() . 'index.php/C_admin/ekstra' ?>" download="Ekstra.csv"><button class="btn btn-success" id="ekstra">Ekstra &nbsp; <i class="fa fa-cloud-download"></i></button></a>&nbsp;
			</div>
		</div>
	</div>
</div>

<div class="clearfix"></div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Import Data</h2>
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
				<div class="x_content" role="tabpanel" data-example-id="toggleable-tabs">
					<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
						<li role="presentation" class="active">
							<a href="#Powder" data-toggle="tab" id="powder" aria-expanded="true">Powder</a>
						</li>
						<li>
							<a href="#Topping" data-toggle="tab" id="topping" aria-expanded="true">Topping</a>
						</li>
						<li>
							<a href="#Ekstra" data-toggle="tab" id="ekstra" aria-expanded="true">Ekstra</a>
						</li>
					</ul>

					<div class="tab-content" id="myTabContent">
						<div id="Powder" class="tab-pane active">
							<p>Drag multiple files to the box below for multi upload or click to select files to import Powder data.</p>
							<form action="<?= base_url() . 'index.php/C_admin/upload_powder' ?>" class="dropzone"></form>
							<br />
						</div>
						<div id="Topping" class="tab-pane">
							<p>Drag multiple files to the box below for multi upload or click to select files to import Topping data.</p>
							<form action="<?= base_url() . 'index.php/C_admin/upload_topping' ?>" class="dropzone"></form>
							<br />
						</div>
						<div id="Ekstra" class="tab-pane">
							<p>Drag multiple files to the box below for multi upload or click to select files to import Ekstra data.</p>
							<form action="<?= base_url() . 'index.php/C_admin/upload_ekstra' ?>" class="dropzone"></form>
							<br />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>