<!-- BEGIN: Content-->
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
                                <h4 class="card-title">Semua Admin</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <a class="btn btn-success mb-1 text-white" href="<?= base_url(); ?>AdminMenu/tambah">
                                        <i class="feather icon-plus mr-1"></i>Tambah Admin</a>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="allcustomer-tab" data-toggle="tab" href="#alladmin" aria-controls="alladmin" role="tab" aria-selected="true">All</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="blockeduser-tab" data-toggle="tab" href="#adminonly" aria-controls="blockeduser" role="tab" aria-selected="false">Admin Only</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="alladmin" aria-labelledby="allcustomer-tab" role="tabpanel">
                                            <!-- start all customer data table -->
                                            <section id="column-selectors">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Data semua admin</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body card-dashboard">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped dataex-html5-selectors">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No</th>
                                                                                    <!-- <th>Admin Id</th> -->
                                                                                    <th>Photo Profile</th>
                                                                                    <th>Full Name</th>
                                                                                    <th>Email</th>
                                                                                    <th>Phone</th>
                                                                                    <th>Username</th>
                                                                                    <th>Wilayah</th>
                                                                                    <th>Status</th>
                                                                                    <th>Actions</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $i = 1;
                                                                                foreach ($admin as $cstm) { 
                                            $this->db->where('id', $cstm['wilayah']);
                                            $qq = $this->db->get('list_cabang')->row_array();
                                                                                ?>
                                                                                    <tr>
                                                                                        <td><?= $i ?></td>
                                                                                        
                                                                                        <td>
                                                                                            <img class="round" style="width: 40px; height: 40px;" src="<?= base_url('images/admin/') . $cstm['image']; ?>">
                                                                                        </td>
                                                                                        <td><?= $cstm['nama'] ?></td>
                                                                                        <td><?= $cstm['email'] ?></td>
                                                                                        <td><?= $cstm['no_telepon'] ?></td>
                                                                                        <td><?= $cstm['user_name'] ?></td>
                                                                                        <td><?php 
                                                                                            if(!empty($cstm['wilayah'])) {
                                                                                                echo $qq['nama_cabang'];
                                                                                            }
                                                                                        ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <?php if ($cstm['admin_role'] == 1) { ?>
                                                                                                <label class="badge badge-success">Super Admin</label>
                                                                                            <?php } else { ?>
                                                                                                <label class="badge badge-dark">Admin</label>
                                                                                            <?php } ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="">
                                                                                                <a href="<?= base_url(); ?>AdminMenu/detail/<?= $cstm['id'] ?>">
                                                                                                    <i class="feather icon-eye text-success"></i>
                                                                                                </a>
                                                                                            </span>
                                                                                            <?php if ($cstm['admin_role'] == 0) { ?>
                                                                                                <span class="mr-1 ml-1">
                                                                                                    <a href="<?= base_url(); ?>AdminMenu/ubahSuper/<?= $cstm['id'] ?>">
                                                                                                        <i class="feather icon-shuffle text-info"></i>
                                                                                                    </a>
                                                                                                </span>
                                                                                            <?php } else { ?>
                                                                                                <span class="mr-1 ml-1">
                                                                                                    <a href="<?= base_url(); ?>AdminMenu/UbahAdmin/<?= $cstm['id'] ?>">
                                                                                                        <i class="feather icon-shuffle text-dark"></i>
                                                                                                    </a>
                                                                                                </span>
                                                                                            <?php } ?>
                                                                                            <span class="action-delete ml-1">
                                                                                                <a onclick="return confirm ('Are You Sure?')" href="<?= base_url(); ?>AdminMenu/hapusAdmin/<?= $cstm['id'] ?>">
                                                                                                    <i class="feather icon-trash text-danger"></i></a>
                                                                                            </span>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php $i++;
                                                                                } ?>
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
                                        <div class="tab-pane" id="adminonly" aria-labelledby="allcustomer-tab" role="tabpanel">
                                            <!-- start all customer data table -->
                                            <section id="column-selectors">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">All Admin Data</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body card-dashboard">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped dataex-html5-selectors">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No</th>
                                                                                    <!-- <th>Admin Id</th> -->
                                                                                    <th>Photo Profile</th>
                                                                                    <th>Full Name</th>
                                                                                    <th>Email</th>
                                                                                    <th>Phone</th>
                                                                                    <th>Username</th>
                                                                                    <th>Wilayah</th>
                                                                                    <th>Status</th>
                                                                                    <th>Actions</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $i = 1;
                                                                                foreach ($admin as $cstm) { 
                                                                                    if ($cstm['admin_role'] == 0) {
                                                                                        $this->db->where('id', $cstm['wilayah']);
                                            $qq = $this->db->get('list_cabang')->row_array();
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td><?= $i ?></td>
                                                                                        
                                                                                        <td>
                                                                                            <img class="round" style="width: 40px; height: 40px;" src="<?= base_url('images/admin/') . $cstm['image']; ?>">
                                                                                        </td>
                                                                                        <td><?= $cstm['nama'] ?></td>
                                                                                        <td><?= $cstm['email'] ?></td>
                                                                                        <td><?= $cstm['no_telepon'] ?></td>
                                                                                        <td><?= $cstm['user_name'] ?></td>
                                                                                        <td><?php 
                                                                                            if(!empty($cstm['wilayah'])) {
                                                                                                echo $qq['nama_cabang'];
                                                                                            }
                                                                                        ?></td>
                                                                                        <td>
                                                                                            <?php if ($cstm['admin_role'] == 1) { ?>
                                                                                                <label class="badge badge-success">Super Admin</label>
                                                                                            <?php } else { ?>
                                                                                                <label class="badge badge-dark">Admin</label>
                                                                                            <?php } ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            <span class="">
                                                                                                <a href="<?= base_url(); ?>AdminMenu/detail/<?= $cstm['id'] ?>">
                                                                                                    <i class="feather icon-eye text-success"></i>
                                                                                                </a>
                                                                                            </span>
                                                                                            <?php if ($cstm['admin_role'] == 0) { ?>
                                                                                                <span class="mr-1 ml-1">
                                                                                                    <a href="<?= base_url(); ?>AdminMenu/ubahSuper/<?= $cstm['id'] ?>">
                                                                                                        <i class="feather icon-shuffle text-info"></i>
                                                                                                    </a>
                                                                                                </span>
                                                                                            <?php } else { ?>
                                                                                                <span class="mr-1 ml-1">
                                                                                                    <a href="<?= base_url(); ?>AdminMenu/UbahAdmin/<?= $cstm['id'] ?>">
                                                                                                        <i class="feather icon-shuffle text-dark"></i>
                                                                                                    </a>
                                                                                                </span>
                                                                                            <?php } ?>
                                                                                            <span class="action-delete ml-1">
                                                                                                <a onclick="return confirm ('Are You Sure?')" href="<?= base_url(); ?>AdminMenu/hapusAdmin/<?= $cstm['id'] ?>">
                                                                                                    <i class="feather icon-trash text-danger"></i></a>
                                                                                            </span>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php $i++;
                                                                                    }
                                                                                } ?>
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