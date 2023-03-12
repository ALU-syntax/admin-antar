<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- detail driver Start -->

            <div class="row">

                <div class="col-lg-4 col-sm-12">

                    <div class="card">
                        <div class="card-header mx-auto pb-0">
                            <div class="row m-0">
                                <div class="text-center">
                                    <h4><?= $driver['nama_driver'] ?>
                                    </h4>
                                    <div><?php if ($driver['gender'] == "Male") { ?>
                                            Wanita
                                        <?php } else { ?>
                                            Pria
                                        <?php } ?>
                                        <p class=""><?= $driver['id'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body text-center mx-auto">
                                <div class="avatar avatar-xl">
                                    <img class="img-fluid" src="<?= base_url('images/fotodriver/') . $driver['foto'] ?>" alt="img placeholder"></div>
                                <div class="col-sm-12 text-center mt-2">
                                    <p class=""><?= $driver['alamat_driver'] ?></p>
                                </div>

                                <div class="col-sm-12 text-center mt-1 mb-2">

                                    <?php if ($driver['status'] == 3) { ?>
                                        <h3 class="badge badge-dark">Banned</h3>
                                    <?php } elseif ($driver['status'] == 0) { ?>
                                        <h3 class="badge badge-secondary text-dark">Pendaftaran Baru</h3>
                                        <?php } else {
                                        if ($driver['status_job'] == 1) { ?>


                                            <h3 class="badge badge-info">Aktif</h3>
                                        <?php }
                                        if ($driver['status_job'] == 2) { ?>
                                            <h3 class="badge badge-primary">Jumlah</h3>
                                        <?php }
                                        if ($driver['status_job'] == 3) { ?>
                                            <h3 class="badge badge-success">Pekerjaan</h3>
                                        <?php }
                                        if ($driver['status_job'] == 4) { ?>
                                            <h3 class="badge badge-warning">Non AKtif</h3>
                                        <?php }
                                        if ($driver['status_job'] == 5) { ?>
                                            <h3 class="badge badge-danger">Keluar</h3>
                                    <?php }
                                    } ?>

                                    <span class="badge badge-outline-warning" data-toggle="modal" data-target="#maininfo">
                                        <a>
                                            <i class="feather icon-edit"></i>
                                            Ubah Info
                                        </a>
                                    </span>

                                </div>
                                <hr class="my-1">
                                <div class="d-flex justify-content-between mt-2">
                                    <div class="uploads">
                                        <p class="font-weight-bold font-medium-2 mb-0"><?= $countorder ?></p>
                                        <span class="">Order</span>
                                    </div>
                                    <div class="followers">
                                        <p class="font-weight-bold font-medium-2 mb-0">
                                            <?= $currency['app_currency'] ?>
                                            <?= number_format($driver['saldo'] , 0, ".", ".") ?>
                                        </p>
                                        <span class="">Saldo</span>
                                    </div>
                                    <div class="following">
                                        <p class="font-weight-bold font-medium-2 mb-0"><?= number_format($driver['rating'], 1) ?></p>
                                        <span class="">Ulasan</span>
                                    </div>
                                    <div class="following">
                                        <p class="font-weight-bold font-medium-2 mb-0"><?= $driver['driver_job'] ?></p>
                                        <span class="">Layanan Pekerjaan</span>
                                    </div>
                                </div>

                                <?php if ($driver['status'] == 0) { ?>
                                    <a href="<?= base_url(); ?>newregistration/confirm/<?= $driver['id'] ?>">
                                        <h3 class="btn btn-success col-12 mt-2">Konfirmasi Driver</h3>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>



                    <div class="card">
                        <div class="card-header">

                            <!-- pagination swiper start -->
                            <div class="card">
                                <section id="component-swiper-pagination">
                                    <div class="card-header">
                                        <h4 class="card-title">File</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="swiper-paginations swiper-container">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <img style="max-width : 100%; height: 200px; display: inline–block;" src="<?= base_url('images/fotoberkas/ktp/') . $driver['foto_ktp'] ?>" alt="">
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <img style="max-width : 100%; height: 200px; display: inline–block;" src="<?= base_url('images/fotoberkas/sim/') . $driver['foto_sim'] ?>" alt="">
                                                    </div>
                                                </div>
                                                <!-- Add Pagination -->
                                                <div class="swiper-pagination"></div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <!-- pagination swiper ends -->

                        </div>

                    </div>

                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="activity-timeline timeline-left list-unstyled">
                                    <li>
                                        <div class="timeline-icon bg-primary">
                                            <i class="feather icon-credit-card font-medium-2"></i>
                                        </div>
                                        <div class="timeline-info">
                                            <p class="font-weight-bold mb-1">Identitas
                                            </p>
                                            <p>id card :
                                                <span class="text-muted"><?= $driver['no_ktp'] ?></span></p>
                                            <p>driver license :
                                                <span class="text-muted"><?= $driver['id_sim'] ?></span>
                                            </p>
                                            <p>date of birth :
                                                <span class="text-muted"><?= $driver['tgl_lahir'] ?></span>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-icon bg-warning">
                                            <i class="feather icon-mail font-medium-2"></i>
                                        </div>
                                        <div class="timeline-info">
                                            <p class="font-weight-bold mb-1">Kontak
                                            </p>
                                            <p>phone :
                                                <span class="text-muted"><?= $driver['countrycode'] ?> <?= $driver['phone'] ?></span>
                                            </p>
                                            <p>email :
                                                <span class="text-muted"><?= $driver['email'] ?></span>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-icon bg-info">
                                            <i class="feather icon-truck font-medium-2"></i>
                                        </div>
                                        <div class="timeline-info">
                                            <p class="font-weight-bold mb-1">Kendaraan
                                            </p>
                                            <p>merek :
                                                <span class="text-muted"><?= $driver['warna'] ?>
                                                    <?= $driver['merek'] ?>
                                                    <?= $driver['tipe'] ?></span>
                                            </p>
                                            <p>plat nomor :
                                                <span class="text-muted"><?= $driver['nomor_kendaraan'] ?></span>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-icon bg-danger">
                                            <i class="feather icon-clock font-medium-2"></i>
                                        </div>
                                        <div class="timeline-info">
                                            <p class="font-weight-bold">Member</p>
                                            <p>Terakhir update :
                                                <span class="text-muted"><?= $driver['update_at'] ?></span>
                                            </p>
                                            <p>dibuat pada:
                                                <span class="text-muted"><?= $driver['created_at'] ?></span>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- driver tabs start -->
                <div class="col-lg-8 col-sm-12">
                    <section id="basic-tabs-components">
                        <div class="card overflow-hidden">
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="drivertransaction-tab" data-toggle="tab" href="#drivertransaction" aria-controls="drivertransaction" role="tab" aria-selected="true">Transaksi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="driverwallet-tab" data-toggle="tab" href="#driverwallet" aria-controls="driverwallet" role="tab" aria-selected="false">Saldo</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="service-tab" data-toggle="tab" href="#job" role="tab" aria-controls="service">Job & Kendaraan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="avatar-tab" data-toggle="tab" href="#avatar" role="tab" aria-controls="avatar">Photo Profil</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="files-tab" data-toggle="tab" href="#files" role="tab" aria-controls="files">File</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="security">Password</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="transactionhistory-tab" data-toggle="tab" href="#transactionhistory" role="tab" aria-controls="transactionhistory">History Transaksi</a>
                                        </li>
                                        
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="drivertransaction" aria-labelledby="drivertransaction-tab" role="tabpanel">
                                            <!-- start driver transaction data table -->
                                            <section id="column-selectors">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Transaksi Driver</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body card-dashboard">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped dataex-html5-selectors">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No.</th>
                                                                                    <th>Inv Transaksi</th>
                                                                                    <th>Layanan</th>
                                                                                    <th>Tanggal</th>
                                                                                    <th>Jumlah</th>
                                                                                    <th>Status</th>
                                                                                    <th>Tindakan</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $i = 1;
                                                                                foreach ($transaksi as $tr) { ?>
                                                                                    <tr>
                                                                                        <td><?= $i ?></td>
                                                                                        <td>#INV-<?= $tr['id'] ?></td>
                                                                                        <td><?= $tr['fitur'] ?></td>
                                                                                        <td><?= $tr['waktu_order'] ?></td>
                                                                                        <td class="text-success">
                                                                                            <?= $currency['app_currency'] ?>
                                                                                            <?= number_format($tr['biaya_akhir'] , 0, ".", ".") ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php if ($tr['status'] == '0') { ?>
                                                                                                <p class="ml-2 badge badge-danger">Tidak ada driver!</p>
                                                                                            <?php } ?>
                                                                                            <?php if ($tr['status'] == '1') { ?>
                                                                                                <p class="ml-2 badge badge-info"><?= $tr['status_transaksi'] ?></p>
                                                                                            <?php } ?>
                                                                                            <?php if ($tr['status'] == '2') { ?>
                                                                                                <p class="ml-2 badge badge-primary"><?= $tr['status_transaksi'] ?></p>
                                                                                            <?php } ?>
                                                                                            <?php if ($tr['status'] == '3') { ?>
                                                                                                <p class="ml-2 badge badge-primary"><?= $tr['status_transaksi'] ?></p>
                                                                                            <?php } ?>
                                                                                            <?php if ($tr['status'] == '4') { ?>
                                                                                                <p class="ml-2 badge badge-success"><?= $tr['status_transaksi'] ?></p>
                                                                                            <?php } ?>
                                                                                            <?php if ($tr['status'] == '5') { ?>
                                                                                                <p class="ml-2 badge badge-warning"><?= $tr['status_transaksi'] ?></p>
                                                                                            <?php } ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="mr-1">
                                                                                                <a href="<?= base_url(); ?>dashboard/detail/<?= $tr['id_transaksi']; ?>">
                                                                                                    <i class="feather icon-eye text-info"></i>
                                                                                                </a>
                                                                                            </span>
                                                                                        </td>
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
                                            </section>
                                            <!-- end of driver transaction data table -->
                                        </div>
                                        <div class="tab-pane" id="driverwallet" aria-labelledby="driverwallet-tab" role="tabpanel">
                                            <!-- start driver wallet data table -->
                                            <section id="column-selectors">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Saldo Driver</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body card-dashboard">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped dataex-html5-selectors">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No.</th>
                                                                                    <th>Id</th>
                                                                                    <th>Tipe</th>
                                                                                    <th>Tanggal</th>
                                                                                    <th>Jumlah</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $i = 1;
                                                                                foreach ($wallet as $wl) { ?>
                                                                                    <tr>
                                                                                        <td><?= $i ?></td>
                                                                                        <td><?= $wl['id']; ?></td>
                                                                                        <td><?= $wl['type']; ?></td>
                                                                                        <td><?= $wl['waktu']; ?></td>

                                                                                        <?php if ($wl['type'] == 'topup' or $wl['type'] == 'Order+') { ?>
                                                                                            <td class="text-success">
                                                                                                <?= $currency['app_currency'] ?>
                                                                                                <?= number_format($wl['jumlah'] , 0, ".", ".") ?>
                                                                                            </td>

                                                                                        <?php } else { ?>
                                                                                            <td class="text-danger">
                                                                                                <?= $currency['app_currency'] ?>
                                                                                                <?= number_format($wl['jumlah'] , 0, ".", ".") ?>
                                                                                            </td>
                                                                                        <?php } ?>

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
                                            </section>

                                            <!-- end of driver wallet data table -->
                                        </div>
                                        <!-- jjob vehicle form -->
                                        <div class="tab-pane fade" id="job" role="tabpanel" aria-labelledby="service">
                                            <?= form_open_multipart('driver/ubahkendaraan'); ?>
                                            <input type="hidden" name="id" value="<?= $driver['id'] ?>">
                                            <input type="hidden" name="id_k" value="<?= $driver['id_k'] ?>">
                                            <div class="form-group">
                                                <label for="Job Service">Kendaraan</label>
                                                <select class="js-example-basic-single" name="jenis" style="width:100%">\
                                                    <?php foreach ($driverjob as $drj) { ?>
                                                        <option value="<?= $drj['id'] ?>" <?php if ($driver['job'] == $drj['id']) { ?>selected<?php } ?>><?= $drj['driver_job'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="brand">Merek Kendaraan</label>
                                                <input type="text" class="form-control" name="merek" id="brand" value="<?= $driver['merek'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="variantvehicle">Jenis Kendaraan</label>
                                                <input type="text" class="form-control" name="tipe" id="variantvehicle" value="<?= $driver['tipe'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="vehiclecolor">Warna</label>
                                                <input type="text" class="form-control" name="warna" id="vehiclecolor" value="<?= $driver['warna'] ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="vehicleregistration">Plat Nomor</label>
                                                <input type="text" class="form-control" name="nomor_kendaraan" id="vehicleregistration" value="<?= $driver['nomor_kendaraan'] ?>" required>
                                            </div>
                                            <div class="form-group mt-5">
                                                <button type="submit" class="btn btn-success mr-2">Perbarui</button>
                                                <button class="btn btn-outline-danger">Batal</button>
                                            </div>
                                            <?= form_close(); ?>
                                        </div>
                                        <!-- tab content ends -->

                                        <div class="tab-pane fade" id="avatar" role="tabpanel" aria-labelledby="avatar-tab">
                                            <?= form_open_multipart('driver/ubahfoto'); ?>
                                            <input type="hidden" name="id" value="<?= $driver['id'] ?>">
                                            <label>Photo</label>
                                            <input type="file" class="dropify" name="foto" data-max-file-size="3mb" data-default-file="<?= base_url('images/fotodriver/') . $driver['foto'] ?>" />

                                            <div class="form-group mt-5">
                                                <button type="submit" class="btn btn-success mr-2">Perbarui</button>
                                                <button class="btn btn-outline-danger">Batal</button>
                                            </div>
                                            <?= form_close(); ?>
                                        </div>

                                        <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="files-tab">

                                            <?= form_open_multipart('driver/ubahcard'); ?>

                                            <input type="hidden" name="id" value="<?= $driver['id'] ?>">

                                            <div class="form-group">
                                                <label for="idcard">Nomor Identitas</label>
                                                <input type="text" class="form-control" name="no_ktp" value="<?= $driver['no_ktp'] ?>" required>
                                            </div>

                                            <div>
                                                <label>Photo Identitas</label>
                                                <input type="file" class="dropify" name="foto_ktp" data-max-file-size="3mb" data-default-file="<?= base_url('images/fotoberkas/ktp/') . $driver['foto_ktp'] ?>" />
                                                <br>
                                            </div>
                                            <div class="form-group">
                                                <label for="idcard">Nomor SIM</label>
                                                <input type="text" class="form-control" name="id_sim" value="<?= $driver['id_sim'] ?>" required>
                                            </div>
                                            <div>
                                                <label>gambar SIM</label>
                                                <input type="file" class="dropify" name="foto_sim" data-max-file-size="3mb" data-default-file="<?= base_url('images/fotoberkas/sim/') . $driver['foto_sim'] ?>" />
                                            </div>
                                            <br>
                                            <div>
                                                <label>gambar STNK</label>
                                                <br>
                                                <input type="file" class="dropify" name="foto_stnk" data-max-file-size="3mb" data-default-file="<?= base_url('images/fotoberkas/stnk/') . $driver['foto_stnk'] ?>" />
                                            </div>
                                            <br>
                                            <div>
                                                <label>gambar Kendaraan</label>
                                                <br>
                                                <input type="file" class="dropify" name="foto_kendaraan" data-max-file-size="3mb" data-default-file="<?= base_url('images/fotoberkas/kendaraan/') . $driver['foto_kendaraan'] ?>" />
                                            </div>
                                            <div class="form-group mt-5">
                                                <button type="submit" class="btn btn-success mr-2">Perbarui</button>
                                                <button class="btn btn-outline-danger">Batal</button>
                                            </div>
                                            <?= form_close(); ?>
                                        </div>

                                        <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                                            <?= form_open_multipart('driver/ubahpassword'); ?>
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="<?= $driver['id'] ?>">
                                                <label for="new-password">Ubah password</label>
                                                <input type="password" class="form-control" id="new-password" name="password" placeholder="Enter you new password" required>
                                            </div>
                                            <div class="form-group mt-5">
                                                <button type="submit" class="btn btn-success mr-2">Perbarui</button>
                                                <button class="btn btn-outline-danger">Batal</button>
                                            </div>
                                            <?= form_close(); ?>
                                        </div>

                                        <div class="tab-pane fade" id="transactionhistory" role="tabpanel" aria-labelledby="transactionhistory-tab">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <table id="order-listing1" class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>No.</th>
                                                                    <th>Transaksi</th>
                                                                    <th>Layanan</th>
                                                                    <th>Tanggal</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Status</th>
                                                                    <th>Tindakan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i = 1;
                                                                foreach ($transaksi as $tr) { ?>
                                                                    <tr>
                                                                        <td><?= $i ?></td>
                                                                        <td>#INV-<?= $tr['id'] ?></td>
                                                                        <td><?= $tr['fitur'] ?></td>
                                                                        <td><?= $tr['waktu_order'] ?></td>
                                                                        <td class="text-success">
                                                                            <?= $currency['app_currency'] ?>
                                                                            <?= number_format($tr['biaya_akhir'] , 0, ".", ".") ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if ($tr['status'] == '2') { ?>
                                                                                <label class="badge badge-primary"><?= $tr['status_transaksi']; ?></label>
                                                                            <?php } ?>
                                                                            <?php if ($tr['status'] == '3') { ?>
                                                                                <label class="badge badge-success"><?= $tr['status_transaksi']; ?></label>
                                                                            <?php } ?>
                                                                            <?php if ($tr['status'] == '5') { ?>
                                                                                <label class="badge badge-danger"><?= $tr['status_transaksi']; ?></label>
                                                                            <?php } ?>
                                                                            <?php if ($tr['status'] == '4') { ?>
                                                                                <label class="badge badge-info"><?= $tr['status_transaksi']; ?></label>
                                                                            <?php } ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?= base_url(); ?>dashboard/detail/<?= $tr['id_transaksi']; ?>" class="btn btn-outline-primary">Lihat</a>
                                                                        </td>
                                                                    <?php $i++;
                                                                } ?>
                                                                    </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- end of driver tab -->

            </div>

            <!-- end of detail driver -->
        </div>
    </div>
</div>
<!-- END: Content-->

<!-- Modal -->
<!-- edit driver info -->
<div class="modal fade text-left" id="maininfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Informasi Driver</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pr-2 pl-2">

                <section id="basic-vertical-layouts">
                    <?= form_open_multipart('driver/ubahid'); ?>
                    <form class="form form-vertical">
                        <div class="form-body">
                            <div class="row">
                                <!-- start driver info form -->

                                <input type="hidden" name="id" value="<?= $driver['id'] ?>">

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <input type="file" name="foto" class="dropify" data-max-file-size="1mb" data-default-file="<?= base_url(); ?>images/fotodriver/<?= $driver['foto'] ?>" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="driver_name">Nama</label>
                                        <input type="text" id="name" class="form-control" name="nama_driver" placeholder="enter name" value="<?= $driver['nama_driver'] ?>" required></div>
                                </div>
                           <div class="col-12">
                                    <label>Nomor hp</label>
                                    <div class="row">
                                        <input type="hidden" name="id" value="<?= $driver['id'] ?>">
                                        <input type="hidden" id="countrycode" value="<?= $driver['countrycode'] ?>">

                                        <div class="form-group col-4">
                                            <input type="tel" id="txtPhone" class="form-control" name="countrycode" required="required">
                                        </div>
                                        <div class=" form-group col-8">
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="masukan nomor hp" value="<?= $driver['phone'] ?>" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <fieldset class="form-group">
                                            <textarea class="form-control" id="basicTextarea" rows="1" name="email" required><?= $driver['email'] ?></textarea>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="driver_address">Alamat</label>
                                        <fieldset class="form-group">
                                            <textarea class="form-control" id="basicTextarea" rows="3" name="alamat_driver" required><?= $driver['alamat_driver'] ?></textarea>
                                        </fieldset>
                                    </div>
                                </div>
                                      <div class="col-12">
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input type="date" id="tgl_lahir" class="form-control" name="tgl_lahir" value="<?= $driver['tgl_lahir'] ?>" required></div>
                                </div>

                                <div class="col-12 form-group">
                                    <label for="gender">
                                        Gender
                                    </label>
                                    <select class="select2 form-control" id="data-gender" name="gender" required>
                                        <option value="Male" <?php if ($driver['gender'] == 'Male') { ?>selected<?php } ?>>Pria</option>
                                        <option value="Female" <?php if ($driver['gender'] == 'Female') { ?>selected<?php } ?>>Wanita</option>
                                    </select>
                                </div>

                                <div class="col-12 form-group">
                                    <label for="jobservice">
                                        Job Service
                                    </label>
                                    <select class="select2 form-control" id="data-job" name="jenis" required>
                                        <?php foreach ($driverjob as $drj) { ?>
                                            <option value="<?= $drj['id'] ?>" <?php if ($driver['job'] == $drj['id']) { ?>selected<?php } ?>><?= $drj['driver_job'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!-- end of driver info form -->

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?= form_close(); ?>
                </section>
            </div>
        </div>
    </div>
</div>
<!-- edit driver info -->

<!-- content-wrapper ends -->
<script type="text/javascript">
    $(function() {
        var code = "<?= $driver['countrycode'] ?>"; // Assigning value from model.
        $('#txtPhone').val(code);
        $('#txtPhone').intlTelInput({
            autoHideDialCode: true,
            autoPlaceholder: "ON",
            dropdownContainer: document.body,
            formatOnDisplay: true,
            hiddenInput: "full_number",
            initialCountry: "auto",
            nationalMode: true,
            placeholderNumberType: "MOBILE",
            preferredCountries: ['US'],
            separateDialCode: false
        });
        console.log(code)
    });
</script>
