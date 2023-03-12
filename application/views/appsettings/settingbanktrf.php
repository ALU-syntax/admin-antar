<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Data list view starts -->
            <section id="data-thumb-view" class="data-thumb-view-header">

                <div class="card-header">
                    <h4>Bank Account Transfer <span><a class="btn btn-success float-right mb-1 text-white" href="<?= base_url(); ?>appsettings/addbank">
                                <i class="feather icon-plus mr-1"></i>Add Bank</a></span></h4>
                </div>
                <?php if ($this->session->flashdata('send') or $this->session->flashdata('ubah')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('send'); ?>
                        <?php echo $this->session->flashdata('ubah'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('demo')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('demo'); ?>
                    </div>
                <?php endif; ?>
                <!-- slider Table starts -->
                <div class="table-responsive">
                    <table class="table data-thumb-view">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Logo Bank</th>
                                <th>Nama Bank</th>
                                <th>Nama Pemilik</th>
                                <th>Rekening Bank</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($transfer as $bnk) { ?>
                                <tr>

                                    <td><?= $i ?></td>
                                    <td class="product-img"><img src="<?= base_url('images/bank/') . $bnk['image_bank']; ?>"></td>
                                    <td class="product-name"><?= $bnk['nama_bank'] ?></td>
                                    <td class="product-name"><?= $bnk['nama_pemilik'] ?></td>
                                    <td class="product-name"><?= $bnk['rekening_bank'] ?></td>
                                    <td><?php if ($bnk['status_bank'] == 1) { ?>
                                            <label class="badge badge-primary">Aktif</label>
                                        <?php } else if ($bnk['status_bank'] == 0) { ?>
                                            <label class="badge badge-danger">Non Aktif</label>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <span class="action-edit mr-1">
                                            <a href="<?= base_url(); ?>appsettings/editbank/<?= $bnk['id_bank'] ?>">
                                                <i class="feather icon-edit text-info"></i>
                                            </a>
                                        </span>
                                        <span class="action-delete mr-1">
                                            <span class="action-delete mr-1">
                                                <a onclick="return confirm ('Are You Sure?')" href="<?= base_url(); ?>settinappsettings/hapusbank/<?= $bnk['id_bank'] ?>">
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
                <!-- slider data Table ends -->


            </section>
            <!-- Data list view end -->
        </div>
    </div>
</div>
<!-- END: Content-->