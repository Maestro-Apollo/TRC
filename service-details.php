<?php
include('./class/database.php');
class details extends database
{
    public function detailsFunction()
    {
        $id = $_GET['id'];
        $sql = "SELECT * from `service` where id = $id ";
        $res = mysqli_query($this->link, $sql);
        if (mysqli_num_rows($res) > 0) {
            return $res;
        } else {
            return false;
        }
        # code...
    }
}
$obj = new details;
$objDet = $obj->detailsFunction();
$row = mysqli_fetch_assoc($objDet);

?>

<!DOCTYPE html>
<html>

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php include('./layouts/meta.php'); ?>

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">



    <link id="googleFonts"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Lora:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="vendor/animate/animate.compat.css">
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/theme-elements.css">
    <link rel="stylesheet" href="css/theme-blog.css">
    <link rel="stylesheet" href="css/theme-shop.css">



    <!-- Demo CSS -->
    <link rel="stylesheet" href="css/demos/demo-law-firm-2.css">
    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet" href="css/skins/skin-law-firm-2.css">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Head Libs -->
    <script src="vendor/modernizr/modernizr.min.js"></script>

</head>

<body>

    <div class="body">
        <?php
        include('./layouts/header.php'); ?>

        <div role="main" class="main">

            <section class="page-header page-header-modern page-header-lg overlay overlay-show overlay-op-9 m-0"
                style="background-image: url(img/logo.jpg); background-size: cover; background-position: center;">
                <div class="container py-5">
                    <div class="row">
                        <div class="col text-center">

                            <h1 class="text-color-light font-weight-bold text-10">Service Details</h1>
                        </div>
                    </div>
                </div>
            </section>

            <div class="spacer py-3 my-4"></div>
            <div class="container">
                <div class="row pb-4">
                    <div class="col-lg-8 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorterPlus"
                        data-appear-animation-delay="200">
                        <h2 class="text-color-dark font-weight-bold text-10 pb-3 mb-4">
                            <em><?php echo $row['title']; ?></em>
                        </h2>
                        <img src="img/logo - Copy.jpg" class="img-fluid float-right custom-box-shadow-1 ml-4 mb-3"
                            alt="" />


                        <p class="mb-0 text-justify"><?php echo $row['details']; ?></p>


                    </div>
                    <div class="col-lg-4 appear-animation" data-appear-animation="fadeInUpShorterPlus"
                        data-appear-animation-delay="400">
                        <aside class="sidebar" data-plugin-sticky
                            data-plugin-options="{'minWidth': 991, 'containerSelector': '.container', 'padding': {'top': 120}}">
                            <div class="card bg-primary-darken border-0 border-radius-0 custom-box-shadow-1 py-4 mb-5">
                                <div class="card-body text-center py-5">
                                    <h3 class="alternative-font-4 text-color-light font-weight-semibold text-4 mb-1">ARE
                                        YOU LOOKING FOR</h3>
                                    <h2
                                        class="text-transform-none text-color-light font-weight-bold text-10 negative-ls-1 mb-2">
                                        Experienced Consultant?</h2>
                                    <p class="text-color-light text-3-5 opacity-8 mb-5">Get a free consultation
                                        right now</p>
                                    <ul class="list list-unstyled mb-5">
                                        <li class="mb-lg-2 mb-xl-3">
                                            <i
                                                class="icons icon-phone text-color-primary text-5-5 position-relative top-2 mr-2"></i>
                                            <a href="#"
                                                class="text-color-light font-weight-bold text-decoration-none text-5">+88-02-55071634</a>
                                        </li>
                                        <li class="mb-3">
                                            <i
                                                class="icons icon-envelope text-color-primary text-6 position-relative top-6 mr-2"></i>
                                            <a href="mailto:info@trc.com.bd"
                                                class="text-color-light text-decoration-none text-4 text-lg-3 text-xl-4">info@trc.com.bd</a>
                                        </li>
                                        <li class="text-color-light text-4 text-lg-3 text-xl-4 mb-0">
                                            <i
                                                class="icons icon-calendar text-color-primary text-5 position-relative top-3 mr-2"></i>
                                            Mon - Fri 9am - 6pm
                                        </li>
                                    </ul>
                                    <a href="./contact.php" data-hash data-hash-offset="100"
                                        class="btn btn-primary font-weight-bold text-2 text-lg-1 text-xl-2 btn-px-5 btn-py-3">REQUEST
                                        CONSULTATION</a>
                                </div>
                            </div>

                        </aside>
                    </div>
                </div>
            </div>
            <div class="spacer py-3 my-4"></div>



        </div>

        <?php include('./layouts/footer.php'); ?>

    </div>

    <!-- Vendor -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery.appear/jquery.appear.min.js"></script>
    <script src="vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.min.js"></script>
    <script src="vendor/popper/umd/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.validation/jquery.validate.min.js"></script>
    <script src="vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="vendor/jquery.gmap/jquery.gmap.min.js"></script>
    <script src="vendor/lazysizes/lazysizes.min.js"></script>
    <script src="vendor/isotope/jquery.isotope.min.js"></script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="vendor/vide/jquery.vide.min.js"></script>
    <script src="vendor/vivus/vivus.min.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="js/theme.js"></script>

    <!-- Current Page Vendor and Views -->



    <!-- Current Page Vendor and Views -->
    <script src="js/views/view.contact.js"></script>


    <!-- Demo -->
    <script src="js/demos/demo-law-firm-2.js"></script>
    <!-- Theme Custom -->
    <script src="js/custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="js/theme.init.js"></script>




    <!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
		 -->


</body>

</html>