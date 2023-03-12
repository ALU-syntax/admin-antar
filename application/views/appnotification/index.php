<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
          <!-- partial -->
          <section class="content-wrapper">
            <div class="row ">
              <div class="col-md-12 offset-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Kirim Notifikasi</h4>
                    <?php if ($this->session->flashdata()) : ?>
                      <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('send'); ?>
                      </div>
                    <?php endif; ?>
                    <?= form_open_multipart('appnotification/send'); ?>
                    <div class="form-group">
                      <label for="newscategory">Kirim Ke</label>
                      <select class="select2 js-example-basic-single" style="width:100%" name='topic'>
                        <option value="pelanggan">User</option>
                        <option value="driver">Driver</option>
                        <option value="mitra">Merchant Partner</option>
                        <option value="ouride">Semua</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="title">Judul</label>
                      <input type="text" class="form-control" placeholder="notification" name="title" required>
                    </div>
                    <div class="form-group">
                      <label for="message">Deskripsi</label>
                      <textarea type="text" class="form-control" placeholder="enter notification title" name="message" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Kirim<i class="mdi mdi-send ml-1"></i></button>

                    <?= form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- end of content wrapper -->
        </div>
    </div>
</div>