<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
          <!-- partial -->
          <div class="content-wrapper">
            <div class="row ">
              <div class="col-md-8 offset-md-2 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <?php if ($this->session->flashdata()) : ?>
                      <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('demo'); ?>
                      </div>
                    <?php endif; ?>
                    <h4 class="card-title">Tambah Kategori</h4>
                    <?= form_open_multipart('news/tambahcategory'); ?>
                    <div class="form-group">
                      <label for="newstitle">Kategori</label>
                      <input type="text" class="form-control" id="newstitle" name="kategori" placeholder="enter news category" required>
                    </div>
                    <button type="submit" class="btn btn-success mr-2">Kirim</button>
                    <a href="<?= base_url() ?>news" class="btn btn-light mr-2">Batal</a>
                    <?= form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end of content wrapper -->
        </div>
    </div>
</div>