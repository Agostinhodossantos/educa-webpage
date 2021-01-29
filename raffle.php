<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Title -->
    <title>Seja Bem-Vinda ao educa</title>

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

    <!-- Header Area Start -->
    
    <!-- Header Area End -->

    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area bg-img jarallax" style="background-image: url(img/bg-img/backgroundeducaonline1.jpg); height: 100px;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- Contact Us Area Start -->
    <section class="contact--us-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Contact Us Thumb -->
                <div class="col-12 col-lg-6">
                    <div class="contact-us-thumb mb-100">
                        <img src="img/educa/game.jpg">
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-12 col-lg-6">
                    <div class="contact_from_area mb-100 clearfix">
                        <!-- Contact Heading -->
                        <a href="#" class="list-group-item list-group-item-action active">
                            SORTEIO DE PREMIOS
                        </a>


                           <form>
                            <div class="form-group" >
                                <input type="number" name="num" maxlength="60" onmouseover="checkInput()" id="num" class="form-control" id="numInput" placeholder="Insira um número">
                            </div>
                        </form>
                        <button  class="btn btn btn-outline-info btn-lg btn-block" onClick="play()" id="btn_sortear">Sorteiar</button>


                        <br>
                        <br>

                        <div class="contact-heading">
                            <h4>Usuários sorteados</h4>
                         </div>
                        <div class="contact_form">

                            <div class="list-group">


                                <?php
                                include_once('includes/dbconfig.php');
                                $ref = 'randGift';
                                $fetchdata = $database->getReference($ref)->getValue();
                                ?>

                                <?php
                                if($fetchdata != null):
                                foreach( $fetchdata as $key => $row):
                                ?>
                                    <a href="#" class="list-group-item list-group-item-action"> <?php echo $row['name']; ?> </a>

                                <?php
                                endforeach;
                                endif;
                                ?>
<!--                                <a href="#" class="list-group-item list-group-item-action active">-->
<!--                                    Cras justo odio-->
<!--                                </a>-->
<!--                                <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>-->
<!--                                <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>-->
<!--                                <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>-->
<!--                                <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>-->
                            </div>

                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Us Area End -->


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
    <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase.js"></script>
    <script src="js/db/app.js"></script>
    <script src="js/db/real-time-database.js"></script>
    
    <script>

    hideInputGame();
    function hideInputGame() {

        firebase.auth().onAuthStateChanged(function(user) {

        if (user) {
        //item.val().name;
            firebase.database().ref('randGift').on('value', function(snapshot) {
                snapshot.forEach(function(item) {

                    if (item.val().uid !== null && item.val().uid !== undefined) {
                        var db_uid = item.val().uid.toString().trim();
                        var user_uid = user.uid.toString().trim();

                        if (db_uid == user_uid) {
                            console.log(user_uid);
                            disable();
                            return;
                        }

                    }

                });
            });

        } else {
            location.href = 'intro.php';
        }

        });

    }

    function disable() {
        // document.getElementById("num").value +="Whatever text!";
        // document.getElementById("num").disabled = true; 
    }
   
    function play() {
        var num = document.getElementById("num").value;
        
        if(num !== null && num !== "") {
            location.href = "sorteio/index.php?num="+num;  
        } else {
            
        }
          
    }

    function checkInput() {
        var numInput = document.getElementById("num");
        if(numInput.disabled) {
            //alert("disabled")
        }else {
           // alert("active")
        }
    }

    </script>



</body>

</html>