<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- detail customer Start -->

            <div class="row">

                <div class="col-lg-12 col-sm-12">

                    <div class="card">
                        <div class="card-header mx-auto pb-0">
                            <div class="row m-0">
                                <div class="text-center">
                                    <h4><?= $admin['nama'] ?>
                                    </h4>
                                    <div>
                                        <p class=""><?= $admin['email'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body text-center mx-auto">
                                <div class="avatar avatar-xl">
                                    <img class="img-fluid" src="<?= base_url('images/admin/') . $admin['image']; ?>" alt="img placeholder"></div>
                                <div class="col-sm-12 text-center mt-2">
                                    <p class=""></p>
                                </div>

                                <div class="col-sm-12 text-center mt-1 mb-2">
                                    <?php if ($admin['admin_role'] == 1) { ?>
                                        <h3 class="badge badge-info">Super Admin</h3>
                                    <?php } else { ?>
                                        <h3 class="badge badge-dark">Admin</h3>
                                    <?php  } ?>
                                    <span class="badge badge-outline-warning" data-toggle="modal" data-target="#customerinfo">
                                        <a>
                                            <i class="feather icon-edit"></i>
                                            Ubah Info
                                        </a>
                                    </span>

                                </div>
                                <hr class="my-1">
                                
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="activity-timeline timeline-left list-unstyled">
                                    <li>
                                        <div class="timeline-icon bg-warning">
                                            <i class="feather icon-mail font-medium-2"></i>
                                        </div>
                                        <div class="timeline-info">
                                            <p class="font-weight-bold">Kontak</p>
                                            <p>Nomor hp :
                                                <span class="text-muted">
                                                    <?= $admin['no_telepon'] ?></span>
                                            </p>
                                            <p>Email :
                                                <span class="text-muted"><?= $admin['email'] ?></span>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="timeline-icon bg-info">
                                            <i class="feather icon-credit-card font-medium-2"></i>
                                        </div>
                                        <div class="timeline-info">
                                            <p class="font-weight-bold">Identitas</p>
                                            <p>Wilayah :
                                                <span class="text-muted"><?= $admin['wilayah'] ?></span>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

            <!-- end of detail customer -->
        </div>
    </div>
</div>
<!-- END: Content-->

<!-- Modal -->
<!-- edit customer info -->
<div class="modal fade text-left" id="customerinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Customer Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pr-2 pl-2">

                <section id="basic-vertical-layouts">
                    <?= form_open_multipart('AdminMenu/ubahid'); ?>
                    <input type="hidden" name="id" value="<?= $admin['id'] ?>">
                    <form class="form form-vertical">
                        <div class="form-body">
                            <div class="row">
                                <!-- start customer info form -->

                                <input type="hidden" name="id" value="<?= $admin['id'] ?>">

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <input type="file" name="image" class="dropify" data-max-file-size="1mb" data-default-file="<?= base_url('images/admin/') . $admin['image'] ?>" />
                                    </div>

                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="customer_fullname">Nama</label>
                                        <input type="text" id="nama" class="form-control" name="nama" placeholder="enter name" value="<?= $admin['nama'] ?>" required="required"></div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="customer_fullname">Username</label>
                                        <input type="text" id="user_name" class="form-control" name="user_name" placeholder="enter username" value="<?= $admin['user_name'] ?>" required="required"></div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="kota">Wilayah</label>
                                        <input type="text" id="wilayah" class="form-control" name="wilayah" placeholder="asal wilayah" value="<?= $admin['wilayah'] ?>" required="required"></div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="customer_fullname">Admin Role</label>
                                        <select class="form-control" name="admin_role" id="admin_role">

                                        <option value="0" <?php if($admin['admin_role']==0){?> selected<?php }?> >Admin</option>
                                        <option value="1" <?php if($admin['admin_role']==1){?> selected<?php }?> >Super Admin</option>
                                        </select>
                                    </div>
                                </div>
                

                                <div class="col-12">
                                    <label>Phone</label>

                                    <div class="row">

                                        <input type="hidden" name="id" value="<?= $admin['id'] ?>">
                                    
                                        <div class=" form-group col-12">
                                            <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="enter phone number" value="<?= $admin['no_telepon'] ?>" required="required">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control" name="email" placeholder="enter email" value="<?= $admin['email'] ?>" required="required"></div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" class="form-control" name="password" placeholder="enter password" ></div>
                                </div>

                                <!-- end of customer info form -->

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?= form_close(); ?>
                </section>
            </div>
        </div>
    </div>
</div>
<!-- edit customer info -->