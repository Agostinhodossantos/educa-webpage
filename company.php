<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title id="title">Educa - Instituição</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/educa/logo.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->


    <?php

      include_once('includes/dbconfig.php');
      $ref = 'institution/';
      $fetchdata = $database->getReference($ref)->getValue();
      $uid  = $_GET['id'];
      $title           = "";
      $localization    = "";
      $institution_description = "";
      $phone                   = "";
      $email                   = "";
      $website                 = "";
      $video_link              = "";
      $p1 = "";
      $p2 = "";
      $img1 = "";
      $img2 = "";

      foreach($fetchdata as $key => $row){
          if($row['uid'] == $uid ){
            $title           = $row['institution_name'];
            $localization    = $row['location'];
            $institution_description = $row['institution_description'];
            $img1                    = $row['img1'];
            $img2                    = $row['img2'];
            $phone                   = $row['contact'];
            $email                   = $row['email'];
            $website                 = $row['website'];
            $video_link              = $row['video_link'];
            $index = -1;
            if($video_link == null || $video_link == ""){
                $video_link = "https://www.youtube.com/embed/eNUIvSlEk7E";
            }
            $str =  $institution_description;
                  if(preg_match("#Visão#", $str, $matches, PREG_OFFSET_CAPTURE)) {
                     $index = $matches[0][1];
                     $p1 = substr($str,0,$index);
                     $p2 = substr($str , $index , strlen($str));

                  }else{
                       $p1 = $str;
                  }
            setDescription($institution_description);
            break;
          }
      }

      function setDescription($str){

      }

    ?>

    <!-- Header Area Start -->
    <header class="header-area" style="background: #414c52">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="conferNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="./index.php"><img src="./img/educa/logo.png" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul id="nav">
                                <li class="active"><a href="index.php">Inicio</a></li>
                                <li><a href="#about">Sobre</a></li>
                                <!-- <li><a href="#categories-list-course">Cursos</a></li>
                                <li><a href="#college">Faculdades</a></li> -->
                                <li><a href="#contact">Contacto</a></li>
                            </ul>

                            <!-- Get Tickets Button -->
                            <a href="https://educam.herokuapp.com/<?php echo $uid; ?>" class="btn mt-3 mt-lg-0 ml-3 ml-lg-5"  style="background:#f8871f; color:white" > Chat <i class="zmdi zmdi-email"></i></a>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area bg-img jarallax" style="background-color: #f2871c;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 id="page_title" class="page-title"><?php echo $title; ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Início</a></li>
                            
                                <li id="breadcrumb_item" class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- Blog Area Start -->
    <section class="confer-blog-details-area section-padding-100-0">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Post Details Area -->
                <div class="col-12 col-lg-8 col-xl-9">
                    <div class="pr-lg-4 mb-100">
                        <!-- Post Content -->
                        <div class="post-details-content">

                            <!-- Post Thumbnail -->
                            <div class="post-blog-thumbnail mb-30">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="<?php echo $video_link; ?>" allowfullscreen></iframe>
                                  </div>
                            </div>

                            <!-- Post Title -->
                            <h4 class="post-title" id="about"><?php echo $title; ?></h4>

                            <!-- Post Meta -->
                            <div class="post-meta">
                                <a id="localization_first" class="post-date" href="#"><i class="zmdi zmdi-gps"></i><?php echo $localization; ?></a>
                                <a class="post-author" href="#"><i class="zmdi zmdi-email"></i>Enviar mensagem</a>
                            </div>

                            <p id="description_first"  style="white-space: pre-line"><?php echo $p1; ?></p>

                            <!-- Blockquote -->
                            <!-- <blockquote class="confer-blockquote">
                                <h5>Colleges together, this pivotal event will feature high level dialogue and strategies as well as be a Platform to recognize and celebrate the Top Education Brands in the Country.</h5>
                            </blockquote> -->



                            <p id="more_description"  style="white-space: pre-line"><?php echo $p2; ?></p>
                        </div>


                        <!-- Post Author Area -->
<!--                        <div class="post-author-area d-flex align-items-center my-5" id="video-chat">-->
<!--                            &lt;!&ndash; Avatar &ndash;&gt;-->
<!--                            <div class="author-avatar">-->
<!--                                <img src="img/bg-img/53.jpg" alt="">-->
<!--                            </div>-->
<!--                            &lt;!&ndash; Author Content &ndash;&gt;-->
<!--                            <div class="author-content">-->
<!--                                <h5>Converse em video com UEM</h5>-->
<!--                                <span>Agendar video chat </span>-->
<!--                                <p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing</p>-->
<!--                            </div>-->
<!--                        </div>-->

                      
                        <!-- Pager Area -->
                        <div class="pager-area d-flex align-items-center flex-wrap mb-80">
                            <!-- Prev Post --
                            <div class="pager-single-post d-flex align-items-center">
                                <div class="post-thumb">
                                    <a href="#"><img src="img/bg-img/55.jpg" alt=""></a>
                                </div>
                                <div class="post-meta">
                                    <a href="#" class="post-title">Exames</a>
                                    <span><?php echo "Exames ".$title; ?></span>
                                </div>
                            </div>

                            -- Next Post -->
                            <div class="pager-single-post d-flex align-items-center">
                                <div class="post-thumb">
                                    <a href="#"><img src="img/bg-img/55.jpg" alt=""></a>
                                </div>
                                <div class="post-meta">
                                    <a href="blog.php?id=<?php  echo $uid;?>" class="post-title">Publicações e noticias</a> 
                                    <span>Ver publicações</span>
                                </div>
                            </div>
   
                        </div>


                        <!-- Comment Area -->
                      
                        <!-- Leave A Reply -->
                        <div class="confer-leave-a-reply-form clearfix" id="contact">
                            <h4 class="mb-30">Enviar email</h4>
                            
                            <!-- Leave A Reply -->
                            <div class="contact_form">
                                <form action="#" method="post">
                                    <div class="contact_input_area">
                                        <div class="row">
                                            <!-- Form Group -->
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control mb-30" name="name" id="name" placeholder="Seu Nome" required>
                                                </div>
                                            </div>
                                            <!-- Form Group -->
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control mb-30" name="name" id="surname" placeholder="Apelido" required>
                                                </div>
                                            </div>
                                            <!-- Form Group -->
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <input type="email" class="form-control mb-30" name="email" id="email" placeholder="E-mail" required>
                                                </div>
                                            </div>
                                            <!-- Form Group -->
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control mb-30" name="contact" id="contact" placeholder="Seu Numero">
                                                </div>
                                            </div>
                                            <!-- Form Group -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea name="message" class="form-control mb-30" id="message" cols="30" rows="6" placeholder="Mensagem" required></textarea>
                                                </div>
                                            </div>
                                            <!-- Button -->
                                           
                                        </div>
                                    </div>
                                </form>
                                <div class="col-12">

                                <button onClick="sendMessage()" class="btn confer-btn-white mt-50 wow fadeInUp" style="background:#f8871f;border-radius:0px">Enviar Mensagem <i
                                            class="zmdi zmdi-long-arrow-right"></i></button>

                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Blog Sidebar Area -->
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="confer-sidebar-area mb-100">

                        <!-- Single Widget Area -->
                        <!-- <div class="single-widget-area">
                            <div class="search-widget">
                                <form action="#" method="post">
                                    <input type="search" name="search-form" id="searchForm" placeholder="Search">
                                    <button type="submit"><i class="zmdi zmdi-search"></i></button>
                                </form>
                            </div>
                        </div> -->

                        <!-- Single Widget Area -->
                        <div class="single-widget-area">
                            <!-- Post Author Widget -->
                            <div class="post-author-widget">
                                <!-- Thumbnail -->
                                <div class="post-author-avatar" style="background:white;">
                                    <img src="<?php echo $img1; ?>" alt="" >
                                </div>
                                <!-- Author Content -->
                                <div class="post-author-content">
                                    <h5 id="institute_name"><?php echo $title; ?></h5>
                                    <p id="location_and_contact">contacto e localização</p>
                                </div>
                                <!-- Social Info -->
                                <div class="author-social-info">
                                    <a href="https://www.google.com/maps/search/<?php echo $title ?>"><i class="zmdi zmdi-map"></i></a>
                                    <a href="<?php echo $website ?>"><i class="zmdi zmdi-view-web"></i></a>
                                    <a href="tel:<?php echo $website ?>"><i class="zmdi zmdi-phone"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Single Widget Area -->
                        <div class="single-widget-area" id="college">
                            <!-- <h5 class="widget-title mb-30">Faculdades</h5> -->

                            


                        <?php
                        $ref = 'institution/'.$uid.'/college';
                        $fetchdata = $database->getReference($ref)->getValue();
                        $countCollege = 0;
                        ?>

                        <?php if($fetchdata != null):?>
                        <?php
                            foreach( $fetchdata as $key => $row):
                                $countCollege++;
                                if($countCollege == 5){
                                    break;
                                }
                                ?>
                                        <!-- Single Recent Post Area -->
                            <div class="single-recent-post-area d-flex align-items-center">
                                <!-- Thumb -->
                                <div class="post-thumb">
                                    <a href="single-blog.html"><img src="img/bg-img/43.jpg" alt=""></a>
                                </div>
                                <!-- Content -->
                                <div class="post-content">
                                    <a href="#" class="post-title"><?php echo $row['college']; ?></a>
                                    <!-- <a href="#" class="post-date"><i class="zmdi zmdi-time"></i> January 14, 2019</a> -->
                                </div>
                            </div>
                            <?php endforeach ?>
                        <?php endif?>

                            <?php if($countCollege > 4): ?>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong2">ver todas faculdades </button>
                            <?php endif; ?>

                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <?php
                                        $ref = 'institution/'.$uid.'/college';
                                        $fetchdata = $database->getReference($ref)->getValue(); ?>

                                        <?php if($fetchdata != null):?>
                                            <?php foreach( $fetchdata as $key => $row):?>
                                                <!-- Single Recent Post Area -->
                                                <div class="single-recent-post-area d-flex align-items-center">
                                                    <!-- Thumb -->
                                                    <div class="post-thumb">
                                                        <a href="single-blog.html"><img src="img/bg-img/43.jpg" alt=""></a>
                                                    </div>
                                                    <!-- Content -->
                                                    <div class="post-content">
                                                        <a href="#" class="post-title"><?php echo $row['college']; ?></a>
                                                        <!-- <a href="#" class="post-date"><i class="zmdi zmdi-time"></i> January 14, 2019</a> -->
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        <?php endif?>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Widget Area -->
                        <div class="single-widget-area" id="categories-list-course">
                            <!-- <h5 class="widget-title mb-30">Cursos</h5> -->

                            <!-- Catagories List -->
                            <ul class="categories-list"> </ul>




                        </div>


                    

                        <!-- Single Widget Area -->
                        <div class="single-widget-area">
                            <h5 class="widget-title mb-30">Tag de Navegação</h5>

                            <!-- Tag Cloud -->
                            <ul class="tag-cloud">
                                <li><a href="#location">Localização</a></li>
                                <li><a href="#contact">Contacto</a></li>
                                <li><a href="#galleria">Galeria</a></li>
                                <li><a href="#video-chat">Video chat</a></li>
                            </ul>
                        </div>

                        <!-- Single Widget Area -->
                        <div class="single-widget-area">
                            <h5 class="widget-title mb-30">Galeria</h5>

                            <!-- Sidebar Gallery -->
                            <div class="sidebar-gallery">
                                <div class="row">

                                    <?php
                                        $ref = 'institution/'.$uid.'/gallery';
                                        $fetchdata = $database->getReference($ref)->getValue();
                                    ?>

                                     <?php if($fetchdata != null):?>
                                     <?php foreach( $fetchdata as $key => $row): ?>
                                        <div class="col-4">
                                            <a href="#"><img src="<?php echo $row['url']; ?>" alt=""></a>
                                        </div>
                                    <?php endforeach ?>
                                    <?php endif?>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End -->

    <!-- Footer Area Start -->
    <footer class="footer-area bg-img section-padding-100-0" style="background-color:#414c52; color: white" >
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-60">
                            <!-- Footer Logo -->
                            
                            <p>Obrigado por visitar nosso stand para mais informações entre em contato conosco.</p>
                           
                            <!-- Social Info -->
                            <div class="social-info">
                                <a href="https://www.google.com/maps/@-25.9740262,32.5711991,15z"><i class="zmdi zmdi-gps"></i></a>
                                <a href="<?php echo $website; ?>"><i class="zmdi zmdi-view-web"></i></a>
                                <a href="<?php echo "tel:".$phone; ?>"><i class="zmdi zmdi-phone"></i></a>
                                <a href="<?php echo "mailto:".$email; ?>"><i class="zmdi zmdi-email"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-60">
                            <!-- Widget Title -->
                            <h5 class="widget-title">Contacto</h5>

                            <!-- Contact Area -->
                            <div class="footer-contact-info">
                                <p><i class="zmdi zmdi-map" id="location"></i> <?php echo $localization; ?></p>
                                <p><i class="zmdi zmdi-phone" id="phone"></i><?php echo $phone; ?></p>
                                <p><i class="zmdi zmdi-email" id="email_institute"></i> <?php echo $email; ?></p>
                                <p><i class="zmdi zmdi-globe" id="site"></i> <?php echo $website; ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-60">
                            <!-- Widget Title -->

                            <h5 class="widget-title">Tag de Navegação</h5>

                            <!-- Footer Nav -->
                            <ul class="footer-nav">
                                <li><a href="#location">Localização</a></li>
                                <li><a href="#contact">Contacto</a></li>
                                <li><a href="#galleria">Galeria</a></li>
                                <li><a href="#video-chat">Video chat</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Single Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-60">
                            <!-- Widget Title -->
                            <h5 class="widget-title" id="galleria">Galeria</h5>

                            <!-- Footer Gallery -->
                            <div class="footer-gallery">
                                <div class="row">

                                 <?php
                                  $ref = 'institution/'.$uid.'/gallery';
                                  $fetchdata = $database->getReference($ref)->getValue();
                                  ?>

                                  <?php if($fetchdata != null):?>
                                    <?php foreach( $fetchdata as $key => $row): ?>
                                        <div class="col-4">
                                            <a href="<?php echo $row['url']; ?>" class="single-gallery-item"><img src="<?php echo $row['url']; ?>" alt=""></a>
                                        </div>
                                    <?php endforeach ?>
                                   <?php endif?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copywrite Area -->
        <div class="container">
            <div class="copywrite-content">
                <div class="row">
                    <!-- Copywrite Text -->
                    <div class="col-12 col-md-6">
                        <div class="copywrite-text">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados <i class="fa fa-heart-o" aria-hidden="true"></i> por <a href="https://educa.co.mz" target="_blank">Educa</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                    <!-- Footer Menu -->
                    <div class="col-12 col-md-6" >
                        <div class="footer-menu">
                            <ul class="nav">
                            
                                <li style="color: white"><a href="#"><i class="zmdi zmdi-circle"></i> Política de Privacidade</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- **** All JS Files ***** -->
    <!-- jQuery 2.2.4 -->
    <script src="js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins -->
    <script src="js/confer.bundle.js"></script>
    <!-- Active -->
    <script src="js/default-assets/active.js"></script>
    <!--firebase-->
    <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase.js"></script>
    <script src="js/db/app.js"></script>
    <script src="js/db/real-time-database.js"></script>



    <script>


 
function sendMessage() {
        var name = document.getElementById('name').value;
        var surname = document.getElementById('surname').value;
        var email = document.getElementById('email').value;
        var contact = document.getElementById('contact').value;
        var message = document.getElementById('message').value;
        var uid = uuidv4();
        var userUid = "";

        firebase.auth().onAuthStateChanged(function(user) {
            if (user) {
                userUid = user.uid.toString().trim();
                addMessage(name , surname  , email , contact , message , uid , userUid);
            } else {
                sendMessageError("Mensagem nao enviada, faça login", 1);
            }
        });
    
    }

    function addMessage(name , surname  , email , contact , message , uid , userUid) {
        var data = {
            uid: uid,
            userUid: userUid,
            name: email,
            surname: surname,
            contact: email,
            message: message
        }

        console.log(data);

        firebase.database().ref().child('institution').child("<?php echo $uid; ?>").child('message').child(uid).set(data, function(error) {
            if (error) {
                sendMessageError("Mensagem nao enviada", 2);
            } else {
                sendMessageSuccess();
            }
        });

    }

    //show dialog: message sent successfully//
    function sendMessageSuccess() {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Mensagem enviada com sucesso',
            showConfirmButton: false,
            timer: 1500
        })

        window.location.reload(true)

    }

    //@code the variable code is used to check the error code//
    function sendMessageError(error, codeError) {
        var loginError = 1;
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error,
        })

        if (codeError == loginError) {
            location.href = "intro.php"
        }
    }



    </script>



</body>

</html>