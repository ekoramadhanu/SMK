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
        <li class="nav-item active">
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
      <li class="nav-item">
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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $nama?></span>
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
              <h6 class="m-0 font-weight-bold text-primary">Tabel Kelas</h6>
            </div>
            <div class="card-body">
              <?= $this->session->flashdata('message')?>  
              <?= form_error('kelas', '<div class="alert alert-danger" role="alert">', '</div>')?>
              <div class="mb-2 d-flex justify-content-end">
                <button class="btn btn-primary" data-toggle="modal" data-target="#kelasModal">Tambah Kelas</button>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nomor</th>
                      <th>Kelas</th>
                      <th>Kompetensi</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nomor</th>
                      <th>Kelas</th>
                      <th>Kompetensi</th>
                      <th>Keterangan</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php  
                      $nomor = 1;
                      foreach ($kelas as $item):?>
                      <tr>
                        <td><?= $nomor;?></td>
                        <td><?= $item->nama_kelas?></td>
                        <td><?= $item->kompetensi_keahlian?></td>
                        <td>
                         <?php 
                           echo "<button type='submit' class='ubahKelas btn btn-outline-danger btn-sm mr-1' data-id='".$item->id_kelas."'data-toggle='modal' data-target='#updateModal'><i class='fas fa-fw fa-pencil-alt'></i></button>";
                           echo "<button type='submit' class='hapusKelas btn btn-outline-success btn-sm' data-id='".$item->id_kelas."'data-toggle='modal' data-target='#deleteModal'><i class='fas fa-fw fa-trash-alt'></i></button>";
                         ?>
                        </td>
                      </tr>
                    <?php  
                      $nomor++; 
                      endforeach;?>
                  </tbody>
                </table>
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


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Keluar</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Jika iya silahkan pilih tombol 'Keluar'<</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
          <a class="btn btn-primary" href="<?=base_url('Auth/logout')?>">Keluar</a>
        </div>
      </div>
    </div>
  </div>
  <!-- tambah kelas Modal-->
  <div class="modal fade" id="kelasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Formulir Penambahan Kelas</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="<?=base_url('Kelas')?>" class="needs-validation" novalidate>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Kelas</label>
            <input type="text" class="form-control form-control-user" id="kelas" name="kelas" required style="color:black" placeholder="Nama Kelas">
            <div class="invalid-feedback">
              <p class="pl-2 text-capitalize">Nama Kelas tidak boleh kosong</p>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Keterampilan</label>
            <input type="text" class="form-control form-control-user" id="keterampilan" name="keterampilan" required style="color:black" placeholder="Kelas Keterampilan">
            <div class="invalid-feedback">
              <p class="pl-2 text-capitalize">Keterampilan tidak boleh kosong</p>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal" >Cancel</button>
            <button type="submit" class="btn btn-primary" >Tambah</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  <!-- ubah kelas Modal-->
  <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Formulir Ubah Kelas</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="<?=base_url('Kelas/ubahDataKelas')?>" class="form-ubah needs-validation" novalidate>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Kelas</label>
            <input type="text" class="form-control form-control-user" id="kelas" name="kelas" required style="color:black" placeholder="Nama Kelas">
            <div class="invalid-feedback">
              <p class="pl-2 text-capitalize">Nama Kelas tidak boleh kosong</p>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Keterampilan</label>
            <input type="text" class="form-control form-control-user" id="keterampilan" name="keterampilan" required style="color:black" placeholder="Kelas Keterampilan">
            <div class="invalid-feedback">
              <p class="pl-2 text-capitalize">Keterampilan tidak boleh kosong</p>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal" >Cancel</button>
            <button type="submit" class="btn btn-primary btnUbahKelas" >Ubah</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  <!-- hapus kelas Modal-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Kelas</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          ika iya silahkan pilih tombol 'Iya'
        </div>
        <div class="modal-footer">
          <form action="<?=base_url('Kelas/hapusDataKelas')?>" class="form-hapus">
            <button class="btn btn-secondary" type="button" data-dismiss="modal" >Cancel</button>
            <button type="submit" class="btn btn-primary btnHapusKelas" >Hapus</button>
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
     // event digunakan untuk mengambil data dari atribut button
     $('.ubahKelas').click(function () {
      ambilVal= $(this).attr('data-id');        
      console.log(ambilVal);      
      $('.form-ubah').on('click','.btnUbahKelas',function(e){        
        $('.form-ubah').attr('action', $('.form-ubah').attr('action') + '/' + ambilVal)
      });
    });
     $('.hapusKelas').click(function () {
      ambilVal= $(this).attr('data-id');        
      console.log(ambilVal);      
      $('.form-hapus').on('click','.btnHapusKelas',function(e){        
        $('.form-hapus').attr('action', $('.form-hapus').attr('action') + '/' + ambilVal)
      });
    });
  </script>
</body>

</html>
