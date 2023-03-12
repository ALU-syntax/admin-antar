<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- partial -->
            <section class="content-wrapper">
                <div class="row justify-content-md-center">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <?php if ($this->session->flashdata('demo')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $this->session->flashdata('demo'); ?>
                                    </div>
                                <?php endif; ?>
                                <h4 class="card-title">Topup Manual</h4>
                                <?= form_open_multipart('wallet/tambahtopup'); ?>



                                <div class="form-group">
                                    <label for="type">Tipe User</label>
                                    <select id="getFname" onchange="admSelectCheck(this);" class="select2 js-example-basic-single" style="width:100%" name="type_user">
                                        <option id="pelanggan" value="pelanggan">USER</option>
                                        <option id="driver" value="driver">DRIVER</option>
                                        <option id="mitra" value="mitra">MERCHANT</option>
                                    </select>
                                </div>

                                <div id="pelanggancheck" style="display:block;" class="form-group">
                                    <label for="id_Pelanggan">User</label>
                                    <select class="select2 js-example-basic-single" style="width:100%" name="id_pelanggan">
                                        <?php foreach ($saldo as $sl) {
                                            if (substr($sl['id_user'], 0, 1) == 'P') { ?>
                                                <option value="<?= $sl['id_user'] ?>"><?= $sl['fullnama'] ?> (<?= $currency['duit'] ?><?= number_format($sl['saldo'] , 0, ".", ".") ?>)</option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>

                                <div id="drivercheck" style="display:none;" class="form-group">
                                    <label for="id_driver">Driver</label>
                                    <select class="select2 js-example-basic-single" style="width:100%" name="id_driver">
                                        <?php foreach ($saldo as $sl) {
                                            if (substr($sl['id_user'], 0, 1) == 'D') { ?>
                                                <option value="<?= $sl['id_user'] ?>"><?= $sl['nama_driver'] ?> (<?= $currency['duit'] ?><?= number_format($sl['saldo'] , 0, ".", ".") ?>)
                                                </option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>

                                <div id="mitracheck" style="display:none;" class="form-group">
                                    <label for="id_mitra">Owner</label>
                                    <select class="select2 js-example-basic-single" style="width:100%" name="id_mitra">
                                        <?php foreach ($saldo as $sl) {
                                            if (substr($sl['id_user'], 0, 1) == 'M') { ?>
                                                <option value="<?= $sl['id_user'] ?>"><?= $sl['nama_mitra'] ?> (<?= $currency['duit'] ?><?= number_format($sl['saldo'] , 0, ".", ".") ?>)
                                                </option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="saldo">Jumlah</label>
                                    <input type="text" pattern="^\d+(\.|\,)\d{2}$" data-type="currency" class="form-control" id="saldo" name="saldo" placeholder="masukan jumlah" value="">
                                </div>
                                <button type="submit" class="btn btn-success mr-2">Kirim</button>
                                <a class="btn btn-danger text-white" href="<?= base_url(); ?>wallet">Batal</a>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
