<?= $this->extend('layouts/main'); ?>

<?= $this->section('css'); ?>
<link href="/assets/vendor/dataTable/datatables.min.css" rel="stylesheet" media="all">
<link href="/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" media="all">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="statistic mt-5">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="statistic__item">
                        <h2 class="number" id="stat-siswa">0</h2>
                        <span class="desc">Siswa</span>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="statistic__item">
                        <h2 class="number" id="stat-absen">0</h2>
                        <span class="desc">Data Absensi</span>
                        <div class="icon">
                            <i class="zmdi zmdi-calendar-note"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END STATISTIC-->

<section>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8">
                    <!-- RECENT REPORT 2-->
                    <div class="recent-report2">
                        <h3 class="title-3">recent reports</h3>
                        <div class="chart-info">
                            <div class="chart-info__left">
                                <div class="chart-note">
                                    <span class="dot dot--blue"></span>
                                    <span>products</span>
                                </div>
                                <div class="chart-note">
                                    <span class="dot dot--green"></span>
                                    <span>Services</span>
                                </div>
                            </div>
                            <div class="chart-info-right">
                                <div class="rs-select2--dark rs-select2--md m-r-10">
                                    <select class="js-select2" name="property">
                                        <option selected="selected">All Properties</option>
                                        <option value="">Products</option>
                                        <option value="">Services</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs-select2--dark rs-select2--sm">
                                    <select class="js-select2 au-select-dark" name="time">
                                        <option selected="selected">All Time</option>
                                        <option value="">By Month</option>
                                        <option value="">By Day</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="recent-report__chart">
                            <canvas id="recent-rep2-chart"></canvas>
                        </div>
                    </div>
                    <!-- END RECENT REPORT 2             -->
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="/assets/vendor/dataTable/datatables.min.js"></script>
<script src="/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="/assets/vendor/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"></script>
<?= $this->endSection(); ?>