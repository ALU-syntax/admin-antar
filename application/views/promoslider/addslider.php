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
                                <h4 class="card-title">Tambah Iklan Slider</h4>
                            </div>
                            <br>
                            <div class="card-content">
                                <div class="card-body">
                                    <?php if ($this->session->flashdata('demo')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $this->session->flashdata('demo'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?= form_open_multipart('promoslider/tambah'); ?>
                                    <form class="form form-vertical">
                                        <div class="form-body">
                                            <div class="row">

                                                <div class="col-12">
                                                    <fieldset class="form-group">
                                                        
                                                        <div class="custom-file">
                                                            <input type="file" name="foto" data-max-file-size="3mb" class="custom-file-input" required>
                                                            <label class="custom-file-label" for="photo"></label>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="exp_date">Exp on</label>
                                                        <input type="date" class="form-control" id="birthdate" name="tanggal_berakhir" placeholder="enter exp date" required="required"></div>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label for="item_category">
                                                        Promo Slider Type
                                                    </label>
                                                    <select class="select2 form-control" id="getFname" onchange="addSelectCheck(this);" name="type_promosi" required="required">
                                                        <option id="service" value="service">Layanan</option>
                                                        <option id="link" value="link">Link</option>
                                                    </select>
                                                </div>

                                                <div class="col-12 form-group" id="servicecheck" style="display:block;">
                                                    <label for="fitur_promosi">
                                                        Layanan
                                                    </label>
                                                    <select class="select2 form-control" id="fitur_promosi" name="fitur_promosi" required="required">
                                                        <?php foreach ($fitur as $ft) { ?>
                                                            <option value="<?= $ft['id_fitur'] ?>"><?= $ft['fitur'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group" id="linkcheck" style="display:none;">
                                                        <label for="promotion_link">Slider Link</label>
                                                        <input type="text" id="linktes" name="link_promosi"  class="form-control" placeholder="enter slider link"></div>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label for="is_show">
                                                        Status
                                                    </label>
                                                    <select class="select2 form-control" id="is_show" name="is_show" required="required">
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
            serviceValue = document.getElementById("service").value;
            linkValue = document.getElementById("link").value;
            if (serviceValue == nameSelect.value) {
                document.getElementById("linktes").required = false;
                document.getElementById("servicecheck").style.display = "block";
                document.getElementById("linkcheck").style.display = "none";
            } else if (linkValue == nameSelect.value) {
                document.getElementById("linktes").required = true;
                document.getElementById("linkcheck").style.display = "block";
                document.getElementById("servicecheck").style.display = "none";
            }
        } else {
            document.getElementById("servicecheck").style.display = "block";
        }
    }
</script>