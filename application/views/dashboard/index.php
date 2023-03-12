<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            <section id="chart-dashboard">
                <div class="row">
                    <div class="col-md-3 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-user text-success font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1 mb-25"><?= count($user); ?></h2>
                                <p class="mb-0">Total User</p>
                            </div>
                            <div class="card-content">
                                <div id="chart1"></div>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-3 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-danger p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-users text-danger font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1 mb-25"><?= count($hitungdriver); ?></h2>
                                <p class="mb-0">Total Driver</p>
                            </div>
                            <div class="card-content">
                                <div id="chart2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-shopping-bag text-warning font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1 mb-25"><?= count($mitra); ?></h2>
                                <p class="mb-0">Total Merchant</p>
                            </div>
                            <div class="card-content">
                                <div id="chart3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-info p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-refresh-ccw text-info font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1 mb-25"><?= count($transaksi); ?></h2>
                                <p class="mb-0">Total Transaksi
                                    <i class="mb-0 feather icon-info"></i>
                                </p>
                            </div>
                            <div class="card-content">
                                <div id="chart4"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of dashboard analitics -->

                <!-- start of revenue & in proggress -->
                <div class="row">
                    <!-- Line Area Chart -->
                    <div class="col-lg-7 col-md-6 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Transaksi</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div id="merchantChart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-end">
                                <h4 class="mb-0">Transaksi Komplit</h4>
                                <p class="font-medium-5 mb-0"></p>
                            </div>
                            <div class="card-content">
                                <div class="card-body px-0 pb-0">
                                    <div class="row">
                                    <div class="col-12">
                                        <div class="table-fixed">
                                            <table id="order-list" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Layanan</th>
                                                        <th>Harian</th>
                                                        <th>Bulanan</th>
                                                        <th>Tahunan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        
                                                        <?php $i = 1;
                                                        foreach ($harian as $hr) { ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $hr['fitur'] ?></td>
                                                            <td > 
                                                            <label class="badge badge-success"><?= $hr['hari'] ?></label>
                                                            </td>
                                                            <td>
                                                            <label class="badge badge-info"><?= $hr['bulan'] ?></label>
                                                            </td>
                                                            <td>
                                                            <label class="badge badge-danger"><?= $hr['tahun'] ?></label>
                                                            </td>
                                                        </tr>
                                                        <?php $i++;
                                                            } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of revenue & in proggress -->

                

            </section>

            <!-- recent transaction table start -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Transaksi Terbaru</h4>
                            </div>
                            <div class="card-content">
                                <?php if ($this->session->flashdata()) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $this->session->flashdata('demo'); ?>
                                        <?php echo $this->session->flashdata('cancel'); ?>
                                        <?php echo $this->session->flashdata('hapus'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                       <table style="font-size:11px;" class="table zero-configuration" id="table_dashboard">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Inv</th>
                                                    <th>Tgl</th>
                                                    <th>Wilayah</th>
                                                    <th>Customer</th>
                                                    <th>Driver</th>
                                                    <th>Layanan</th>
                                                    <th>Jemput</th>
                                                    <th>Tujuan</th>
                                                    <th>Harga</th>
                                                    <th>Metode Pembayaran</th>
                                                    <th>Status</th>
                                                    <th>Tindakan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end of recent transaction table -->
        </div>
    </div>
    <?= $jan2[0]['jumlah'] ?>,
</div>
<!-- END: Content-->


<!-- footer -->
<?php $this->load->view('includes/footer'); ?>

<!-- End custom js for this page-->


<script>

    (function($) {
        'use strict';
        $(function() {
            var $primary = "#a357d7";
            var $warning = "#FF9F43";
            var $info = "#0DCCE1";
            var $danger = "#EA5455";
            var $success = "#00db89";
            var $strok_color = "#b9c3cd";
            var yaxis_opposite = false;

            var themeColors = [$primary, $success, $danger, $warning, $info];
            var ctx = document.querySelector("#merchantChart");
            var myChart = new ApexCharts(ctx, {
                chart: {
                    height: 360,
                    type: "area",
                },
                colors: themeColors,
                stroke: {
                    curve: "smooth",
                },
                series: [
                    {
                        name: "Passenger Transportation",
                        data: [
                            <?= $jan1[0]['jumlah'] ?>,
                            <?= $feb1[0]['jumlah'] ?>,
                            <?= $mar1[0]['jumlah'] ?>,
                            <?= $apr1[0]['jumlah'] ?>,
                            <?= $mei1[0]['jumlah'] ?>,
                            <?= $jun1[0]['jumlah'] ?>,
                            <?= $jul1[0]['jumlah'] ?>,
                            <?= $aug1[0]['jumlah'] ?>,
                            <?= $sep1[0]['jumlah'] ?>,
                            <?= $okt1[0]['jumlah'] ?>,
                            <?= $nov1[0]['jumlah'] ?>,
                            <?= $des1[0]['jumlah'] ?>
                        ]
                    }, {
                        name: "Shipment",
                        data: [
                            <?= $jan2[0]['jumlah'] ?>,
                            <?= $feb2[0]['jumlah'] ?>,
                            <?= $mar2[0]['jumlah'] ?>,
                            <?= $apr2[0]['jumlah'] ?>,
                            <?= $mei2[0]['jumlah'] ?>,
                            <?= $jun2[0]['jumlah'] ?>,
                            <?= $jul2[0]['jumlah'] ?>,
                            <?= $aug2[0]['jumlah'] ?>,
                            <?= $sep2[0]['jumlah'] ?>,
                            <?= $okt2[0]['jumlah'] ?>,
                            <?= $nov2[0]['jumlah'] ?>,
                            <?= $des2[0]['jumlah'] ?>
                        ]
                    }, {
                        name: "Rental",
                        data: [
                            <?= $jan3[0]['jumlah'] ?>,
                            <?= $feb3[0]['jumlah'] ?>,
                            <?= $mar3[0]['jumlah'] ?>,
                            <?= $apr3[0]['jumlah'] ?>,
                            <?= $mei3[0]['jumlah'] ?>,
                            <?= $jun3[0]['jumlah'] ?>,
                            <?= $jul3[0]['jumlah'] ?>,
                            <?= $aug3[0]['jumlah'] ?>,
                            <?= $sep3[0]['jumlah'] ?>,
                            <?= $okt3[0]['jumlah'] ?>,
                            <?= $nov3[0]['jumlah'] ?>,
                            <?= $des3[0]['jumlah'] ?>
                        ]
                    }, {
                        name: "Purchasing Service",
                        data: [
                            <?= $jan4[0]['jumlah'] ?>,
                            <?= $feb4[0]['jumlah'] ?>,
                            <?= $mar4[0]['jumlah'] ?>,
                            <?= $apr4[0]['jumlah'] ?>,
                            <?= $mei4[0]['jumlah'] ?>,
                            <?= $jun4[0]['jumlah'] ?>,
                            <?= $jul4[0]['jumlah'] ?>,
                            <?= $aug4[0]['jumlah'] ?>,
                            <?= $sep4[0]['jumlah'] ?>,
                            <?= $okt4[0]['jumlah'] ?>,
                            <?= $nov4[0]['jumlah'] ?>,
                            <?= $des4[0]['jumlah'] ?>
                        ]
                    }
                ],
                legend: {
                    offsetY: -10,
                },
                xaxis: {
                    categories: [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'sep',
                        'okt',
                        'nov',
                        'des'
                    ],
                },
                yaxis: {
                    opposite: yaxis_opposite,
                },
                tooltip: {
                    x: {
                        format: "dd/MM/yy HH:mm",
                    },
                }
            });
            myChart.render();

        });
    })(jQuery);
</script>