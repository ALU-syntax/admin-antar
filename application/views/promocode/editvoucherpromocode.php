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
                                <h4 class="card-title">Edit Voucher Promo Code</h4>
                            </div>
                            <br>
                            <div class="card-content">
                                <div class="card-body">
                                    <?php if ($this->session->flashdata('demo')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $this->session->flashdata('demo'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?= form_open_multipart('promocode/editVoucherPromoCode/' . $promo['id_voucher_promo']); ?>
                                    <form class="form form-vertical">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <img class="card-img img-fluid mb-2" src="<?= base_url('images/promo/' . $promo['image_voucher_promo']); ?>" alt="Card image">
                                                    <input type="hidden" name="id_voucher_promo" value=<?= $promo['id_voucher_promo'] ?>>
                                                    <fieldset class="form-group">
                                                        <label for="photo">Promo Image</label>
                                                        <div class="custom-file">
                                                            <input type="file"  class=" custom-file-input dropify" name="image_voucher_promo" data-default-file="<?= base_url('images/promo/'. $promo['image_voucher_promo']); ?>">
                                                            <label class="custom-file-label" for="photo"><?= $promo['image_voucher_promo']; ?></label>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="title">Judul Promo</label>
                                                        <input type="text" class="form-control" id="nama_voucher_promo" name="nama_voucher_promo" placeholder="promo title" value="<?= $promo['nama_voucher_promo'] ?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="title">Deskripsi Voucher</label>
                                                        <textarea rows="4" class="form-control" id="description" name="description" placeholder="Deskripsi Promo" required><?= $promo['description'] ?></textarea>
                                                    </div>
                                                </div>

                                                <div class=" col-12 ">
                                                    <div class="form-group">
                                                        <label for="promocode">Harga Voucher</label>
                                                        <input type="text" class="form-control" id="harga_voucher" name="harga_voucher" placeholder="harga voucher promo" value="<?= $promo['harga_voucher'] ?>" required>
                                                    </div>
                                                </div>


                                                <div class=" col-12 ">
                                                    <div class="form-group">
                                                        <label for="promocode">Stock Voucher Promo</label>
                                                        <input type="text" class="form-control" id="isi_voucher_promo" name="isi_voucher_promo" placeholder="enter nominal voucher promo" value="<?= $promo['isi_voucher_promo'] ?>" required>
                                                    </div>
                                                </div>

                                                <div class=" col-12 form-group">
                                                    <div class="form-group">
                                                        <label for="promocode">Minimum Transaksi</label>
                                                        <input type="text" class="form-control" id="minimum_transaksi" name="minimum_transaksi" placeholder="enter promo code" value="<?= $promo['minimum_transaksi'] ?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="gender">Type Promo</label>
                                                        <select class="select2 form-group" onchange="admSelectCheck(this);" name="type_voucher_promo" style="width:100%">
                                                            <option id="persen" value="persen" <?php if ($promo['type_voucher_promo']  == 'persen') { ?>selected<?php } ?>>Percentage</option>
                                                            <option id="fix" value="fix" <?php if ($promo['type_voucher_promo'] == 'fix') { ?>selected<?php } ?>>Fix</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <?php if ($promo['type_voucher_promo']  == 'persen') { ?>
                                                    <div id="persencheck" class="col-12 form-group" style="display:block;">
                                                        <label>Jumlah Persentase Promo</label>
                                                        <input id="persencheckrequired" type="text" class="form-control" id="nominal_voucher_promo" name="nominal_voucher_promo_persen" value="<?= $promo['nominal_voucher_promo']; ?>" placeholder="enter promo amount" required>
                                                    </div>
                                                    <div id="fixcheck" class="col-12 form-group" style="display:none;">
                                                        <label>Jumlah Promo</label>
                                                        <input id="fixcheckrequired" type="text" pattern="^\d+(\.|\,)\d{2}$" data-type="currency" class="form-control" id="nominal_voucher_promo" name="promo_amount" value="<?= number_format($promo['nominal_voucher_promo'] , 0, ".", "."); ?>" placeholder="enter promo amount">
                                                    </div>
                                                <?php } else { ?>
                                                    <div id="persencheck" class="col-12 form-group" style="display:none;">
                                                        <label>Jumlah Persentase Promo</label>
                                                        <input id="persencheckrequired" type="text" class="form-control" id="nominal_voucher_promo" name="nominal_voucher_promo_persen" placeholder="enter promo amount" value="<?= $promo['nominal_voucher_promo']; ?>" required>
                                                    </div>
                                                    <div id="fixcheck" class="col-12 form-group" style="display:block;">
                                                        <label>Jumlah Promo</label>
                                                        <input id="fixcheckrequired" type="text" pattern="^\d+(\.|\,)\d{2}$" data-type="currency" class="form-control" id="nominal_voucher_promo" name="nominal_voucher_promo" value="<?= number_format($promo['nominal_voucher_promo'] , 0, ".", "."); ?>" placeholder="enter promo amount">
                                                    </div>
                                                <?php } ?>



                                                <div class="col-12 form-group">
                                                    <label for="birthdate">Exp On</label>
                                                    <input type="date" class="form-control" id="expired" name="expired" placeholder="" value="<?= $promo['expired'] ?>" required>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label for="type">Service</label>
                                                    <select class="select2 form-group" name="fitur" style="width:100%">
                                                        <?php foreach ($fitur as $ft) { ?>
                                                            <option value="<?= $ft['id_fitur'] ?>" <?php if ($promo['fitur'] == $ft['id_fitur']) { ?>selected<?php } ?>><?= $ft['fitur'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>


                                                <div class="col-12 form-group">
                                                    <label for="gender">status</label>
                                                    <select class="select2 form-group" name="status" style="width:100%">

                                                        <option value="1" <?php if ($promo['status']  == '1') { ?>selected<?php } ?>>Active</option>
                                                        <option value="0" <?php if ($promo['status']  == '0') { ?>selected<?php } ?>>Nonactive</option>
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

<script>
    function admSelectCheck(nameSelect) {
        console.log(nameSelect);
        if (nameSelect) {
            serviceValue = document.getElementById("persen").value;
            linkValue = document.getElementById("fix").value;
            if (serviceValue == nameSelect.value) {
                document.getElementById("persencheckrequired").required = true;
                document.getElementById("fixcheckrequired").required = false;
                document.getElementById("persencheck").style.display = "block";
                document.getElementById("fixcheck").style.display = "none";
            } else if (linkValue == nameSelect.value) {
                document.getElementById("fixcheckrequired").required = true;
                document.getElementById("persencheckrequired").required = false;
                document.getElementById("fixcheck").style.display = "block";
                document.getElementById("persencheck").style.display = "none";
            }
        } else {
            document.getElementById("persencheck").style.display = "block";
        }
    }
</script>