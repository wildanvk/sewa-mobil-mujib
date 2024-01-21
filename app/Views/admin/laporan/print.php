<!DOCTYPE html>
<html>

<head>
    <title>Laporan Transaksi</title>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .header {
        text-align: center;
        margin-bottom: 10px;
        border-bottom: 2px solid #000;
    }

    .date-range {
        text-align: center;
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        text-align: center;
        border: 1px solid #ddd;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }
    </style>
</head>

<body>
    <div class="header">
        <h1>Sewa Mobil Mujib</h1>
    </div>
    <div class="date-range">
        <h3>Laporan Transaksi</h3>
        <p>Periode: <?= isset($bulan) ? $bulan : 'Semua' ?></p>
    </div>
    <table>
        <thead class="">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">ID Transaksi</th>
                <th class="text-center">Nama Pelanggan</th>
                <th class="text-center">Nama Mobil</th>
                <th class="text-center">tanggal Sewa</th>
                <th class="text-center">Tanggal Kembali</th>
                <th class="text-center">Tanggal Pengembalian</th>
                <th class="text-center">Harga Sewa</th>
                <th class="text-center">Lama Sewa</th>
                <th class="text-center">Total Denda</th>
                <th class="text-center">Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($transaksi)) { ?>
            <tr>
                <td class="text-center" colspan="11">Tidak ada data</td>
            </tr>
            <?php } else { ?>
            <?php foreach ($transaksi as $key => $row) : ?>
            <tr>
                <td class="text-center align-middle"><?= $key + 1 ?></td>
                <td class="text-center align-middle"><?= $row['id_transaksi'] ?></td>
                <td class="text-center align-middle"><?= $row['nama'] ?></td>
                <td class="text-center align-middle"><?= $row['nama_mobil'] ?></td>
                <td class="text-center align-middle"><?= $row['tanggal_sewa'] ?></td>
                <td class="text-center align-middle"><?= $row['tanggal_kembali'] ?></td>
                <td class="text-center align-middle">
                    <?= empty($row['tanggal_pengembalian']) ? '-' : $row['tanggal_pengembalian'] ?>
                </td>
                <td class="text-center align-middle">
                    <?= format_rupiah($row['harga_sewa']) ?> / hari
                </td>
                <td class="text-center align-middle"><?= $row['lama_sewa'] ?>
                </td>
                <td class="text-center align-middle">
                    <?= empty($row['total_denda']) ? '-' : format_rupiah($row['total_denda'])  ?>
                </td>
                <td class="text-center align-middle">
                    <?= format_rupiah($row['total_bayar'])  ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>