<!-- partial -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- detail customer Start -->

            <div class="row">

                <div class="col-lg-4 col-sm-12">

                    <div class="card">
                        <div class="card-header mx-auto pb-0">
                            <div class="row m-0">
                                <div class="text-center">
                                    <h4><?= $user['fullnama'] ?>
                                    </h4>
                                    <div>
                                        <p class=""><?= $user['id'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body text-center mx-auto">
                                <div class="avatar avatar-xl">
                                    <img class="img-fluid" src="<?= base_url('images/pelanggan/') . $user['fotopelanggan']; ?>" alt="img placeholder"></div>
                                <div class="col-sm-12 text-center mt-2">
                                    <p class=""></p>
                                </div>

                                <div class="col-sm-12 text-center mt-1 mb-2">
                                    <?php if ($user['status'] == 1) { ?>
                                        <h3 class="badge badge-info">Aktif</h3>
                                    <?php } else { ?>
                                        <h3 class="badge badge-dark">Banned</h3>
                                    <?php  } ?>
                                    <span class="badge badge-outline-warning" data-toggle="modal" data-target="#customerinfo">
                                        <a>
                                            <i class="feather icon-edit"></i>
                                            Ubah Info
                                        </a>
                                    </span>

                                </div>
                                <hr class="my-1">
                                <div class="row">
                                    <div class="uploads col-6">
                                        <p class="font-weight-bold font-medium-2 mb-0"><?= count($countorder) ?></p>
                                        <span class="">Order</span>
                                    </div>
                                    <div class="followers col-6">
                                        <p class="font-weight-bold font-medium-2 mb-0">
                                            <?= $duit ?>
                                            <?= number_format($user['saldo'] , 0, ".", ".") ?>
                                        </p>
                                            <span class="">Saldo</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="activity-timeline timeline-left list-unstyled">
                                    <li>
                                        <div class="timeline-icon bg-warning">
                                            <i class="feather icon-mail font-medium-2"></i>
                                        </div>
                                        <div class="timeline-info">
                                            <p class="font-weight-bold">Kontak</p>
                                            <p>Nomor hp :
                                                <span class="text-muted"><?= $user['countrycode'] ?>
                                                    <?= $user['no_telepon'] ?></span>
                                            </p>
                                            <p>email :
                                                <span class="text-muted"><?= $user['email'] ?></span>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-icon bg-info">
                                            <i class="feather icon-credit-card font-medium-2"></i>
                                        </div>
                                        <div class="timeline-info">
                                            <p class="font-weight-bold">Identitas</p>
                                            <p>Tanggal Lahir :
                                                <span class="text-muted"><?= $user['tgl_lahir'] ?></span>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-icon bg-danger">
                                            <i class="feather icon-clock font-medium-2"></i>
                                        </div>
                                        <div class="timeline-info">
                                            <p class="font-weight-bold">Member</p>
                                            <p>Tanggal Bergabung :
                                                <span class="text-muted"><?= $user['created_on'] ?></span>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- customer tabs start -->
                <div class="col-lg-8 col-sm-12">
                    <section id="basic-tabs-components">
                        <div class="card overflow-hidden">
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- <h4>Detail User</h4> -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="customertransaction-tab" data-toggle="tab" href="#customertransaction" aria-controls="customertransaction" role="tab" aria-selected="false">Riwayat Transaksi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="customerwallet-tab" data-toggle="tab" href="#customerwallet" aria-controls="customerwallet" role="tab" aria-selected="false">Saldo</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="customertransaction" aria-labelledby="customertransaction-tab" role="tabpanel">
                                            <!-- start customer transaction data table -->
                                            <section id="column-selectors">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Transaksi Customer</h4>
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
                                                                                foreach ($countorder as $tr) { ?>
                                                                                    <tr>
                                                                                        <td><?= $i ?></td>
                                                                                        <td>#INV-<?= $tr['id'] ?></td>
                                                                                        <td><?= $tr['fitur'] ?></td>
                                                                                        <td><?= $tr['waktu_order'] ?></td>
                                                                                        <td class="text-success">
                                                                                            <?= $duit ?>
                                                                                            <?= number_format($tr['biaya_akhir'] , 0, ".", ".") ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php if ($tr['status'] == '0') { ?>
                                                                                                <p class="ml-2 badge badge-danger">No Driver!</p>
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
                                                                                            <a href="<?= base_url(); ?>dashboard/detail/<?= $tr['id_transaksi']; ?>" class="btn btn-outline-primary">Lihat</a>
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
                                            <!-- end of customer transaction data table -->
                                        </div>
                                        <div class="tab-pane" id="customerwallet" aria-labelledby="customerwallet-tab" role="tabpanel">
                                            <!-- start customer wallet data table -->
                                            <section id="column-selectors">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Saldo Customer</h4>
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
                                                                                                <?= $duit ?>
                                                                                                <?= number_format($wl['jumlah'] , 0, ".", ".") ?>
                                                                                            </td>

                                                                                        <?php } else { ?>
                                                                                            <td class="text-danger">
                                                                                                <?= $duit ?>
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

                                            <!-- end of customer wallet data table -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- end of customer tab -->

            </div>

            <!-- end of detail customer -->
        </div>
    </div>
</div>
<!-- END: Content-->

<!-- Modal -->
<!-- edit customer info -->
<div class="modal fade text-left" id="customerinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Customer Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pr-2 pl-2">

                <section id="basic-vertical-layouts">
                    <?= form_open_multipart('users/ubahid'); ?>
                    <form class="form form-vertical">
                        <div class="form-body">
                            <div class="row">
                                <!-- start customer info form -->

                                <input type="hidden" name="id" value="<?= $user['id'] ?>">

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <input type="file" name="fotopelanggan" class="dropify" data-max-file-size="1mb" data-default-file="<?= base_url('images/pelanggan/') . $user['fotopelanggan'] ?>" />
                                    </div>

                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="customer_fullname">Nama</label>
                                        <input type="text" id="fullnama" class="form-control" name="fullnama" placeholder="enter name" value="<?= $user['fullnama'] ?>" required="required"></div>
                                </div>
                                   <div class="col-12">
                                    <div class="form-group">
                                        <label for="kota">Kota</label>
                                        <input type="text" id="kota" class="form-control" name="kota" placeholder="asal kota" value="<?= $user['kota'] ?>" required="required"></div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="dob">Tanggal Lahir</label>
                                        <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" placeholder="enter name" value="<?= $user['tgl_lahir'] ?>" required="required"></div>
                                </div>

                                <div class="col-12">
                                    <label>Phone</label>

                                    <div class="row">

                                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                        <input type="hidden" id="countryec" value="<?= $user['countrycode'] ?>">

                                        <div class="form-group col-4">
                                            <input type="tel" id="txtPhone" class="form-control" name="countrycode" required="required">
                                        </div>
                                        <div class=" form-group col-8">
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="enter phone number" value="<?= $user['no_telepon'] ?>" required="required">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control" name="email" placeholder="enter email" value="<?= $user['email'] ?>" required="required"></div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" id="new-password" name="password" class="form-control" placeholder="enter password" ></div>
                                </div>

                                <!-- end of customer info form -->

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
<!-- edit customer info -->


<!-- content-wrapper ends -->
<script type="text/javascript">
    $(function() {
        var code = "<?= $user['countrycode'] ?>"; // Assigning value from model.
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