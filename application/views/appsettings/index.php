<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- start application setting -->

            <section id="basic-vertical-layouts">
                <div class="row match-height justify-content-center">
                    <div class="col-md-8 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Application Settings</h4>
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
                                    <?= form_open_multipart('appsettings/ubahapp'); ?>
                                    <form class="form form-vertical">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="appemail">App Email</label>
                                                        <input type="email" class="form-control" id="appemail" name="app_email" value="<?= $appsettings['app_email']; ?>" required></div>
                                                    <div class="form-group">
                                                        <label for="appname">Nama Aplikasi</label>
                                                        <input type="text" class="form-control" id="appname" name="app_name" value="<?= $appsettings['app_name']; ?>" required></div>
                                                    <div class="form-group">
                                                        <label for="appcontact">Kontak Whatsapp</label>
                                                        <input type="text" class="form-control" id="appcontact" name="app_contact" value="<?= $appsettings['app_contact']; ?>" required></div>
                                                    <div class="form-group">
                                                        <label for="appwebsite">Website</label>
                                                        <input type="text" class="form-control" id="appwebsite" name="app_website" value="<?= $appsettings['app_website']; ?>" required></div>
                                                    <div class="form-group">
                                                        <label for="privacypolicy">Kebijakan Privasi</label>
                                                        <textarea type="text" class="form-control" id="summernoteExample1" name="app_privacy_policy" required><?= $appsettings['app_privacy_policy']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="aboutus">Tentang</label>
                                                        <textarea type="text" class="form-control" id="summernoteExample2" name="app_aboutus" required><?= $appsettings['app_aboutus']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="appaddress">Alamat</label>
                                                        <textarea type="text" class="form-control" id="summernoteExample3" name="app_address" required><?= $appsettings['app_address']; ?></textarea></div>
                                                    <div class="form-group">
                                                        <label for="googlelink">Google Link</label>
                                                        <input type="text" class="form-control" id="googlelink" name="app_linkgoogle" value="<?= $appsettings['app_linkgoogle']; ?>" required></div>
                                                         <div class="form-group">
                                                        <label for="appcurrencytext">Teks Mata Uang</label>
                                                        <input type="text" class="form-control" id="appcurrencytext" name="app_currency_text" value="<?= $appsettings['app_currency_text']; ?>" required></div>
                                                    <div class="form-group">
                                                        <label for="appcurrency">Mata Uang</label>
                                                        <input type="text" class="form-control" id="appcurrency" name="app_currency" value="<?= $appsettings['app_currency']; ?>" required></div>

                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
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

            <!-- end of application setting data -->
        </div>
    </div>
</div>
<!-- END: Content-->



<!--<li class="nav-item">-->
<!--    <a class="nav-link" id="tab-2-5" data-toggle="tab" href="#ayopesan-2-5" role="tab" aria-controls="ayopesan-2-5" aria-selected="false">-->
<!--        <i class="mdi mdi-credit-card"></i>Api Ayo Pesan</a>-->
<!--</li>-->
<!-- <li class="nav-item">
    <a class="nav-link active" id="tab-2-7" data-toggle="tab" href="#banktransfer-2-7" role="tab" aria-controls="banktransfer-2-7" aria-selected="false">
        <i class="icon-credit-card menu-icon"></i>Transfer Bank</a>
</li> -->


<<!-- div class="tab-pane fade show active" id="ayopesan-2-5" role="tabpanel" aria-labelledby="tab-2-5">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">API Ayo Pesan</h4>
                <br>
                
                <div class="form-group">
                    <label for="emailsubject">Password</label>
                    <input type="text" class="form-control" id="emailsubject" name="api_password" value="<?= $appsettings['api_password']; ?>" required>
                </div>
                   <div class="form-group">
                    <label for="emailsubject">Harga pulsa</label>
                    <input type="text" class="form-control" id="emailsubject" name="harga_pulsa" value="<?= $appsettings['harga_pulsa']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="emailtext1">Token</label>
                    <input type="text" class="form-control" id="summernoteExample4" name="api_token" value="<?= $appsettings['api_token']; ?>" required>
                </div>
                <button type="submit" class="btn btn-success mr-2">Kirim</button>

                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div> -->