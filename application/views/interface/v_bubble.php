<div class="row">
    <div class="col-sm-6 mb-4 mb-xl-0">
        <div class="d-lg-flex align-items-center">
            <div>
                <h3 class="text-dark font-weight-bold mb-2">Hi, welcome back!</h3>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-sm-12 flex-column d-flex stretch-card">
        <div class="row">
            <div class="col-lg-4 d-flex grid-margin stretch-card">
                <div class="card bg-primary">
                    <div class="card-body text-white">
                        <h3 class="font-weight-bold mb-3"> <?=$sisa?> Cup</h3>
                        <?php
                            $prosen = $sisa / $stok * 100; 
                        ?>
                        <div class="progress mb-3">
                            <div class="progress-bar  bg-warning" role="progressbar" style="width: <?=$prosen?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="pb-0 mb-0">Stok Bubble Mentah</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex grid-margin stretch-card">
                <div class="card sale-diffrence-border">
                    <div class="card-body">
                        <h3 class="text-dark mb-2 font-weight-bold">Masukkan Jumlah Yang Akan Dimasak</h3>
                        <input type="number" class="form-control" name="bubble" id="bubble" value="" placeholder="masukkan jumlah , Ex: 20">
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex grid-margin stretch-card">
                <div class="card sale-visit-statistics-border">
                    <div class="card-body">
                        <h3 class="text-dark mb-2 font-weight-bold">Konfirmasi Masak ??</h3>
                        <button class="btn btn-primary" id="konfirmasi">Konfirmasi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<script type="text/javascript">
    $(function() {
        $('#konfirmasi').click(function() {
            var jumlah = $('#bubble').val();
            var id = "Bubble";

            if(jumlah == ''){
                Swal.fire(
                    'Jumlah Masak Bubble',
                    'Belum Diisi !!',
                    'warning'
                )
            }
            else{
                $.ajax({
                    url: "<?= base_url('index.php/c_barista/cook_bubble') ?>",
                    type : "post",
                    data : {
                        jumlah : jumlah,
                        id : id
                    },
                    dataType: "json",
                    success: function(result) {

                        if (result.status == 'success') {
                            
                            Swal.fire({
                                type: 'success',
                                title: 'Konfirmasi Masak Bubble',
                                text: 'Success'
                            }).then((result) => {
                                location.replace("<?= base_url('index.php/c_barista/bubble') ?>");
                            })
                        } else {
                            Swal.fire(
                                'Konfirmasi Masak Bubble',
                                'Gagal !!',
                                'error'
                            )
                        }
                    }
                });
            }
            
        });
    });
</script>