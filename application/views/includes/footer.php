<div class="sidenav-overlay"></div>
<div class="drag-target"></div>



<?php if ($this->session->flashdata('success')) { ?>

    <section id="animation">

        <div id="type-success">

            <input type="hidden" id="desctoast" value="<?php echo $this->session->flashdata('success'); ?>" />
        </div>
    </section>
<?php } ?>

<?php if ($this->session->flashdata('danger')) { ?>

    <section id="animation">

        <div id="type-danger">

            <input type="hidden" id="desctoast" value="<?php echo $this->session->flashdata('danger'); ?>" />
        </div>
    </section>
<?php } ?>

<?php if ($this->session->flashdata('demo')) { ?>

    <section id="animation">

        <div id="type-danger">

            <input type="hidden" id="desctoast" value="<?php echo $this->session->flashdata('demo'); ?>" />
        </div>
    </section>
<?php } ?>


<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">Copyright © 2022 <a href="https://bumdes-ku.com">BUMDesKU</a>. All rights Reserved</span><span class="float-md-right d-none d-md-block"><i class="feather icon-heart pink"></i></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/vendors.min.js"></script>

<script src="<?= base_url(); ?>asset/app-assets/vendors/js/extensions/toastr.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->


<script src="<?= base_url(); ?>asset/app-assets/vendors/js/charts/apexcharts.min.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>

<script src="<?= base_url(); ?>asset/app-assets/vendors/js/tables/datatable/dataTables.select.min.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/vendors/js/extensions/dropzone.min.js"></script>

<script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/intlTelInput-jquery.min.js"></script>




<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="<?= base_url(); ?>asset/app-assets/js/core/app-menu.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/js/core/app.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/js/scripts/components.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<?php if ($view == "dashboard") { ?>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/chart-dashboard.js"></script>
<?php } ?>

<?php if ($view == "statisticgeneral") { ?>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/chart-general.js"></script>
<?php } ?>

<?php if ($view == "statistictransaction") { ?>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/extensions/swiper.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/swiper.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/transactionstatistic.js"></script>
<?php } else if ($view == "valuation") { ?>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/extensions/swiper.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/swiper.js"></script>
<?php } ?>



<?php if ($view == "statisticfinance") { ?>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/financestatistic.js"></script>
<?php } ?>

<?php if ($view == "drivermap") { ?>

<script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/mapbox-gl.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/maps-tracking-mapbox.js"></script>
<?php } ?>

<?php if ($view == "merchantmap") { ?>
<script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/mapbox-gl.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/maps-merchant-mapbox.js"></script>
<?php } ?>

<?php if ($view == "appsettings") { ?>
    <script src="<?= base_url(); ?>asset/node_modules/summernote/dist/summernote-bs4.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>asset/node_modules/dropify/dist/js/dropify.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/dropify.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/quilleditor.js"></script>
<?php } ?>

<?php if ($view == "emailsettings") { ?>
    <script src="<?= base_url(); ?>asset/node_modules/summernote/dist/summernote-bs4.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/quilleditor.js"></script>
<?php } ?>

<?php if ($view == "sendemail") { ?>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>asset/node_modules/summernote/dist/summernote-bs4.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/quilleditor.js"></script>
<?php } ?>

<?php if ($view == "addnews") { ?>
    <script src="<?= base_url(); ?>asset/node_modules/summernote/dist/summernote-bs4.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/quilleditor.js"></script>
<?php } ?>

<?php if ($view == "detaildriver") { ?>
    <script src="<?= base_url(); ?>asset/node_modules/dropify/dist/js/dropify.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/dropify.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/extensions/swiper.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/extensions/dropzone.min.js"></script>

    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>

    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/intlTelInput-jquery.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/select/select2.full.min.js"></script>

    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/modal/components-modal.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/detaildriver.js"></script>
<?php } ?>

<?php if ($view == "detailmerchant") { ?>
    <script src="<?= base_url(); ?>asset/node_modules/dropify/dist/js/dropify.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/dropify.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/extensions/swiper.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/modal/components-modal.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/detailmerchant.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/duit.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/mapbox-gl.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/maps-picker-mapbox.js"></script>

<?php } ?>

<?php if ($view == "addmerchant") { ?>
    <script src="<?= base_url(); ?>asset/node_modules/dropify/dist/js/dropify.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/dropify.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/modal/components-modal.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/addmerchant.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/mapbox-gl.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/maps-picker-mapbox.js"></script>

<?php } ?>

<?php if ($view == "detailtransaction") { ?>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/pages/invoice.js"></script>
<?php } ?>

<?php if ($view == "detailcustomer") { ?>
    <script src="<?= base_url(); ?>asset/node_modules/dropify/dist/js/dropify.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/dropify.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/detailcustomer.js"></script>
<?php } ?>

<?php if ($view == "adddriver") { ?>
    <script src="<?= base_url(); ?>asset/node_modules/dropify/dist/js/dropify.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/dropify.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/extensions/swiper.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/extensions/dropzone.min.js"></script>

    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>

    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/intlTelInput-jquery.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/select/select2.full.min.js"></script>

    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/modal/components-modal.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/detaildriver.js"></script>
<?php } ?>

<?php if ($view == "edititemview") { ?>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/edititem.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/duit.js"></script>
<?php } ?>

<?php if ($view == "additemview") { ?>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/additem.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/duit.js"></script>
<?php } ?>

<?php if ($view == "addsliderdata") { ?>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/addslider.js"></script>
<?php } ?>

<?php if ($view == "addpromotioncode") { ?>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/addpromocode.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/duit.js"></script>
<?php } ?>

<?php if ($view == "addtopup") { ?>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/addtopup.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/duit.js"></script>
    
    
<?php } ?>

<?php if ($view == "editsliderdata") { ?>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/editslider.js"></script>
<?php } ?>

<?php if ($view == "addmerchnatcategory") { ?>
    <script src="<?= base_url(); ?>asset/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/merchantcategory.js"></script>
<?php } ?>

<script src="<?= base_url(); ?>asset/app-assets/js/scripts/datatables/datatable.js"></script>
<script src="<?= base_url(); ?>asset/app-assets/js/scripts/ui/data-list-view.js"></script>

<?php if ($this->session->flashdata('success')) { ?>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/toastrsuccess.js"></script>
<?php } ?>

<?php if ($this->session->flashdata('danger') || $this->session->flashdata('demo')) { ?>
    <script src="<?= base_url(); ?>asset/app-assets/js/scripts/ourdevelops/toastrerror.js"></script>
<?php } ?>


<?php if($view == 'dashboard') { ?>
    <script>
        $("#table_dashboard").DataTable({
          
          "processing":true,
          "serverSide":true,
          "responsive": true,
          "order":[],
          "ajax":{
              url: "<?php echo base_url();?>Dashboard/fetch_datatable",
              type:"POST",
              data :{jenis: 'suspend'},
          },
          "columnDefs":[
              {
                  "targets":[0],
                  "orderable":false,
              }
          ],
          
        });
    
    </script>
<?php } ?>


<?php if($view == 'transaction') {?>
    <script>
        setdatatable("", "");
        
        function settanggal() {
            var dari = $("#dari").val();
            var sampai = $("#sampai").val();
            
            if(dari > sampai) {
                alert("tanggal awal tidak boleh lebih besar dari tanggal akhir");
            }
            else if(dari == '' && sampai != ''){
                alert("pengisian tanggal belum lengkap..!");
            }
            
            else {
                var table = $("#table_transaksi").DataTable();
                table.destroy();
                setdatatable(dari,sampai);    
            }
        }
        
        
        function setdatatable(dari, sampai) {
            $("#table_transaksi").DataTable({
            
              "processing":true,
              "serverSide":true,
              "responsive": true,
              "order":[],
              "ajax":{
                  url: "<?php echo base_url();?>Dashboard/fetch_datatable",
                  type:"POST",
                  data :{dari:dari, sampai:sampai },
              },
              "columnDefs":[
                  {
                      "targets":[0],
                      "orderable":false,
                  }
              ],
             
              dom: 'Bfrtip',
              
                 lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                  ],
                
                buttons: [
                    'copyHtml5',
                    'csvHtml5',
                    'print',
                    'pageLength'
                ],
            });
        }
        
        
        
        
        
    </script>
<?php } ?>

<?php if($view == 'cabang') { ;?>
<script>

    function deletedata(id){
        var y = confirm('Apakah anda ingin menghapus data ini...?');
        if(y === true) {
            deleteconfirm(id);
        }
    }
    
    
    function deleteconfirm(id) {
        $.ajax({
            url : "<?= base_url();?>cabang/deletedata",
            type : "POST",
            dataType : "JSON",
            data : {id:id},
            success : function(data) {
                reloadTable();
            }
        })
    }
    
    
    function editdata(id) {
        $("#method").val("edit");
        $.ajax({
            url : "<?= base_url();?>cabang/editdata",
            type : "POST",
            dataType : "JSON",
            data: {id:id},
            success:function(data){
                $("#id").val(data.id);
                $("#cabang").val(data.nama_cabang);
                $("#modal-tambah").modal("show");
                $(".modal-title").text("Edit Data Cabang");
                $("#btnsimpan").hide();
                $("#btnupdate").show();
            }
        })
    }
    
    function tambahdata() {
        resetform();
        $("#method").val("add");
        $(".modal-title").text("Tambah Data Cabang");
        $("#btnsimpan").show();
        $("#btnupdate").hide();
        $("#modal-tambah").modal("show");
    }
    
    
    $("#frmsimpan").submit(function(e){
       e.preventDefault();
       var method = $("#method").val();
       var url = '';
       if(method == 'add' ) {
           url = "<?= base_url();?>cabang/savedata";
       } else {
           url = "<?= base_url();?>cabang/updatedata";
       }
       
       $.ajax({
           url : url,
           type : "POST",
           dataType : "JSON",
           data: $(this).serialize(),
           success:function(data) {
               console.log("savedata", data);
               reloadTable();
               $("#modal-tambah").modal("hide");
           }
       })
    });
    
    
    
    $("#table-cabang").DataTable({
          "processing":true,
          "serverSide":true,
          "responsive": true,
          "order":[],
          "ajax":{
              url: "<?php echo base_url();?>Cabang/fetchdatatable",
              type:"POST",
              
          },
          "columnDefs":[
              {
                  "targets":[0],
                  "orderable":false,
              }
          ],
         
          dom: 'Bfrtip',
          
             lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10 rows', '25 rows', '50 rows', 'Show all' ]
              ],
            
            buttons: [
                'copyHtml5',
                'csvHtml5',
                'print',
                'pageLength'
            ],
    });
    
    function resetform() {
        $("#cabang").val();
    }
    
    function reloadTable() {
        $("#table-cabang").DataTable().ajax.reload(null,false);
    }
</script>
<?php } ?>


<?php if($view == 'newregistration') { ?>
    <script>
        
        $("#table-pendaftaran-driver").DataTable({
          "processing":true,
          "serverSide":true,
          "responsive": true,
          "order":[],
          "ajax":{
              url: "<?= base_url();?>Newregistration/fetch_table",
              type:"POST",
              data : {type: 'new_register'},
              
          },
          "columnDefs":[
              {
                  "targets":[0,2,8],
                  "orderable":false,
              }
          ],
         
          dom: 'Bfrtip',
          
             lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10 rows', '25 rows', '50 rows', 'Show all' ]
              ],
            
            buttons: [
                'copyHtml5',
                'csvHtml5',
                'print',
                'pageLength'
            ],
        });
        
    </script>

<?php } ?>


<?php if($view == 'users') { ?>
    <script>
        
        $("#table_list_pelanggan").DataTable({
          "processing":true,
          "serverSide":true,
          "responsive": true,
          "order":[],
          "ajax":{
              url: "<?= base_url();?>Users/fetch_table",
              type:"POST",
              data : {type: 'all_pelanggan'},
          },
          "columnDefs":[{"targets":[0,1,3,5],"orderable":false,}],
           dom: 'Bfrtip',
           lengthMenu: [[ 10, 25, 50, -1 ],[ '10 rows', '25 rows', '50 rows', 'Show all' ]],
           buttons: ['copyHtml5','csvHtml5','print','pageLength'],
        });
        
        
        
        $("#table_pelanggan_blok").DataTable({
          "processing":true,
          "serverSide":true,
          "responsive": true,
          "order":[],
          "ajax":{
              url: "<?= base_url();?>Users/fetch_table",
              type:"POST",
              data : {type: 'blok'},
              
          },
          "columnDefs":[
              {
                  "targets":[0,1,3,5],
                  "orderable":false,
              }
          ],
         
          dom: 'Bfrtip',
          
             lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10 rows', '25 rows', '50 rows', 'Show all' ]
              ],
            
            buttons: [
                'copyHtml5',
                'csvHtml5',
                'print',
                'pageLength'
            ],
        });
        
    </script>

<?php } ?>


<?php if($view == 'driver') { ?>
    
    <script>
        $("#table_all_driver").DataTable({
          "processing":true,
          "serverSide":true,
          "responsive": true,
          "order":[],
          "ajax":{
              url: "<?= base_url();?>Driver/fetch_table",
              type:"POST",
              data : {type: 'all_driver'},
          },
          "columnDefs":[{"targets":[0, 2, 9],"orderable":false,}],
           dom: 'Bfrtip',
           lengthMenu: [[ 10, 25, 50, -1 ],[ '10 rows', '25 rows', '50 rows', 'Show all' ]],
           buttons: ['copyHtml5','csvHtml5','print','pageLength'],
        });
        
        
        $("#table_aktif_driver").DataTable({
          "processing":true,
          "serverSide":true,
          "responsive": true,
          "order":[],
          "ajax":{
              url: "<?= base_url();?>Driver/fetch_table",
              type:"POST",
              data : {type: 'driver_aktif'},
          },
          "columnDefs":[{"targets":[0, 2, 9],"orderable":false,}],
           dom: 'Bfrtip',
           lengthMenu: [[ 10, 25, 50, -1 ],[ '10 rows', '25 rows', '50 rows', 'Show all' ]],
           buttons: ['copyHtml5','csvHtml5','print','pageLength'],
        });
        
        
        $("#table_nonaktif_driver").DataTable({
          "processing":true,
          "serverSide":true,
          "responsive": true,
          "order":[],
          "ajax":{
              url: "<?= base_url();?>Driver/fetch_table",
              type:"POST",
              data : {type: 'driver_nonaktif'},
          },
          "columnDefs":[{"targets":[0, 2, 9],"orderable":false,}],
           dom: 'Bfrtip',
           lengthMenu: [[ 10, 25, 50, -1 ],[ '10 rows', '25 rows', '50 rows', 'Show all' ]],
           buttons: ['copyHtml5','csvHtml5','print','pageLength'],
        });
        
        
        $("#table_suspend_driver").DataTable({
          "processing":true,
          "serverSide":true,
          "responsive": true,
          "order":[],
          "ajax":{
              url: "<?= base_url();?>Driver/fetch_table",
              type:"POST",
              data : {type: 'driver_suspend'},
          },
          "columnDefs":[{"targets":[0, 2, 9],"orderable":false,}],
           dom: 'Bfrtip',
           lengthMenu: [[ 10, 25, 50, -1 ],[ '10 rows', '25 rows', '50 rows', 'Show all' ]],
           buttons: ['copyHtml5','csvHtml5','print','pageLength'],
        });
        
        
        
    </script>
<?php } ?>


<!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>