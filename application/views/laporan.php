<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Siswa</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/sb2admin/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/sb2admin/')?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <h2 class="text-center mb-3">Laporan Pembayaran Siswa Tahun <?=$tahun?></h2>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Id Pembayraran</th>
        <th scope="col">Nama Petugas</th>
        <th scope="col">NISN</th>
        <th scope="col">Tanggal Bayar</th>
        <th scope="col">Nominal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rekap as $item):?>
             <tr>
                <td><?= $item->id_pembayaran;?></td>
                <td><?= $item->nama_petugas?></td>
                <td><?= $item->nisn?></td>
                <td><?= $item->tgl_bayar?></td>
                <td>Rp. <?= $item->jumlah_bayar?></td>
             </tr>
        <?php endforeach;?>
    </tbody>
    </table>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/sb2admin/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/sb2admin/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/sb2admin/')?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/sb2admin/')?>js/sb-admin-2.min.js"></script>
  <script>
    print();
  </script>
</body>

</html>
