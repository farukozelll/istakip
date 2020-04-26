<?php 
/*
<<<<<<< >Faruk İş-Proje Takip Scripti >>>>>>>>>
Copyright (C) 2020 Faruk ÖZEL
 */

ob_start();
session_start(); 
include 'islemler/baglan.php';
include 'fonksiyonlar.php';



$ayarsor=$db->prepare("SELECT * FROM ayarlar");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);




if (empty($_SESSION['kul_mail'])) {
  header("location:login.php");
  exit;
}else{
  $kullanicisor=$db->prepare("SELECT * FROM kullanici WHERE kul_mail=:mail ");
  $kullanicisor->execute(array(
    'mail'=>$_SESSION['kul_mail']
  ));

  
  $sonuc=$kullanicisor->rowCount();
  if ($sonuc==0) {
  header("location:login.php");
  }
}




?>


<!DOCTYPE html>
<html lang="tr">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?php echo $ayarcek['site_aciklama'] ?>">
  <meta name="author" content="<?php echo $ayarcek['site_sahibi'] ?>">
  <link rel="shortcut icon" type="image/png" href="<?php echo $ayarcek['site_logo'] ?>">

  <title><?php echo $ayarcek['site_baslik'] ?></title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <style type="text/css" media="screen">
    .file-details-cell {
      display: none
    }
  </style>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <li class="nav-item mt-1 mb-1">
        <center>
          <a class="nav-link" style="text-align: center;" href="index.php" title="Ana Sayfa">
            <img style="width: 50%; height: auto;" src="<?php echo $ayarcek['site_logo'] ?>" alt="<?php echo $ayarcek['site_baslik'] ?>">
          </a>
        </center>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-home"></i>
          <span>Ana Sayfa</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Seçenekler
        </div>


      <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone" aria-expanded="true" aria-controls="collapseone">
            <i class="fas fa-tasks"></i>
            <span>Projeler</span>
          </a>
          <div id="collapseone" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Proje İşlemleri</h6>
              <a class="collapse-item" href="projeler.php">Tüm Projeler</a>
            <a class="collapse-item" href="projeekle.php">ProjeEkle</a>
        
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Siparişler</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Sipariş İşlemleri:</h6>
            <a class="collapse-item" href="siparisekle.php">SiparişEkle</a>
            <a class="collapse-item" href="siparisler.php">Siparişler</a>
        
          </div>
        </div>
      </li>
<li class="nav-item">
          <a class="nav-link" href="profil.php">
            <i class="fas fa-user-circle"></i>
            <span>Profil</span>
          </a>
        </li>
       
       
          <li class="nav-item">
            <a class="nav-link" href="ayarlar.php">
              <i class="fas fas fa-fw fa-cog"></i>
              <span>Ayarlar</span>
            </a>
          </li>
     

        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
            <span>Oturumu Kapat</span>
          </a>
        </li>



        <!-- Nav Item - Utilities Collapse Menu -->
        

        <!-- Divider -->
        <hr class="sidebar-divider">

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

          <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">       
              <div class="input-group">
                <label><?php echo $ayarcek['site_baslik'] ?></label>
              </div>              
            </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
<!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" id="userDropdown" data-toggle="dropdown" >
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    
                  </span>
                
                 
                   
                 
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="profil.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profil
                  </a>

                
                    <a class="dropdown-item" href="ayarlar.php">
                      <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                      Ayarlar
                    </a>
             

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Oturumu Kapat
                  </a>
                </div>
              </li>
            </ul>
          </nav>
          <!-- Logout Modal-->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Oturum Kapatma</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Oturumu kapatmak istediğinize emin misiniz?</div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal</button>
                  <a class="btn btn-primary" href="islemler/cikis.php">Çıkış Yap</a>
                </div>
              </div>
            </div>
          </div>
          <!-- End of Topbar -->
          <script type="text/javascript">
            var genislik = $(window).width()   
            if (genislik < 768) {
              function gizle(){
                $('#sidebarToggleTop').trigger('click');
              }
              setTimeout("gizle()",1);
            }
          </script>

   
       