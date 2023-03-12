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
                                <h4 class="card-title">Edit Bank</h4>
                            </div>
                            <br>
                            <div class="card-content">
                                <div class="card-body">
                                    <?php if ($this->session->flashdata('demo')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $this->session->flashdata('demo'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?= form_open_multipart('appsettings/ubahbank/' . $transfer['id_bank']); ?>
                                    <form class="form form-vertical">
                                        <div class="form-body">
                                            <div class="row">

                                                <div class="col-12 form-group">
                                                    <input data-default-file="<?= base_url('images/bank/') . $transfer['image_bank'] ?>" type="file" class="dropify" name="image_bank" data-max-file-size="3mb" />
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label for="birthdate">Nama Bank</label>
                                                    <input type="text" class="form-control" id="" name="nama_bank" value="<?= $transfer['nama_bank']; ?>" placeholder="enter bank name" required>
                                                </div>
                                                 <div class="col-12 form-group">
                                                    <label for="birthdate">Nama Pemilik</label>
                                                    <input type="text" class="form-control" id="" name="nama_pemilik" value="<?= $transfer['nama_pemilik']; ?>" placeholder="nama pemilik" required>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label for="birthdate">Nomor Rekening</label>
                                                    <input type="text" class="form-control" id="" name="rekening_bank" value="<?= $transfer['rekening_bank']; ?>" placeholder="enter bank name" required>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label for="gender">Status</label>
                                                    <select class="select2 form-group" name="status_bank" style="width:100%">
                                                        <option value="1" <?php if ($transfer['status_bank'] == 1) { ?>selected<?php } ?>>Aktif</option>
                                                        <option value="0" <?php if ($transfer['status_bank'] == 0) { ?>selected<?php } ?>>Non Aktif</option>
                                                    </select>
                                                </div>

                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
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
