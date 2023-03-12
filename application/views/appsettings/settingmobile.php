<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- start paypal setting -->

            <section id="basic-vertical-layouts">
                <div class="row match-height justify-content-center">
                    <div class="col-md-8 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pengaturan Ayo Pulsa Api</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
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
                                    
                                    <?= form_open_multipart('appsettings/ubahmobilepulsa'); ?>
                                    <form class="form form-vertical">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="apipassword">Api Password</label>
                                                        <input type="text" class="form-control" id="apipassword" name="api_password" value="<?= $appsettings['api_password'] ?>" required>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="hargapulsa">Harga</label>
                                                        <input type="text" class="form-control" id="hargapulsa" name="harga_pulsa" value="<?= $appsettings['harga_pulsa'] ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="apitoken">Api Token</label>
                                                        <input type="text" class="form-control" id="apitoken" name="api_token" value="<?= $appsettings['api_token'] ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mp_status">Api Mode</label>
                                                        <select name="mp_status" id="mp_status" class="js-example-basic-single select2" style="width:100%">
                                                            <option value="1" <?php if ($appsettings['mp_status'] == '1') { ?>selected<?php } ?>>Development</option>
                                                            <option value="2" <?php if ($appsettings['mp_status'] == '2') { ?>selected<?php } ?>>Production</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mp_active">Ayo Pulsa Status</label>
                                                        <select name="mp_active" id="midtrans_active" class="js-example-basic-single select2" style="width:100%">
                                                            <option value="1" <?php if ($appsettings['mp_active'] == '1') { ?>selected<?php } ?>>Aktif</option>
                                                            <option value="0" <?php if ($appsettings['mp_active'] == '0') { ?>selected<?php } ?>>Non Aktif</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                      </form>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- end of paypal setting data -->
        </div>
    </div>
</div>
<!-- END: Content-->