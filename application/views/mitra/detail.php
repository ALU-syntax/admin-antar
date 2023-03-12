<!-- partial -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true&libraries=places">
</script>
<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=<?= google_maps_api ?>&sensor=false&libraries=places'></script>
<script src="<?= base_url(); ?>asset/js/locationpicker.jquery.js"></script>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row">
                <div class="col-lg-4 col-sm-12">

                    <div class="card">
                        <div class="card-header mx-auto pb-0">
                            <div class="row m-0">
                                <div>
                                    <div class="text-center card-title mb-1">
                                        <span><?= $mitra['nama_merchant'] ?>
                                        </span> <?php if ($mitra['partner'] == 1) { ?>
                                            <span class="badge badge-primary">Official</span>
                                        <?php } else { ?>
                                        <?php } ?>
                                    </div>
                                    <div class="text-center"><?= $mitra['nama_mitra'] ?>
                                        <p class="">M78343843</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body text-center mx-auto">
                                <div class="avatar avatar-xl">
                                    <img class="img-fluid" src="<?= base_url('images/merchant/') . $mitra['foto_merchant'] ?>" alt="img placeholder"></div>
                                <div class="col-sm-12 text-center mt-2">
                                    <p class=""><?php if ($mitra['status_mitra'] == 3) { ?>
                                            <h3 class="badge badge-dark">Banned</h3>
                                        <?php } elseif ($mitra['status_mitra'] == 0) { ?>
                                            <h3 class="badge badge-secondary text-dark">New Reg</h3>
                                        <?php } else { ?>
                                            <?php if ($mitra['status_merchant'] == 1) { ?>
                                                <h3 class="badge badge-success">Active</h3>
                                            <?php } ?>
                                            <?php if ($mitra['status_merchant'] == 0) { ?>
                                                <h3 class="badge badge-danger">NonActive</h3>
                                            <?php } ?>
                                        <?php } ?></p>

                                </div>

                                <div class="col-sm-12 text-center mt-1 mb-2">

                                    <span class="badge badge-warning" data-toggle="modal" data-target="#ownerinfo">
                                        <a>
                                            <i class="feather icon-edit"></i>
                                            edit owner
                                        </a>
                                    </span>

                                    <span class="badge badge-outline-warning" data-toggle="modal" data-target="#merchantinfo">
                                        <a>
                                            <i class="feather icon-edit"></i>
                                            edit merchant
                                        </a>
                                    </span>

                                </div>
                                <hr class="my-1">
                                <div class="d-flex justify-content-between mt-2">
                                    <div class="uploads">
                                        <p class="font-weight-bold font-medium-2 mb-0"><?= $mitra['fitur'] ?> </p>
                                        <span class="">Merchant Type</span>
                                    </div>
                                    <div class="followers">
                                        <p class="font-weight-bold font-medium-2 mb-0">
                                            <?= $mitra['nama_kategori'] ?>
                                        </p>
                                        <span class="">Category</span>
                                    </div>
                                    <div class="following">
                                        <p class="font-weight-bold font-medium-2 mb-0"><?= $countorder ?></p>
                                        <span class="">Order</span>
                                    </div>
                                    <div class="following">
                                        <p class="font-weight-bold font-medium-2 mb-0"><?= $currency['app_currency'] ?>
                                            <?= number_format($mitra['saldo'] , 0, ".", ".") ?></p>
                                        <span class="">Saldo</span>
                                    </div>
                                </div>

                                <?php if ($mitra['status_mitra'] == 0) { ?>
                                    <a href="<?= base_url(); ?>mitra/confirmmitra/<?= $mitra['id_mitra'] ?>">
                                        <h3 class="btn btn-success col-12 mt-2">Confirm Merchant</h3>
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
                                        <h4 class="card-title">Files</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="swiper-paginations swiper-container">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <img style="max-width : 100%; height: 200px; display: inline–block;" src="<?= base_url('images/fotoberkas/ktp/') . $mitra['foto_ktp'] ?>" alt="">
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
                                            <p class="font-weight-bold">Identitas
                                            </p>
                                            <p>Tipe identitas :
                                                <span class="text-muted"><?= $mitra['jenis_identitas_mitra'] ?></span>
                                            </p>
                                            <p>No indentitas :
                                                <span class="text-muted"><?= $mitra['nomor_identitas_mitra'] ?></span></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-icon bg-warning">
                                            <i class="feather icon-mail font-medium-2"></i>
                                        </div>
                                        <div class="timeline-info">
                                            <p class="font-weight-bold">Kontak
                                            </p>
                                            <p>No. HP :
                                                <span class="text-muted"><?= $mitra['country_code_mitra'] ?>
                                                    <?= $mitra['telepon_mitra'] ?></span></p>
                                            <p>Email :
                                                <span class="text-muted"><?= $mitra['email_mitra'] ?></span>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-icon bg-info">
                                            <i class="feather icon-map-pin font-medium-2"></i>
                                        </div>
                                        <div class="timeline-info">
                                            <p class="font-weight-bold">Alamat
                                            </p>
                                            <p>Owner Address :
                                                <span class="text-muted"><?= $mitra['alamat_mitra'] ?></span>
                                            </p>
                                            <p>Merchant Location :
                                                <span class="text-muted"><?= $mitra['alamat_merchant'] ?></span>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-icon bg-warning">
                                            <i class="feather icon-clock font-medium-2"></i>
                                        </div>
                                        <div class="timeline-info">
                                            <p class="font-weight-bold">Jam Operasional
                                            </p>
                                            <p>Buka :
                                                <span class="text-muted"><?= $mitra['jam_buka'] ?></span>
                                            </p>
                                            <p>Tutup :
                                                <span class="text-muted"><?= $mitra['jam_tutup'] ?></span>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-icon bg-danger">
                                            <i class="feather icon-clock font-medium-2"></i>
                                        </div>
                                        <div class="timeline-info">
                                            <p class="font-weight-bold">Member</p>
                                            <p>Created on :
                                                <span class="text-muted"><?= $mitra['created_mitra'] ?></span>
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
                                    <?php if ($this->session->flashdata('demo') or $this->session->flashdata('hapus') or $this->session->flashdata('gagal')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $this->session->flashdata('demo'); ?>
                                            <?php echo $this->session->flashdata('hapus'); ?>
                                            <?php echo $this->session->flashdata('gagal'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($this->session->flashdata('tambah') or $this->session->flashdata('ubah')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $this->session->flashdata('tambah'); ?>
                                            <?php echo $this->session->flashdata('ubah'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="merchanttransaction-tab" data-toggle="tab" href="#merchanttransaction" aria-controls="merchanttransaction" role="tab" aria-selected="true">Transaction</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="merchantwallet-tab" data-toggle="tab" href="#merchantwallet" aria-controls="merchantwallet" role="tab" aria-selected="false">Wallet</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="merchanttransaction" aria-labelledby="merchanttransaction-tab" role="tabpanel">
                                            <!-- start merchant transaction data table -->
                                            <section id="column-selectors">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Merchant Transaction</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body card-dashboard">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped dataex-html5-selectors">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No.</th>
                                                                                    <th>Transaksi Inv</th>
                                                                                    <th>Tanggal</th>
                                                                                    <th>Customer_name</th>
                                                                                    <th>Jumlah Item</th>
                                                                                    <th>Jumlah Total</th>
                                                                                    <th>Tindakan</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $i = 1;
                                                                                foreach ($transaksi as $tr) { ?>
                                                                                    <tr>
                                                                                        <td><?= $i ?></td>
                                                                                        <td>INV-<?= $tr['id_transaksi'] ?></td>
                                                                                        <td><?= $tr['waktu_order'] ?></td>
                                                                                        <td><?= $tr['fullnama'] ?></td>
                                                                                        <td><?= $tr['jumlah_item'] ?></td>
                                                                                        <td>
                                                                                            <?= $currency['app_currency'] ?>
                                                                                            <?= number_format($tr['total_biaya'] , 0, ".", ".") ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="<?= base_url(); ?>dashboard/detail/<?= $tr['id_transaksi'] ?>" class="btn btn-outline-primary">View</a>
                                                                                        </td>
                                                                                    <?php $i++; ?>
                                                                                    </tr>
                                                                               <?php } ?>
                                                                                    
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- end of merchant transaction data table -->
                                        </div>
                                        <div class="tab-pane" id="merchantwallet" aria-labelledby="merchantwallet-tab" role="tabpanel">
                                            <!-- start merchant wallet data table -->
                                            <section id="column-selectors">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Merchant Wallet</h4>
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

                                            <!-- end of merchant wallet data table -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="basic-tabs-components">
                        <div class="card overflow-hidden">
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="itemcategory-tab" data-toggle="tab" href="#itemcategory" aria-controls="itemcategory" role="tab" aria-selected="true">Item Category</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="item-tab" data-toggle="tab" href="#item" aria-controls="item" role="tab" aria-selected="false">Item</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="itemcategory" aria-labelledby="itemcategory-tab" role="tabpanel">
                                            <!-- start item category data table -->
                                            <section id="column-selectors">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Item Category</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body card-dashboard">
                                                                    <a class="btn btn-success mb-1 text-white" data-toggle="modal" data-target="#addcategory">
                                                                        <i class="feather icon-plus mr-1"></i>Add Category Item</a>
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped dataex-html5-selectors">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No.</th>
                                                                                    <th>Nama Kategori</th>
                                                                                    <th>Actions</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $i = 1;
                                                                                foreach ($itemk as $itkate) { ?>
                                                                                    <h4 id="idkat<?= $i ?>" style=display:none;><?= $itkate['id_kategori_item'] ?></h4>
                                                                                    <tr>
                                                                                        <td><?= $i ?></td>
                                                                                        <td id="namkat<?= $i ?>"><?= $itkate['nama_kategori_item'] ?></td>
                                                                                        <td>

                                                                                            <span class="mr-1">
                                                                                                <a href="#" data-toggle="modal" data-target="#editcategory" onclick="edititemcategoryFunction('<?= $itkate['nama_kategori_item'] . ',' . $itkate['id_kategori_item'] ?>')">
                                                                                                    <i class="feather icon-edit text-info"></i>
                                                                                                </a>
                                                                                            </span>
                                                                                            <span class="action-delete mr-1">
                                                                                                <a href="<?= base_url(); ?>mitra/hapuscategoryitem/<?= $itkate['id_kategori_item']; ?>" onclick="return confirm ('are you sure?')">
                                                                                                    <i class="feather icon-trash text-danger"></i>
                                                                                                </a>
                                                                                            </span>
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
                                            </section>
                                            <!-- end of item category data table -->
                                        </div>
                                        <div class="tab-pane" id="item" aria-labelledby="item-tab" role="tabpanel">
                                            <!-- start item data table -->
                                            <section id="column-selectors">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Item</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body card-dashboard">
                                                                    <a class="btn btn-success mb-1 text-white" href="<?= base_url(); ?>mitra/tambahitem/<?= $mitra['id_mitra'] ?>">
                                                                        <i class="feather icon-plus mr-1"></i>Add Item</a>
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped dataex-html5-selectors">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No.</th>
                                                                                    <th>Gambar Menu</th>
                                                                                    <th>Nama Menu</th>
                                                                                    <th>Harga</th>
                                                                                    <th>Harga Promo</th>
                                                                                    <th>status</th>
                                                                                    <th>Tindakan</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $i = 1;
                                                                                foreach ($item as $it) {
                                                                                ?>
                                                                                    <tr>
                                                                                        <td><?= $i ?></td>
                                                                                        <td><img class="round" style="width: 40px; height: 40px;"  src="<?= base_url('images/itemmerchant/') . $it['foto_item']; ?>"></td>
                                                                                        <td id="namaitem<?= $i ?>"><?= $it['nama_item'] ?></td>
                                                                                        <?php if ($it['status_promo'] == 0) { ?>
                                                                                            <td><?= $currency['app_currency'] ?><?= number_format($it['harga_item'] , 0, ".", ".") ?></td>
                                                                                        <?php } else { ?>
                                                                                            <td style="text-decoration: line-through;"><?= $currency['app_currency'] ?><?= number_format($it['harga_item'] , 0, ".", ".") ?></td>
                                                                                        <?php } ?>
                                                                                        <?php if ($it['status_promo'] == 1) { ?>
                                                                                            <td class="text-success"><?= $currency['app_currency'] ?><?= number_format($it['harga_promo'] , 0, ".", ".") ?></td>
                                                                                        <?php } else { ?>
                                                                                            <td><label class="badge badge-danger">Tidak Promo</label></td>
                                                                                        <?php } ?>
                                                                                        <?php if ($it['status_item'] == 1) { ?>
                                                                                            <td><label class="badge badge-primary">Aktif</label></td>
                                                                                        <?php } else { ?>
                                                                                            <td><label class="badge badge-danger">Non Aktif</label></td>
                                                                                        <?php } ?>
                                                                                        <td>
                                                                                            <span class=" mr-1">
                                                                                                <a href="<?= base_url(); ?>mitra/edititem/<?= $it['id_item'] ?>">
                                                                                                    <i class="feather icon-edit text-info"></i>
                                                                                                </a>
                                                                                            </span>
                                                                                            <span class="action-delete mr-1">
                                                                                                <a onclick="return confirm ('Are You Sure Want To Delete This Item?')" href=" <?= base_url(); ?>mitra/hapusitem/<?= $it['id_item'] ?>">
                                                                                                    <i class="feather icon-trash text-danger"></i>
                                                                                                </a>
                                                                                            </span>

                                                                                        </td>
                                                                                    <?php 
                                                                                    $i++;
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
                                            </section>

                                            <!-- end of item data table -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
                <!-- end of driver tab -->
            </div>
        </div>
    </div>

</div>


<!-- Modal -->
<!-- edit owner info -->
<div class="modal fade text-left" id="ownerinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Edit Owner</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pr-2 pl-2">

                <section id="basic-vertical-layouts">
                    <?= form_open_multipart('mitra/editmitradetail'); ?>
                    <form class="form form-vertical">
                        <div class="form-body">
                            <div class="row">
                                <!-- start owner info form -->
                                <input type="hidden" class="form-control" name="id_mitra" value="<?= $mitra['id_mitra'] ?>">
                                <input type="hidden" class="form-control" name="id_merchant" value="<?= $mitra['id_merchant'] ?>">

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Nama Partner</label>
                                        <input type="text" class="form-control" id="name" name="nama_mitra" value="<?= $mitra['nama_mitra'] ?>" required>
                                    </div>
                                </div>

                                <div class="col-12 form-group">
                                    <label for="partner">
                                        Official Partner
                                    </label>
                                    <select class="select2 form-control" id="partner" name="partner" required="required">
                                        <option id="partner" value="1" <?php if ($mitra['partner'] == 1) { ?>selected<?php } ?>>Partner</option>
                                        <option id="non" value="0" <?php if ($mitra['partner'] == 0) { ?>selected<?php } ?>>NonPartner</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="partner_address">Owner Address</label>
                                        <fieldset class="form-group">
                                            <textarea class="form-control" id="partner_address" rows="3" name="alamat_mitra" required="required"><?= $mitra['alamat_mitra'] ?></textarea>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label>Phone</label>

                                    <div class="row">
                                        <input type="hidden" id="countryem" value="<?= $mitra['country_code_mitra'] ?>">

                                        <div class="form-group col-4">
                                            <input type="tel" id="txtPhone" class="form-control" name="country_code_mitra">
                                        </div>
                                        <div class=" form-group col-8">
                                            <input type="text" class="form-control" id="phone_mitra" name="phone_mitra" placeholder="enter phone number" value="<?= $mitra['phone_mitra'] ?>" required="required">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email_mitra">Email</label>
                                        <input type="email" id="email_mitra" class="form-control" name="email_mitra" placeholder="enter email" value="<?= $mitra['email_mitra'] ?>" required="required"></div>
                                </div>

                                <div class="col-12">
                                    <button type=" submit" class="btn btn-success btn-block mr-2">Save</button><br />
                                </div>
                            </div>
                        </div>
                    </form>
                                <?= form_close(); ?>

                                <?= form_open_multipart('mitra/editmitrafile'); ?>
                    <form class="form form-vertical">
                        <div class="form-body">
                            <div class="row">
                                <input type="hidden" class="form-control" name="id_mitra" value="<?= $mitra['id_mitra'] ?>">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="jenis_identitas_mitra">Tipe identitas</label>
                                        <input type="text" id="jenis_identitas_mitra" class="form-control" name="jenis_identitas_mitra" placeholder="enter type of id card" value="<?= $mitra['jenis_identitas_mitra'] ?>" required="required"></div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nomor_identitas_mitra">Nomor identitas</label>
                                        <input type="text" id="nomor_identitas_mitra" class="form-control" name="nomor_identitas_mitra" placeholder="enter number of id card" value="<?= $mitra['nomor_identitas_mitra'] ?>" required="required"></div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>ID Card Image</label>
                                        <input type="file"  class="dropify" name="foto_ktp" data-max-file-size="3mb" data-default-file="<?= base_url('images/fotoberkas/ktp/') . $mitra['foto_ktp'] ?>" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type=" submit" class="btn btn-success btn-block mr-2">Save</button><br />
                                </div>
                            </div>
                        </div>
                    </form>

                                <?= form_close(); ?>

                                 <?= form_open_multipart('mitra/editmitrapass'); ?>
                    <form class="form form-vertical">
                        <div class="form-body">
                            <div class="row">
                                <input type="hidden" class="form-control" name="id_mitra" value="<?= $mitra['id_mitra'] ?>">
                                <?= form_close(); ?>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" class="form-control" name="password" placeholder="enter password"></div>
                                </div>
                                <!-- end of owner info form -->

                                <div class="col-12">
                                    <button type=" submit" class="btn btn-success btn-block mr-2">Save</button><br />
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
<!-- edit owner info -->

<!-- edit merchant info -->
<div class="modal fade text-left" id="merchantinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Edit Merchant</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pr-2 pl-2">

                <section id="basic-vertical-layouts">
                    <?= form_open_multipart('mitra/ubahmerchant/' . $mitra['id_mitra']); ?>
                    <form class="form form-vertical">
                        <div class="form-body">
                            <div class="row">
                                <!-- start driver info form -->
                                <input type="hidden" name="id_merchant" value='<?= $mitra['id_merchant'] ?>'>
                                <input type="hidden" name="id_mitra" value="<?= $mitra['id_mitra'] ?>">

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="dropify" name="foto_merchant" data-max-file-size="3mb" data-default-file="<?= base_url('images/merchant/') . $mitra['foto_merchant'] ?>" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="merchant_name">Nama Partner</label>
                                        <input type="text" class="form-control" id="name" name="nama_merchant" value="<?= $mitra['nama_merchant'] ?>" required>
                                    </div>
                                </div>

                                <div class="col-12 form-group">
                                    <label for="service_id">
                                        Layanan
                                    </label>
                                    <select class="select2 form-control fiturService" style="width:100%" name="id_fitur">
                                        <?php foreach ($fitur as $ftr) { ?>
                                            <option id="<?= $ftr['fitur'] ?>" value="<?= $ftr['id_fitur'] ?>" <?php if ($mitra['id_fitur'] == $ftr['id_fitur']) { ?>selected<?php } ?>><?= $ftr['fitur'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-12 form-group">
                                    <label for="merchant_category">
                                        Kategori Layanan
                                    </label>
                                    <select class="select2 form-control" style="width:100%" name="category_merchant">
                                        <?php foreach ($merchantk as $mck) { ?>
                                            <option value="<?= $mck['id_kategori_merchant'] ?>" <?php if ($mck['id_kategori_merchant'] == $mitra['category_merchant']) { ?>selected<?php } ?>><?= $mck['nama_kategori'] ?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" name="alamat_merchant" id="us3-address" autocomplete="off" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <!-- <input type="hidden" id="merchant_latitude" value="<?= $partner['merchant_latitude'] ?>" />
                                        <input type="hidden" id="merchant_longitude" value="<?= $partner['merchant_longitude'] ?>" /> -->
                                        <div id="us3" style="height: 300px;"></div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="merchant_latitude">Latitude</label>
                                                <input type="text" name="latitude_merchant" id="us3-lat" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="merchant_longitude">Longitude</label>
                                                <input type="text" name="longitude_merchant" id="us3-lon" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="jam_buka">Jam Buka</label>
                                                <input type="time" class="form-control" id="op" name="jam_buka" value="<?= $mitra['jam_buka'] ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="close_hour">Jam Tutup</label>
                                                <input type="text" id="close_hour" class="form-control" name="jam_tutup" value="<?= $mitra['jam_tutup'] ?>" placeholder="enter close hour" required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- end of driver info form -->

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
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
<!-- edit merchant info -->


<!-- add category item -->
<div class="modal fade text-left" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Tambah Kategori Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pr-2 pl-2">

                <section id="basic-vertical-layouts">
                    <?= form_open_multipart('mitra/tambahcategoryitem'); ?>
                    <form class="form form-vertical">
                        <div class="form-body">
                            <div class="row">
                                <input type="hidden" class="form-control" name="id_mitra" value="<?= $mitra['id_mitra'] ?>">
                                <input type="hidden" id="foridkat" class="form-control" name="id_kategori_item" value="<?= $mitra['id_merchant'] ?>">

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="category_name_item">Nama Kategori</label>
                                        <input type="text" class="form-control" id="fornamkat" name="nama_kategori_item" value="" required>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
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
<!-- add category item -->








<script>
    $('#us3').locationpicker({
        location: {
            latitude: <?= $mitra["latitude_merchant"] ?>,
            longitude: <?= $mitra["longitude_merchant"] ?>
        },
        radius: 300,
        inputBinding: {
            latitudeInput: $('#us3-lat'),
            longitudeInput: $('#us3-lon'),
            radiusInput: $('#us3-radius'),
            locationNameInput: $('#us3-address')
        },
        enableAutocomplete: true,
        onchanged: function(currentLocation, radius, isMarkerDropped) {}
    });
</script>

<script type="text/javascript">
    $(function() {
        var code = "<?= $mitra['country_code_merchant'] ?>"; // Assigning value from model.
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

<script type="text/javascript">
    $(function() {
        var code = "<?= $mitra['country_code_mitra'] ?>"; // Assigning value from model.
        $('#txtPhone1').val(code);
        $('#txtPhone1').intlTelInput({
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


<script>
    function admSelectCheck(nameSelect) {
        if (nameSelect) {
            yesValue = document.getElementById("yes").value;
            noValue = document.getElementById("no").value;
            if (yesValue == nameSelect.value) {

                document.getElementById("yescheck").required = true;
                document.getElementById("yescheck").style.display = "block";
            } else if (noValue == nameSelect.value) {

                document.getElementById("yescheck").required = false;
                document.getElementById("yescheck").style.display = "none";
            }
        } else {
            document.getElementById("yescheck").style.display = "block";
            document.getElementById("yescheck").required = true;
        }
    }

    function addform() {
        return `<?= form_open_multipart('mitra/tambahcategoryitem'); ?>
                <input type="hidden" id="valmit" class="form-control" name="id_merchant" value="<?= $mitra['id_mitra'] ?>">
                <input type="hidden" id="valmer" class="form-control" name="id_mitra" value="<?= $mitra['id_merchant'] ?>">
                <h4 class="card-title">Add Item Category</h4>
                <div class="form-group">
                    <label for="nama">Category Name</label>
                    <input type="text" class="form-control" id="nama" name="nama_kategori_item" placeholder="enter item category" required>
                </div>
                <div class="row">
                        <button id="kirimid" type="submit" class="btn btn-success mr-2">Submit</button>
                    <?= form_close(); ?>
                        <button id="andhe" class="btn btn-secondary mr-2">cancel</button>
                </div>`
    }
    const tomboltambah = document.getElementById('tomboltambah');
    tomboltambah.addEventListener('click', function() {
        const getformadd = document.getElementById('tambahcategory');
        getformadd.innerHTML = addform();
        const tombolback = document.getElementById('andhe');
        tombolback.addEventListener('click', function() {
            getformadd.innerHTML = backform();
        })
    })

    function backform() {
        return ``
    }

    const jumlah = document.getElementById("jumlah").innerHTML

    for (let i = 0; i < 20; i++) {

        function tombedit(i) {

            const namkat = document.getElementById(`namkat${i}`).innerHTML
            const idkat = document.getElementById(`idkat${i}`).innerHTML
            document.getElementById('editcategory').style = "display:block;";
            document.getElementById('fornamkat').value = namkat;
            document.getElementById('foridkat').value = idkat;
        }
    }

    function kembalikan() {
        document.getElementById('editcategory').style = "display:none;";
    }
</script>