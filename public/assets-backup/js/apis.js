function get_wilayah(id, ref = '', level = '') {
	if (ref != '' && level != '') {
		uri = base + 'apis/wilayah/' + ref + '/' + level
	} else if (ref != '') {
		uri = base + 'apis/wilayah/' + ref
	} else {
		uri = base + 'apis/wilayah'
	}
	$.ajax({
		url: uri,
		method: 'GET',
		dataType: 'JSON',
		success: function (data) {
			let html = '';
			for (let i in data) {
				html += '<option value="' + data[i].kode_wilayah + '">' + data[i].nama + '</option>'
			}
			$('#' + id + '').html(html);
		}
	})
};


if ($('#prov').length) {
	$(this).html(get_wilayah('prov'))
}
// Kabupaten
$('#prov').change(function () {
	$(this).html(get_wilayah('kab', $(this).val()));
});
// Kecamatan
$('#kab').change(function () {
	$(this).html(get_wilayah('kec', $(this).val()))
});
// Kelurahan
$('#kec').change(function () {
	$(this).html(get_wilayah('kel', $(this).val(), ))
});

// if ($('select[data-get]').length) {
// 	let e = $('select[data-get]');
// 	for (let i = 0; i < e.length; i++) {
// 		target = $(e[i]).attr('data-get')
// 		$.ajax({
// 			url: base + 'apis/dropdown/' + target,
// 			method: 'GET',
// 			dataType: 'JSON',
// 			success: function (data) {
// 				let html = '';
// 				for (let i in data) {
// 					html += '<option value="' + data[i].id + '">' + data[i].id + '. ' + data[i].keterangan + '</option>'
// 				}
// 				$('select[data-get=' + target + ']').html(html)
// 			}
// 		});

// 	}
// }

//Pendidikan
if ($('#pdkayah, #pdkibu').length) {
	$.ajax({
		url: base + 'apis/dropdown/pendidikan',
		method: 'GET',
		dataType: 'JSON',
		success: function (data) {
			let html = '';
			for (let i in data) {
				html += '<option value="' + data[i].id + '">' + data[i].id + '. ' + data[i].keterangan + '</option>'
			}
			$('#pdkayah , #pdkibu').html(html)
		}
	});

}

if ($('#hobi').length) {
	$.ajax({
		url: base + 'apis/dropdown/hobi',
		method: 'GET',
		dataType: 'JSON',
		success: function (data) {
			let html = '';
			for (let i in data) {
				html += '<option value="' + data[i].id + '">' + data[i].id + '. ' + data[i].keterangan + '</option>'
			}
			$('#hobi').html(html)
		}
	});

}

if ($('#cita').length) {
	$.ajax({
		url: base + 'apis/dropdown/citacita',
		method: 'GET',
		dataType: 'JSON',
		success: function (data) {
			let html = '';
			for (let i in data) {
				html += '<option value="' + data[i].id + '">' + data[i].id + '. ' + data[i].keterangan + '</option>'
			}
			$('#cita').html(html)
		}
	});

}

if ($('#pkjayah, #pkjibu').length) {
	// Pekerjaan
	$.ajax({
		url: base + 'apis/dropdown/pekerjaan',
		method: 'GET',
		dataType: 'JSON',
		success: function (data) {
			let html = '';
			for (let i in data) {
				html += '<option value="' + data[i].id + '">' + data[i].id + '. ' + data[i].keterangan + '</option>'
			}
			$('#pkjayah , #pkjibu').html(html)
		}
	});

}
if ($('#penghasilan').length) {
	// Penghasilan
	$.ajax({
		url: base + 'apis/dropdown/penghasilan',
		method: 'GET',
		dataType: 'JSON',
		success: function (data) {
			let html = '';
			for (let i in data) {
				html += '<option value="' + data[i].id + '">' + data[i].id + '. ' + data[i].keterangan + '</option>'
			}
			$('#penghasilan').html(html)
		}
	});

}

if ($('#rombel').length) {
	// Penghasilan
	$.ajax({
		url: base + 'apis/dropdown/kelas',
		method: 'GET',
		dataType: 'JSON',
		success: function (data) {
			let html = '';
			for (let i in data) {
				html += '<option value="' + data[i].id + '">' + data[i].kelas + ' ' + data[i].nama_rombel + '</option>'
			}
			$('#rombel').append(html)
		}
	});
}

function showDataSiswa(id) {
	$('#modal-siswa').modal('show');
	$('.nav-item').removeClass('active').first().addClass('active');
	$('.tab-pane').removeClass('show active').first().addClass('show active');
	$.ajax({
		url: base + 'apis/biodata_siswa/' + id,
		method: 'GET',
		dataType: 'JSON',
		success: function (data) {
			$('input[name="id"]').val(data.id);
			$('input[name="noinduk"]').val(data.no_induk);
			$('input[name="nisn"]').val(data.nisn);
			$('input[name="nama"]').val(data.nama);
			$('input[name="tmplahir"]').val(data.tempat_lahir);
			$('input[name="tgllahir"]').val(data.tanggal_lahir);
			$('select[name="jkelamin"]').val(data.jenis_kelamin);
			$('input[name="anakke"]').val(data.anak_ke);
			$('input[name="saudara"]').val(data.saudara);
			$('input[name="hobi"]').val(data.hobi);
			$('input[name="cita"]').val(data.cita);
			$('select[name="tmptinggal"]').val(data.tempat_tinggal);
			$('input[name="nik"]').val(data.nik);
			$('select[name="prov"]').val(data.prov);
			$('select[name="kab"]').val(get_wilayah('kab', data.kab, 2));
			$('select[name="kec"]').val(get_wilayah('kec', data.kec, 3));
			$('select[name="kel"]').val(get_wilayah('kel', data.kel, 4));
			$('textarea[name="alamat"]').val(data.alamat);
			$('input[name="kdpos"]').val(data.kodepos);
			$('input[name="jarak"]').val(data.jarak_sekolah);
			$('input[name="transport"]').val(data.transportasi);
			$('input[name="nokk"]').val(data.no_kk);
			$('input[name="nikayah"]').val(data.nik_ayah);
			$('input[name="ayah"]').val(data.ayah);
			$('input[name="tglayah"]').val(data.tanggal_lahir_ayah);
			$('select[name="pdkayah"]').val(data.id_pendidikan_ayah);
			$('select[name="pkjayah"]').val(data.id_pekerjaan_ayah);
			$('input[name="nikibu"]').val(data.nik_ibu);
			$('input[name="ibu"]').val(data.ibu);
			$('input[name="tglibu"]').val(data.tanggal_lahir_ibu);
			$('select[name="pdkibu"]').val(data.id_pendidikan_ibu);
			$('select[name="pkjibu"]').val(data.id_pekerjaan_ibu);
			$('select[name="penghasilan"]').val(data.id_penghasilan);
			$('input[name="noortu"]').val(data.no_telp_ortu);
			$('input[name="asalsek"]').val(data.asal_sekolah);
			$('input[name="nsmsek"]').val(data.nsm_sekolah);
			$('input[name="npsnsek"]').val(data.npsn_sekolah);
			$('input[name="statsek"]').val(data.status_sekolah);
			$('textarea[name="alamatsek"]').val(data.alamat_sekolah);
			$('input[name="noijazah"]').val(data.no_ijazah);
			$('input[name="noskhu"]').val(data.no_skhu);
			$('input[name="nopes"]').val(data.nopes);
		}
	});
}

function updateData(url) {
	toastr.options = {
		"positionClass": "toast-top-right",
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "slideDown",
		"hideMethod": "slideUp"
	}
	$.ajax({
		url: base + 'apis/update_biodata_siswa/' + url,
		type: "POST",
		data: $('form#' + url).serialize(),
		dataType: "JSON",
		success: function (data) {

			if (data.status) //if success close modal and reload ajax table
			{
				if (location.href == base + 'sim/siswa_aktif') {
					reload_table(tabel_siswa)
				}
				toastr.success('Data Berhasil diupdate');
			}


		},
		error: function (jqXHR, textStatus, errorThrown) {
			toastr.danger('Data Gagal diupdate');
		}
	});
}

if ($('#tabel-siswa').length) {
	//datatables siswa
	tabel_siswa = $('#tabel-siswa').DataTable({

		"scrollX": true,
		"processing": true, //Feature control the processing indicator.
		"serverSide": true, //Feature control DataTables' server-side processing mode.
		"order": [], //Initial no order.

		// Load data for the table's content from an Ajax source
		"ajax": {
			"url": base + "apis/siswa_list",
			"type": "POST",
			"data": function (data) {
				data.rombel = $('select#rombel').val();
			},
			"cache": false
		},

		//Set column definition initialisation properties.
		"columnDefs": [{
			"targets": [0], //first column / numbering column
			"orderable": false, //set not orderable
		},],

	});
}

if ($('#tabel-ptk').length) {
	//datatables siswa
	table_ptk = $('#tabel-ptk').DataTable({

		"scrollX": true,
		"processing": true, //Feature control the processing indicator.
		"serverSide": true, //Feature control DataTables' server-side processing mode.
		"order": [], //Initial no order.

		// Load data for the table's content from an Ajax source
		"ajax": {
			"url": base + "apis/ptk_list",
			"type": "POST"
		},

		//Set column definition initialisation properties.
		"columnDefs": [{
			"targets": [0], //first column / numbering column
			"orderable": false, //set not orderable
		}, ],

	});
}

if ($('#tabel-menu').length) {
	//datatables siswa
	table_ptk = $('#tabel-menu').DataTable({

		"scrollX": true,
		"processing": true, //Feature control the processing indicator.
		"serverSide": true, //Feature control DataTables' server-side processing mode.
		"order": [], //Initial no order.

		// Load data for the table's content from an Ajax source
		"ajax": {
			"url": base + "apis/menu_list",
			"type": "POST"
		},

		//Set column definition initialisation properties.
		"columnDefs": [{
			"targets": [0], //first column / numbering column
			"orderable": false, //set not orderable
		}, ],

	});
}

function reload_table(table) {
	table.ajax.reload(null, false).draw; //reload tableUser ajax
}

$('select#rombel').change(function () {
	reload_table(tabel_siswa)
	// tabel_siswa.ajax.reload(null, false).draw; //reload tableUser ajax
})





