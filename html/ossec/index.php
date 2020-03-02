<?php require('includes/config.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Home</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <?php require('imports/allCSS.php'); ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php require('includes/sidePanel.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php require('includes/topBar.php');?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Main</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-header">
                  <h6 class="m-0 font-weight-bold text-primary">Available Agents</h6>
                </div>
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a href="index">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">ossec-server (127.0.0.1)</div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-header">
                  <h6 class="m-0 font-weight-bold text-primary">Latest Modified Files</h6>
                </div>
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">/boot/grup/grub.cfg</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">/usr/sbin/chat</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">/usr/sbin/pppdump</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">/usr/sbin/pppd</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">/usr/sbin/pppstats</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Card (Row) -->
          <div class="row">
            <div class="col-lg-12">
              <div id="main-stats" class="card show mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Latest Events</h6>
                </div>
              </div>
            </div>
          </div>
          <!-- End Card -->


          <!-- Alert -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Level 7 | Rule Id: 551</h6>
              <h6 class="m-0 font-weight-bold text-primary">Location | ubuntu-18->syscheck</h6>
            </div>
            <div class="card-body">
              <p>Integrity checksum changed for: '/boot/grub/grub.cfg'</p>
              <p>Size changed from '11319' to '9417'</p>
              <p>Old md5sum was: 'd424cda05ab96091c19b0eae2926b415'</p>
              <p>New md5sum is : '3dddbcd00121b3c430d23c7f7c0a52a4'</p>
              <p>Old sha1sum was: 'fa3acd35cdd2f7ab2c6b5e6e96cdde611db2ed42'</p>
              <p>New sha1sum is : 'fa9009096c299649940daeff434b0588305d228e'</p>
              
            </div>
          </div>
          <!-- End Alert -->

          <!-- Alert -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Level 7 | Rule Id: 551</h6>
              <h6 class="m-0 font-weight-bold text-primary">Location | ubuntu-18->syscheck</h6>
            </div>
            <div class="card-body">
              <p>Integrity checksum changed for: '/boot/grub/grub.cfg'</p>
              <p>Size changed from '11319' to '9417'</p>
              <p>Old md5sum was: 'd424cda05ab96091c19b0eae2926b415'</p>
              <p>New md5sum is : '3dddbcd00121b3c430d23c7f7c0a52a4'</p>
              <p>Old sha1sum was: 'fa3acd35cdd2f7ab2c6b5e6e96cdde611db2ed42'</p>
              <p>New sha1sum is : 'fa9009096c299649940daeff434b0588305d228e'</p>
              
            </div>
          </div>
          <!-- End Alert -->

          <!-- Alert -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Level 7 | Rule Id: 551</h6>
              <h6 class="m-0 font-weight-bold text-primary">Location | ubuntu-18->syscheck</h6>
            </div>
            <div class="card-body">
              <p>Integrity checksum changed for: '/boot/grub/grub.cfg'</p>
              <p>Size changed from '11319' to '9417'</p>
              <p>Old md5sum was: 'd424cda05ab96091c19b0eae2926b415'</p>
              <p>New md5sum is : '3dddbcd00121b3c430d23c7f7c0a52a4'</p>
              <p>Old sha1sum was: 'fa3acd35cdd2f7ab2c6b5e6e96cdde611db2ed42'</p>
              <p>New sha1sum is : 'fa9009096c299649940daeff434b0588305d228e'</p>
              
            </div>
          </div>
          <!-- End Alert -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require('includes/footer.php'); ?>
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
  <?php require('includes/logoutModal.php'); ?>
  <!-- End of Logout Modal-->

  <?php require('imports/all.php'); ?>

</body>

</html>
