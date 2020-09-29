var activeurl = window.location;
//menambah class active untuk sidebar
$('a[href="' + activeurl + '"]')
   .parents('li')
   .addClass('active');

$('#modal-absensi').on('hidden.bs.modal', function () {
   $('#form-absensi').trigger('reset');
   $('input').removeClass('is-invalid');
   $('div.spinner-border').remove();
   $('div.invalid-feedback').remove();
})

$('#btn-reset').click(function () {
   $('#bulan').val('');
   reload_table(tabel_rekap);
})

if (activeurl = base + '/absensi/harian') {
   $('#modal-absensi').modal('show');
}

var saveMethod;

$('#btn-add').click(function () {
   if ($('#tanggal').val() != '') {
      $('#modal-absensi').modal('show');
      $('#tgl-absen').val($('#tanggal').val());
      saveMethod = 'add';
   } else {
      alert('Tanggal Kosong');
   }
});

if ($('#tanggal').length > 0) {
   $('#tanggal').datepicker({
      setDate: new Date(),
      language: 'id',
      format: 'dd MM yyyy',
      todayHighlight: true,
   });
}

if ($('#bulan').length > 0) {
   $('#bulan').datepicker({
      minViewMode: 1,
      language: 'id',
      format: 'MM yyyy',
      todayHighlight: true,
   });
}

$('#tanggal, #tgl-absen').val(moment().locale('id').format('LL'));

toastr.options = {
   closeButton: false,
   debug: false,
   newestOnTop: false,
   progressBar: false,
   positionClass: 'toast-top-right',
   preventDuplicates: false,
   onclick: null,
   showDuration: 300,
   hideDuration: 500,
   timeOut: 3000,
   extendedTimeOut: 1000,
   showEasing: 'swing',
   hideEasing: 'linear',
   showMethod: 'fadeIn',
   hideMethod: 'slideUp'
}

$('#btn-toast').on('click', function() {
   toastr['error']('Data berhasil dihapus <a class="float-right text-warning" href="">Cancel</a>');
})
