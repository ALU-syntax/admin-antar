<!-- BEGIN: Content-->
<style>
    th, td {
        font-size:12px;
    }
</style>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- customer data Start -->
            <!-- customer tabs start -->
            <section id="basic-tabs-components">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card overflow-hidden">
                            <div class="card-header">
                                <?php if ($this->session->flashdata('demo') or $this->session->flashdata('hapus')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $this->session->flashdata('demo'); ?>
                                        <?php echo $this->session->flashdata('hapus'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($this->session->flashdata('ubah') or $this->session->flashdata('tambah')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $this->session->flashdata('ubah'); ?>
                                        <?php echo $this->session->flashdata('tambah'); ?>
                                    </div>
                                <?php endif; ?>
                                <h4 class="card-title">User Data</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <a class="btn btn-success mb-1 text-white" href="<?= base_url(); ?>users/tambah">
                                        <i class="feather icon-plus mr-1"></i>Tambah User</a>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="allcustomer-tab" data-toggle="tab" href="#allcustomer" aria-controls="allcustomer" role="tab" aria-selected="true">All Customers</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="blockeduser-tab" data-toggle="tab" href="#blockeduser" aria-controls="blockeduser" role="tab" aria-selected="false">Blocked User</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="allcustomer" aria-labelledby="allcustomer-tab" role="tabpanel">
                                            <!-- start all customer data table -->
                                            <section id="column-selectors">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">All User Data</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body card-dashboard">
                                                                    <div class="table-responsive">
                                                                        <table id="table_list_pelanggan" class="table table-striped table-hovered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No</th>
                                                                                    <th>Tindakan</th>
                                                                                    <th>User Id</th>
                                                                                    
                                                                                    <th>Photo Profil</th>
                                                                                    <th>Nama</th>
                                                                                    <th>Wilayah</th>
                                                                                    <th>Kota</th>
                                                                                    <th>Email</th>
                                                                                    <th>No hp</th>
                                                                                    <th>Status</th>
                                                                                    
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                              
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- end of all customer data table -->
                                        </div>
                                        <div class="tab-pane" id="blockeduser" aria-labelledby="blockeduser-tab" role="tabpanel">
                                            <!-- start all blocked customer data table -->
                                            <section id="column-selectors">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">All Blocked User Data</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body card-dashboard">
                                                                    <div class="table-responsive">
                                                                        <table id="table_pelanggan_blok" class="table table-striped table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No</th>
                                                                                    <th>Tindakan</th>
                                                                                    <th>User Id</th>
                                                                                    
                                                                                    <th>Photo Profil</th>
                                                                                    <th>Nama</th>
                                                                                    <th>Wilayah</th>
                                                                                    <th>Kota</th>
                                                                                    <th>Email</th>
                                                                                    <th>No hp</th>
                                                                                    <th>Status</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- end of all blocked customer data table -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end of customer tab -->
            <!-- end of customer data -->
        </div>
    </div>
</div>
<!-- END: Content-->