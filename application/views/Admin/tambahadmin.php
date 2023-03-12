<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- start form add customer -->

            <section id="basic-vertical-layouts">
                <div class="row match-height justify-content-center">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Admin</h4>
                                <?php if ($this->session->flashdata() or validation_errors()) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= validation_errors() ?>
                                        <?php echo $this->session->flashdata('invalid'); ?>
                                        <?php echo $this->session->flashdata('demo'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <br>
                            <div class="card-content">
                                <div class="card-body">
                                    <?= form_open_multipart('AdminMenu/tambah'); ?>
                                    <form class="form form-vertical">
                                        <div class="form-body">
                                            <div class="row">

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Photo Profil</label>
                                                        <input type="file" name="fotopelanggan" class="dropify" data-max-file-size="1mb" />
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="customer_fullname">Nama</label>
                                                        <input type="text" id="nama" class="form-control" name="nama" placeholder="enter name" required="required"></div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="username">Username</label>
                                                        <input type="text" id="username" class="form-control" name="user_name" placeholder="enter name" required="required"></div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" id="email" class="form-control" name="email" placeholder="enter name" required="required"></div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="no_telepon">Nomor hp</label>
                                                        <input type="number" class="form-control" id="no_telepon" name="no_telepon" placeholder="enter no telepon " <?php if ($_POST != NULL) { ?> value="<?= $_POST['no_telepon']; ?>" <?php } ?> required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="wilayah">Wilayah</label>
                                                         <select id="wilayah" name="wilayah" class="form-control" required>
                                                             <option value=""> - Pilih Wilayah - </option>
                                                             <?php foreach($wilayah as $w) { ?>
                                                                <option value="<?= $w->id;?>"><?= $w->nama_cabang;?></option>
                                                             <?php } ?>
                                                         </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="enter password" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="password">Status Admin</label>

                                                        <select class="form-control" name="statusAdmin" id="statusAdmin">
                                                            <option value="0">Admin</option>
                                                            <option value="1">Super Admin</option>
                                                        </select>

                                                    </div>
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

            <!-- end of form add customer -->
        </div>
    </div>
</div>
<!-- END: Content-->