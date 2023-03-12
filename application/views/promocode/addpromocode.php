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
                                <h4 class="card-title">Tambah Kode Promo</h4>
                            </div>
                            <br>
                            <div class="card-content">
                                <div class="card-body">
                                    <?php if ($this->session->flashdata('demo')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $this->session->flashdata('demo'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?= form_open_multipart('promocode/addpromocode'); ?>
                                    <form class="form form-vertical">
                                        <div class="form-body">
                                            <div class="row">

                                                <div class="col-12">
                                                    <fieldset class="form-group">
                                                        <label for="photo">Promo Image</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input dropify" name="image_promo" data-max-file-size="3mb" required>
                                                            <label class="custom-file-label" for="photo"></label>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="title">Judul Promo</label>
                                                        <input type="text" class="form-control" id="nama_promo" name="nama_promo" placeholder="judul promo" required>
                                                    </div>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <div class="form-group">
                                                        <label for="promocode">Kode Promo</label>
                                                        <input type="text" class="form-control" id="kode_promo" name="kode_promo" placeholder="masukan kode promo" required>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="gender">Type Promo</label>
                                                        <select class="select2 form-group"  name="type_promo" style="width:100%" onchange="admSelectCheck(this);">
                                                            <option id="persen" value="persen">Persentase</option>
                                                            <option id="fix" value="fix">Fix</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div id="persencheck" class="col-12 form-group" style="display:block;">
                                                    <label>Jumlah Percentage Promo</label>
                                                    <input id="persencheckrequired" type="text" class="form-control" id="nominal_promo" name="nominal_promo_persen" placeholder="enter promo amount" required>
                                                </div>
                                                <div id="fixcheck" class="col-12 form-group" style="display:none;">
                                                    <label>Fix Promo Amount</label>
                                                    <input id="fixcheckrequired" type="text" pattern="^\d+(\.|\,)\d{2}$" data-type="currency" class="form-control" id="nominal_promo" name="nominal_promo" placeholder="enter promo amount">
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label for="birthdate">Exp On</label>
                                                    <input type="date" class="form-control" id="expired" name="expired" placeholder="" required>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <label for="type">Service</label>
                                                    <select class="select2 form-group" name="fitur" style="width:100%">
                                                        <?php foreach ($fitur as $ft) { ?>
                                                            <option value="<?= $ft['id_fitur'] ?>"><?= $ft['fitur'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>


                                                <div class="col-12 form-group">
                                                    <label for="gender">status</label>
                                                    <select class="select2 form-group" name="status" style="width:100%">
                                                        <option value="1">Active</option>
                                                        <option value="0">Nonactive</option>
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