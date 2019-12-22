		<?php
    $query = new mysqli('localhost', 'root', '', 'db_pos');
    //cari id terakhir ditanggal hari ini
    $query1 = "SELECT MAX(id_staff) as maxID FROM staff";
    $hasil = mysqli_query($query, $query1);
    $data = mysqli_fetch_array($hasil);
    $idMax = $data['maxID'];
    //setelah membaca id terakhir, lanjut mencari nomor urut id dari id terakhir
    $NoUrut = (int) substr($idMax, 1, 4); // ambil 4 digit dimulai dari index ke 8
    $NoUrut++; //nomor urut +1

    //setelah ketemu id terakhir lanjut membuat id baru dengan format sbb:
    $NewID = sprintf('S%04s', $NoUrut);

    ?>

		<div class="page-title">
		  <div class="title_left">
		    <h3>Form Add Data Karyawan</h3>
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
		        <h2>Input Data <small>Karyawan</small></h2>
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
		          <a href="<?= base_url('index.php/c_admin/karyawan') ?>" class="btn btn-warning btn-xs"><i class="fa fa-mail-reply"></i> Back</a>
		        </div>
		        <br />
		        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/c_admin/insert_karyawan') ?>">

		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Staff <span class="required">*</span>
		            </label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input type="text" id="first-name" required="required" name="id" class="form-control col-md-7 col-xs-12" value="<?= $NewID ?>" readonly>
		            </div>
		          </div>

		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Karyawan <span class="required">*</span>
		            </label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input type="text" id="last-name" name="nama" required="required" class="form-control col-md-7 col-xs-12" placeholder="ex : maruf aziz">
		            </div>
		          </div>

		          <div class="form-group">
		            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Username <span class="required">*</span></label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="username" required="required" placeholder="ex : marufaziz">
		            </div>
		          </div>

		          <div class="form-group">
		            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span></label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="Password" name="password" required="required" placeholder="ex : xxxxxxxxx">
		            </div>
		          </div>

		          <div class="form-group">
		            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kontak <span class="required">*</span></label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="kontak" required="required" placeholder="ex : 081xxxxxxxxx">
		            </div>
		          </div>

		          <div class="form-group">
		            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="email" name="email" required="required" placeholder="ex : abcd@gmail.com">
		            </div>
		          </div>

		          <div class="form-group">
		            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat <span class="required">*</span></label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <textarea class="form-control" placeholder="ex : jl.super raya no.166" name="alamat"></textarea>
		            </div>
		          </div>

		          <!-- <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Images <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="file" name="middle-name" required="required">
                </div>
              </div> -->

		          <div class="ln_solid"></div>
		          <div class="form-group">
		            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		              <a href="<?= base_url('index.php/c_admin/karyawan') ?>"><button class="btn btn-primary" type="button">Cancel</button></a>
		              <button class="btn btn-primary" type="reset">Reset</button>
		              <button type="submit" name="submit" class="btn btn-success">Submit</button>
		            </div>
		          </div>

		        </form>
		      </div>
		    </div>
		  </div>
		</div>