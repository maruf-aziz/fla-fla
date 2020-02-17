	<div class="page-title">
		<div class="title_left">
			<h3>Data Karyawan</h3>
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
					<h2>Karyawan</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link" title="Hide"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li><a class="close-link" title="Close"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>

				<div class="x_content">
					<a href="<?= base_url('index.php/c_admin/add_karyawan') ?>" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Add</a>

					<div class="table-responsive">
						<table class="table table-striped jambo_table bulk_action" id="myTable">
							<thead>
								<tr class="headings">
									<th class="column-title">No</th>
									<th class="column-title">Id Staff </th>
									<th class="column-title">Nama Karyawan </th>
									<th class="column-title">Username </th>
									<th class="column-title">Password </th>
									<th class="column-title">Kontak </th>
									<th class="column-title">Alamat </th>
									<th class="column-title">Email </th>
									<!-- <th class="column-title">Images</th> -->
									<th class="column-title">Actions</th>
								</tr>
							</thead>

							<tbody>
								<?php
								$no = 1;
								foreach ($data_karyawan as $key => $value) {
								?>
									<tr class="even pointer">
										<td style="width: 5%; text-align: center"><?= $no++ ?></td>
										<td><?= $value->id_staff ?></td>
										<td><?= $value->Nama ?></td>
										<td><?= $value->username ?></td>
										<td><?= $value->password ?></td>
										<td><?= $value->contact ?></td>
										<td><?= $value->alamat ?></td>
										<td><?= $value->email ?></td>
										<!-- <td><?= $value->image ?></td> -->
										<td>
											<a href="<?= base_url('index.php/c_admin/update_karyawan/' . $value->id_staff) ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>
											<a href="<?= base_url('index.php/c_admin/delete_karyawan/' . $value->id_staff) ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash"></i></a>
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