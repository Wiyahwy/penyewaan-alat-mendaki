<?php
session_start();
include('includes/config.php');
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Alat Pendakian Semeru</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta content="Author" name="WebThemez">
  <!-- Favicons 
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/font/font-awesome.css" rel="stylesheet" />
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body id="body">
  <?php include('includes/header.php'); ?>
  <section class="bg-primary text-white">
    <div class="container">
      <div class="d-sm-flex align-items-center justify-content-between">
        <div>
          <h3>Penyewaan Alat Pendakian <br> Area Gn. Semeru</h3>
          <p>Jl. semeru no. 32, RT 05 RW 03, Malang, Jawa Timur</p>
          <p>Kami menyediakan penyewaan alat pendakian di area sekitar gunung semeru, alat - alaa yang kami sewakan adalah alat yang sudah teruji dari segi kualitas, Harga yang kami tawarkan untuk penyewaan juga cukup terjangkau</p>
          <div class="tombol">
            <div>
              <?php if (strlen($_SESSION['login']) == 0) {
              ?>
                <a href="#loginform" data-toggle="modal" data-dismiss="modal" class="tombollogin">Login / Register</a>
              <?php
              } ?>
            </div>
          </div>
        </div>

        <img src="img/jumbotron.png" class="img-fluid w-50 d-none d-sm-block">
      </div>
    </div>
  </section>

  <main id="main">
    <!--==========================
      Services Section
      ============================-->
    <section id="services">
      <div class="container">
        <div class="section-header">
          <h2>Alat Pendaki terpopuler</h2>
          <p>Berikut adalah list alat pendakian yang cukup populer dalam beberapa pekan terakhir</p>
        </div>

        <div class="row">
          <?php $sql = "SELECT tblitems.itemTitle,tbltype.TypeName,tblitems.PricePerDay,tblitems.id,tblitems.itemsOverview,tblitems.Vimage1 from tblitems join tbltype on tbltype.id=tblitems.itemsBrand order by rand() limit 6  ";
          $query = $dbh->prepare($sql);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);
          $cnt = 1;
          if ($query->rowCount() > 0) {
            foreach ($results as $result) {
          ?>
              <div class="col-lg-4">
                <div class="box wow  fadeInLeft">
                  <div class="car-info-box">
                    <a href="alat_details.php?vhid=<?php echo htmlentities($result->id); ?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" style="height: 180px; width: 280px;" class="img-responsive" alt="image">
                    </a>
                    <div class="car-title-m">
                      <h6><a href="alat_details.php?vhid=<?php echo htmlentities($result->id); ?>"> <?php echo substr($result->itemTitle, 0, 21); ?></a></h6>
                      <span class="price">Rp<?php echo htmlentities($result->PricePerDay); ?> /Day</span>
                    </div>
                    <div class="inventory_info_m ">
                      <p><?php echo substr($result->itemsOverview, 0, 70); ?></p>
                    </div>
                  </div>
                </div>
              </div>
          <?php
            }
          } ?>
        </div>
      </div>
    </section><!-- #services -->

    <!--==========================
      Clients Section
      ============================-->
    <section id="clients" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Clients</h2>
          <p>Berikut adalah beberapa brand ternama yang bekerjasama dengan kami</p>
        </div>

        <div class="owl-carousel clients-carousel">
            <img src="img/client/client1.png" alt="">
            <img src="img/client/client2.png" alt="">
            <img src="img/client/client3.png" alt="">
            <img src="img/client/client4.png" alt="">
            <img src="img/client/client5.png" alt="">
          </div> 

      </div>
    </section><!-- #clients -->

    <!-- <section id="call-to-action" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Layanan Kami</h3>
            <p class="cta-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt fugiat culpa esse aute nulla cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="contact.php">Contact Us</a>
          </div>
        </div>

      </div>
    </section> -->
    <!-- #call-to-action -->


  </main>

  <!--==========================
    Footer
    ============================-->
  <?php include('includes/footer.php'); ?>
  <!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!--Login-Form -->
  <?php include('includes/login.php'); ?>
  <!--/Login-Form -->

  <!--Register-Form -->
  <?php include('includes/registration.php'); ?>

  <!--/Register-Form -->

  <!--Forgot-password-Form -->
  <?php include('includes/forgotpassword.php'); ?>
  <!-- JavaScript  -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="lib/sticky/sticky.js"></script>
  <script src="contact/jqBootstrapValidation.js"></script>
  <script src="contact/contact_me.js"></script>
  <script src="js/main.js"></script>

</body>

</html>