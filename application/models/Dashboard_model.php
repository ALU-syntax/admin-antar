<?php


class Dashboard_model extends CI_model
{
  public function getAlltransaksi()
  {
    $role = $this->session->userdata('role');
    $wils = $this->session->userdata('region');
    if($role != 1)
    {
        $this->db->where('wilayah_driver', $wils);
        $this->db->or_where('wilayah_pelanggan', $wils);
    }
    
    $this->db->select('transaksi.*,'. 'list_cabang.nama_cabang,' . 'driver.nama_driver,' . 'pelanggan.fullnama,' . 'history_transaksi.*,' . 'status_transaksi.*,' . 'fitur.fitur');
    $this->db->from('transaksi');
    $this->db->join('history_transaksi', 'transaksi.id = history_transaksi.id_transaksi', 'left');
    $this->db->join('list_cabang', 'list_cabang.id = transaksi.wilayah_pelanggan', 'left');
    $this->db->join('status_transaksi', 'history_transaksi.status = status_transaksi.id', 'left');
    $this->db->join('driver', 'transaksi.id_driver = driver.id', 'left');
    $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id', 'left');
    $this->db->join('fitur', 'transaksi.order_fitur = fitur.id_fitur', 'left');
    $this->db->where('history_transaksi.status != 1');
    // $this->db->where('history_transaksi.status != 0');
    $this->db->order_by('transaksi.id', 'DESC');
    return $this->db->get()->result_array();
  }


var $table ="transaksi tr";
    var $join_history = "history_transaksi ht";
    var $join_status = "status_transaksi st";
    var $join_driver = "driver d";
    var $join_pelanggan = "pelanggan p";
    var $join_fitur = "fitur f";
    var $join_cabang = "list_cabang g";
    var $join_cabangdriver = "list_cabang h";
    var $select_column = array(
        "tr.*",
        "d.nama_driver",
        "p.fullnama",
        "ht.*",
        "st.*",
        "f.fitur",
        "g.nama_cabang",
        "h.nama_cabang as cabangdriver"
    );
    var $order_column = array(
         null,
        "waktu_order",
        "nama_cabang",
        "fullnama",
        "nama_driver",
        "fitur",
        "alamat_asal",
        "alamat_tujuan",
        "biaya_akhir",
        "pakai_wallet",
        "status",
        null
    );


    function make_query($dari, $sampai)
    {
        $role = $this->session->userdata('role');
        $wils = $this->session->userdata('region');
        if($role != 1)
        {
            $this->db->where('tr.wilayah_driver', $wils);
            $this->db->or_where('tr.wilayah_pelanggan', $wils);
        }
        
        
        $this->db->select($this->select_column);
        $this->db->from($this->table);
        $this->db->join($this->join_history, "tr.id = ht.id_transaksi", "left");
        $this->db->join($this->join_status, "ht.status = st.id", "left");
        $this->db->join($this->join_driver, "tr.id_driver = d.id", "left");
        $this->db->join($this->join_pelanggan, "tr.id_pelanggan = p.id", "left");
        $this->db->join($this->join_fitur, "tr.order_fitur = f.id_fitur", "left");
        $this->db->join($this->join_cabang, "tr.wilayah_pelanggan = g.id", "left");
        $this->db->join($this->join_cabangdriver, "tr.wilayah_driver = h.id", "left");
        $this->db->where('ht.status !=', 1);
        
        
        if(!empty($dari) && !empty($sampai))
        {
            $this->db->where('tr.waktu_order BETWEEN "'. date('Y-m-d', strtotime($dari)). '" and "'. date('Y-m-d', strtotime($sampai)).'"');    
        }
        
    
        if(isset($_POST["search"]["value"]))
        {
            $this->db->group_start();
            $this->db->like("fullnama", $_POST["search"]["value"]);
            $this->db->or_like("nama_driver", $_POST["search"]["value"]);
            $this->db->or_like("fitur", $_POST["search"]["value"]);
            $this->db->or_like("alamat_asal", $_POST["search"]["value"]);
            $this->db->or_like("alamat_tujuan", $_POST["search"]["value"]);
            $this->db->or_like("biaya_akhir", $_POST["search"]["value"]);
            $this->db->or_like("g.nama_cabang", $_POST["search"]["value"]);
            $this->db->or_like("h.nama_cabang", $_POST["search"]["value"]);
            $this->db->group_end();
        }
    
        if(isset($_POST["order"]))
        {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by("tr.id","DESC");
        }
    
    }
    
    
    function make_datatables($dari, $sampai)
    {
        $this->make_query($dari, $sampai);
        if($_POST["length"] != -1)
        {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        $query = $this->db->get();
        return $query->result();
    }
    
    
    function get_filtered_data($dari, $sampai)
    {
        $this->make_query($dari, $sampai);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    
    function get_all_data()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
  
  function getTotalTransaksiBulanan($bulan, $tahun, $typefitur)
  {
    //        lihat tranasksi tanpa limit 15
    $role = $this->session->userdata('role');
    $wils = $this->session->userdata('region');
    
    if($role != 1) 
    {
        $query = $this->db->query("
                SELECT COUNT(transaksi.id) as jumlah
                FROM transaksi
                left join fitur on transaksi.order_fitur = fitur.id_fitur
                left join history_transaksi on transaksi.id = history_transaksi.id_transaksi
                
                WHERE MONTH(waktu_selesai) = $bulan
                AND YEAR(waktu_selesai) = $tahun
                AND fitur.home = $typefitur
                AND history_transaksi.status = 4
                AND transaksi.wilayah_driver = '$wils'
            ");
            return $query->result_array();
        }
    else 
    {
        $query = $this->db->query("
                SELECT COUNT(transaksi.id) as jumlah
                FROM transaksi
                left join fitur on transaksi.order_fitur = fitur.id_fitur
                left join history_transaksi on transaksi.id = history_transaksi.id_transaksi
                
                WHERE MONTH(waktu_selesai) = $bulan
                AND YEAR(waktu_selesai) = $tahun
                AND fitur.home = $typefitur
                AND history_transaksi.status = 4
            ");
            return $query->result_array();
    }
  }
  
  
  

  public function getbydate()
  {
    $day = date('d');
    $month = date('m');
    $year = date('Y');
    $this->db->select('fitur.fitur');
    $this->db->select("
                (SELECT COUNT(tr.id)
                FROM transaksi tr
                left join history_transaksi on tr.id = history_transaksi.id_transaksi
                WHERE DAY(tr.waktu_selesai) = $day
                AND tr.order_fitur = fitur.id_fitur
                AND history_transaksi.status = 4) as hari
                ");
                $this->db->select("
                (SELECT COUNT(tr.id)
                FROM transaksi tr
                left join history_transaksi on tr.id = history_transaksi.id_transaksi
                WHERE MONTH(tr.waktu_selesai) = $month
                AND tr.order_fitur = fitur.id_fitur
                AND history_transaksi.status = 4) as bulan
                ");
                $this->db->select("
                (SELECT COUNT(tr.id)
                FROM transaksi tr
                left join history_transaksi on tr.id = history_transaksi.id_transaksi
                WHERE YEAR(tr.waktu_selesai) = $year
                AND tr.order_fitur = fitur.id_fitur
                AND history_transaksi.status = 4) as tahun
                ");
    $this->db->from('fitur');
    return $this->db->get()->result_array();

  }
  

  function getTotalTransaksiharian($hari, $fitur)
  {
    //        lihat tranasksi tanpa limit 15
    
    
    
    $query = $this->db->query("
                SELECT COUNT(transaksi.id) as jumlah
                FROM transaksi
                left join history_transaksi on transaksi.id = history_transaksi.id_transaksi
                
                WHERE DAY(waktu_selesai) = $hari
                AND history_transaksi.status = 4
            ");
    return $query->result_array();
  }

  public function getallsaldo()
  {
    $this->db->select('SUM(biaya_akhir)as total');
    $this->db->join('history_transaksi', 'transaksi.id = history_transaksi.id_transaksi', 'left');
    $this->db->where('history_transaksi.status != 1');
    return $this->db->get('transaksi')->row_array();
  }

  public function getAllfitur()
  {
    return $this->db->get('fitur')->result_array();
  }

  public function gettransaksibyid($id)
  {
    $this->db->select('merchant.*');
    $this->db->select('transaksi_detail_merchant.total_biaya as total_belanja');
    $this->db->select('transaksi_detail_send.*');
    $this->db->select('history_transaksi.*');
    $this->db->select('status_transaksi.*');
    $this->db->select('voucher.*');
    $this->db->select('fitur.*');
    $this->db->select('rating_driver.*');
    $this->db->select('pelanggan.fullnama,pelanggan.email as email_pelanggan,pelanggan.no_telepon as telepon_pelanggan,pelanggan.fotopelanggan,pelanggan.token');
    $this->db->select('driver.nama_driver,driver.foto,driver.email,driver.no_telepon,driver.reg_id');
    $this->db->select('transaksi.*');

    $this->db->join('transaksi_detail_merchant', 'transaksi.id = transaksi_detail_merchant.id_transaksi', 'left');
    $this->db->join('merchant', 'transaksi_detail_merchant.id_merchant = merchant.id_merchant', 'left');
    $this->db->join('transaksi_detail_send', 'transaksi.id = transaksi_detail_send.id_transaksi', 'left');
    $this->db->join('history_transaksi', 'transaksi.id = history_transaksi.id_transaksi', 'left');
    $this->db->join('status_transaksi', 'history_transaksi.status = status_transaksi.id', 'left');
    $this->db->join('voucher', 'transaksi.order_fitur = voucher.untuk_fitur', 'left');
    $this->db->join('fitur', 'transaksi.order_fitur = fitur.id_fitur', 'left');
    $this->db->join('rating_driver', 'transaksi.id = rating_driver.id_transaksi', 'left');
    $this->db->join('driver', 'transaksi.id_driver = driver.id', 'left');
    $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id', 'left');
    $this->db->where('history_transaksi.status != 1');
    $this->db->order_by('transaksi.id', 'DESC');
    return $this->db->get_where('transaksi', ['transaksi.id' => $id])->row_array();
  }

  public function getitem($id)
  {
    $this->db->where("transaksi_item.id_transaksi = $id");
    $this->db->join('item', 'transaksi_item.id_item = item.id_item', 'left');
    return $this->db->get('transaksi_item')->result_array();
  }

  public function ubahstatustransaksibyid($id)
  {
    $this->db->set('status', 5);
    $this->db->where('id_transaksi', $id);
    $this->db->update('history_transaksi');
  }

  public function ubahstatusdriverbyid($id_driver)
  {
    $this->db->set('status', 4);
    $this->db->where('id_driver', $id_driver);
    $this->db->update('config_driver');
  }

  public function deletetransaksi($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('transaksi');

    $this->db->where('id_transaksi', $id);
    $this->db->delete('history_transaksi');

    $this->db->where('id_transaksi', $id);
    $this->db->delete('rating_driver');

    $this->db->where('id_transaksi', $id);
    $this->db->delete('transaksi_detail_send');
  }

  public function countdriver()
  {
    $role = $this->session->userdata('role');
    $wils = $this->session->userdata('region');
    if($role != 1)
    {
        $this->db->where('wilayah', $wils);
    }
    
    $this->db->where('status != 0');
    return $this->db->get('driver')->result_array();
  }

  public function countmitra()
  {
    $role = $this->session->userdata('role');
    $wils = $this->session->userdata('region');
    if($role != 1)
    {
        $this->db->where('wilayah', $wils);
    }
    
    $this->db->where('status_mitra != 0');
    return $this->db->get('mitra')->result_array();
  }
}
