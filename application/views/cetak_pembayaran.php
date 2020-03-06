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
    <h5 class=" mb-3">Bukti Pembayaran</h5>
    <table>
      <tr>
        <td>NISN</td>
        <td>:</td>
        <td><?= $siswa[0]->nisn?></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?= $siswa[0]->nama?></td>
      </tr>
      <tr>
        <td>kelas</td>
        <td>:</td>
        <td><?= $siswa[0]->nama_kelas?></td>
      </tr>
      <tr>
        <td>Nominal</td>
        <td>:</td>
        <td><?= $siswa[0]->nominal?></td>
      </tr>
      <tr>
        <td>Status</td>
        <td>:</td>
        <td>Lunas</td>
      </tr>
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
