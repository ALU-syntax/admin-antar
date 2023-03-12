<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Data list view starts -->
            <section id="data-thumb-view" class="data-thumb-view-header">

                <div class="card-header">
                    <h4>Free Topup For Referal<span></h4>
                </div>
                  <?php if ($this->session->flashdata('demo') or $this->session->flashdata('hapus')) : ?>
                    <div class="alert alert-danger" role="alert">
                      <?php echo $this->session->flashdata('demo'); ?>
                      <?php echo $this->session->flashdata('hapus'); ?>
                    </div>
                  <?php endif; ?>
                  <?php if ($this->session->flashdata('ubah') or $this->session->flashdata('tambah')) : ?>
                    <div class="alert alert-success" role="alert">
                      <?php echo $this->session->flashdata('ubah'); ?>
                      <?php echo $this->session->flashdata('tambah'); ?>
                    </div>
                  <?php endif; ?>
                <!-- Promo code Table starts -->
                <form class="horizontal" method="POST" action="<?php echo base_url();?>promocode/updateRefCharge">
                <div class="row" style="margin-top:30px;">
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Topup Value For Referal Transaction:</label>
                            <input type="number" class="form-control" name="jumlah" value="<?php echo $nilai_topup[0]->ref_charge;?>" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button id="btn_filter" style="margin-top:30px;" class="btn btn-success btn-sm">Set Value</button>
                    </div>
                    
                </div>
               </form>
                <!-- promo code Table ends -->
            </section>
            <!-- Data list view end -->
        </div>
    </div>
    
  
</div>

<!-- END: Content-->
