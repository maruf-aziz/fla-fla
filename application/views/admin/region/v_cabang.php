	<div class="page-title">
	  <div class="title_left">
	    <h3>Tables <small>Data Cabang</small></h3>
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
          <h2>Data <small>Cabang</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link" title="Hide"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link" title="Close"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">
          <a href="<?=base_url('index.php/c_admin/add_region')?>" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Add</a>

          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action" id="myTable">
              <thead>
                <tr class="headings">
                  <th class="column-title">No </th>
                  <th class="column-title">Nama Cabang </th>
                  <th class="column-title">Alamat </th>
                  <th class="column-title">Actions</th>
                </tr>
              </thead>

              <tbody>
              	<?php 
                  $no = 1;
              		foreach ($data_region as $key => $value) {
              			?>
              				<tr>
              					<td><?=$no++?></td>
              					<td><?=$value->nama_region?></td>
              					<td><?=$value->alamat?></td>
              					<td align="center">
              						<a href="<?=base_url('index.php/c_admin/update_region/'.$value->id_region)?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
              						<a href="<?=base_url('index.php/c_admin/delete_region/'.$value->id_region)?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash"></i></a>
              					</td>
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