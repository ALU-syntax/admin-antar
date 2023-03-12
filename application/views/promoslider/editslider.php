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
                                <h4 class="card-title">Perbarui Iklan Slider</h4>
                            </div>
                            <br>
                            <div class="card-content">
                                <div class="card-body">
                                    <?php if ($this->session->flashdata('demo')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $this->session->flashdata('demo'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?= form_open_multipart('promoslider/ubah/' . $id); ?>
                                    <form class="form form-vertical">
                                        <div class="form-body">
                                            <div class="row">

                                            <input type="hidden" name="id" value="<?= $id ?>">

                                                <div class="col-12">
                                                <img class="card-img img-fluid mb-2" src="<?= base_url('images/promo/') . $foto ?>" alt="Card image">
                                                    <fieldset class="form-group">
                                                        <label for="foto">Slider Image</label>
                                                        <div class="custom-file">
                                                            <input
                                                                type="file"
                                                                name="foto" data-max-file-size="3mb" data-default-file="<?= base_url('images/promo/') . $foto ?>"
                                                                class="custom-file-input">
                                                            <label class="custom-file-label" for="foto"><?= $foto ?></label>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="birthdate">Exp on</label>
                                                        <input
                                                            type="date"
                                                            class="form-control"
                                                            id="birthdate" 
                                                            name="tanggal_berakhir" 
                                                            value="<?= $tanggal_berakhir ?>"
                                                            required="required"></div>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label for="item_category">
                                                        Tipe
                                                    </label>
                                                    <select
                                                        class="select2 form-control"
                                                        id="getFname"
                                                        onchange="editSelectCheck(this);"
                                                        name="type_promosi"
                                                        required="required">
                                                        <option id="service" value="service" <?php if ($type_promosi == 'service') { ?>selected<?php } ?>>Layanan</option>
                                                        <option id="link" value="link" <?php if ($type_promosi == 'link') { ?>selected<?php } ?>>Link</option>
                                                    </select>
                                                </div>

                                                <?php if ($type_promosi == 'service') {  ?>
                                                <div class="col-12 form-group" id="servicecheck" style="display:block;">
                                                    <label for="fitur_promosi">
                                                        For Service
                                                    </label>
                                                    <select
                                                        class="select2 form-control"
                                                        id="fitur_promosi"
                                                        name="fitur_promosi"
                                                        required="required">
                                                        <?php foreach ($fitur as $ftr) { ?>
                                                        <option value="<?= $ftr['id_fitur'] ?>" <?php if ($fitur_promosi == $ftr['id_fitur']) { ?>selected<?php } ?>><?= $ftr['fitur'] ?></option>
                                                s<?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group" id="linkcheck" style="display:none;">
                                                        <label for="promotion_link">Slider Link</label>
                                                        <input
                                                            type="text"
                                                            id="linktes"
                                                            class="form-control"
                                                            name="promotion_link"
                                                            placeholder="enter slider link"></div>
                                                        </div>

                                            <?php } else { ?>

                                                <div class="col-12 form-group" id="servicecheck" style="display:none;">
                                                    <label for="fitur_promosi">
                                                        Layanan
                                                    </label>
                                                    <select
                                                        class="select2 form-control"
                                                        id="fitur_promosi"
                                                        name="fitur_promosi"
                                                        required="required">
                                                        <?php foreach ($fitur as $ftr) { ?>
                                        <option value="<?= $ftr['id_fitur'] ?>" <?php if ($fitur_promosi == $ftr['id_fitur']) { ?>selected<?php } ?>><?= $ftr['fitur'] ?></option>
                                    <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group" id="linkcheck" style="display:block;">
                                                        <label for="promotion_link">Link</label>
                                                        <input
                                                            type="text"
                                                            id="linktes"
                                                            class="form-control"
                                                            name="link_promosi" value="<?= $link_promosi ?>"
                                                            placeholder="enter slider link"></div>
                                                        </div>

                                                            <?php } ?>

                                                <div class="col-12 form-group">
                                                    <label for="is_show">
                                                        Status
                                                    </label>
                                                    <select
                                                        class="select2 form-control"
                                                        id="is_show"
                                                        name="is_show"
                                                        required="required">
                                                        <option value="1" <?php if($is_show == 1){ ?>selected<?php } ?>>Aktif</option>
                                                        <option value="0" <?php if($is_show == 0){ ?>selected<?php } ?>>Non Aktif</option>
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
            <?php if ($type_promosi == 'service') {  ?>
                document.getElementById("linkcheck").style.display = "none";
                document.getElementById("servicecheck").style.display = "block";
            <?php } else { ?>
                document.getElementById("linkcheck").style.display = "block";
                document.getElementById("servicecheck").style.display = "none";
            <?php } ?>
        }
    }
</script>