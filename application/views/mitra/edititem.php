<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- start form edit item -->

            <section id="basic-vertical-layouts">
                <div class="row match-height justify-content-center">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Item</h4>
                            </div>
                            <br>
                            <div class="card-content">
                                <div class="card-body">
                                    <?= form_open_multipart('mitra/ubahitem/' . $item['id_item'] ); ?>
                                    <form class="form form-vertical">
                                        <div class="form-body">
                                            <div class="row">

                                                <input type="hidden" class="form-control" name="id_merchant" value="<?= $item['id_merchant'] ?>">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="name">Nama Menu</label>
                                                        <input type="text" class="form-control" id="name" name="nama_item" value="<?= $item['nama_item'] ?>" required>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <img class="card-img img-fluid mb-2" src="<?= base_url(); ?>images/itemmerchant/<?= $item['foto_item'] ?>" alt="Card image">
                                                    <fieldset class="form-group">
                                                        <label for="item_image">Item Image</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="dropify" name="foto_item" data-max-file-size="3mb" data-default-file="<?= base_url('images/itemmerchant/') . $item['foto_item'] ?>" />
                                                            <label class="custom-file-label" for="foto_item"><?= $item['foto_item'] ?></label>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label>Category Menus</label>
                                                    <select class="select2 form-control" style="width:100%" name="kategori_item">
                                                        <?php foreach ($itemk as $itk) { ?>
                                                            <option value="<?= $itk['id_kategori_item'] ?>" <?php if ($itk['id_kategori_item'] == $item['kategori_item']) { ?>selected<?php } ?>><?= $itk['nama_kategori_item'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="item_desc">Item Description</label>
                                                        <fieldset class="form-group">
                                                            <textarea
                                                                class="form-control"
                                                                id="item_desc"
                                                                rows="3"
                                                                name="deskripsi_item"
                                                                required><?= $item['deskripsi_item'] ?></textarea>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="Hargaitem">Harga(<?= $currency['app_currency'] ?>)</label>
                                                        <input
                                                            type="text"
                                                            id="Hargaitem"
                                                            class="form-control"
                                                            pattern="^\d+(\.|\,)\d{2}$"
                                                            data-type="currency"
                                                            name="harga_item"
                                                            value="<?= number_format($item['harga_item'] , 0, ".", ".") ?>"
                                                            placeholder="enter item price"
                                                            required></div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-4 form-group">
                                                            <label>Promo?</label>
                                                            
                                                            <select
                                                                class="select2 form-control"
                                                                id="promo_status"
                                                                name="status_promo"
                                                                onchange="editSelectCheck(this);">
                                                                 <option id="yes" value="1" <?php if ($item['status_promo'] == '1') { ?>selected<?php } ?>>Ya</option>
                                                                <option id="no" value="0" <?php if ($item['status_promo'] == '0') { ?>selected<?php } ?>>Tidak</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-8">
                                                            
                                                            <div class="form-group" id="yescheck" <?php if ($item['status_promo'] == 1) { ?> style="display:block;" <?php } else { ?> style="display:none;" <?php } ?>>
                                                                <label for="promo">Harga Promo(<?= $currency['app_currency'] ?>)</label>
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    pattern="^\d+(\.|\,)\d{2}$"
                                                                    data-type="currency"
                                                                    name="harga_promo"
                                                                    value="<?= number_format($item['harga_promo'] , 0, ".", ".") ?>"
                                                                    placeholder="enter promo price">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label>Status Menus</label>
                                                    <select class="select2 form-control js-example-basic-single" style="width:100%" name="status_item">
                                                        <option value="1" <?php if ($item['status_item'] == 1) { ?>selected<?php } ?>>Active</option>
                                                        <option value="0" <?php if ($item['status_item'] == 0) { ?>selected<?php } ?>>NonActive</option>
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

            <!-- end of form edit item -->
        </div>
    </div>
</div>
<!-- END: Content-->

<script>
    function admSelectCheck(nameSelect) {
        if (nameSelect) {
            yesValue = document.getElementById("yes").value;
            noValue = document.getElementById("no").value;

            if (yesValue == nameSelect.value) {
                document.getElementById("reqcheck").required = true;
                document.getElementById("yescheck").style.display = "block";
            } else if (noValue == nameSelect.value) {

                document.getElementById("reqcheck").required = false;
                document.getElementById("yescheck").style.display = "none";
            }
        }
    }
</script>