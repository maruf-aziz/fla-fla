						<?php

						$query = new mysqli('localhost', 'root', '', 'db_pos');

						?>

						<div class="row top_tiles" style="margin: 1px;">
							<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="tile-stats">
									<div class="icon"><i class="fa fa-glass" style="color: #008B8B;"></i></div>
									<div class="count"><?= $basic ?></div>
									<br>
									<h3>Basic</h3>
								</div>
							</div>
							<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="tile-stats">
									<div class="icon"><i class="fa fa-glass" style="color: #008B8B;"></i></div>
									<div class="count"><?= $pm ?><small></small></div>
									<br>
									<h3>Premium</h3>
								</div>
							</div>
							<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="tile-stats">
									<div class="icon"><i class="fa fa-glass" style="color: #008B8B;"></i></div>
									<div class="count"><?= $soklat ?></div>
									<br>
									<h3>Soklat</h3>
								</div>
							</div>
							<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="tile-stats">
									<div class="icon"><i class="fa fa-glass" style="color: #008B8B;"></i></div>
									<div class="count"><?= $coklat_pm ?></div>
									<br>
									<h3>Choco Premium</h3>
								</div>
							</div>
							<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="tile-stats">
									<div class="icon"><i class="fa fa-glass" style="color: #008B8B;"></i></div>
									<div class="count"><?= $yakult ?></div>
									<br>
									<h3>Yakult</h3>
								</div>
							</div>
							<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="tile-stats">
									<div class="icon"><i class="fa fa-glass" style="color: #008B8B;"></i></div>
									<div class="count"><?= $juice ?></div>
									<br>
									<h3>Fresh And Juice</h3>
								</div>
							</div>
						</div>

						<div class="row">

							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="x_panel tile">
									<div class="x_title">
										<h2>Daftar Menu</h2>
										<ul class="nav navbar-right panel_toolbox">
											<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
											</li>
											<li><a class="close-link"><i class="fa fa-close"></i></a>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>

									<div class="x_content">
										<a href="<?= base_url('index.php/c_admin/insert_powder') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> ADD</a>
									</div>

									<div class="x_content" role="tabpanel" data-example-id="togglable-tabs">
										<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
											<?php
											foreach ($region as $key => $value) {
											?>
												<li role="presentation" <?php if ($key == 0) { ?> class="active" <?php } ?>>
													<a href="#tab_menu<?= $value->id_region ?>" id="<?= $value->nama_region ?>-tab" role="tab" data-toggle="tab" aria-expanded="true"><?= $value->nama_region ?></a>
												</li>
											<?php
											}
											?>
										</ul>
										<div id="myTabContent" class="tab-content">
											<?php
											foreach ($region as $key => $value) {
											?>

												<div role="tabpanel" <?php if ($key == 0) { ?> class="tab-pane fade active in" <?php } else { ?> class="tab-pane fade" <?php } ?> id="tab_menu<?= $value->id_region ?>" aria-labelledby="<?= $value->nama_region ?>-tab">
													<table class="table table-striped jambo_table bulk_action sider">
														<thead>
															<tr class="headings">
																<th class="column-title">Nama Menu </th>
																<th class="column-title">Jenis </th>
																<th class="column-title">Sisa </th>
																<th class="column-title">Action </th>
															</tr>
														</thead>

														<tbody>
															<?php
															$kueriMenu = mysqli_query($query, "SELECT DISTINCT(p.nama_varian), p.id_varian, j.nama_jenis, p.sisa, p.id_region 
																			FROM varian_powder p 
																			LEFT JOIN powder pd ON p.id_varian = pd.id_varian
																			LEFT JOIN jenis_menu j ON pd.id_jenis = j.id_jenis 
																			LEFT JOIN detail_penyajian ON detail_penyajian.id_powder = pd.id_powder 
																			LEFT JOIN penyajian s ON detail_penyajian.id_penyajian = s.id_penyajian 
																			LEFT JOIN region r ON r.id_region = p.id_region 
																			WHERE p.id_region = '" . $value->id_region . "' ORDER BY j.id_jenis ");
															for ($x = 1; $x <= $menu = mysqli_fetch_assoc($kueriMenu); $x++) {
															?>
																<tr class="gradeX">
																	<td><?php echo $menu['nama_jenis'] ?></td>
																	<td><?php echo $menu['nama_varian'] ?></td>
																	<td><?php echo $menu['sisa'] ?></td>
																	<td>
																		<a href="<?= base_url('index.php/c_admin/update_varian/' . $menu['id_varian'] . '/' . $menu['id_region']) ?>" class="btn btn-xs btn-success"><i class="fa fa-search"></i></a>
																		<a href="<?= base_url('index.php/c_admin/delete_varian/' . $menu['id_varian']) ?>" class="tombol-hapus btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>
																	</td>
																</tr>
															<?php
															}
															?>
														</tbody>
													</table>
												</div>

											<?php
											}
											?>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="x_panel tile">
									<div class="x_title">
										<h2>Daftar Topping</h2>
										<ul class="nav navbar-right panel_toolbox">
											<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
											</li>
											<li><a class="close-link"><i class="fa fa-close"></i></a>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>

									<div class="x_content">
										<a href="<?= base_url('index.php/c_admin/insert_topping') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> ADD</a>
									</div>

									<div class="x_content" role="tabpanel" data-example-id="togglable-tabs">
										<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
											<?php
											foreach ($region as $key => $value) {
											?>
												<li role="presentation" <?php if ($key == 0) { ?> class="active" <?php } ?>>
													<a href="#tab_topping<?= $value->id_region ?>" id="<?= $value->nama_region ?>-tab" role="tab" data-toggle="tab" aria-expanded="true"><?= $value->nama_region ?></a>
												</li>
											<?php
											}
											?>
										</ul>
										<div id="myTabContent" class="tab-content">
											<?php
											foreach ($region as $key => $value) {
											?>

												<div role="tabpanel" <?php if ($key == 0) { ?> class="tab-pane fade active in" <?php } else { ?> class="tab-pane fade" <?php } ?> id="tab_topping<?= $value->id_region ?>" aria-labelledby="<?= $value->nama_region ?>-tab">
													<table class="table table-striped jambo_table bulk_action sider">
														<thead>
															<tr class="headings">
																<th class="column-title">Nama Topping </th>
																<th class="column-title">Stok </th>
																<th class="column-title">Action </th>
															</tr>
														</thead>

														<tbody>
															<?php

															$kueriTopping = mysqli_query($query, "SELECT * FROM topping WHERE id_region = " . $value->id_region);
															for ($i = 1; $i <= $topping = mysqli_fetch_array($kueriTopping, MYSQLI_ASSOC); $i++) {
															?>
																<tr class="gradeX">
																	<!-- <td style="display:none;"><?php echo $i ?></td>
																						<td style="display:none;" id="aidi"><?php echo $topping['id_topping']; ?></td> -->
																	<td><?php echo $topping['nama_topping']; ?></td>
																	<td><?php echo $topping['sisa'] ?></td>
																	<td>
																		<a href="<?= base_url('index.php/c_admin/update_topping/' . $topping['id_topping']) ?>" class="mb-xs mt-xs mr-xs btn btn-xs btn-success"><i class="fa fa-search"></i></a>
																		<!-- <a href="#"><button type="button" class="btn-edit-topping mb-xs mt-xs mr-xs btn btn-xs btn-warning"><i class="fa fa-pencil"></i></button></a> -->
																		<a href="<?= base_url('index.php/c_admin/delete_topping/' . $topping['id_topping']) ?>" class="tombol-hapus mb-xs mt-xs mr-xs btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>
																	</td>
																</tr>
															<?php
															}

															?>
														</tbody>
													</table>
												</div>

											<?php
											}
											?>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="x_panel tile">
									<div class="x_title">
										<h2>Daftar Ekstra</h2>
										<ul class="nav navbar-right panel_toolbox">
											<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
											</li>
											<li><a class="close-link"><i class="fa fa-close"></i></a>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>

									<div class="x_content">
										<a href="<?= base_url('index.php/c_admin/insert_ekstra') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> ADD</a>
									</div>

									<div class="x_content" role="tabpanel" data-example-id="togglable-tabs">
										<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
											<?php
											foreach ($region as $key => $value) {
											?>
												<li role="presentation" <?php if ($key == 0) { ?> class="active" <?php } ?>>
													<a href="#tab_ekstra<?= $value->id_region ?>" id="<?= $value->nama_region ?>-tab" role="tab" data-toggle="tab" aria-expanded="true"><?= $value->nama_region ?></a>
												</li>
											<?php
											}
											?>
										</ul>
										<div id="myTabContent" class="tab-content">
											<?php
											foreach ($region as $key => $value) {
											?>

												<div role="tabpanel" <?php if ($key == 0) { ?> class="tab-pane fade active in" <?php } else { ?> class="tab-pane fade" <?php } ?> id="tab_ekstra<?= $value->id_region ?>" aria-labelledby="<?= $value->nama_region ?>-tab">
													<table class="table table-striped jambo_table bulk_action sider">
														<thead>
															<tr class="headings">
																<th class="column-title">Nama Ekstra </th>
																<th class="column-title">Stok </th>
																<th class="column-title">Action </th>
															</tr>
														</thead>

														<tbody>
															<?php
															$ekstra = mysqli_query($query, "SELECT * FROM ekstra WHERE id_region = " . $value->id_region);
															while ($hasil = mysqli_fetch_array($ekstra)) {
															?>
																<tr class="gradeX">
																	<td><?php echo $hasil['nama_ekstra']; ?></td>
																	<td><?php echo $hasil['sisa'] ?> <?php echo $hasil['satuan'] ?></td>
																	<td>
																		<a href="<?= base_url('index.php/c_admin/update_ekstra/' . $hasil['id_ekstra']) ?>" class="btn-detail-ekstra mb-xs mt-xs mr-xs btn btn-xs btn-success"><i class="fa fa-search"></i></a>
																		<a href="<?= base_url('index.php/c_admin/delete_ekstra/' . $hasil['id_ekstra']) ?>" class="tombol-hapus btn-hapus-ekstra mb-xs mt-xs mr-xs btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>
																	</td>
																</tr>
															<?php
															}
															?>
														</tbody>
													</table>
												</div>

											<?php
											}
											?>
										</div>
									</div>
								</div>
							</div>


						</div>

						<div class="row">

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="x_panel tile">
									<div class="x_title">
										<h2>Susu Putih</h2>
										<ul class="nav navbar-right panel_toolbox">
											<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
											</li>
											<li><a class="close-link"><i class="fa fa-close"></i></a>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>

									<div class="x_content" role="tabpanel" data-example-id="togglable-tabs">
										<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
											<?php
											foreach ($region as $key => $value) {
											?>
												<li role="presentation" <?php if ($key == 0) { ?> class="active" <?php } ?>>
													<a href="#tab_susu_putih<?= $value->id_region ?>" id="<?= $value->nama_region ?>-tab" role="tab" data-toggle="tab" aria-expanded="true"><?= $value->nama_region ?></a>
												</li>
											<?php
											}
											?>
										</ul>
										<div id="myTabContent" class="tab-content">
											<?php
											foreach ($region as $key => $value) {
											?>

												<div role="tabpanel" <?php if ($key == 0) { ?> class="tab-pane fade active in" <?php } else { ?> class="tab-pane fade" <?php } ?> id="tab_susu_putih<?= $value->id_region ?>" aria-labelledby="<?= $value->nama_region ?>-tab">
													<table class="table table-striped jambo_table bulk_action">
														<thead>
															<tr class="headings">
																<th class="column-title">Susu Putih </th>
																<th class="column-title">Basic </th>
																<th class="column-title">Pure Milk </th>
															</tr>
														</thead>

														<tbody>
															<?php
															$total_bs = 0;
															$total_pm = 0;
															$data = $query->query("SELECT e.nama_ekstra,j.nama_jenis, de.basic, de.pm, de.pemakaian, r.id_region
																									FROM detail_ekstra de
																									JOIN jenis_menu j ON j.id_jenis = de.id_jenis
																									JOIN ekstra e ON e.id_ekstra = de.id_ekstra
																									LEFT JOIN region r ON r.id_region = e.id_region
																									WHERE (e.nama_ekstra = 'Susu Putih')
																									AND (j.nama_jenis = 'Basic' OR j.nama_jenis = 'Premium' OR j.nama_jenis = 'Yakult') 
																									AND (de.basic != 1 OR de.pm != 1)
																									AND e.id_region = '" . $value->id_region . "'
																									ORDER BY j.nama_jenis");
															while ($tampil = mysqli_fetch_array($data)) {
																$total_bs = $total_bs + $tampil['basic'];
																$total_pm = $total_pm + $tampil['pm'];
															?>
																<tr>
																	<td><?= $tampil['nama_jenis'] ?></td>
																	<td style="text-align:center"><?= $tampil['basic'] ?></td>
																	<td style="text-align:center"><?= $tampil['pm'] ?></td>
																</tr>
															<?php
															}
															?>
															<tr>
																<td colspan="3"></td>
															</tr>
															<tr>
																<td>TOTAL SUSU</td>
																<td style="text-align:center"><?= $total_bs ?></td>
																<td style="text-align:center"><?= $total_pm ?></td>
															</tr>
														</tbody>
													</table>
												</div>

											<?php
											}
											?>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="x_panel tile">
									<div class="x_title">
										<h2>Susu Coklat</h2>
										<ul class="nav navbar-right panel_toolbox">
											<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
											</li>
											<li><a class="close-link"><i class="fa fa-close"></i></a>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>

									<div class="x_content" role="tabpanel" data-example-id="togglable-tabs">
										<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
											<?php
											foreach ($region as $key => $value) {
											?>
												<li role="presentation" <?php if ($key == 0) { ?> class="active" <?php } ?>>
													<a href="#tab_susu_coklat<?= $value->id_region ?>" id="<?= $value->nama_region ?>-tab" role="tab" data-toggle="tab" aria-expanded="true"><?= $value->nama_region ?></a>
												</li>
											<?php
											}
											?>
										</ul>
										<div id="myTabContent" class="tab-content">
											<?php
											foreach ($region as $key => $value) {
											?>

												<div role="tabpanel" <?php if ($key == 0) { ?> class="tab-pane fade active in" <?php } else { ?> class="tab-pane fade" <?php } ?> id="tab_susu_coklat<?= $value->id_region ?>" aria-labelledby="<?= $value->nama_region ?>-tab">
													<table class="table table-striped jambo_table bulk_action">
														<thead>
															<tr class="headings">
																<th class="column-title">Susu Coklat </th>
																<th class="column-title">Basic </th>
																<th class="column-title">Pure Milk </th>
															</tr>
														</thead>

														<tbody>
															<?php
															$total_bs = 0;
															$total_pm = 0;
															$data = $query->query("SELECT e.nama_ekstra,j.nama_jenis, de.basic, de.pm, de.pemakaian, r.id_region
																									FROM detail_ekstra de
																									JOIN jenis_menu j ON j.id_jenis = de.id_jenis
																									JOIN ekstra e ON e.id_ekstra = de.id_ekstra
																									LEFT JOIN region r ON r.id_region = e.id_region
																									WHERE (e.nama_ekstra = 'Susu Coklat')
																									AND (j.nama_jenis = 'Soklat' OR j.nama_jenis = 'Choco Premium') 
																									AND (de.basic != 1 OR de.pm != 1)
																									AND e.id_region = '" . $value->id_region . "'
																									ORDER BY j.nama_jenis");
															while ($tampil = mysqli_fetch_array($data)) {
																$total_bs = $total_bs + $tampil['basic'];
																$total_pm = $total_pm + $tampil['pm'];
															?>
																<tr>
																	<td><?= $tampil['nama_jenis'] ?></td>
																	<td style="text-align:center"><?= $tampil['basic'] ?></td>
																	<td style="text-align:center"><?= $tampil['pm'] ?></td>
																</tr>
															<?php
															}

															?>
															<tr>
																<td colspan="3"></td>
															</tr>
															<tr>
																<td>TOTAL SUSU</td>
																<td style="text-align:center"><?= $total_bs ?></td>
																<td style="text-align:center"><?= $total_pm ?></td>
															</tr>
														</tbody>
													</table>
												</div>

											<?php
											}
											?>
										</div>
									</div>
								</div>
							</div>

						</div>