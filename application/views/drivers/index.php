
<style>
    thead, td{
        font-size:12px;
    }
    
    /*#DataTables_Table_0_paginate, #DataTables_Table_1_paginate, #DataTables_Table_2_paginate, #DataTables_Table_3_paginate{*/
    /*    display:none;*/
    /*}*/
</style>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- drivers data Start -->
            <!-- drivers tabs start -->
            <section id="basic-tabs-components">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card overflow-hidden">
                            <div class="card-header">
                                <h4 class="card-title">Data Driver</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="alldriver-tab" data-toggle="tab" href="#alldriver" aria-controls="alldriver" role="tab" aria-selected="true">Semua Driver</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="activedriver-tab" data-toggle="tab" href="#activedriver" aria-controls="activedriver" role="tab" aria-selected="false">Driver Aktif</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="nonactivedriver-tab" data-toggle="tab" href="#nonactivedriver" aria-controls="nonactivedriver" role="tab" aria-selected="false">Driver Non Aktif</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="suspendeddriver-tab" data-toggle="tab" href="#suspendeddriver" aria-controls="suspendeddriver" role="tab" aria-selected="false">Driver Suspend</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="alldriver" aria-labelledby="alldriver-tab" role="tabpanel">
                                            <!-- start all driver data table -->
                                            <section id="column-selectors">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Semua Data Driver</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body card-dashboard">
                                                                    <div class="table-responsive">
                                                                        <table id="table_all_driver" class="table table-striped">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No</th>
                                                                                    <th>ID Driver</th>
                                                                                    <th>Gambar</th>
                                                                                    <th>Nama</th>
                                                                                    <th>Wilayah</th>
                                                                                    <th>Nomor hp</th>
                                                                                    <th>Rating</th>
                                                                                    <th>Pekerjaan</th>
                                                                                    <th>Status</th>
                                                                                    <th>Tindakan</th>
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
                                            <!-- end of all driver data table -->
                                        </div>

                                        <div class="tab-pane" id="activedriver" aria-labelledby="activedriver-tab" role="tabpanel">
                                            <!-- start all active driver data table -->
                                            <section id="column-selectors">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Data Driver Aktif</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body card-dashboard">
                                                                    <div class="table-responsive">
                                                                        <table style="width:100%;" id="table_aktif_driver" class="table table-striped">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No</th>
                                                                                    <th>ID Driver</th>
                                                                                    <th>Gambar</th>
                                                                                    <th>Nama</th>
                                                                                    <th>Wilayah</th>
                                                                                    <th>Nomor hp</th>
                                                                                    <th>Rating</th>
                                                                                    <th>Pekerjaan</th>
                                                                                    <th>Status</th>
                                                                                    <th>Tindakan</th>
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
                                            <!-- end of all active driver data table -->
                                        </div>

                                        <div class="tab-pane" id="nonactivedriver" aria-labelledby="nonactivedriver-tab" role="tabpanel">
                                            <!-- start nonactive driver data table -->
                                            <section id="column-selectors">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Data Driver Non Aktif</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body card-dashboard">
                                                                    <div class="table-responsive">
                                                                        <table style="width:100%;" id="table_nonaktif_driver" class="table table-striped table-hovered">
                                                                            <thead>
                                                                                
                                                                                    <tr>
                                                                                    <th>No</th>
                                                                                    <th>ID Driver</th>
                                                                                    <th>Gambar</th>
                                                                                    <th>Nama</th>
                                                                                    <th>Wilayah</th>
                                                                                    <th>Nomor hp</th>
                                                                                    <th>Rating</th>
                                                                                    <th>Pekerjaan</th>
                                                                                    <th>Status</th>
                                                                                    <th>Tindakan</th>
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
                                            <!-- end of nonactive driver data table -->
                                        </div>

                                        <div class="tab-pane" id="suspendeddriver" aria-labelledby="suspendeddriver-tab" role="tabpanel">
                                            <!-- start suspended driver data table -->
                                            <section id="column-selectors">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Data Driver Disuspend</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body card-dashboard">
                                                                    <div class="table-responsive">
                                                                        <table style="width:100%;" id="table_suspend_driver" class="table table-striped table-hovered">
                                                                            <thead>
                                                                                    <tr>
                                                                                    <th>No</th>
                                                                                    <th>ID Driver</th>
                                                                                    <th>Gambar</th>
                                                                                    <th>Nama</th>
                                                                                    <th>Wilayah</th>
                                                                                    <th>Nomor hp</th>
                                                                                    <th>Rating</th>
                                                                                    <th>Pekerjaan</th>
                                                                                    <th>Status</th>
                                                                                    <th>Tindakan</th>
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
                                            <!-- end of suspended driver data table -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end of drivers tab -->
            <!-- end of drivers data -->
        </div>
    </div>
</div>
<!-- END: Content-->