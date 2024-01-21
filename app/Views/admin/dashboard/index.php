<?= $this->extend('_layout/template') ?>
<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jumlah Pendapatan</h4>
                        </div>
                        <div class="card-body">
                            <?= format_rupiah($countPendapatan['total_transaksi']) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Transaksi Selesai</h4>
                        </div>
                        <div class="card-body">
                            <?= $countTransaksi ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-car"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jumlah Mobil</h4>
                        </div>
                        <div class="card-body">
                            <?= $countMobil ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pesanan Aktif</h4>
                        </div>
                        <div class="card-body">
                            <?= $countPesanan ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Transaksi Selesai</h4>
                        <div class="card-header-action">
                            <div class="btn-group">
                                <button class="btn btn-primary">Month</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="transaksiSelesai"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Jumlah Pendapatan</h4>
                        <div class="card-header-action">
                            <div class="btn-group">
                                <button class="btn btn-primary">Month</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="jumlahPendapatan"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php
if (isset($grafikTransaksiSelesai)) {
    if (count($grafikTransaksiSelesai) > 0) {
        foreach ($grafikTransaksiSelesai as $data) {
            $transaksiSelesai[] = $data['jumlah'];
            $bulanTransaksi[] = [$data['bulan']];
        }
    }
}
?>

<?php
if (isset($grafikJumlahPendapatan)) {
    if (count($grafikJumlahPendapatan) > 0) {
        foreach ($grafikJumlahPendapatan as $data) {
            $jumlahPendapatan[] = $data['jumlah'];
            $bulanPendapatan[] = [$data['bulan']];
        }
    }
}
?>

<?= $this->section('javascript') ?>
<script>
var transaksiSelesai = document.getElementById("transaksiSelesai").getContext("2d");
var jumlahPendapatan = document.getElementById("jumlahPendapatan").getContext("2d");

function formatRupiah(value) {
    var formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 2,
    });
    return formatter.format(value);
}

var myChart = new Chart(transaksiSelesai, {
    type: 'bar',
    data: {
        labels: <?= json_encode($bulanTransaksi) ?>,
        datasets: [{
            label: 'Transaksi',
            data: <?= json_encode($transaksiSelesai) ?>,
            borderWidth: 2,
            backgroundColor: '#6777ef',
            borderColor: '#6777ef',
            borderWidth: 2.5,
            pointBackgroundColor: '#ffffff',
            pointRadius: 4
        }]
    },
    options: {
        legend: {
            display: false
        },
        scales: {
            y: {
                ticks: {
                    precision: 0,
                },
                grid: {
                    display: false,
                },
            },
            x: {
                grid: {
                    display: false,
                },
            },
        },
    }
});
var myChart = new Chart(jumlahPendapatan, {
    type: 'bar',
    data: {
        labels: <?= json_encode($bulanPendapatan) ?>,
        datasets: [{
            label: 'Jumlah Pendapatan',
            data: <?= json_encode($jumlahPendapatan) ?>,
            borderWidth: 2,
            backgroundColor: '#6777ef',
            borderColor: '#6777ef',
            borderWidth: 2.5,
            pointBackgroundColor: '#ffffff',
            pointRadius: 4
        }]
    },
    options: {
        legend: {
            display: false
        },
        scales: {
            y: {
                precision: 0,
                grid: {
                    display: false,
                },
                ticks: {
                    callback: function(value, index, values) {
                        return formatRupiah(value);
                    },
                },
            },
            x: {
                grid: {
                    display: false,
                },
            },
        },
    }
});
</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>