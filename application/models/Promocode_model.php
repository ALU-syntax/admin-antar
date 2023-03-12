<?php

class promocode_model extends CI_model
{
    
    public function update_insentif_customer($id, $harga)
    {
        $this->db->where('id_fitur', $id);
        $query = $this->db->update('fitur', array('promo_customer'=> $harga));
        return $query;
    }
       
    public function fitur_insentif()
    {
        return $this->db->get('fitur')->result();
        
    }
    
    public function getPromoRegulerList($date)
    {
        $this->db->like('a.waktu', $date);
        $this->db->where('a.status', 4);
        $this->db->where('c.pakai_wallet', 0);
        $this->db->where('c.kredit_promo >', 0);
        $this->db->select('a.*, b.nama_driver, c.harga, c.waktu_order, c.kredit_promo, c.pakai_wallet');
        $this->db->from('history_transaksi a');
        $this->db->join('driver b', 'a.id_driver = b.id');
        $this->db->join('transaksi c', 'a.id_transaksi = c.id');
        
        $query = $this->db->get('');
        return $query->result();
    }
    
    
    public function getPromoJumatList($date)
    {
        $this->db->like('a.waktu', $date);
        $this->db->where('a.status', 4);
        $this->db->select('a.*, b.nama_driver, c.harga, c.waktu_order');
        $this->db->from('history_transaksi a');
        $this->db->join('driver b', 'a.id_driver = b.id');
        $this->db->join('transaksi c', 'a.id_transaksi = c.id');
        
        $query = $this->db->get('');
        return $query->result();
    }
    
    
    
    public function getReferalValue()
    {
        $query = $this->db->get('app_settings');
        return $query->result();
    }
    
    
    public function getCustomerList($sdate, $edate)
    {
        $query = $this->db->query("SELECT pelanggan.id, pelanggan.fullnama, saldo.saldo ,
(SELECT COUNT(distinct(DATE_FORMAT(a.waktu_order,'%m-%Y'))) FROM transaksi a LEFT JOIN history_transaksi b ON a.id = b.id_transaksi WHERE a.id_pelanggan = pelanggan.id AND a.jarak >=1 AND b.status = 4 AND(a.waktu_order BETWEEN '$sdate' AND '$edate')) as freq,
(SELECT SUM(a.biaya_akhir) FROM transaksi a LEFT JOIN history_transaksi b ON a.id = b.id_transaksi WHERE a.id_pelanggan = pelanggan.id AND  a.jarak >=1 AND b.status = 4 AND(a.waktu_order BETWEEN '$sdate' AND '$edate')) as amount,
(SELECT COUNT(a.id) FROM transaksi a LEFT JOIN history_transaksi b ON a.id = b.id_transaksi WHERE a.id_pelanggan = pelanggan.id AND  a.jarak >=1 AND b.status = 4 AND(a.waktu_order BETWEEN '$sdate' AND '$edate')) as order_freq
FROM pelanggan LEFT JOIN saldo ON saldo.id_user = pelanggan.id WHERE pelanggan.is_promo = 1 HAVING freq > 0");
        return $query->result();
    }
    
    
    public function update_free_saldo($data, $nilai)
    {
        foreach($data as $dt) 
        {
            $id_pelanggan = $dt->id;
            $this->db->query("UPDATE saldo SET saldo = saldo + $nilai WHERE id_user = '$id_pelanggan'");
        }
        return TRUE;
    }
    
    
    public function update_jumat_saldo($data)
    {
        foreach($data as $dt)
        {
            $data_wallet = array(
                "id_user" =>$dt->id_driver ,
                "jumlah" => $dt->harga ,
                "bank" => "Promo Jumat",
                "nama_pemilik" => $dt->nama_driver ,
                "rekening" => "admin",
                "waktu" => date("Y-m-d H:i:s"),
                "type" => "topup",
                "status" => 1
            );   
            
            $add = $this->db->insert('wallet', $data_wallet);
            $harga = $dt->harga;
            $id_user = $dt->id_driver;
            $hari_ini = date('Y-m-d H:i:s');
            if($add)
            {
                $this->db->query("UPDATE saldo SET saldo = saldo + $harga, update_at = '$hari_ini' WHERE id_user = '$id_user'");
            }
            
        }
        
        
        $tanggal_proses = date('Y-m-d H:i:s', strtotime($data[0]->waktu));
        $this->db->insert('list_promo_jumat', array("tanggal" => $tanggal_proses ));
        return TRUE;
    }
    
    
     public function update_reguler_saldo($data)
    {
        foreach($data as $dt)
        {
            $data_wallet = array(
                "id_user" =>$dt->id_driver ,
                "jumlah" => $dt->kredit_promo ,
                "bank" => "Promo Reguler",
                "nama_pemilik" => $dt->nama_driver ,
                "rekening" => "admin",
                "waktu" => date("Y-m-d H:i:s"),
                "type" => "topup",
                "status" => 1
            );   
            
            $add = $this->db->insert('wallet', $data_wallet);
            $harga = $dt->kredit_promo;
            $id_user = $dt->id_driver;
            $hari_ini = date('Y-m-d H:i:s');
            if($add)
            {
                $this->db->query("UPDATE saldo SET saldo = saldo + $harga, update_at = '$hari_ini' WHERE id_user = '$id_user'");
            }
            
        }
        
        
        $tanggal_proses = date('Y-m-d H:i:s', strtotime($data[0]->waktu));
        $this->db->insert('list_promo_reguler', array("tanggal" => $tanggal_proses ));
        return TRUE;
    }
    
    
    
    public function getAllpromocode()
    {
        $this->db->join('fitur', 'kodepromo.fitur = fitur.id_fitur', 'left');
        return  $this->db->get('kodepromo')->result_array();
    }

    public function getpromocodebyid($id)
    {
        return $this->db->get_where('kodepromo', ['id_promo' => $id])->row_array();
    }

    public function hapuspromocodebyId($id)
    {
        $this->db->where('id_promo', $id);
        $this->db->delete('kodepromo');
    }

    public function addpromocode($data)
    {
        return $this->db->insert('kodepromo', $data);
    }

    public function cekpromo($code)
    {
        $this->db->select('*');
        $this->db->from('kodepromo');
        $this->db->where('kode_promo',$code);
        return $this->db->get(); 
    }

    public function getpromobyid($id)
    {
        $this->db->select('*');
        $this->db->from('kodepromo');
        $this->db->where('id_promo',$id);
        return $this->db->get(); 
    }

    public function editpromocode($data)
    {
        $this->db->where('id_promo', $data['id_promo']);
        return $this->db->update('kodepromo', $data);
    }
    
    public function updaterefcharge($jumlah)
    {
        $this->db->where('id', 1);
        $query = $this->db->update('app_settings', array("ref_charge"=> $jumlah));
        return $query;
    }
    
    
    public function promojumat_isexist($tanggal)
    {
        $this->db->like('tanggal', $tanggal);
        $query = $this->db->get('list_promo_jumat');
        if($query->num_rows() > 0 )
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    
    
    public function promoreguler_isexist($tanggal)
    {
        $this->db->like('tanggal', $tanggal);
        $query = $this->db->get('list_promo_reguler');
        if($query->num_rows() > 0 )
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

}