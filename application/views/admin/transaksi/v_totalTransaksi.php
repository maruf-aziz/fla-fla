						<div class="row top_tiles" style="margin: 1px;">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-shopping-cart"></i></div>
                  <div class="count"><?=$jumlah?></div>
                  <br>
                  <h3>Total Penjualan Hari Ini</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-money"></i></div>
                  <div class="count">Rp. <small><?=$omset?></small></div>
                  <br>
                  <h3>Omset Penjualan</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-circle-o-notch"></i></div>
                  <div class="count"><?=$proses?></div>
                  <br>
                  <h3>Dalam Proses</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?=$success?></div>
                  <br>
                  <h3>Pesanan Selesai</h3>
                </div>
              </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><i class="fa fa-bars"></i> Transaksi <small>Hari Ini</small></h2>
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


                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    	<?php 
                    		foreach ($region as $key => $value) {
                    			?>
                    				<li role="presentation" <?php if ($key == 0) { ?> class="active" <?php } ?>>
                    					<a href="#tab_content<?=$value->id_region?>" id="<?=$value->nama_region?>-tab" role="tab" data-toggle="tab" aria-expanded="true"><?=$value->nama_region?></a>
                    				</li>
                    			<?php
                    		}
                    	?>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                    	<?php
                    		$query = new mysqli('localhost', 'root','', 'db_pos');
                    		foreach ($region as $key => $value) {
                    			# code...
                    			?>

                    				<div role="tabpanel" <?php if ($key == 0) { ?> class="tab-pane fade active in" <?php } else { ?> class="tab-pane fade" <?php } ?> id="tab_content<?=$value->id_region?>" aria-labelledby="<?=$value->nama_region?>-tab">
			                        <table class="table table-striped jambo_table bulk_action display">
									              <thead>
									                <tr class="headings">
									                  <th class="column-title">No </th>
									                  <th class="column-title">Karyawan </th>
									                  <th class="column-title">Nama Pembeli </th>
									                  <th class="column-title">Tanggal</th>
									                  <th class="column-title">Waktu</th>
									                  <th class="column-title">Nama Menu</th>
									                  <th class="column-title">Sajian</th>
									                  <th class="column-title">Nama Topping</th>
									                  <th class="column-title">Harga</th>
									                  <th class="column-title">Status</th>
									                </tr>
									              </thead>

									              <tbody>
									              	<?php
									              		$currentDate = date('Y/m/d');
																		$hasil = $query->query("SELECT dt.no_nota, s.Nama, j.tanggal, j.waktu, j.nama_pembeli, p.nama_powder, sj.nama_penyajian, t.nama_topping, dt.jumlah, j.status 
																					   FROM detail_transaksi dt
																					   JOIN jual j ON dt.no_nota = j.no_nota
																					   JOIN staff s ON s.id_staff = j.id_staff
																					   JOIN powder p ON p.id_powder = dt.id_powder
																					   LEFT JOIN penyajian sj ON sj.id_penyajian = dt.id_penyajian
																					   LEFT JOIN topping t ON t.id_topping = dt.id_topping
																					   WHERE (j.tanggal = '$currentDate') AND dt.id_region = " . $value->id_region);
																		for ($i = 1; $i <= $out = mysqli_fetch_array($hasil); $i++) {
																			?>
																		<tr class="gradeX">
																			<td><?php echo $i ?></td>
																			<td><?php echo $out['Nama']; ?></td>
																			<td><?php echo $out['nama_pembeli']; ?></td>
																			<td><?php echo $out['tanggal']; ?></td>
																			<td><?php echo $out['waktu']; ?></td>
																			<td><?php echo $out['nama_powder']; ?></td>
																			<td>
																				<?php
																						if ($out['nama_penyajian'] == NULL) {
																							echo "--";
																						} else {
																							echo $out['nama_penyajian'];
																						}
																						?>
																			</td>
																			<td>
																				<?php
																						if ($out['nama_topping'] == NULL) {
																							echo "--";
																						} else {
																							echo $out['nama_topping'];
																						}
																						?>
																			</td>
																			<td><?= 'Rp ' . number_format($out['jumlah'], '0', ',', '.'); ?>
																			<td>
																				<?php
																					if ($out['status'] == "Success") {
																						echo '<span class="label label-success">Success</span>';
																					} else {
																						echo '<span class="label label-warning">Process</span>';
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