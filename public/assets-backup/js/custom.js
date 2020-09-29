var activeurl = window.location;
//menambah class active untuk sidebar
$('a[href="' + activeurl + '"]').parents('li').addClass('active');

//ganti nama header pada form
$('a.nav-link').click(function() {
	$('#text-header-form').html(this.html);
})

$('#btn-logout').on('click', function () {
	window.location.href = base + 'auth/logout'
})

//Setting untuk biodata
$('#tgllahir, #tglayah, #tglibu').datepicker({
	format: "yyyy-mm-dd",
	language: "id",
	autoclose: true
});


// datatable
// absensi siswa
$('#table-abs').DataTable({
	scrollX: true
});

// absensi siswa page guru
$('#table-abs-guru').DataTable({
	scrollX: true
});

// set date
var date = new Date();
var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

// datepicker absensi
// siswa
$('#date-abs').datepicker({
	format: "MM yyyy",
	minViewMode: 1,
	maxViewMode: 2,
	language: "id",
	autoclose: true,
	todayHighlight: true
});
$('#date-abs').val(moment().locale('id').format('MMMM YYYY')).datepicker('update');

//guru
$('#date-abs-guru').datepicker({
	format: "dd MM yyyy",
	language: "id",
	autoclose: true,
	todayHighlight: true
});
$('#date-abs-guru').val(moment().locale('id').format('LL')).datepicker('update');

// button trigger
$('#btn-add').click(function() {
	$('#modal-siswa').modal('show');
})
