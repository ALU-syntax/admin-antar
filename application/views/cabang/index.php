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
                                <h4 class="card-title">Data Cabang</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <button onclick="tambahdata()" style="margin-bottom:20px;" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</button> 
                                    <br>
                                    <table id="table-cabang"  class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="8%">ID</th>
                                                <th width="*">Nama Cabang</th>
                                                <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                   
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


<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?= form_open("", array('id'=>"frmsimpan")) ;?>
          <input type="hidden" id="id" name="id" >
          <input type="hidden" id="method" name="method">
          <div class="form-group">
              <label>Nama Cabang:</label>
              <input type="text" id="cabang" name="cabang" class="form-control" required >
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-sm btn-outline-light" data-dismiss="modal">Close</button>
          <button id="btnsimpan" style="display:none;" class="btn btn-sm btn-outline-success">Simpan Data</button>
          <button id="btnupdate" style="display:none;" class="btn btn-sm btn-outline-warning">Update Data</button>
        </div>
        <?= form_close();?>
      </div>
      <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<!-- END: Content-->