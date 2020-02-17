<div class="row">
    <div class="col-sm-6 mb-4 mb-xl-0">
        <div class="d-lg-flex align-items-center">
            <div>
                <h3 class="text-dark font-weight-bold mb-2">Stok Menu!</h3>
                <h6 class="font-weight-normal mb-2">Last login was 23 hours ago. View details</h6>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
	<div class="col-lg-6 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Menu Basic</h4>
	      <div class="table-responsive">
	        <table class="table table-hover">
	          <thead>
	            <tr bgcolor="aqua">
	              <th>Nama Menu</th>
	              <th>Stok Awal</th>
	              <th>Sisa</th>
	            </tr>
	          </thead>
	          <tbody>
	           		<?php
	           			foreach ($basic as $key => $value) {
	           				?>	
	           					<tr>
	           						<td><?=$value->nama_powder?></td>
	           						<td><?=$value->stock_awal?></td>
	           						<td><?=$value->sisa?></td>
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

	<div class="col-lg-6 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Menu Premium</h4>
	      <div class="table-responsive">
	        <table class="table table-hover">
	          <thead>
	            <tr bgcolor="aqua">
	              <th>Nama Menu</th>
	              <th>Stok Awal</th>
	              <th>Sisa</th>
	            </tr>
	          </thead>
	          <tbody>
	            	<?php
	           			foreach ($premium as $key => $value) {
	           				?>	
	           					<tr>
	           						<td><?=$value->nama_powder?></td>
	           						<td><?=$value->stock_awal?></td>
	           						<td><?=$value->sisa?></td>
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

	<div class="col-lg-6 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Menu Soklat</h4>
	      <div class="table-responsive">
	        <table class="table table-hover">
	          <thead>
	            <tr bgcolor="aqua">
	              <th>Nama Menu</th>
	              <th>Stok Awal</th>
	              <th>Sisa</th>
	            </tr>
	          </thead>
	          <tbody>
	          		<?php
	           			foreach ($soklat as $key => $value) {
	           				?>	
	           					<tr>
	           						<td><?=$value->nama_powder?></td>
	           						<td><?=$value->stock_awal?></td>
	           						<td><?=$value->sisa?></td>
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

	<div class="col-lg-6 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Menu Yakult</h4>
	      <div class="table-responsive">
	        <table class="table table-hover">
	          <thead>
	            <tr bgcolor="aqua">
	              <th>Nama Menu</th>
	              <th>Stok Awal</th>
	              <th>Sisa</th>
	            </tr>
	          </thead>
	          <tbody>
	          		<?php
	           			foreach ($yakult as $key => $value) {
	           				?>	
	           					<tr>
	           						<td><?=$value->nama_powder?></td>
	           						<td><?=$value->stock_awal?></td>
	           						<td><?=$value->sisa?></td>
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

	<div class="col-lg-6 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Menu Juice</h4>
	      <div class="table-responsive">
	        <table class="table table-hover">
	          <thead>
	            <tr bgcolor="aqua">
	              <th>Nama Menu</th>
	              <th>Stok Awal</th>
	              <th>Sisa</th>
	            </tr>
	          </thead>
	          <tbody>
	          		<?php
	           			foreach ($juice as $key => $value) {
	           				?>	
	           					<tr>
	           						<td><?=$value->nama_powder?></td>
	           						<td><?=$value->stock_awal?></td>
	           						<td><?=$value->sisa?></td>
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


<!-- Stok toppingg -->

<div class="row">
    <div class="col-sm-6 mb-4 mb-xl-0">
        <div class="d-lg-flex align-items-center">
            <div>
                <h3 class="text-dark font-weight-bold mb-2">Stok Topping!</h3>
                <h6 class="font-weight-normal mb-2">Last login was 23 hours ago. View details</h6>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Topping</h4>
	      <div class="table-responsive">
	        <table class="table table-hover">
	          <thead>
	            <tr bgcolor="aqua">
	              <th>Nama Topping</th>
	              <th>Stok Awal</th>
	              <th>Penggunaan</th>
	              <th>Sisa</th>
	            </tr>
	          </thead>
	          <tbody>
	           		<?php
	           			foreach ($topping as $key => $value) {
	           				$sisa = $value->stock_awal - $value->penggunaan ;
	           				?>	
	           					<tr>
	           						<td><?=$value->nama_topping?></td>
	           						<td><?=$value->stock_awal?></td>
	           						<td><?=$value->penggunaan?></td>
	           						<td><?=$sisa?></td>
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

<!-- Stok Susu -->

<div class="row">
    <div class="col-sm-6 mb-4 mb-xl-0">
        <div class="d-lg-flex align-items-center">
            <div>
                <h3 class="text-dark font-weight-bold mb-2">Stok Susu Putih Coklat!</h3>
                <h6 class="font-weight-normal mb-2">Last login was 23 hours ago. View details</h6>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
	<div class="col-lg-12 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title">Milk</h4>
	      <div class="table-responsive">
	        <table class="table table-hover">
	          <thead>
	            <tr bgcolor="aqua">
	              <th>Jenis</th>
	              <th>Stok Awal</th>
	              <th>Penggunaan</th>
	              <th>Sisa</th>
	            </tr>
	          </thead>
	          <tbody>
	           		<?php
	           			foreach ($ekstra as $key => $value) {
	           				$penggunaan = $value->stock_awal - $value->sisa ;
	           				?>	
	           					<tr>
	           						<td><?=$value->nama_ekstra?> liter</td>
	           						<td><?=$value->stock_awal?> liter</td>
	           						<td><?=$penggunaan?> liter</td>
	           						<td><?=$value->sisa?> liter</td>
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