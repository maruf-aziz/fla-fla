                    <div class="row">
                        <div class="col-sm-6 mb-4 mb-xl-0">
                            <div class="d-lg-flex align-items-center">
                                <div>
                                    <h3 class="text-dark font-weight-bold mb-2">Hi, welcome back!</h3>
                                    <h6 class="font-weight-normal mb-2">Last login was 23 hours ago. View details</h6>
                                </div>
                                <div class="ml-lg-5 d-lg-flex d-none">
                                        <button type="button" class="btn bg-white btn-icon">
                                            <i class="mdi mdi-view-grid text-success"></i>
                                    </button>
                                        <button type="button" class="btn bg-white btn-icon ml-2">
                                            <i class="mdi mdi-format-list-bulleted font-weight-bold text-primary"></i>
                                        </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-8 flex-column d-flex stretch-card">
                            <div class="row">
                                <div class="col-lg-6 d-flex grid-margin stretch-card">
                                    <div class="card bg-primary">
                                        <div class="card-body text-white">
                                            <h3 class="font-weight-bold mb-3"><?=$count?> Cup</h3>
                                            <?php
                                                $prosen = $count / 40 * 100;
                                            ?>
                                            <div class="progress mb-3">
                                                <div class="progress-bar  bg-warning" role="progressbar" style="width: <?=$prosen?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p class="pb-0 mb-0">Cup Terjual Hari Ini</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex grid-margin stretch-card">
                                    <div class="card sale-diffrence-border">
                                        <div class="card-body">
                                            <h2 class="text-dark mb-2 font-weight-bold">Rp. <?=$total?></h2>
                                            <h4 class="card-title mb-2">Penjualan Hari Ini</h4>
                                            <!-- <small class="text-muted">Okt 2019</small> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 grid-margin d-flex stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h4 class="card-title mb-2">Grafik Penjualan Anda</h4>
                                                
                                            </div>
                                            <div>
                                                <ul class="nav nav-tabs tab-no-active-fill" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active pl-2 pr-2" id="revenue-for-last-month-tab" data-toggle="tab" href="#revenue-for-last-month" role="tab" aria-controls="revenue-for-last-month" aria-selected="true"></a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content tab-no-active-fill-tab-content">
                                                    <div class="tab-pane fade show active" id="revenue-for-last-month" role="tabpanel" aria-labelledby="revenue-for-last-month-tab">
                                                        <div class="d-lg-flex justify-content-between">
                                                            <p class="mb-4">+5.2% vs last 10 days</p>
                                                            <div id="revenuechart-legend" class="revenuechart-legend"></div>
                                                        </div>
                                                        <canvas id="myChart11"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 flex-column d-flex stretch-card">
                            <div class="row flex-grow">
                                <div class="col-sm-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <h3 class="font-weight-bold text-dark">Yogyakarta , Indonesia</h3>
                                                    <p class="text-dark"><?=date('D H:i')?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 mt-4 mt-lg-0">
                                                    <div class="bg-primary text-white px-4 py-4 card">
                                                        <div class="row">
                                                            <div class="col-sm-6 pl-lg-5">
                                                                <h3><?=$this->fungsi->user_login()->id_staff?></h3>
                                                                <p class="mb-0">Id Barista</p>
                                                            </div>
                                                            <div class="col-sm-6 climate-info-border mt-lg-0 mt-2">
                                                                <h3><?=$this->fungsi->user_login()->Nama?></h3>
                                                                <p class="mb-0">Nama</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pt-3 mt-md-1">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h4 class="card-title mb-0">Menu Terlaris</h4>
                                                    </div>
                                                    <p class="mt-1">Calculated </p>
                                                    <canvas id="myChart2" style="min-height: 300px;"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                     <?php
                        foreach ($grafik as $key => $value) {
                            $money[] = $value->uang;
                            $tanggal[] = $value->tanggal;
                        }

                        $preview_tgl = array_reverse($tanggal);
                        $preview_total = array_reverse($money);

                        foreach ($favorit as $key => $value) {
                            $powder_nama[] = $value->nama_powder;
                            $pakai_powder[] = $value->pakai;
                        }

                        $preview_powder = array_reverse($powder_nama, true);
                        $preview_pakai = array_reverse($pakai_powder, true);

                    ?>

                    <script>
                        var ctx = document.getElementById('myChart11').getContext('2d');
                        var chart = new Chart(ctx, {
                            // The type of chart we want to create
                            type: 'line',

                            // The data for our dataset
                            data: {
                                labels: <?= json_encode($preview_tgl); ?>,
                                datasets: [{
                                    label: 'Grafik Penjualan',
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    borderColor: 'rgba(153, 102, 255, 1)',
                                    fill: false, //menghilangkan backgroud
                                    // data: [0,30000, 15000, 20000, 20000, 20500, 30000, 35000]
                                    data: <?= json_encode($preview_total); ?>
                                }]
                            },

                            // Configuration options go here
                            options: {}
                        });

                        //chart untuk powder terlaris
                        var ctx2 = document.getElementById('myChart2').getContext('2d');
                        var chart2 = new Chart(ctx2, {
                            type: 'horizontalBar',

                            // The data for our dataset
                            data: {
                                labels: <?= json_encode($powder_nama) ?>,
                                datasets: [{
                                    label: 'Grafik Penjualan',
                                    backgroundColor: 'rgba(153, 102, 255, 1)',
                                    borderColor: 'rgba(153, 102, 255, 1)',
                                    fill: false, //menghilangkan backgroud
                                    // data: [0,30000, 15000, 20000, 20000, 20500, 30000, 35000]
                                    data: <?= json_encode($pakai_powder) ?>
                                }]
                            },
                            options: {}
                        });

                    </script>