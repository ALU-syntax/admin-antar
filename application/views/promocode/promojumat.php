<?php
    $daftar_hari = array(
     'Sunday' => 'Minggu',
     'Monday' => 'Senin',
     'Tuesday' => 'Selasa',
     'Wednesday' => 'Rabu',
     'Thursday' => 'Kamis',
     'Friday' => 'Jumat',
     'Saturday' => 'Sabtu'
    );
    
    $namahari = date('l', strtotime($awal));
    
    

?>

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Data list view starts -->
            <section id="data-thumb-view" class="data-thumb-view-header">

                <div class="card-header">
                    <h4>Promo Jumat<span></h4>
                    <small>Periode <?php echo $daftar_hari[$namahari] ;?>, <?php echo $awal;?></small>
                    <input type="hidden" id="tanggal_awal" value="<?php echo $s_date;?>" />
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
                <div class="row" style="margin-top:30px;">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Select Date:</label>
                            <input type="date" class="form-control" id="start_date" />
                        </div>
                    </div>
                    <div class="col-md-4">
                       <button id="btn_filter" style="margin-top:30px;" class="btn btn-success btn-sm">Filter Data</button>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table data-thumb-view">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Driver Code</th>
                                <th>Driver Name</th>
                                <th>Status</th>
                                <th>Trans Value</th>
                                <th>Trans Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($driver as $key) { ?>
                                <tr>
                                    <td><?php echo $i ;?></td>
                                    <td><?php echo $key->id_driver;?></td>
                                    <td><?php echo $key->nama_driver;?></td>
                                    <td><?php if($key->status == '4') echo 'Finish' ?></td>
                                    <td style="text-align:right;"><?php echo number_format($key->harga);?></td>
                                    <td><?php echo $key->waktu_order;?></td>
                                    
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                        
                    </table>
                    <input type="hidden" id="data_count" name="data_count" value="<?php echo count($driver);?>" />
                    <button id="btn_tambah_saldo" style="margin-bottom:30px;" class="btn btn-success pull-right">Tambah Saldo Driver List</button>
                </div>
                <!-- promo code Table ends -->
            </section>
            <!-- Data list view end -->
        </div>
    </div>
    
    <div id="modal-promo" class="modal fade center" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Proses Tambah Saldo Driver Program Promo Jum'at</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tanggal:</label>
                            <input type="text" readonly class="form-control" id="start_date_modal" />
                        </div>
                    </div>
                </div>
                
              </div>
              <div class="modal-footer">
                <button onclick="proses()" type="button" id="btn_proses" class="btn btn-primary">Proses</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
        </div>
    </div>



</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script>

    function proses() {
        var jumlah_data = $("#data_count").val();
        if(jumlah_data < 1) {
            alert("Data Tidak Ada...!");
        }
        else {
            promojumat_isexist();
        }
    }
    
    
    function action_topromo() {
        var sdate = $("#start_date_modal").val();
        $.ajax({
            url : "<?php echo base_url();?>Promocode/jumat_promo_list",
            type : "POST",
            dataType :"JSON",
            data : {sdate:sdate},
            success : function(data) {
                console.log(data);
                if(data) {
                    window.location.reload();
                }
            }
        })
    }
    
    
    function promojumat_isexist() {
        var sdate = $("#start_date_modal").val();
        $.ajax({
            url : "<?php echo base_url();?>Promocode/promojumat_isexist",
            type : "POST",
            dataType :"JSON",
            data : {sdate:sdate},
            success : function(data) {
                if(data == 1){
                    alert("Promo Jumat Pada Tanggal Ini sudah pernah diproses....!");
                }else{
                    action_topromo();
                }
            }
        });
    }
    
    
    
    $("#btn_filter").click(function(){
        
        var start_date = $("#start_date").val();
        if(start_date == '') {
            alert("Tanggal Belum Dipilih.....");
        } 
        
        else {
            window.location = "<?php echo base_url()?>Promocode/jumat_index/"+start_date;
        }
        
    });
    
    
    $("#btn_tambah_saldo").click(function(){
        
        var sdate = $("#tanggal_awal").val();
        var edate = $("#tanggal_akhir").val();
        
        $("#start_date_modal").val(sdate);
        $("#end_date_modal").val(edate);
        
        $("#modal-promo").modal("show");
        $("#nilai_topup").val("");
        
    })
    
    
    
    
</script>
<!-- END: Content-->
