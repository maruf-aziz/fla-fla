		<div class="page-title">
	    <div class="title_left">
	      <h3>Form Update Data Topping</h3>
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
            <h2>Update Data <small>Topping</small></h2>
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
	            <a href="<?=base_url('index.php/c_admin/inventory')?>" class="btn btn-warning btn-xs"><i class="fa fa-mail-reply"></i> Back</a>
          	</div>         	
            <br />
            <form name="form_update" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left input-mask" method="post" action="<?=base_url('index.php/c_admin/update_topping/'.$topping->id_topping)?>">
              <!-- get id_region -->
              <input type="hidden" name="id_region" value="<?=$topping->id_region?>">
            	<div class="row">
            		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Topping <span class="required">*</span></label>
            		<div class="col-md-6 col-sm-6 col-xs-10 form-group has-feedback">
	                <input type="text" class="form-control" id="inputSuccess3" placeholder="ex : oreo" name="nama" required="" disabled value="<?=$topping->nama_topping?>">	                
	              </div>
	              <div class="col-md-1 col-lg-1">
	              	<a class="btn btn-sm btn-info" onclick="enable_text();"><i class="fa fa-pencil"></i></a>
	              </div>
	              
            	</div>
              
            	<div class="row">
            		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Harga <span class="required">*</span></label>
            		<div class="col-md-6 col-sm-6 col-xs-10 form-group has-feedback">
	                <input type="number" class="form-control has-feedback-left" id="inputSuccess2" placeholder="ex: 50000" name="harga" required="" disabled value="<?=$topping->harga?>">
	                <span class="form-control-feedback left" aria-hidden="true">Rp.</span>
	              </div>
	              <div class="col-md-1 col-lg-1">
	              	<a class="btn btn-sm btn-info" onclick="enable_harga();"><i class="fa fa-pencil"></i></a>
	              </div>
            	</div>  

            	<div class="row">
            		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Sisa Stok <span class="required">*</span></label>
            		<div class="col-md-6 col-sm-6 col-xs-10 form-group has-feedback">
	                <input type="number" class="form-control" id="inputSuccess3" placeholder="ex: 50000" required="" disabled value="<?=$topping->sisa?>">
	                <input type="hidden" name="sisa" value="<?=$topping->sisa?>">
	              </div>
            	</div>

            	<div class="row">
            		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Penambahan Stok <span class="required">*</span></label>
            		<div class="col-md-6 col-sm-6 col-xs-10 form-group has-feedback">
	                <input type="number" class="form-control" id="inputSuccess3" placeholder="ex : 10" required="" name="penambahan" disabled="">
	              </div>
	              <div class="col-md-1 col-lg-1">
	              	<a class="btn btn-sm btn-info" onclick="enable_stok();"><i class="fa fa-pencil"></i></a>
	              </div>
            	</div>          

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="<?=base_url('index.php/c_admin/inventory')?>"><button class="btn btn-primary" type="button">Cancel</button></a>
		  						<button class="btn btn-primary" type="reset">Reset</button>
                  <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
    	function enable_text(){
    		document.form_update.nama.disabled = false;
    	}

    	function enable_harga(){
    		document.form_update.harga.disabled = false;
    	}

    	function enable_stok(){
    		document.form_update.penambahan.disabled = false;
    	}
    </script>