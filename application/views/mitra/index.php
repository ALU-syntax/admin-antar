<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- merchant data Start -->
            <!-- merchant tabs start -->
            <section id="basic-tabs-components">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card overflow-hidden">
                            <div class="card-header">
                                <h4 class="card-title">Partner Data</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <a class="btn btn-success mb-1 text-white" href="<?= base_url(); ?>mitra/tambahmitra">
                                        <i class="feather icon-plus mr-1"></i>Add Partner</a>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="allmerchant-tab" data-toggle="tab" href="#allmerchant" aria-controls="allmerchant" role="tab" aria-selected="true">All Merchants</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="activemerchant-tab" data-toggle="tab" href="#activemerchant" aria-controls="activemerchant" role="tab" aria-selected="false">Active Merchant</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="suspendedmerchant-tab" data-toggle="tab" href="#suspendedmerchant" aria-controls="suspendedmerchant" role="tab" aria-selected="false">Suspended Merchant</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="allmerchant" aria-labelledby="allmerchant-tab" role="tabpanel">
                                            <!-- start all merchant data table -->
                                            <section id="column-selectors">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Semua Partner Data</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body card-dashboard">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped dataex-html5-selectors">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No</th>
                                                                                    <th>Partner Id</th>
                                                                                    <th>Nama</th>
                                                                                    <th>No hp</th>
                                                                                    <th>Nama Merchant</th>
                                                                                    <th>Photo Profil</th>
                                                                                    <th>Layanan</th>
                                                                                    <th>Kategori</th>
                                                                                    <th>Status</th>
                                                                                    <th>Tindakan</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $i = 1;
                                                                                foreach ($mitra as $mrc) {
                                                                                    if ($mrc['status_mitra'] != 0) { ?>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <?= $i ?>
                                                                                            </td>
                                                                                            <td><?= $mrc['id_mitra'] ?></td>
                                                                                            <td><?= $mrc['nama_mitra'] ?></td>
                                                                                            <td><?= $mrc['telepon_mitra'] ?></td>
                                                                                            <td><?= $mrc['nama_merchant'] ?></td>
                                                                                            <td>
                                                                                                <img class="round" style="width: 40px; height: 40px;" src="<?= base_url('images/merchant/') . $mrc['foto_merchant']; ?>">
                                                                                            </td>
                                                                                            <td><?= $mrc['fitur'] ?></td>
                                                                                            <td><?= $mrc['nama_kategori'] ?></td>
                                                                                            <td>
                                                                                                <?php if ($mrc['status_mitra'] == 3) { ?>
                                                                                                    <label class="badge badge-dark">Banned</label>
                                                                                                <?php } else { ?>
                                                                                                    <label class="badge badge-primary">Active</label>
                                                                                                <?php } ?>
                                                                                            </td>
                                                                                            <td>
                                                                                                <span class="mr-1">
                                                                                                    <a href="<?= base_url(); ?>mitra/detail/<?= $mrc['id_mitra'] ?>">
                                                                                                        <i class="feather icon-eye text-success"></i>
                                                                                                    </a>
                                                                                                </span>
                                                                                                <?php
                                                                                                if ($mrc['status_mitra'] == 1) { ?>
                                                                                                    <span class="action-edit mr-1">
                                                                                                        <a href="<?= base_url(); ?>mitra/block/<?= $mrc['id_mitra']; ?>">
                                                                                                            <i class="feather icon-unlock text-info"></i>
                                                                                                        </a>
                                                                                                    </span>
                                                                                                <?php } else { ?>
                                                                                                    <span class="action-edit mr-1">
                                                                                                        <a href="<?= base_url(); ?>mitra/unblock/<?= $mrc['id_mitra']; ?>">
                                                                                                            <i class="feather icon-lock text-danger"></i>
                                                                                                        </a>
                                                                                                    </span>
                                                                                                <?php } ?>
                                                                                                <span class="action-edit mr-1">
                                                                                                    <a onclick="return confirm ('Are You Sure?')" href="<?= base_url(); ?>mitra/hapus/<?= $mrc['id_mitra']; ?>">
                                                                                                        <i class="feather icon-trash text-danger"></i></a>
                                                                                                </span>

                                                                                            </td>
                                                                                        </tr>
                                                                                <?php $i++;
                                                                                    }
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
                                            <!-- end of all merchant data table -->
                                        </div>

                                        <div class="tab-pane" id="activemerchant" aria-labelledby="activemerchant-tab" role="tabpanel">
                                            <!-- start active merchant data table -->
                                            <section id="column-selectors">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Partner Aktif</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body card-dashboard">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped dataex-html5-selectors">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No</th>
                                                                                    <th>Partner Id</th>
                                                                                    <th>Nama</th>
                                                                                    <th>No hp</th>
                                                                                    <th>Nama Merchant</th>
                                                                                    <th>Photo Profil</th>
                                                                                    <th>Layanan</th>
                                                                                    <th>Kategori</th>
                                                                                    <th>Status</th>
                                                                                    <th>Tindakan</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $i = 1;
                                                                                foreach ($mitra as $mrc) {
                                                                                    if ($mrc['status_mitra'] == 1) { ?>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <?= $i ?>
                                                                                            </td>
                                                                                            <td><?= $mrc['id_mitra'] ?></td>
                                                                                            <td><?= $mrc['nama_mitra'] ?></td>
                                                                                            <td><?= $mrc['telepon_mitra'] ?></td>
                                                                                            <td><?= $mrc['nama_merchant'] ?></td>
                                                                                            <td>
                                                                                                <img class="round" style="width: 40px; height: 40px;" src="<?= base_url('images/merchant/') . $mrc['foto_merchant']; ?>">
                                                                                            </td>
                                                                                            <td><?= $mrc['fitur'] ?></td>
                                                                                            <td><?= $mrc['nama_kategori'] ?></td>
                                                                                            <td>
                                                                                                <?php if ($mrc['status_mitra'] == 3) { ?>
                                                                                                    <label class="badge badge-dark">Banned</label>
                                                                                                <?php } else { ?>
                                                                                                    <label class="badge badge-primary">Active</label>
                                                                                                <?php } ?>
                                                                                            </td>
                                                                                            <td>
                                                                                                <span class="mr-1">
                                                                                                    <a href="<?= base_url(); ?>mitra/detail/<?= $mrc['id_mitra'] ?>">
                                                                                                        <i class="feather icon-eye text-success"></i>
                                                                                                    </a>
                                                                                                </span>
                                                                                                <?php
                                                                                                if ($mrc['status_mitra'] == 1) { ?>
                                                                                                    <span class="action-edit mr-1">
                                                                                                        <a href="<?= base_url(); ?>mitra/block/<?= $mrc['id_mitra']; ?>">
                                                                                                            <i class="feather icon-unlock text-info"></i>
                                                                                                        </a>
                                                                                                    </span>
                                                                                                <?php } else { ?>
                                                                                                    <span class="action-edit mr-1">
                                                                                                        <a href="<?= base_url(); ?>mitra/unblock/<?= $mrc['id_mitra']; ?>">
                                                                                                            <i class="feather icon-lock text-danger"></i>
                                                                                                        </a>
                                                                                                    </span>
                                                                                                <?php } ?>
                                                                                                <span class="action-edit mr-1">
                                                                                                    <a onclick="return confirm ('Are You Sure?')" href="<?= base_url(); ?>mitra/hapus/<?= $mrc['id_mitra']; ?>">
                                                                                                        <i class="feather icon-trash text-danger"></i></a>
                                                                                                </span>

                                                                                            </td>
                                                                                        </tr>
                                                                                <?php $i++;
                                                                                    }
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
                                            <!-- end of active merchant data table -->
                                        </div>

                                        <div class="tab-pane" id="suspendedmerchant" aria-labelledby="suspendedmerchant-tab" role="tabpanel">
                                            <!-- start suspended merchant data table -->
                                            <section id="column-selectors">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Suspended Merchants Data</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body card-dashboard">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped dataex-html5-selectors">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No</th>
                                                                                    <th>Partner Id</th>
                                                                                    <th>Nama</th>
                                                                                    <th>No hp</th>
                                                                                    <th>Nama Merchant</th>
                                                                                    <th>Photo Profil</th>
                                                                                    <th>Layanan</th>
                                                                                    <th>Kategori</th>
                                                                                    <th>Status</th>
                                                                                    <th>Tindakan</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $i = 1;
                                                                                foreach ($mitra as $mrc) {
                                                                                    if ($mrc['status_mitra'] == 3) { ?>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <?= $i ?>
                                                                                            </td>
                                                                                            <td><?= $mrc['id_mitra'] ?></td>
                                                                                            <td><?= $mrc['nama_mitra'] ?></td>
                                                                                            <td><?= $mrc['telepon_mitra'] ?></td>
                                                                                            <td><?= $mrc['nama_merchant'] ?></td>
                                                                                            <td>
                                                                                                <img class="round" style="width: 40px; height: 40px;" src="<?= base_url('images/merchant/') . $mrc['foto_merchant']; ?>">
                                                                                            </td>
                                                                                            <td><?= $mrc['fitur'] ?></td>
                                                                                            <td><?= $mrc['nama_kategori'] ?></td>
                                                                                            <td>
                                                                                                <?php if ($mrc['status_mitra'] == 3) { ?>
                                                                                                    <label class="badge badge-dark">Banned</label>
                                                                                                <?php } else { ?>
                                                                                                    <label class="badge badge-primary">Active</label>
                                                                                                <?php } ?>
                                                                                            </td>
                                                                                            <td>
                                                                                                <span class="mr-1">
                                                                                                    <a href="<?= base_url(); ?>mitra/detail/<?= $mrc['id_mitra'] ?>">
                                                                                                        <i class="feather icon-eye text-success"></i>
                                                                                                    </a>
                                                                                                </span>
                                                                                                <?php
                                                                                                if ($mrc['status_mitra'] == 1) { ?>
                                                                                                    <span class="action-edit mr-1">
                                                                                                        <a href="<?= base_url(); ?>mitra/block/<?= $mrc['id_mitra']; ?>">
                                                                                                            <i class="feather icon-unlock text-info"></i>
                                                                                                        </a>
                                                                                                    </span>
                                                                                                <?php } else { ?>
                                                                                                    <span class="action-edit mr-1">
                                                                                                        <a href="<?= base_url(); ?>mitra/unblock/<?= $mrc['id_mitra']; ?>">
                                                                                                            <i class="feather icon-lock text-danger"></i>
                                                                                                        </a>
                                                                                                    </span>
                                                                                                <?php } ?>
                                                                                                <span class="action-edit mr-1">
                                                                                                    <a onclick="return confirm ('Are You Sure?')" href="<?= base_url(); ?>mitra/hapus/<?= $mrc['id_mitra']; ?>">
                                                                                                        <i class="feather icon-trash text-danger"></i></a>
                                                                                                </span>

                                                                                            </td>
                                                                                        </tr>
                                                                                <?php $i++;
                                                                                    }
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
                                            <!-- end of suspended merchant data table -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end of merchant tab -->
            <!-- end of merchant data -->
        </div>
    </div>
</div>
<!-- END: Content-->