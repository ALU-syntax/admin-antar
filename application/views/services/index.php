<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- withdraw data start -->
            <section id="data-thumb-view" class="data-thumb-view-header">
                <div class="card-header">
                    <h4>Tipe Kendaraan <span><a class="btn btn-success float-right mb-1 text-white" href="<?= base_url(); ?>services/addservice">
                                <i class="feather icon-plus mr-1"></i>Tambah Layanan</a></span></h4>
                </div>
                <div class="table-responsive">
                    <table style="font-size:10px;" class="table data-thumb-view">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Layanan</th>
                                <th>Icon</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Unit</th>
                                <th>Komisi</th>
                                <th>Harga Minimum</th>
                                <th>Radius Driver</th>
                                <th>Jarak Maximal</th>
                                <th>Minimum Saldo</th>
                                <th>Pekerjaan</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($service as $srvc) { 
                                
                                $wil = $srvc['wilayah'];
                                $arr = explode(',', $wil);
                                
                                $this->db->where_in('id', $arr);
                                $qw = $this->db->get('list_cabang')->result();
                                
                                $html = '';
                                $html .= '<ul>';
                                foreach($qw as $q)
                                {
                                    $html .= '<li>'.$q->nama_cabang.'</li>';
                                }
                                $html .= '</ul>';
                                
                            
                                ?>
                                <tr>
                                    <td class="product-name"><?= $i ?></td>
                                    <td class="product-name"><?= $srvc['fitur']; ?><br> <?= $html ;?></td>
                                    <td class="product-img">
                                        <div class="badge badge-primary">
                                            <img style="height:20px;width:20px;" src="<?= base_url('images/fitur/') . $srvc['icon']; ?>">
                                        </div>
                                    </td>
                                    <td class="product-name">
                                        <?= $duit ?>
                                        <?= number_format($srvc['biaya'] , 0, ".", ".") ?>
                                    </td>
                                    <td class="product-name"><?= $srvc['nilai']; ?>%</td>
                                    <td class="product-name">/<?= $srvc['keterangan_biaya']; ?></td>
                                    <td class="product-name"><?= $srvc['komisi']; ?>
                                        %</td>
                                    <td class="product-name"><?= $duit ?>
                                        <?= number_format($srvc['biaya_minimum'] , 0, ".", ".") ?></td>
                                    <td class="product-name"><?= $srvc['jarak_minimum']; ?>km</td>
                                    <td class="product-name"><?= $srvc['maks_distance']; ?>km</td>
                                    <td class="product-name"><?= $duit ?>
                                        <?= number_format($srvc['wallet_minimum'] , 0, ".", ".") ?></td>
                                    <?php foreach ($driverjob as $dj) {
                                        if ($srvc['driver_job'] == $dj['id']) { ?>
                                            <td class="product-name"><?= $dj['driver_job']; ?></td>
                                    <?php }
                                    } ?>

                                    <td>
                                        <?php if ($srvc['active'] == 1) { ?>
                                            <label class="badge badge-success">Aktif</label>
                                        <?php } else { ?>
                                            <label class="badge badge-danger">Non Aktif</label>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <span class="action-edit mr-1">
                                            <a href="<?= base_url(); ?>services/ubah/<?= $srvc['id_fitur']; ?>">
                                                <i class="feather icon-edit text-info"></i>
                                            </a>
                                        </span>
                                        <span class="action-delete mr-1">
                                            <span class="action-delete mr-1">
                                                <a onclick="return confirm ('Are You Sure?')" href="<?= base_url(); ?>services/hapusservice/<?= $srvc['id_fitur']; ?>">
                                                    <i class="feather icon-trash text-danger"></i></a>
                                            </span>
                                    </td>
                                <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>

            </section>
            <!-- end of withdraw data -->
        </div>
    </div>
</div>
<!-- END: Content-->