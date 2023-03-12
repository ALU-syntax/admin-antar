<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- start form add slider -->

            <section id="basic-vertical-layouts">
                <div class="row match-height justify-content-center">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Bank</h4>
                            </div>
                            <br>
                            <div class="card-content">
                                <div class="card-body">
                                    <?php if ($this->session->flashdata('demo')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $this->session->flashdata('demo'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?= form_open_multipart('appsettings/adddatabank'); ?>
                                    <form class="form form-vertical">
                                        <div class="form-body">
                                            <div class="row">

                                                <div class="col-12 form-group">
                                                    <input type="file" class="dropify" name="image_bank" data-max-file-size="3mb" required />
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label for="birthdate">Nama Bank</label>
                                                    <input type="text" class="form-control" id="" name="nama_bank" placeholder="enter bank name" required>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label for="birthdate">Nama Pemilik</label>
                                                    <input type="text" class="form-control" id="" name="nama_pemilik" placeholder="masukan nama pemilik bank" required>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label for="birthdate">Nomor Rekening</label>
                                                    <input type="text" class="form-control" id="" name="rekening_bank" placeholder="enter bank name" required>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label for="gender">status</label>
                                                    <select class="select2 form-group" name="status_bank" style="width:100%">
                                                        <option value="1">Aktif</option>
                                                        <option value="0">Nonaktif</option>
                                                    </select>
                                                </div>

                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
                                                    <a class="btn btn-danger text-white mr-1 mb-1" href="<?= base_url(); ?>appsettings/banktransfersetting">Batal</a>
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

            <!-- end of form add slider -->
        </div>
    </div>
</div>
<!-- END: Content-->
