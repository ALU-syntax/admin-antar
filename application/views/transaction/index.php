<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- transaction history Start -->
            <section id="column-selectors">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Riwayat Transaksi</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <?php
                                    $id = $_SESSION['id'];
                                    $sql = "SELECT * FROM admin where id = $id ";
                                    $query = $this->db->query($sql)->result();
                                    $SuperAdmin = $query[0]->admin_role;
                                    // var_dump($SuperAdmin == 0, $_SESSION);
                                    ?>
                                    <?php if ($this->session->flashdata()) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $this->session->flashdata('demo'); ?>
                                            <?php echo $this->session->flashdata('cancel'); ?>
                                            <?php echo $this->session->flashdata('hapus'); ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Dari Tanggal:</label>
                                                <input type="date" class="form-control" id="dari" name="dari" />
                                            </div>
                                            <div class="col-md-3">
                                                <label>Sampai Tanggal:</label>
                                                <input type="date" class="form-control" id="sampai" name="sampai" />
                                            </div>
                                            <div class="col-md-3">
                                                <button onclick="settanggal()" style="margin-top:18px;" class="btn btn-success">Set Tanggal</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table style="font-size:11px;" class="table table-bordered table-striped" id="table_transaksi">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Date</th>
                                                    <th>Inv</th>
                                                    <th>Wilayah</th>
                                                    <th>Customer</th>
                                                    <th>Driver</th>
                                                    <th>Service</th>
                                                    <th>Pick Up</th>
                                                    <th>Destination</th>
                                                    <th>Delv</th>
                                                    <th>Food Cost</th>
                                                    <th>Food Adm Fee</th>
                                                    <th>Payment Method</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
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
            <!-- end of transaction history -->
        </div>
    </div>
</div>
<!-- END: Content-->
