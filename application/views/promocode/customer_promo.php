<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Data list view starts -->
            <section id="data-thumb-view" class="data-thumb-view-header">

                <div class="card-header">
                    <h4>Free Topup For Customer<span></h4>
                    <small>Periode <?php echo $awal;?> s.d <?php echo $akhir;?></small>
                    <input type="hidden" id="tanggal_awal" value="<?php echo $s_date;?>" />
                    <input type="hidden" id="tanggal_akhir" value="<?php echo $e_date;?>" />
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
                            <label>Start Date:</label>
                            <input type="date" class="form-control" id="start_date" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>End Date:</label>
                            <input type="date" class="form-control" id="end_date" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button id="btn_filter" style="margin-top:30px;" class="btn btn-success btn-sm">Filter Data</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table data-thumb-view">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Customer Code</th>
                                <th>Customer Name</th>
                                <th>Month Freq</th>
                                <th>Trans Freq</th>
                                <th>Trans Amount</th>
                                <th>Saldo</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($customer as $key) { ?>
                                <tr>
                                    <td><?php echo $i ;?></td>
                                    <td><?php echo $key->id;?></td>
                                    <td><?php echo $key->fullnama;?></td>
                                    <td><?php echo $key->freq;?></td>
                                    <td><?php echo $key->order_freq;?></td>
                                    <td style="text-align:right;"><?php echo number_format($key->amount);?></td>
                                    <td style="text-align:right;"><?php echo number_format($key->saldo);?></td>
                                    
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                    <button id="btn_tambah_saldo" style="margin-bottom:30px;" class="btn btn-success pull-right">Tambah Saldo Customer List</button>
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
                <h5 class="modal-title">Nilai Free Topup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Awal:</label>
                            <input type="text" readonly class="form-control" id="start_date_modal" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Akhir:</label>
                            <input type="text" readonly class="form-control" id="end_date_modal" />
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Nilai Free Topup</label>
                    <input type="number" class="form-control" id="nilai_topup" />
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
        var nilai = $("#nilai_topup").val();
        var sdate = $("#start_date_modal").val();
        var edate = $("#end_date_modal").val();
        $.ajax({
            url : "<?php echo base_url();?>Promocode/customer_promo_list",
            type : "POST",
            dataType :"JSON",
            data : {nilai:nilai, sdate:sdate, edate:edate},
            success : function(data) {
                console.log(data);
                if(data) {
                    window.location.reload();
                }
            }
        })
    }
    
    $("#btn_filter").click(function(){
        
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        
        if(start_date == '') {
            alert("Tanggal Awal Belum Diisi.....");
        } 
        else if(end_date == '') {
            alert("Tanggal Akhir Belum Diisi.....");
        }
        else {
            window.location = "<?php echo base_url()?>Promocode/customer_promo_index/"+start_date+"/"+end_date;
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
