
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Data list view starts -->
            <section id="data-thumb-view" class="data-thumb-view-header">

                <div class="card-header">
                    <h4>Insentif Customer<span></h4>
                  
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
             
                <div class="table-responsive">
                    <table class="table data-thumb-view">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Fitur</th>
                                <th style="text-align:right;">Insentif (Rp)</th>
                                <th width="25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($fitur as $f){?>
                                <tr>
                                    <td><?= $f->id_fitur;?></td>
                                    <td><?= $f->fitur;?></td>
                                    <td style="text-align:right;"><span id="insentif_text_<?= $f->id_fitur;?>">Rp. <?= number_format($f->promo_customer);?></span><input value="<?= $f->promo_customer;?>" style="display:none;" type="text" id="harga_<?= $f->id_fitur; ?>"></td>
                                    <td><center><button id="btn_edit_<?= $f->id_fitur;?>" onclick="edit_insentif(<?= $f->id_fitur;?>)" style="margin-right:5px;" class="btn btn-sm btn-warning">Edit</button><button id="btn_simpan_<?= $f->id_fitur;?>" style="display:none;" onclick="simpan_insentif(<?= $f->id_fitur;?>)" class="btn btn-sm btn-primary">Simpan</button></center></td>
                                </tr>
                            
                            <?php }?>
                        </tbody>
                        
                    </table>
                    
                </div>
                <!-- promo code Table ends -->
            </section>
            <!-- Data list view end -->
        </div>
    </div>
    
  


</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script>
    function edit_insentif(id) {
        $("#insentif_text_"+id).hide();
        $("#harga_"+id).show();
        $("#btn_edit_"+id).hide();
        $("#btn_simpan_"+id).show();
        
        
    }
    
    
    function simpan_insentif(id) {
        var harga = $("#harga_"+id).val();
        $.ajax({
            url : "<?= base_url();?>Promocode/update_insentif_customer",
            type : "POST",
            dataType : "JSON",
            data : {id:id, harga:harga},
            success: function () {
                $("#insentif_text_"+id).show();
                $("#insentif_text_"+id).text(formatRupiah(harga, 'Rp. '));
                $("#harga_"+id).hide();
                $("#btn_edit_"+id).show();
                $("#btn_simpan_"+id).hide();
            }
        })
    }
    
    
    function formatRupiah(angka, prefix){
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
		split   		= number_string.split(','),
		sisa     		= split[0].length % 3,
		rupiah     		= split[0].substr(0, sisa),
		ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if(ribuan){
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}
    
    
    
    
</script>
<!-- END: Content-->
