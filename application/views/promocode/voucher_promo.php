<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Data list view starts -->
            <section id="data-thumb-view" class="data-thumb-view-header">

                <div class="card-header">
                    <h4>Voucher Promo <span><a class="btn btn-success float-right mb-1 text-white" href="<?= base_url(); ?>promocode/addVoucherPromo">
                                <i class="feather icon-plus mr-1"></i>Tambah Voucher Promo</a></span></h4>
                </div>
                  <?php if ($this->session->flashdata('demo') or $this->session->flashdata('hapus')) : ?>
                    <div class="alert alert-danger" role="alert">
                      <?php echo $this->session->flashdata('demo'); ?>
                      <?php echo $this->session->flashdata('hapus'); ?>
                    </div>
                  <?php endif; ?>
                  <?php if ($this->session->flashdata('ubah') or $this->session->flashdata('tambah')) : ?>
                    <div class="alert alert-success" role="alert">
                      <?php echo $this->session->flashdata('ubah'); ?>
                      <?php echo $this->session->flashdata('tambah'); ?>
                    </div>
                  <?php endif; ?>
                <!-- Promo code Table starts -->
                <div class="table-responsive">
                    <table class="table data-thumb-view">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Voucher</th>
                                <th>Deskripsi Voucher</th>
                                <th>Harga Voucher</th>
                                <th>Stock Voucher Promo</th>
                                <th>Minimum Transaksi</th>
                                <th>Diskon</th>
                                <th>Layanan</th>
                                <th>Expired</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($promocode as $prc) { ?>
                                <tr>
                                    <td></td>
                                    <td><?= $i ?></td>
                                    <td class="product-img">
                                        <img src="<?= base_url('images/promo/') . $prc['image_voucher_promo']; ?>">
                                    </td>
                                    <td class="product-name"><?= $prc['nama_voucher_promo']; ?></td>
                                    <td class="product-name"><?= $prc['description']; ?></td>
                                    <td class="product-name"><?= $prc['harga_voucher']; ?></td>
                                    <td class="product-name"><?= $prc['isi_voucher_promo']; ?></td>
                                    <td class="product-name"><?= $prc['minimum_transaksi']; ?></td>

                                    <?php if ($prc['type_voucher_promo'] == 'persen') { ?>
                                        <td class="text-danger"><?= $prc['nominal_voucher_promo']; ?>%</td>
                                    <?php } else { ?>
                                        <td class="text-danger">$<?= number_format($prc['nominal_voucher_promo'] , 0, ".", "."); ?></td>
                                    <?php } ?>

                                    <td class="product-name"><?= $prc['fitur']; ?></td>
                                    <td class="product-name"><?= $prc['expired']; ?></td>
                                    <td>
                                        <?php if ($prc['status'] == 1) { ?>
                                            <label class="badge badge-success">Active</label>
                                        <?php } else { ?>
                                            <label class="badge badge-danger">Non Active</label>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <span class="action-edit mr-1">
                                            <a href="<?= base_url(); ?>promocode/editvoucherpromocode/<?= $prc['id_voucher_promo']; ?>">
                                                <i class="feather icon-edit text-info"></i>
                                            </a>
                                        </span>
                                        <span class="action-delete mr-1">
                                            <a onclick="return confirm ('Are You Sure?')" href="<?= base_url(); ?>promocode/hapusVoucherPromo/<?= $prc['id_voucher_promo']; ?>">
                                                <i class="feather icon-trash text-danger"></i></a>
                                        </span>
                                    </td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>
                <!-- promo code Table ends -->
            </section>
            <!-- Data list view end -->
        </div>
    </div>
</div>
<!-- END: Content-->
