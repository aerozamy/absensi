<?= $this->extend('layouts/main'); ?>

<?= $this->section('head'); ?>
<link href="/assets/vendor/dataTable/datatables.min.css" rel="stylesheet" media="all">
<link id="bsdp-css" href="/assets/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" media="all">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4>Absensi Harian</h4>
                </div>
                <div class="card-body">
                    <div class="row justify-content-between m-b-25">
                        <div class="col-lg-4 col-6">
                            <div class="form-group">
                                <div class="input-group input-group-sm mb-3">
                                    <input name="tanggal" id="tanggal" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <button class="btn btn-success btn-sm float-right m-r-10" id="btn-add"><i class="fa fa-plus"></i> Input Absen</button>
                            <!-- <button class="btn btn-success btn-sm float-right m-r-10" id="btn-toast"><i class="fa fa-plus"></i> Toast</button> -->
                        </div>
                    </div>
                    <table id="tabel-absensi" class="table table-bordered display nowrap table-hover" style="width:100%">
                        <thead class="bg-light text-center">
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle">No.</th>
                                <th scope="col" rowspan="2" class="align-middle">Nama</th>
                                <th scope="col" rowspan="2" class="align-middle">Kelas</th>
                                <th scope="col" colspan="4">Jam Ke-</th>
                                <th scope="col" rowspan="2" class="align-middle">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col">1</th>
                                <th scope="col">2</th>
                                <th scope="col">3</th>
                                <th scope="col">4</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT -->
<!-- MODAL ABSENSI -->
<div class="modal fade" id="modal-absensi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Absensi Harian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-absensi">
                    <input type="hidden" name="tgl-absen" id="tgl-absen">
                    <div class="form-group">
                        <label for="noInduk">Nomor Induk</label>
                        <input type="text" name="noInduk" id="noInduk" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" name="kelas" id="kelas" class="form-control" readonly>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-row">
                                <div class="col-12">
                                    <label for="">Jam Ke-</label>
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><strong>1</strong></div>
                                    </div>
                                    <select id="1 " name"1" class="custom-select">
                                        <option value=""></option>
                                        <option value="S">Sakit</option>
                                        <option value="I">Izin</option>
                                        <option value="A">Alpa</option>
                                    </select>
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><strong>2</strong></div>
                                    </div>
                                    <select id="2" name"2" class="custom-select">
                                        <option value=""></option>
                                        <option value="S">Sakit</option>
                                        <option value="I">Izin</option>
                                        <option value="A">Alpa</option>
                                    </select>
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><strong>3</strong></div>
                                    </div>
                                    <select id="3" name"3" class="custom-select">
                                        <option value=""></option>
                                        <option value="S">Sakit</option>
                                        <option value="I">Izin</option>
                                        <option value="A">Alpa</option>
                                    </select>
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><strong>4</strong></div>
                                    </div>
                                    <select id="4" name"4" class="custom-select">
                                        <option value=""></option>
                                        <option value="S">Sakit</option>
                                        <option value="I">Izin</option>
                                        <option value="A">Alpa</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="ket">Keterangan</label>
                                <textarea name="ket" class="form-control" id="ket" rows="7"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="save_absensi()">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL ABESENSI -->

<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>

<script src="/assets/vendor/dataTable/datatables.min.js"></script>
<script src="/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/assets/vendor/bootstrap-datepicker/dist/locales/bootstrap-datepicker.id.min.js"></script>
<?= $this->endSection(); ?>