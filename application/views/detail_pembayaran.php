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
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('Kelas')?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-robot"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sistem SPP Siswa</div>
      </a>
      <!-- Heading -->
      <div class="sidebar-heading">
        Data Sekolah
      </div>
      <?php if( $level == 'admin') :?>
        <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('Kelas')?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Kelas</span></a>
        </li>
        <!-- Nav Item - Charts -->
        <li class="nav-item ">
          <a class="nav-link" href="<?=base_url('Siswa')?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Siswa</span></a>
        </li>
        <!-- Nav Item - Tables -->
        <li class="nav-item ">
          <a class="nav-link" href="<?=base_url('SPP')?>">
            <i class="fas fa-fw fa-table"></i>
            <span>SPP</span></a>
        </li>
        <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('Petugas')?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Petugas</span></a>
        </li>   
      <?php endif;?>   
      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="<?=base_url('Pembayaran')?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Pembayaran</span></a>
      </li>      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$nama?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>

        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
            </div>
            <div class="card-body">
              <?= $this->session->flashdata('message')?>
              <table>
                <tr>
                    <td>NISN</td>
                    <td>:</td>
                    <td><?= $siswa[0]->nisn?></td>
                </tr>
                <tr>
                    <td>NIS</td>
                    <td>:</td>
                    <td><?= $siswa[0]->nis?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $siswa[0]->nama?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $siswa[0]->alamat?></td>
                </tr>
                <tr>
                    <td>No Telepon</td>
                    <td>:</td>
                    <td><?= $siswa[0]->no_telp?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td><?= $siswa[0]->nama_kelas?></td>
                </tr>
                <tr>
                    <td>Tagihan</td>
                    <td>:</td>
                    <td><?= $siswa[0]->nominal?></td>
                </tr>
              </table>
              <div class="mb-2 d-flex justify-content-end">
                <button class="btn btn-primary btnbayar" data-toggle="modal" data-target="#konfirmasiModal" data-nisn="<?=$siswa[0]->nisn?>">Bayar</button>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- logout modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Keluar</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Jika iya silahkan pilih tombol 'Keluar'</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
          <a class="btn btn-primary" href="<?=base_url('Auth/logout')?>">Keluar</a>
        </div>
      </div>
    </div>
  </div>
  <!-- konfirmasi modal -->
  <div class="modal fade" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah benar siswa telah membayar</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Jika iya silahkan pilih tombol 'iya'</div>
        <div class="modal-footer">
            <form action="<?=base_url('Pembayaran/bayar')?>" class="form-bayar" method="post">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                <button type="submit" class="btn btn-primary btnIya">Iya</button>
            </form>
        </div>
      </div>
    </div>
  </div>
 

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/sb2admin/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/sb2admin/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/sb2admin/')?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/sb2admin/')?>js/sb-admin-2.min.js"></script>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    $('.btnbayar').click(function () {
      ambilVal= $(this).attr('data-nisn');
      $('.form-bayar').on('click','.btnIya',function(e){        
        $('.form-bayar').attr('action', $('.form-bayar').attr('action') + '/' + ambilVal)
      });
    });
  </script>
</body>

</html>
