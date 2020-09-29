<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Absen_model;
use App\Models\Siswa_model;
use Config\Services;


class Apis extends Controller 
{
   protected $request;
   protected $absen;
   protected $siswa;

   public function __construct(){
      $this->request = Services::request();
      // Instansiasi Model
      $this->absen = new Absen_model($this->request);
      $this->siswa = new Siswa_model($this->request);
   }

   public function dahsboard(){
      $data = [
         'siswa' => $this->siswa->countAllResults(),
         'absen' => $this->absen->countAllResults(),
      ];

      echo json_encode($data);
   }

   // Datatable Serverside tabel absen harian
   public function absen_list()
   {
         if ($this->request->getMethod(TRUE) == 'POST') 
         {
            $lists = $this->absen->get_datatables();
            $data = [];
            $no = 0;
            foreach ($lists as $list) 
            {
               $no++;
               $row = [];
               $row[] = $no;
               $row[] = $list->nama;
               $row[] = $list->kelas;
               $row[] = $list->jam_1;
               $row[] = $list->jam_2;
               $row[] = $list->jam_3;
               $row[] = $list->jam_4;
               $row[] = '<div class="text-center">
                           <button id="detail" class="btn btn-info btn-sm" onClick="detail_absensi(' . $list->id_absen . ')">
                              <i class="fa fa-info-circle"></i> Detail
                           </button>
                           <button id="hapus" class="btn btn-danger btn-sm" onClick="hapus_absensi(' . $list->id_absen . ')">
                              <i class="fa fa-trash"></i> Hapus
                           </button>
                        </div>';
               $data[] = $row;
            }
            $output = [
               "draw" => $this->request->getPost('draw'),
               "recordsTotal" => $this->absen->count_all(),
               "recordsFiltered" => $this->absen->count_filtered(),
               "data" => $data
            ];
            echo json_encode($output);
         }
   }

   // Datatable Serverside untuk tabel rekap absen bulanan
   public function rekap_absen()
   {
         if ($this->request->getMethod(TRUE) == 'POST') 
         {
            $lists = $this->siswa->get_datatables();
            $data = [];
            $no = 0;
            foreach ($lists as $list) 
            {
               $no++;
               $row = [];
               $row[] = $no;
               $row[] = $list->nama;
               $row[] = $list->kelas;
               $row[] = $this->absen->summary($list->no_induk, "S");
               $row[] = $this->absen->summary($list->no_induk, "I");
               $row[] = $this->absen->summary($list->no_induk, "A");
               $row[] = '<div class="text-center">
                           <button id="detail" class="btn btn-info btn-sm" onClick="detail_absensi(' . $list->no_induk . ')" disabled>
                              <i class="fa fa-info-circle"></i> Detail
                           </button>
                        </div>';
               $data[] = $row;
            }
            $output = [
               "draw" => $this->request->getPost('draw'),
               "recordsTotal" => $this->siswa->count_all(),
               "recordsFiltered" => $this->siswa->count_filtered(),
               "data" => $data
            ];
            echo json_encode($output);
         }
   }

   // Fungsi check data ketika Insert, dan Update data absensi Harian
   public function check_siswa()
   {
      $siswa = $this->siswa->join('kelas', 'siswa.id_kelas = kelas.id', 'inner')
                           ->where('no_induk', $this->request->getPost('noInduk'))
                           ->first();
      $check = $this->siswa->join('data_absen', 'siswa.no_induk = data_absen.id_siswa', 'inner')
                           ->where([
                              'no_induk' =>  $this->request->getPost('noInduk'),
                              'tanggal' => $this->absen->date_formated($this->request->getPost('tgl-absen'))
                              ])
                           ->first();
      if(!empty($check)) {
         $siswa += $check;
      }
      echo json_encode($siswa);
   }

   public function detail_absensi($id)
   {
      $detail = $this->absen->find($id);
      echo json_encode($detail);
   }

   public function save_absensi()
   {
      $data = [
         'id_siswa' => $this->request->getPost('noInduk'),
         'jam_1' => $this->request->getPost('1'),
         'jam_2' => $this->request->getPost('2'),
         'jam_3' => $this->request->getPost('3'),
         'jam_4' => $this->request->getPost('4'),
         'ket' => $this->request->getPost('ket'),
         'tanggal' => $this->absen->date_formated($this->request->getPost('tgl-absen')),
      ];
      $array = [
         'id_siswa' =>  $this->request->getPost('noInduk'),
         'tanggal' => $this->absen->date_formated($this->request->getPost('tgl-absen')),
      ];
      $check = $this->absen->where($array)
                           ->withDeleted()
                           ->findAll();
      if (!empty($check)) 
      {
         $checkDeleted = $this->absen->where($array)
                              ->onlyDeleted()
                              ->findAll();
         if (!empty($checkDeleted)) 
         {
            $data += ["deleted_at" => NULL];
            $this->absen->where($array)
                        ->set($data)
                        ->update();
            echo json_encode(array("status" => TRUE));
         }
         else
         {
            $this->absen->where($array)
               ->set($data)
               ->update();
            echo json_encode(array("status" => TRUE));
         }
      } 
      else
      {
         $this->absen->save($data, 'data_absen');
         echo json_encode(array("status" => TRUE));
      }
   }

   public function delete_absensi($id, $method)
   {
      if ($method > 0) {
         $this->absen->delete($id);
         $status = TRUE;
      } else {
         $this->absen->update($id, ['deleted_at' => NULL]);
         $status = FALSE;
      }
      echo json_encode(array("status" => $status));
   }

   public function get_kelas()
   {
      $db = \config\Database::connect();
      $table = $db->table('kelas')->get();
      echo json_encode($table->getResult());
   }

}
