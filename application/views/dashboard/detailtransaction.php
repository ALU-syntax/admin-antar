<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- start detail transaction -->
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <div class="card">
                        <div class="card-header justify-content-right">
                            <section class="invoice-print mb-1">
                                <div class=" d-flex flex-column flex-md-row floating-right">
                                    <button class="btn btn-primary btn-print mb-1 mb-md-0">
                                        <i class="feather icon-file-text"></i>
                                        Print</button>

                                    <?php if ($transaksi['status'] != 5 and $transaksi['status'] != 4 and $transaksi['status'] != 0) { ?>
                                        <a href="<?= base_url(); ?>dashboard/cancletransaction/<?= $transaksi['id'] ?>/<?= $transaksi['id_driver'] ?>" class="btn btn-danger ml-1">
                                            Cancel</a>
                                    <?php } ?>
                                </div>
                            </section>
                        </div>
                        <div class="card-content mt-2">
                            <div class="card-body">
                                <?php if ($transaksi['home'] == 4) { ?>
                                    <ul class="activity-timeline timeline-left list-unstyled">
                                        <li>
                                            <div class="timeline-icon bg-success">
                                                <i class="feather icon-user font-medium-2"></i>
                                            </div>
                                            <div class="avatar mr-1 ">
                                                <img src="<?= base_url('images/pelanggan/') . $transaksi['fotopelanggan']; ?>" alt="avtar img holder" height="32" width="32">
                                            </div>
                                            <div class="timeline-info">
                                                <p class="font-weight-bold"><?= $transaksi['fullnama'] ?></p>
                                                <span><?= $transaksi['id_pelanggan'] ?></span>
                                            </div>
                                            <small class="">
                                                <i class="feather icon-smartphone"></i>+<?= $transaksi['telepon_pelanggan'] ?></small>
                                        </li>
                                        <?php if ($transaksi['status'] == 0) { ?>

                                            <li>
                                                <div class="timeline-icon bg-info">
                                                    <i class="feather icon-truck font-medium-2"></i>
                                                </div>
                                                <div class="timeline-info">
                                                    <p class="font-weight-bold">Tidak ada driver!</p>
                                                    <span>---------</span>
                                                </div>
                                                <small class="">
                                                    ----------</small>
                                            </li>

                                        <?php } else { ?>
                                            <li>
                                                <div class="timeline-icon bg-info">
                                                    <i class="feather icon-truck font-medium-2"></i>
                                                </div>
                                                <div class="avatar mr-1 ">
                                                    <img src="<?= base_url('images/fotodriver/') . $transaksi['foto']; ?>" alt="avtar img holder" height="32" width="32">
                                                </div>
                                                <div class="timeline-info">
                                                    <p class="font-weight-bold"><?= $transaksi['nama_driver'] ?></p>
                                                    <span><?= $transaksi['id_driver'] ?></span>
                                                </div>
                                                <small class="">
                                                    <i class="feather icon-smartphone"></i>+<?= $transaksi['no_telepon'] ?></small>
                                            </li>

                                        <?php } ?>
                                        <li>
                                            <div class="timeline-icon bg-warning">
                                                <i class="feather icon-shopping-bag font-medium-2"></i>
                                            </div>
                                            <div class="avatar mr-1 ">
                                                <img src="<?= base_url('images/merchant/') . $transaksi['foto_merchant']; ?>" alt="avtar img holder" height="32" width="32">
                                            </div>
                                            <div class="timeline-info">
                                                <p class="font-weight-bold"><?= $transaksi['nama_merchant'] ?></p>
                                                <span><?= $transaksi['id_merchant'] ?></span>
                                            </div>
                                            <small class="">
                                                <i class="feather icon-smartphone"></i>+<?= $transaksi['telepon_merchant'] ?></small>
                                        </li>
                                    </ul>
                                <?php } else { ?>
                                    <ul class="activity-timeline timeline-left list-unstyled">
                                        <li>
                                            <div class="timeline-icon bg-success">
                                                <i class="feather icon-user font-medium-2"></i>
                                            </div>
                                            <div class="avatar mr-1 ">
                                                <img src="<?= base_url('images/pelanggan/') . $transaksi['fotopelanggan']; ?>" alt="avtar img holder" height="32" width="32">
                                            </div>
                                            <div class="timeline-info">
                                                <p class="font-weight-bold"><?= $transaksi['fullnama'] ?></p>
                                                <span><?= $transaksi['id_pelanggan'] ?></span>
                                            </div>
                                            <small class="">
                                                <i class="feather icon-smartphone"></i>+<?= $transaksi['telepon_pelanggan'] ?></small>
                                        </li>
                                        <?php if ($transaksi['status'] == 0) { ?>

                                            <li>
                                                <div class="timeline-icon bg-info">
                                                    <i class="feather icon-truck font-medium-2"></i>
                                                </div>
                                                <div class="timeline-info">
                                                    <p class="font-weight-bold">Tidak ada driver!</p>
                                                    <span>---------</span>
                                                </div>
                                                <small class="">
                                                    ----------</small>
                                            </li>

                                        <?php } else { ?>

                                            <li>
                                                <div class="timeline-icon bg-info">
                                                    <i class="feather icon-truck font-medium-2"></i>
                                                </div>
                                                <div class="avatar mr-1 ">
                                                    <img src="<?= base_url('images/fotodriver/') . $transaksi['foto']; ?>" alt="avtar img holder" height="32" width="32">
                                                </div>
                                                <div class="timeline-info">
                                                    <p class="font-weight-bold"><?= $transaksi['nama_driver'] ?></p>
                                                    <span><?= $transaksi['id'] ?></span>
                                                </div>
                                                <small class="">
                                                    <i class="feather icon-smartphone"></i>+<?= $transaksi['no_telepon'] ?></small>
                                            </li>

                                        <?php } ?>
                                    </ul>

                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <!-- start detail for passanger & shipment service -->
                    <?php if ($transaksi['home'] == 1 || $transaksi['home'] == 2) { ?>
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="activity-timeline timeline-left list-unstyled">
                                        <li>
                                            <div class="timeline-icon bg-info">
                                                <i class="feather icon-map-pin font-medium-2"></i>
                                            </div>
                                            <div class="timeline-info">
                                                <p class="font-weight-bold">Pick Up</p>
                                                <span><?= $transaksi['alamat_asal'] ?></span>
                                            </div>
                                            <small class="">waktu order:
                                                <?= $transaksi['waktu_order'] ?></small>
                                        </li>
                                        <li>

                                            <div class="timeline-info">
                                                <span><?= $transaksi['fitur'] ?></span>
                                            </div>
                                            <small class="">
                                                <?php {
                                                    $distance = $transaksi['jarak'];
                                                    $jarakbulat = number_format($distance, 1);
                                                    echo $jarakbulat;
                                                    echo ' ';
                                                    echo $transaksi['keterangan_biaya'];
                                                } ?>
                                            </small>
                                        </li>
                                        <li>
                                            <div class="timeline-icon bg-success">
                                                <i class="feather icon-map-pin font-medium-2"></i>
                                            </div>
                                            <div class="timeline-info">
                                                <p class="font-weight-bold">Drop Point</p>
                                                <span><?= $transaksi['alamat_tujuan'] ?>
                                                </span>
                                            </div>
                                            <small class="">waktu selesai:
                                                <?= $transaksi['waktu_selesai'] ?></small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- start detail for passanger & shipment service -->

                    <!-- start detail for rental service -->
                    <?php if ($transaksi['home'] == 3) { ?>
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="activity-timeline timeline-left list-unstyled">
                                        <li>
                                            <div class="timeline-icon bg-info">
                                                <i class="feather icon-map-pin font-medium-2"></i>
                                            </div>
                                            <div class="timeline-info">
                                                <p class="font-weight-bold">Jemput</p>
                                                <span><?= $transaksi['alamat_asal'] ?></span>
                                            </div>
                                            <small class="">waktu order:
                                                <?= $transaksi['waktu_order'] ?></small>
                                        </li>
                                        <li>

                                            <div class="timeline-info">
                                                <span><?= $transaksi['fitur'] ?></span>
                                            </div>
                                            <small class=""><?= $transaksi['estimate_time'] ?></small>
                                        </li>
                                        <li>
                                            <div class="timeline-icon bg-success">
                                                <i class="feather icon-check font-medium-2"></i>
                                            </div>
                                            <div class="timeline-info">
                                                <p class="font-weight-bold">Selesai</p>
                                            </div>
                                            <small class=""><?= $transaksi['waktu_selesai'] ?></small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- end detail for rental service -->

                    <!-- start detail for purchasing service -->
                    <?php if ($transaksi['home'] == 4) { ?>
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="activity-timeline timeline-left list-unstyled">
                                        <li>
                                            <div class="timeline-icon bg-info">
                                                <i class="feather icon-map-pin font-medium-2"></i>
                                            </div>
                                            <div class="timeline-info">
                                                <p class="font-weight-bold">Lokasi Merchant</p>
                                                <span><?= $transaksi['alamat_asal'] ?></span>
                                            </div>
                                            <small class=""><?= $transaksi['waktu_order'] ?></small>
                                        </li>
                                        <li>

                                            <div class="timeline-info">
                                                <span><?= $transaksi['fitur'] ?></span>
                                            </div>
                                            <small class=""><?php {
                                                                $distance = $transaksi['jarak'];
                                                                $jarakbulat = number_format($distance, 1);
                                                                echo $jarakbulat;
                                                                echo ' ';
                                                                echo $transaksi['keterangan_biaya'];
                                                            } ?></small>
                                        </li>
                                        <li>
                                            <div class="timeline-icon bg-success">
                                                <i class="feather icon-check font-medium-2"></i>
                                            </div>
                                             <div class="timeline-info">
                                                <p class="font-weight-bold">Drop Point</p>
                                                <span><?= $transaksi['alamat_tujuan'] ?>
                                                </span>
                                            </div>
                                            <small class=""><?= $transaksi['waktu_selesai'] ?></small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- end detail for purchasing service -->
                    
                </div>

                <?php if ($transaksi['home'] == 4) { ?>

                    <!-- start invoice for purchasing service -->
                    <div class="col-lg-8 col-sm-12">
                        <section class="card invoice-page">
                            <div id="invoice-template" class="card-body">

                                <div id="invoice-company-details" class="row">
                                    <div class="col-sm-6 col-12 text-left pt-1">
                                        <div class="media pt-1">
                                            <img src="<?= base_url(); ?>images/icon/logotext.png" alt="avatar" height="40" width="150">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12 text-right">
                                        <h1>Invoice</h1>
                                        <div class="invoice-details mt-2">
                                            <h6>Nomor INVOICE.</h6>
                                            <p>#INV-<?= $transaksi['id'] ?></p>
                                            <h6 class="mt-2">User Review</h6>
                                            <p>
                                                <?= $transaksi['catatan'] ?>
                                                <span class="ml-2">
                                                    <i class="feather icon-star text-warning"></i><?= $transaksi['rate'] ?></span></p>
                                        </div>
                                    </div>
                                </div>

                                <div id="invoice-items-details" class="pt-1 invoice-items-table">
                                    <div class="row">
                                        <div class="table-responsive col-12">
                                            <table class="table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th>NAMA ITEM</th>
                                                        <th>QTY</th>
                                                        <th>JUMLAH</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <?php foreach ($transitem as $item) { ?>
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item"><?= $item['nama_item'] ?></li>
                                                                </ul>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php foreach ($transitem as $item) { ?>
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item"><?= $item['jumlah_item'] ?></li>
                                                                </ul>
                                                            <?php } ?>
                                                        </td>
                                                        
                                                        <td>
                                                            <?php foreach ($transitem as $item) { ?>
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item">
                                                                        <?= $currency['app_currency'] ?>
                                                                        <?= number_format($item['total_harga'] , 0, ".", ".") ?>
                                                                    </li>
                                                                </ul>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div id="invoice-items-details" class="pt-1 invoice-items-table">
                                    <div class="row">
                                        <div class="table-responsive col-12">
                                            <table class="table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th>LAYANAN</th>
                                                        <th>UNIT BIAYA</th>
                                                        <th>JARAK/DURASI</th>
                                                        <th>JUMLAH</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>PENGIRIMAN</td>
                                                        <td>
                                                            <?= $currency['app_currency'] ?>
                                                            <?= number_format($transaksi['biaya'] , 0, ".", ".") ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($transaksi['home'] != '2') { ?>

                                                                <?php if ($transaksi['home'] == '3') {
                                                                    if ($transaksi['jarak'] == '0') {
                                                                        echo $transaksi['estimate_time'];
                                                                    }
                                                                } else {
                                                                    $distance = $transaksi['jarak'];
                                                                    $jarakbulat = number_format($distance, 1);
                                                                    echo $jarakbulat;
                                                                    echo ' ';
                                                                    echo $transaksi['keterangan_biaya'];
                                                                } ?>

                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?= $currency['app_currency'] ?>
                                                            <?= number_format($transaksi['harga'] , 0, ".", ".") ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div id="invoice-total-details" class="invoice-total-table">
                                    <div class="row">
                                        <div class="col-7 offset-5">
                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <th>ITEM HARGA</th>
                                                            <td><?= $currency['app_currency'] ?>
                                                                <?= number_format($transaksi['total_belanja'] , 0, ".", ".") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>PENGIRIMAN</th>
                                                            <td><?= $currency['app_currency'] ?>
                                                                <?= number_format($transaksi['harga'] , 0, ".", ".") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>DISCOUNT
                                                                <span class="text-danger">
                                                                    (<?php if ($transaksi['pakai_wallet'] == '1') {
                                                                            echo $transaksi['kredit_promo'];
                                                                        } else {
                                                                            echo 0;
                                                                        } ?>
                                                                    %)
                                                                </span>

                                                            </th>
                                                            <td class="text-danger">
                                                                <?= $currency['app_currency'] ?>
                                                                <?= number_format($transaksi['kredit_promo'] , 0, ".", ".") ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>PEMBAYARAN</th>
                                                            <td>
                                                                <?php if ($transaksi['pakai_wallet'] == '0') { ?>
                                                                    <span class="badge badge-success"><?= 'CASH'; ?>
                                                                    <?php } else { ?>
                                                                        <span class="badge badge-primary"><?= 'wallet';
                                                                                                        } ?>
                                                                        </span>
                                                        </tr>
                                                        <tr>
                                                            <th>STATUS</th>
                                                            <td>
                                                                <?php if ($transaksi['status'] == '0') { ?>
                                                                    <p class="badge badge-danger">Tidak ada driver!</p>
                                                                <?php } ?>
                                                                <?php if ($transaksi['status'] == '1') { ?>
                                                                    <p class="badge badge-info"><?= $transaksi['status_transaksi'] ?></p>
                                                                <?php } ?>
                                                                <?php if ($transaksi['status'] == '2') { ?>
                                                                    <p class="badge badge-primary"><?= $transaksi['status_transaksi'] ?></p>
                                                                <?php } ?>
                                                                <?php if ($transaksi['status'] == '3') { ?>
                                                                    <p class="badge badge-primary"><?= $transaksi['status_transaksi'] ?></p>
                                                                <?php } ?>
                                                                <?php if ($transaksi['status'] == '4') { ?>
                                                                    <p class="badge badge-success"><?= $transaksi['status_transaksi'] ?></p>
                                                                <?php } ?>
                                                                <?php if ($transaksi['status'] == '5') { ?>
                                                                    <p class="badge badge-warning"><?= $transaksi['status_transaksi'] ?></p>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>TOTAL</th>
                                                            <td class="card-title"><?= $currency['app_currency'] ?>
                                                                <?= number_format($transaksi['biaya_akhir'] , 0, ".", ".") ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>

                    </div>
                    <!-- end of infoice for purchasing service -->

                <?php } else { ?>
                    <!-- start Invoice for passanger, shipment, rental service -->
                    <div class="col-lg-8 col-sm-12">
                        <section class="card invoice-page">
                            <div id="invoice-template" class="card-body">

                                <div id="invoice-company-details" class="row">
                                    <div class="col-sm-6 col-12 text-left pt-1">
                                        <div class="media pt-1">
                                        <img  src="<?= base_url(); ?>images/icon/logotext.png" alt="avatar" height="40" width="150">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12 text-right">
                                        <h1>Invoice</h1>
                                        <div class="invoice-details mt-2">
                                            <h6>Nomor INVOICE.</h6>
                                            <p>#INV-<?= $transaksi['id'] ?></p>
                                            <h6 class="mt-2">User Review</h6>
                                            <p>
                                                <?= $transaksi['catatan'] ?>
                                                <span class="ml-2">
                                                    <i class="feather icon-star text-warning"></i><?= $transaksi['rate'] ?></span></p>
                                        </div>
                                    </div>
                                </div>

                                <div id="invoice-items-details" class="pt-1 invoice-items-table">
                                    <div class="row">
                                        <div class="table-responsive col-12">
                                            <table class="table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th>LAYANAN</th>
                                                        <th>UNIT BIAYA</th>
                                                        <th>JARAK/DURASI</th>
                                                        <th>JUMLAH</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?= $transaksi['fitur'] ?></td>
                                                        <td>
                                                            <?= $currency['app_currency'] ?>
                                                            <?= number_format($transaksi['biaya'] , 0, ".", ".") ?>
                                                        </td>
                                                        <td>

                                                            <?php if ($transaksi['home'] == '3') {
                                                                if ($transaksi['jarak'] == '0') {
                                                                    echo $transaksi['estimate_time'];
                                                                }
                                                            } else {
                                                                $distance = $transaksi['jarak'];
                                                                $jarakbulat = number_format($distance, 1);
                                                                echo $jarakbulat;
                                                                echo ' ';
                                                                echo $transaksi['keterangan_biaya'];
                                                            } ?>

                                                        <td>
                                                            <?= $currency['app_currency'] ?>
                                                            <?= number_format($transaksi['harga'] , 0, ".", ".") ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div id="invoice-total-details" class="invoice-total-table">
                                    <div class="row">
                                        <div class="col-7 offset-5">
                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <th>SUBTOTAL</th>
                                                            <td><?= $currency['app_currency'] ?>
                                                                <?= number_format($transaksi['harga'] , 0, ".", ".") ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>DISKON
                                                                <span class="text-danger">
                                                                    (<?php if ($transaksi['pakai_wallet'] == '1') {
                                                                            echo $transaksi['kredit_promo'];
                                                                        } else {
                                                                            echo 0;
                                                                        } ?>
                                                                    %)
                                                                </span>
                                                            </th>
                                                            <td class="text-danger">
                                                                <?= $currency['app_currency'] ?>
                                                                <?= number_format($transaksi['kredit_promo'] , 0, ".", ".") ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>PEMBAYARAN</th>
                                                            <td>
                                                                <?php if ($transaksi['pakai_wallet'] == '0') { ?>
                                                                    <span class="badge badge-success"><?= 'CASH'; ?>
                                                                    <?php } else { ?>
                                                                        <span class="badge badge-primary"><?= 'wallet';
                                                                                                        } ?>
                                                                        </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>STATUS</th>
                                                            <td>
                                                                <?php if ($transaksi['status'] == '0') { ?>
                                                                    <p class="badge badge-danger">Tidak ada driver!</p>
                                                                <?php } ?>
                                                                <?php if ($transaksi['status'] == '1') { ?>
                                                                    <p class="badge badge-info"><?= $transaksi['status_transaksi'] ?></p>
                                                                <?php } ?>
                                                                <?php if ($transaksi['status'] == '2') { ?>
                                                                    <p class="badge badge-primary"><?= $transaksi['status_transaksi'] ?></p>
                                                                <?php } ?>
                                                                <?php if ($transaksi['status'] == '3') { ?>
                                                                    <p class="badge badge-primary"><?= $transaksi['status_transaksi'] ?></p>
                                                                <?php } ?>
                                                                <?php if ($transaksi['status'] == '4') { ?>
                                                                    <p class="badge badge-success"><?= $transaksi['status_transaksi'] ?></p>
                                                                <?php } ?>
                                                                <?php if ($transaksi['status'] == '5') { ?>
                                                                    <p class="badge badge-warning"><?= $transaksi['status_transaksi'] ?></p>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>TOTAL</th>
                                                            <td class="card-title">
                                                                <?= $currency['app_currency'] ?>
                                                                <?= number_format($transaksi['biaya_akhir'] , 0, ".", ".") ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>

                    </div>
                    <!-- end of Invoice for passanger, shipment, rental service -->
                <?php } ?>


            </div>
        </div>
    </div>
</div>

