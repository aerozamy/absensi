function reload_table(table) {
   table.ajax.reload(null, false).draw; //reload tableUser ajax
}

$('#tanggal').change(function() {
   reload_table(tabel_absensi);
})

$('#bulan, #kelas').change(function() {
   reload_table(tabel_rekap);
})

try {
   if($('.statistic')) {
      $.ajax({
         url: base + '/apis/dahsboard',
         type: 'GET',
         dataType: 'JSON',
         success: function(data) {
            $('#stat-siswa').text(data.siswa);
            $('#stat-absen').text(data.absen);
         }
      })
   }
} catch (error) {
   // console.log(error);
}

try {
   // Properties for all dataTables
   $.extend(true, $.fn.dataTable.defaults, {
      language: {
         emptyTable: 'Tidak ada data di dalam tabel',
         // info: 'menampilkan _START_ sampai _END_ dari _TOTAL_ data',
         // infoEmpty: 'menampilkan 0 sampai 0 dari 0 data',
         infoFiltered: '',
         lengthMenu: '_MENU_ data',
         loadingRecords: 'Memuat data',
         processing: 'Data sedang diproses',
         search: 'Cari: ',
         zeroRecords: 'Tidak ditemukan data yang cocok',
         paginate: {
            first: '<<',
            last: '>>',
            next: '>',
            previous: '<'
         }
      }
   });

   if ($('#tabel-absensi').length) {
      tabel_absensi = $('#tabel-absensi').DataTable({
         scrollX: true,
         Processing: true,
         serverSide: true,
         order: [],
         ajax: {
            url: base + '/apis/absen_list',
            type: 'POST',
            data: function (data) {
               data.tanggal = $('#tanggal').val();
            },
            cache: false
         },
         columnDefs: [{
            targets: [3, 4, 5, 6, 7],
            orderable: false
         }]
      });
   };

   if ($('#tabel-rekap').length) {
      tabel_rekap = $('#tabel-rekap').DataTable({
         scrollX: true,
         Processing: true,
         serverSide: true,
         order: [],
         ajax: {
            url: base + '/apis/rekap_absen',
            type: 'POST',
            data: function (data) {
               data.bulan = $('#bulan').val(),
                  data.kelas = $('#kelas').val()
            },
            cache: false
         },
         columnDefs: [{
            targets: [3, 4, 5, 6],
            orderable: false
         }]
      });
   };

} catch (error) {
   // console.log(error);
}


try {
   if ($('#kelas')) {
      $.ajax({
         url: base + '/apis/get_kelas',
         type: 'GET',
         dataType: 'JSON',
         success: function(data) {
            for (let i = 0; i < data.length; i++) {
               $('select#kelas').append('<option value="' + data[i].id + '">' + data[i].kelas + '</opstion>');
            }
         }
      })
   }
} catch (error) {
   // console.log(error)
}

var timer = null;

$('#noInduk').keyup(function () {
   clearTimeout(timer);
   $('#noInduk').removeClass('is-invalid')
   $('div.spinner-border').remove();
   $('div.invalid-feedback').remove();
   $('label[for="noInduk"]').after('<div class="spinner-border spinner-border-sm float-right" role="status"></div>');
   timer = setTimeout(ajax_siswa, 500, $(this).val());
   if ($(this).val() == "") {
      clearTimeout(timer);
      $('div.spinner-border').remove();
      $('.form-group>input').val('');
   }
})

function ajax_siswa(id) {
   $('#tgl-absen').val($('#tanggal').val());

   var noInduk = id;
   var tanggal = $('input[name="tgl-absen"]').val();
   var dataCheck = 'noInduk=' + noInduk +
      '&tgl-absen=' + tanggal;

   $.ajax({
      url: base + '/apis/check_siswa',
      type: 'POST',
      data: dataCheck,
      dataType: 'JSON',
      success: function (data) {
         if (data) {
            $('div.spinner-border').remove();
            if (data != null) {
               $('input#nama').val(data.nama);
               $('input#kelas').val(data.kelas);
               if (data.deleted_at == null) {
                  $('select#1').val(data.jam_1);
                  $('select#2').val(data.jam_2);
                  $('select#3').val(data.jam_3);
                  $('select#4').val(data.jam_4);
                  $('textarea[name="ket"').val(data.ket);
                  saveMethod = 'update';
               }
            } else {
               $('#form-absensi').trigger('reset');
            }
            
            if (data.jam_1 && data.jam2 && data.jam3 && data.jam4) {
               saveMethod = 'update';
            }
         } else {
            $('input#nama').val('');
            $('input#kelas').val('');
            $('select#1').val('');
            $('select#2').val('');
            $('select#3').val('');
            $('select#4').val('');
            $('textarea[name="ket"]').val('');
            $('div.spinner-border').remove();
            $('input#noInduk').addClass('is-invalid').after('<div class="invalid-feedback">Nomor induk tidak ditemukan!!!</div>');
         }
      }
   })
}

function save_absensi() {
   var noInduk = $('input[name="noInduk"]').val();
   var jam1 = $('select#1 :selected').val();
   var jam2 = $('select#2 :selected').val();
   var jam3 = $('select#3 :selected').val();
   var jam4 = $('select#4 :selected').val();
   var tanggal = $('input[name="tgl-absen"]').val();
   var ket = $('textarea[name="ket"]').val();
   var dataForm = 'noInduk=' + noInduk + 
               '&1=' + jam1 +
               '&2=' + jam2 +
               '&3=' + jam3 +
               '&4=' + jam4 +
               '&tgl-absen=' + tanggal +
               '&ket=' + ket;
   $.ajax({
      url: base + '/apis/save_absensi',
      type: 'POST',
      data: dataForm,
      dataType: 'JSON',
      success: function(data) {
         if (data.status) {
            $('#modal-absensi').modal('hide');
            reload_table(tabel_absensi);
            $('#form-absensi').trigger('reset');

            if (saveMethod == 'add') {
               toastr.success('Data berhsail ditambahkan');
            } else {
               toastr.success('Data berhasil diupdate');
            }
         }else {
            $('input#noInduk').addClass('is-invalid').after('<div class="invalid-feedback">' + data.msg + '</div>');
            console.log(data.status);
         }
      }
   })
}

function detail_absensi(id) {
   $.ajax({
      url: base + '/apis/detail_absensi/' + id,
      type: 'GET',
      dataType: 'JSON',
      success: function(data) {
         if (data) {
            $('#modal-absensi').modal('show');
            $('input[name="noInduk"').val(data.id_siswa);
            ajax_siswa(data.id_siswa);
            $('select#1').val(data.jam_1);
            $('select#2').val(data.jam_2);
            $('select#3').val(data.jam_3);
            $('select#4').val(data.jam_4);
            $('textarea[name="ket"').val(data.ket);
         saveMethod = 'update';
         }
      }
   });
}

// Fungsi Hapus dan Cancel
function hapus_absensi(params, method = 1) {
   $.ajax({
      url: base + '/apis/delete_absensi/' + params + '/' + method,
      type: 'POST',
      dataType: 'JSON',
      success: function (data) {
         if (data.status) {
            reload_table(tabel_absensi);
            toastr['error']('Data berhasil dihapus <a class="float-right text-warning" onClick="hapus_absensi(' + params + ',0)">Cancel</a>');
         } else {
            reload_table(tabel_absensi);
            toastr['info']('Data berhasil dipulihkan');
         }
      }
   })
}

