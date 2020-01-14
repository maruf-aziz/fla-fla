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
		        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/c_admin/update_karyawan/' . $staff->id_staff) ?>">

		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Staff <span class="required">*</span>
		            </label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input type="text" id="first-name" required="required" name="id" class="form-control col-md-7 col-xs-12" value="<?= $staff->id_staff ?>" readonly>
		            </div>
		          </div>

		          <div class="form-group">
		            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Karyawan <span class="required">*</span>
		            </label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input type="text" id="last-name" name="nama" required="required" class="form-control col-md-7 col-xs-12" placeholder="ex : maruf aziz" value="<?= $staff->Nama ?>">
		            </div>
		          </div>

		          <div class="form-group">
		            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Username <span class="required">*</span></label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="username" required="required" placeholder="ex : marufaziz" value="<?= $staff->username ?>">
		            </div>
		          </div>

		          <div class="form-group">
		            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12" style="top: 20px;">Password <span class="required">*</span></label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <label style="color: red;"><small><i>Kosongkan Jika Tidak Merubah Password</i></small></label>
		              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="Password" name="password" placeholder="ex : xxxxxxxxx">
		            </div>
		          </div>

		          <div class="form-group">
		            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kontak <span class="required">*</span></label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="kontak" required="required" placeholder="ex : 081xxxxxxxxx" value="<?= $staff->contact ?>">
		            </div>
		          </div>

		          <div class="form-group">
		            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="email" name="email" required="required" placeholder="ex : abcd@gmail.com" value="<?= $staff->email ?>">
		            </div>
		          </div>

		          <div class="form-group">
		            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat <span class="required">*</span></label>
		            <div class="col-md-6 col-sm-6 col-xs-12">
		              <textarea class="form-control" placeholder="ex : jl.super raya no.166" name="alamat"><?= $staff->alamat ?></textarea>
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