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
          <th>Satuan</th>
          <th>QTY2</th>
          <th>Satuan2</th>
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
        $KG = 0;
        $Gram = 0;
        $Ton = 0;
        $Liter = 0;
        $PCS = 0;
        $LOT = 0;
        $TRUK = 0;
        $KARUNG = 0;
        $DRUM = 0;
        $RIT = 0;
        $totalQtyKG = 0.0;
        $totalQty2KG = 0.0;
        $totalQtyGram = 0.0;
        $totalQty2Gram = 0.0;
        $totalQtyTon = 0.0;
        $totalQty2Ton = 0.0;
        $totalQtyLiter = 0.0;
        $totalQty2Liter = 0.0;
        $totalQtyPCS = 0.0;
        $totalQty2PCS = 0.0;
        $totalQtyLOT = 0.0;
        $totalQty2LOT = 0.0;
        $totalQtyTRUK = 0.0;
        $totalQty2TRUK = 0.0;
        $totalQtyKARUNG = 0.0;
        $totalQty2KARUNG = 0.0;
        $totalQtyDRUM = 0.0;
        $totalQty2DRUM = 0.0;
        $totalQtyRIT = 0.0;
        $totalQty2RIT = 0.0;
        foreach ($datalaporan as $row) : $total += floatval($row->total_bayar);
          $total2 += floatval($row->total_bayar2);
          if ($row->qty == "KG") {
            $totalQtyKG += floatval($row->jumlah);
            $KG = 1;
          }else if ($row->qty == "Gram") {
            $totalQtyGram += floatval($row->jumlah);
            $Gram = 1;
          }else if ($row->qty == "Ton") {
            $totalQtyTon += floatval($row->jumlah);
            $Ton = 1;
          }else if ($row->qty == "Liter") {
            $totalQtyLiter += floatval($row->jumlah);
            $Liter = 1;
          }else if ($row->qty == "PCS") {
            $totalQtyPCS += floatval($row->jumlah);
            $PCS = 1;
          }else if ($row->qty == "LOT") {
            $totalQtyLOT += floatval($row->jumlah);
            $LOT = 1;
          }else if ($row->qty == "TRUK") {
            $totalQtyTRUK += floatval($row->jumlah);
            $TRUK = 1;
          }else if ($row->qty == "KARUNG") {
            $totalQtyKARUNG += floatval($row->jumlah);
            $KARUNG = 1;
          }else if ($row->qty == "DRUM") {
            $totalQtyDRUM += floatval($row->jumlah);
            $DRUM = 1;
          }else if ($row->qty == "RIT") {
            $totalQtyRIT += floatval($row->jumlah);
            $RIT = 1;
          }
          if ($row->qty2 == "KG") {
            $totalQty2KG += floatval($row->jumlah2);
            $KG = 1;
          }else if ($row->qty2 == "Gram") {
            $totalQty2Gram += floatval($row->jumlah2);
            $Gram = 1;
          }else if ($row->qty2 == "Ton") {
            $totalQty2Ton += floatval($row->jumlah2);
            $Ton = 1;
          }else if ($row->qty2 == "Liter") {
            $totalQty2Liter += floatval($row->jumlah2);
            $Liter = 1;
          }else if ($row->qty2 == "PCS") {
            $totalQty2PCS += floatval($row->jumlah2);
            $PCS = 1;
          }else if ($row->qty2 == "LOT") {
            $totalQty2LOT += floatval($row->jumlah2);
            $LOT = 1;
          }else if ($row->qty2 == "TRUK") {
            $totalQty2TRUK += floatval($row->jumlah2);
            $TRUK = 1;
          }else if ($row->qty2 == "KARUNG") {
            $totalQty2KARUNG += floatval($row->jumlah2);
            $KARUNG = 1;
          }else if ($row->qty2 == "DRUM") {
            $totalQty2DRUM += floatval($row->jumlah2);
            $DRUM = 1;
          }else if ($row->qty2 == "RIT") {
            $totalQty2RIT += floatval($row->jumlah2);
            $RIT = 1;
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
            <td><?= $row->qty ?></td>
            <td><?= $row->jumlah2 ?></td>
            <td><?= $row->qty2 ?></td>
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
        <td colspan="2">
          <?php 
            if($KG == 1){
          ?>
              <h7><?= $totalQtyKG . " KG" ?></h7>  
          <?php 
            }
          ?>
          <?php 
            if($Gram == 1){
          ?>
              <hr>
              <h7><?= $totalQtyGram . " Gram" ?></h7>  
          <?php 
            }
          ?>
          <?php 
            if($Ton == 1){
          ?>
              <hr>
              <h7><?= $totalQtyTon . " Ton" ?></h7>  
          <?php 
            }
          ?>
          <?php 
            if($Liter == 1){
          ?>
              <hr>
              <h7><?= $totalQtyLiter . " Liter" ?></h7>  
          <?php 
            }
          ?>
          <?php 
            if($PCS == 1){
          ?>
              <hr>
              <h7><?= $totalQtyPCS . " PCS" ?></h7>  
          <?php 
            }
          ?>
          <?php 
            if($LOT == 1){
          ?>
              <hr>
              <h7><?= $totalQtyLOT . " LOT" ?></h7>  
          <?php 
            }
          ?>
          <?php 
            if($TRUK == 1){
          ?>
              <hr>
              <h7><?= $totalQtyTRUK . " TRUK" ?></h7>  
          <?php 
            }
          ?>
          <?php 
            if($KARUNG == 1){
          ?>
              <hr>
              <h7><?= $totalQtyKARUNG . " KARUNG" ?></h7>  
          <?php 
            }
          ?>
          <?php 
            if($DRUM == 1){
          ?>
              <hr>
              <h7><?= $totalQtyDRUM . " DRUM" ?></h7>  
          <?php 
            }
          ?>
          <?php 
            if($RIT == 1){
          ?>
              <h7><?= $totalQtyRIT . " RIT" ?></h7>  
          <?php 
            }
          ?>
        </td>
        <td colspan="2">
        <?php 
            if($KG == 1){
          ?>
              <h7><?= $totalQty2KG . " KG" ?></h7>  
          <?php 
            }
          ?>
          <?php 
            if($Gram == 1){
          ?>
              <hr>
              <h7><?= $totalQty2Gram . " Gram" ?></h7>  
          <?php 
            }
          ?>
          <?php 
            if($Ton == 1){
          ?>
              <hr>
              <h7><?= $totalQty2Ton . " Ton" ?></h7>  
          <?php 
            }
          ?>
          <?php 
            if($Liter == 1){
          ?>
              <hr>
              <h7><?= $totalQty2Liter . " Liter" ?></h7>  
          <?php 
            }
          ?>
          <?php 
            if($PCS == 1){
          ?>
              <hr>
              <h7><?= $totalQty2PCS . " PCS" ?></h7>  
          <?php 
            }
          ?>
          <?php 
            if($LOT == 1){
          ?>
              <hr>
              <h7><?= $totalQty2LOT . " LOT" ?></h7>  
          <?php 
            }
          ?>
          <?php 
            if($TRUK == 1){
          ?>
              <hr>
              <h7><?= $totalQty2TRUK . " TRUK" ?></h7>  
          <?php 
            }
          ?>
          <?php 
            if($KARUNG == 1){
          ?>
              <hr>
              <h7><?= $totalQty2KARUNG . " KARUNG" ?></h7>  
          <?php 
            }
          ?>
          <?php 
            if($DRUM == 1){
          ?>
              <hr>
              <h7><?= $totalQty2DRUM . " DRUM" ?></h7>  
          <?php 
            }
          ?>
          <?php 
            if($RIT == 1){
          ?>
              <h7><?= $totalQty2RIT . " RIT" ?></h7>  
          <?php 
            }
          ?>
        </td>
        <td colspan="2">
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