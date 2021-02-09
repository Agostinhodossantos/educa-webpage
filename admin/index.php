<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Seja Bem-Vinda ao educa - Dashboard</title>

    <!-- Favicon -->
  <link rel="icon" href="../img/educa/logo.png">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">


<?php

$uid  = $_GET['id'];

if($uid == null){
  if(isset($_SESSION['uidInstitute'])){
    $uid = $_SESSION['uidInstitute'];
  }else{
    header("Location: login.php");
  }
  
}

include_once('../includes/dbconfig.php');
$ref = 'institution/';
$fetchdata = $database->getReference($ref)->getValue();

$title           = "";
$localization    = "";
$institution_description = "";
$phone                   = "";
$email                   = "";
$website                 = "";
$video_link              = "";
$img1 = "";
$img2 = "";
$contact = "0";
$visits  = "0";
$countCourse = "0";

foreach($fetchdata as $key => $row){
    if($row['uid'] == $uid ){
      $title                   = $row['institution_name'];
      $localization            = $row['location'];
      $institution_description = $row['institution_description'];
      $img1                    = $row['img1'];
      $img2                    = $row['img2'];
      $phone                   = $row['phone'];
      $email                   = $row['email'];
      $website                 = $row['website'];
      $video_link              = $row['video_link'];
      $contact                 = $row['contact'];
      $visits                  = $row['visits'];
      break;
    }
}

?>



<?php
  $ref = 'institution/'.$uid.'/college';
  $fetchdata = $database->getReference($ref)->getValue();
  $countCollege = 0;

  if($fetchdata != null){
    foreach($fetchdata as $key => $row){
      $countCollege++;
  }
  }
 
?>




<?php
  $ref = 'institution/'.$uid.'/course';
  $fetchdata = $database->getReference($ref)->getValue();
  $countCourse= 0;

  if($fetchdata != null){
    foreach($fetchdata as $key => $row){
      $countCourse++;
  }
  }
 
?>






  
  

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #414c52">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <img src="img/logo.png" alt="" width="30" height="30">
        </div>
        <div class="sidebar-brand-text mx-3">Educa Admin <sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Educa Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-university"></i>
          <span>Faculdades</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Faculdades:</h6>
            <a class="collapse-item" href="add_college.php?id=<?php echo $uid; ?>">Adicionar</a>
            <a class="collapse-item" href="college.php?id=<?php echo $uid; ?>">Todos os cursos</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-book-open"></i>
          <span>Cursos</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Cursos:</h6>
            <a class="collapse-item" href="add_course.php?id=<?php echo $uid; ?>">Publicar cursos</a>
            <a class="collapse-item" href="courses.php?id=<?php echo $uid; ?>">Todos cursos</a>
          </div>
        </div>
      </li>


        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePu" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-rss-square"></i>
          <span>Publicações </span>
        </a>
        <div id="collapsePu" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Cursos:</h6>
            <a class="collapse-item" href="publish.php?id=<?php echo $uid; ?>">Publicar</a>
            <a class="collapse-item" href="publish.php?id=<?php echo $uid; ?>">Ver publicações </a>
          </div>
        </div>
      </li>


        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseImg" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-rss-square"></i>
          <span>Galeria </span>
        </a>
        <div id="collapseImg" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Fotos:</h6>
            <a class="collapse-item" href="add_gallery.php?id=<?php echo $uid; ?>">Publicar fotos</a>
            <a class="collapse-item" href="../gallery.php?id=<?php echo $uid; ?>">Galeria </a>
          </div>
        </div>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

     

      <!-- Nav Item - Tables -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="add_gallery.php?id=<?php echo $uid; ?>">
          <i class="fas fa-fw fa-camera"></i>
          <span>   </span></a>
      </li> -->

      <!-- Divider --> 
      <!-- <hr class="sidebar-divider d-none d-md-block"> -->

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
       

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
           
            <?php
              $ref = 'institution/'.$uid.'/message';
              $fetchdata = $database->getReference($ref)->getValue();  
           ?>

                  <!-- Nav Item - Messages -->
                  <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"><?php echo count($fetchdata) ?></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                mensagens
                                </h6>
                               
                              

                               
                                  <?php if($fetchdata != null):?>
                                  
                                   <?php foreach( $fetchdata as $key => $row): ?>

                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate"><?php echo $row['message']; ; ?></div>
                                        <div class="small text-gray-500"><?php echo $row['name']; ?></div>
                                    </div>
                                  </a>

                                      
                                   <?php endforeach ?>
                                 <?php endif?>
                                

                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo substr($title , 0 , 15).".."; ?>  </span>
                <img class="img-profile rounded-circle" src="<?php echo $img1; ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Sair
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
<!--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
<!--        -->
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Cursos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countCourse; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book-open fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Faculdades</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $countCollege; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-university fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Visitas</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $visits; ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Contactos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $contact; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Sobre Instituição </h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Menu:</div>
                      <a class="dropdown-item" href="#">Actualizar</a>
<!--                      <a class="dropdown-item" href="#">Another action</a>-->
<!--                      <div class="dropdown-divider"></div>-->
<!--                      <a class="dropdown-item" href="#">Something else here</a>-->
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div>
                    <h3> <?php echo $title ?></h3>
                    <p style="white-space: pre-line" contentEditable="true" id="about"  >
                    <?php echo $institution_description ?>
                    </p>
                    <button type="button" onClick="updateDescription()" class="btn btn-primary">Actualizar</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Video de apresentação</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Atualizar video</div>
                      
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" id="link" placeholder="Link" value="<?php echo $video_link; ?>" aria-label="Link" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary" onClick="updateLink()" type="button"><i class="fas fa-check fa-sm fa-fw text-gray-400"></i></button>
                        </div>
                      </div>

                      
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">

                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src=" <?php echo $video_link?>" allowfullscreen></iframe>
                    </div>

                  </div>

                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Contactos</h6>
                </div>
                <div class="card-body">

                  <form>

                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="email" class="form-control" id="inputEmail" value="<?php echo $email; ?>" placeholder="Email">
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="contact" class="form-control" id="inputContact" value="<?php echo $phone; ?>" placeholder="Contacto">
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" id="inputLocalization" value="<?php echo $localization; ?>" placeholder="Localização">
                      </div>
                    </div>

                    <button type="button" onClick="updateContact()" class="btn btn-secondary btn-lg btn-block">Actualizar</button>

                  </form>

                </div>
              </div>

              <!-- Color System -->


            </div>

            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Educa Mocambique</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                  </div>
                  <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
                  <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>
                </div>
              </div>

<!--              &lt;!&ndash; Approach &ndash;&gt;-->
<!--              <div class="card shadow mb-4">-->
<!--                <div class="card-header py-3">-->
<!--                  <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>-->
<!--                </div>-->
<!--                <div class="card-body">-->
<!--                  <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>-->
<!--                  <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>-->
<!--                  <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>-->
<!--                </div>-->
<!--              </div>-->

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
            <span>Copyright &copy; Educa 2020</span>
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
          <h5 class="modal-title" id="exampleModalLabel">Pronto para partir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione "Sair" abaixo se você estiver pronto para encerrar sua sessão atual.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="login.html">Sair</a>
        </div>
      </div>
    </div>
  </div>

  
  <!-- firebase -->
  <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase.js"></script>
  <script src="../js/db/app.js"></script>
  <script src="../js/db/real-time-database.js"></script>

  <!-- my script -->

  <script>


    function updateLink(){
      var linkUrl = document.getElementById('link').value;
      if(linkUrl != null){
        firebase.database().ref().child('institution').child(id).child('video_link').set(linkUrl , function(error){      
          window.location.reload(true);
        });
      }

    }


    function updateContact(){
     var email = document.getElementById('inputEmail').value;
     var phone = document.getElementById("inputContact").value;
     var localization = document.getElementById("inputLocalization").value;

     var id = "<?php echo $uid ?>";
     
     firebase.database().ref().child('institution').child(id).child('email').set(email , function(error){      
     });

     firebase.database().ref().child('institution').child(id).child('phone').set(phone , function(error){      
     });

     firebase.database().ref().child('institution').child(id).child('location').set(localization , function(error){      
      window.location.reload(true);
     });

    }

    function updateDescription(){
      var description = document.getElementById("about").textContent;
      var id = "<?php echo $uid ?>";

      firebase.database().ref().child('institution').child(id).child("institution_description").set(description , function(error){
            if (error) {
                alert("Data could not be saved." + error);
                window.location.reload(true);
            } else {
                window.location.reload(true);
               // location.href="index.php";
         }
    });

    }
  </script>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>