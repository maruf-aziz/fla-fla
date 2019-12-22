          <?php

			$query = new mysqli('localhost', 'root', '', 'db_pos');

			function formatRupiah($profit)
			{
				if (is_numeric($profit)) {
					$format_rupiah = 'Rp ' . number_format($profit, '0', ',', '.');
					return $format_rupiah;
				} else {
					echo "Rp 0";
				}
			}
			?>

          <div class="row tile_count">
          	<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
          		<span class="count_top"><i class="fa fa-list"></i> Jumlah Menu | Topping</span>
          		<div class="count"><?= $powder . " | " . $topping ?></div>
          	</div>
          	<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
          		<span class="count_top"><i class="fa fa-money"></i> Total Profit</span>
          		<div class="count"><?= formatRupiah($profit) ?></div>
          	</div>
          	<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
          		<span class="count_top"><i class="fa fa-shopping-cart"></i> Today's Order</span>
          		<div class="count green"><?= $order ?></div>
          	</div>
          	<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
          		<span class="count_top"><i class="fa fa-user"></i> Karyawan</span>
          		<div class="count"><?= $karyawan ?></div>
          	</div>
          </div>
          <!-- /top tiles -->

          <div class="row">
          	<div class="col-md-12 col-sm-12 col-xs-12">
          		<div class="dashboard_graph">

          			<div class="row x_title">
          				<div class="col-md-6">
          					<h3>Network Activities <small>Graph title sub-title</small></h3>
          				</div>
          				<div class="col-md-6">
          					<div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
          						<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
          						<span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
          					</div>
          				</div>
          			</div>

          			<div class="col-md-9 col-sm-9 col-xs-12">
          				<div id="chart_plot_01" class="demo-placeholder"></div>
          			</div>
          			<div class="col-md-3 col-sm-3 col-xs-12 bg-white">
          				<div class="x_title">
          					<h2>Top Campaign Performance</h2>
          					<div class="clearfix"></div>
          				</div>

          				<div class="col-md-12 col-sm-12 col-xs-6">
          					<div>
          						<p>Facebook Campaign</p>
          						<div class="">
          							<div class="progress progress_sm" style="width: 76%;">
          								<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
          							</div>
          						</div>
          					</div>
          					<div>
          						<p>Twitter Campaign</p>
          						<div class="">
          							<div class="progress progress_sm" style="width: 76%;">
          								<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
          							</div>
          						</div>
          					</div>
          				</div>
          				<div class="col-md-12 col-sm-12 col-xs-6">
          					<div>
          						<p>Conventional Media</p>
          						<div class="">
          							<div class="progress progress_sm" style="width: 76%;">
          								<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
          							</div>
          						</div>
          					</div>
          					<div>
          						<p>Bill boards</p>
          						<div class="">
          							<div class="progress progress_sm" style="width: 76%;">
          								<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
          							</div>
          						</div>
          					</div>
          				</div>

          			</div>

          			<div class="clearfix"></div>
          		</div>
          	</div>

          </div>
          <br />

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
          							<table class="table table-striped jambo_table bulk_action">
          								<thead>
          									<tr class="headings">
          										<th class="column-title">Nama Menu </th>
          										<th class="column-title">Stok </th>
          									</tr>
          								</thead>

          								<tbody>
          									<?php
												$barang = $query->query("SELECT DISTINCT(p.nama_varian), p.id_varian, p.sisa, p.id_region 
																		FROM varian_powder p 
																		LEFT JOIN powder pd ON p.id_varian = pd.id_varian
																		LEFT JOIN detail_penyajian ON detail_penyajian.id_powder = pd.id_powder 
																		LEFT JOIN penyajian s ON detail_penyajian.id_penyajian = s.id_penyajian 
																		LEFT JOIN region r ON r.id_region = p.id_region 
																		WHERE p.id_region = '" . $value->id_region . "'");
												for ($x = 1; $x <= $hasil = mysqli_fetch_array($barang); $x++) {
												?>
          										<tr>
          											<td style="display:none"><?php echo $x ?></td>
          											<td><?php echo $hasil['nama_varian'] ?></td>
          											<td>
          												<?php
															if ($hasil['sisa'] > 20) {
																echo '<span class="label label-success">' . $hasil['sisa'] . '</span>';
															} elseif ($hasil['sisa'] >= 5 && $hasil['sisa'] <= 20) {
																echo '<span class="label label-warning">' . $hasil['sisa'] . '</span>';
															} elseif ($hasil['sisa'] < 5) {
																echo '<span class="label label-danger">' . $hasil['sisa'] . '</span>';
															}
															?>
          											</td>
          										</tr>
          									<?php }
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
          							<table class="table table-striped jambo_table bulk_action">
          								<thead>
          									<tr class="headings">
          										<th class="column-title">Nama Topping </th>
          										<th class="column-title">Stok </th>
          									</tr>
          								</thead>

          								<tbody>
          									<?php
												$barang = mysqli_query($query, "SELECT * FROM topping WHERE id_region = " . $value->id_region);
												for ($x = 1; $x <= $hasil = mysqli_fetch_array($barang); $x++) {
												?>
          										<tr>
          											<td style="display:none"><?php echo $x ?></td>
          											<td><?php echo $hasil['nama_topping'] ?></td>
          											<td>
          												<?php
															if ($hasil['sisa'] > 20) {
																echo '<span class="label label-success">' . $hasil['sisa'] . '</span>';
															} elseif ($hasil['sisa'] >= 5 && $hasil['sisa'] <= 20) {
																echo '<span class="label label-warning">' . $hasil['sisa'] . '</span>';
															} elseif ($hasil['sisa'] < 5) {
																echo '<span class="label label-danger">' . $hasil['sisa'] . '</span>';
															}
															?>
          											</td>
          										</tr>
          									<?php }
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
          							<table class="table table-striped jambo_table bulk_action">
          								<thead>
          									<tr class="headings">
          										<th class="column-title">Nama Topping </th>
          										<th class="column-title">Stok </th>
          									</tr>
          								</thead>

          								<tbody>
          									<?php
												$barang = mysqli_query($query, "SELECT * FROM ekstra WHERE id_region = " . $value->id_region);
												for ($x = 1; $x <= $hasil = mysqli_fetch_array($barang); $x++) {
												?>
          										<tr>
          											<td style="display:none"><?php echo $x ?></td>
          											<td><?php echo $hasil['nama_ekstra'] ?></td>
          											<td>
          												<?php
															if ($hasil['satuan'] == 'Liter') {
																if ($hasil['sisa'] > 10) {
																	echo '<span class="label label-success">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																} elseif ($hasil['sisa'] >= 5 && $hasil['sisa'] <= 10) {
																	echo '<span class="label label-warning">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																} elseif ($hasil['sisa'] < 5) {
																	echo '<span class="label label-danger">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																}
															} else if ($hasil['satuan'] == 'Cup') {
																if ($hasil['sisa'] > 10) {
																	echo '<span class="label label-success">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																} elseif ($hasil['sisa'] >= 5 && $hasil['sisa'] <= 10) {
																	echo '<span class="label label-warning">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																} elseif ($hasil['sisa'] < 5) {
																	echo '<span class="label label-danger">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																}
															} else if ($hasil['satuan'] == 'Botol') {
																if ($hasil['sisa'] > 10) {
																	echo '<span class="label label-success">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																} elseif ($hasil['sisa'] >= 5 && $hasil['sisa'] <= 10) {
																	echo '<span class="label label-warning">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																} elseif ($hasil['sisa'] < 5) {
																	echo '<span class="label label-danger">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																}
															} else if ($hasil['satuan'] == 'Bungkus') {
																if ($hasil['sisa'] > 10) {
																	echo '<span class="label label-success">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																} elseif ($hasil['sisa'] >= 5 && $hasil['sisa'] <= 10) {
																	echo '<span class="label label-warning">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																} elseif ($hasil['sisa'] < 5) {
																	echo '<span class="label label-danger">' . $hasil['sisa'] . '&nbsp;' . $hasil['satuan'] . '</span>';
																}
															}
															?>
          											</td>
          										</tr>
          									<?php }
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