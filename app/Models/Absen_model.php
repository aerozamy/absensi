<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class Absen_model extends Model
{
   protected $table = 'data_absen';
   protected $primaryKey = 'id_absen';
   protected $allowedFields = ['id_absen', 'id_siswa', 'jam_1', 'jam_2', 'jam_3', 'jam_4', 'ket', 'tanggal', 'created_at', 'updated_at', 'deleted_at'];

   protected $useTimestamps = true;
   protected $useSoftDeletes = true;

   protected $column_order = array('data_absen.id_absen', 'siswa.nama', 'kelas.kelas');
   protected $column_search = array('data_absen.id_absen', 'siswa.nama', 'kelas.kelas', 'tanggal');
   protected $order = array('data_absen.id_absen' => 'desc');
   protected $request;
   protected $db;
   protected $dt;

   function __construct(RequestInterface $request)
   {
      parent::__construct();
      date_default_timezone_set('Asia/Bangkok');
      $this->db = db_connect();
      $this->request = $request;
      $this->dt = $this->db->table($this->table);
   }

   function date_formated($date, $format = true) {

      $ex = explode(' ', strval($date));
      $year = '0000';
      $month = '00';
      $date = '00';
      

      if (count($ex) == 2) {
         $month = $ex[0];
         $year = $ex[1];
      } else if(count($ex) == 3) {
         $year = $ex[2];
         $month = $ex[1];
         $date = $ex[0];
      }


      switch ($month) {
         case "Januari":
            $month = "01";
            break;
         case "Februari":
            $month = "02";
            break;
         case "Maret":
            $month = "03";
            break;
         case "April":
            $month = "04";
            break;
         case "Mei":
            $month = "05";
            break;
         case "Juni":
            $month = "06";
            break;
         case "Juli":
            $month = "07";
            break;
         case "Agustus":
            $month = "08";
            break;
         case "September":
            $month = "09";
            break;
         case "Oktober":
            $month = "10";
            break;
         case "November":
            $month = "11";
            break;
         case "Desember":
            $month = "12";
            break;
         default;
            $month = "00";
         break;
      }

      $result = '';

      if ($format) {
         $result = $year . "-" . $month . "-" . $date;
      } else {
         $result = $year . "-" . $month;
      }
      
      return $result;
   }

   private function _get_datatables_query()
   {
      $this->dt = $this->dt->join('siswa', 'siswa.no_induk = ' . $this->table . '.id_siswa')
                           ->join('kelas', 'kelas.id = siswa.id_kelas')
                           ->where('deleted_at', null);

      if ($this->request->getPost('tanggal')) {
         $this->dt->where('tanggal', date('Y-m-d', strtotime($this->date_formated($this->request->getPost('tanggal')))));
      }

      $i = 0;
      foreach ($this->column_search as $item) {
         if ($this->request->getPost('search')['value']) {
            if ($i === 0) {
               $this->dt->groupStart();
               $this->dt->like($item, $this->request->getPost('search')['value']);
            } else {
               $this->dt->orLike($item, $this->request->getPost('search')['value']);
            }
            if (count($this->column_search) - 1 == $i)
               $this->dt->groupEnd();
         }
         $i++;
      }

      if ($this->request->getPost('order')) {
         $this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
      } else if (isset($this->order)) {
         $order = $this->order;
         $this->dt->orderBy(key($order), $order[key($order)]);
      }
   }

   function get_datatables()
   {
      $this->_get_datatables_query();
      if ($this->request->getPost('length') != -1)
         $this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));
      $query = $this->dt->get();
      return $query->getResult();
   }

   function rekap()
   {
      $this->_get_datatables_query();
      $this->dt->groupBy('nama');
      if ($this->request->getPost('length') != -1)
         $this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));
      $query = $this->dt->get();
      return $query->getResult();
   }
   
   function count_filtered()
   {
      $this->_get_datatables_query();
      return $this->dt->countAllResults();
   }

   function count_all()
   {
      $tbl_storage = $this->db->table($this->table);
      return $tbl_storage->countAllResults();
   }

   // Hitung data absensi
   public function summary($id, $ket)
   {
      $bulan = $this->request->getPost('bulan');
      $result = 0;
      $array = [
         'deleted_at' => null,
         'id_siswa' => $id
      ];

      for ($i=1; $i < 5; $i++) { 
         if ($bulan != "") {
            $this->dt->like('tanggal', $this->date_formated($bulan, false));
         } 
         $sum = $this->dt->where($array)
                           ->where('jam_' . $i, $ket)
                           ->countAllResults();
         $result = $result + $sum;
      }
      return $result;
   }


}
