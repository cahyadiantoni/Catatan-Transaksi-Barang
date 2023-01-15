<?php function format_indo($date)
{
  date_default_timezone_set('Asia/Jakarta');
  // array hari dan bulan
  // $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
  $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

  // pemisahan tahun, bulan, hari, dan waktu
  $tahun = substr($date, 0, 4);
  $bulan = substr($date, 5, 2);
  $tgl = substr($date, 8, 2);
  $waktu = substr($date, 11, 5);
  $result = $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu;

  return $result;
} ?>
<!DOCTYPE html>
<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    table,
    th,
    td {
      border: 2px solid black;
      border-collapse: collapse;
      font-size: 15px;
    }

    th,
    td {
      padding-left: 5px;
      padding-right: 5px;
    }

    h1,
    p {
      text-align: center;
    }
  </style>
</head>

<body>

  <div class="container">
    <h1>PT KOMALA</h1>
    <p>Jln serangsetu kp.Cijambe RT.009/RW.005, Desa Sukadami kec. cikarang selatan - Bekasi Telp:(021)22180516
    </p>
    <table style="width:100%;">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>Surat Jalan</th>
          <th>No Polisi</th>
          <th>Perusahaan</th>
          <th>Barang</th>
          <th>QTY</th>
          <th>QTY2</th>
          <th>Satuan</th>
          <th>Harga</th>
          <th>Harga2</th>
          <th>Total</th>
          <th>Total2</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        $total = 0.0;
        $total2 = 0.0;
        $totalQty = 0.0;
        $totalQty2 = 0.0;
        $satuan = "KG";
        foreach ($datalaporan as $row) : $total += floatval($row->total_bayar);
          $total2 += floatval($row->total_bayar2);
          $totalQty += floatval($row->jumlah);
          $totalQty2 += floatval($row->jumlah2);
          if ($row->qty != null) {
            $satuan = $row->qty;
          }
        ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= format_indo($row->tanggal) ?></td>
            <td><?= $row->nosj ?></td>
            <td><?= $row->nopk ?></td>
            <td><?= $row->nama_perusahaan ?></td>
            <td><?= $row->nama_barang ?></td>
            <td><?= $row->jumlah ?></td>
            <td><?= $row->jumlah2 ?></td>
            <td><?= $row->qty ?></td>
            <td><?= "Rp. " . number_format($row->harga, 0, ',', '.'); ?></td>
            <td><?= "Rp. " . number_format($row->harga2, 0, ',', '.'); ?></td>
            <td><?= "Rp. " . number_format($row->total_bayar, 0, ',', '.'); ?></td>
            <td><?= "Rp. " . number_format($row->total_bayar2, 0, ',', '.'); ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
      <tfoot>
        <td colspan="5">
          <h7>Periode : <?= format_indo($daritanggal) ?> Sampai <?= format_indo($hinggatanggal) ?></h7>
        </td>
        <td>
          <h7>TotalQty : </h7>
        </td>
        <td>
          <h7><?= $totalQty . " " . $satuan ?></h7>
        </td>
        <td>
          <h7><?= $totalQty2 . " " . $satuan ?></h7>
        </td>
        <td colspan="3">
          <h7>Total Harga : </h7>
        </td>
        <td>
          <h7><?= "Rp. " . number_format($total, 0, ',', '.'); ?></h7>
        </td>
        <td>
          <h7><?= "Rp. " . number_format($total2, 0, ',', '.'); ?></h7>
        </td>
      </tfoot>
    </table>
  </div>

</body>

</html>