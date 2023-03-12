<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Data list view starts -->
            <section id="data-thumb-view" class="data-thumb-view-header">

                <div class="card-header">
                    <h4>Tipe Kendaraan <span><a class="btn btn-success float-right mb-1 text-white" href="<?= base_url(); ?>partnerjob/addpartnerjob">
                                <i class="feather icon-plus mr-1"></i>Tambah Tipe Kendaraan</a></span></h4>
                </div>
                <!-- vehicle type Table starts -->
                <div class="table-responsive">
                    <table class="table data-thumb-view">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>Icon Maps</th>
                                <th>Tipe Kendaraan</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($partnerjob as $vhc) { ?>
                                <tr>
                                    <td></td>
                                    <td><?= $i ?></td>
                                    <td class="product-img">
                                        <?php if ($vhc['icon'] == 1) { ?>
                                            <img src="<?= base_url('images/icon/bike.png'); ?>">
                                        <?php } else if ($vhc['icon'] == 2) { ?>
                                            <img src="<?= base_url('images/icon/sedan.png'); ?>">
                                        <?php } else if ($vhc['icon'] == 3) { ?>
                                            <img src="<?= base_url('images/icon/truck.png'); ?>">
                                        <?php } else if ($vhc['icon'] == 4) { ?>
                                            <img src="<?= base_url('images/icon/deliverybike.png'); ?>">
                                        <?php } else if ($vhc['icon'] == 5) { ?>
                                            <img src="<?= base_url('images/icon/hatchback.png'); ?>">
                                        <?php } else if ($vhc['icon'] == 6) { ?>
                                            <img src="<?= base_url('images/icon/suv.png'); ?>">
                                        <?php } else if ($vhc['icon'] == 7) { ?>
                                            <img src="<?= base_url('images/icon/van.png'); ?>">
                                        <?php } else if ($vhc['icon'] == 8) { ?>
                                            <img src="<?= base_url('images/icon/bicycle.png'); ?>">
                                        <?php } else if ($vhc['icon'] == 9) { ?>
                                            <img src="<?= base_url('images/icon/tuktuk.png'); ?>">
                                        <?php } ?>

                                    </td>
                                    <td><?= $vhc['driver_job']; ?></td>
                                    <td>
                                        <?php if ($vhc['status_job'] == 1) { ?>
                                            <label class="badge badge-success">Aktif</label>
                                        <?php } else { ?>
                                            <label class="badge badge-danger">Non Aktif</label>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <span class="action-edit mr-1">
                                            <a href="<?= base_url(); ?>partnerjob/editpartnerjob/<?= $vhc['id']; ?>">
                                                <i class=" feather icon-edit text-info"></i>
                                            </a>
                                        </span>
                                        <span class="action-delete mr-1">
                                            <span class="action-delete mr-1">
                                                <a onclick="return confirm ('Are You Sure?')" href="<?= base_url(); ?>partnerjob/deletepartnerjob/<?= $vhc['id']; ?>">
                                                    <i class="feather icon-trash text-danger"></i></a>
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>
                <!-- vehicle type data Table ends -->
            </section>
            <!-- Data list view end -->
        </div>
    </div>
</div>
<!-- END: Content-->