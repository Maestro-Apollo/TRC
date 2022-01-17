<?php
include('./class/database.php');
class service extends database
{
    public function serviceClass()
    {
        $sql = "SELECT * from `article` order by id ASC";
        $res = mysqli_query($this->link, $sql);
        if (mysqli_num_rows($res) > 0) {
            return $res;
        } else {
            return false;
        }
        # code...
    }
}
$obj = new service;
$objService = $obj->serviceClass();

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
        <?php $page = 'Article';
        include('./layouts/header.php'); ?>

        <div role="main" class="main">

            <section class="page-header page-header-modern page-header-lg overlay overlay-show overlay-op-9 m-0"
                style="background-image: url(img/logo.jpg); background-size: cover; background-position: center;">
                <div class="container py-5">
                    <div class="row">
                        <div class="col text-center">

                            <h1 class="text-color-light font-weight-bold text-10">Articles</h1>
                        </div>
                    </div>
                </div>
            </section>



            <div class="container py-5 my-4">
                <div class="row pb-4">
                    <?php if ($objService) { ?>
                    <?php while ($row = mysqli_fetch_assoc($objService)) { ?>
                    <div class="col-md-4 mb-5 appear-animation" data-appear-animation="fadeInUpShorterPlus"
                        data-appear-animation-delay="200">
                        <a href="article-details.php?id=<?php echo $row['id']; ?>" class="text-decoration-none">
                            <div class="card custom-card-style-2 border-0 border-radius-0">
                                <div class="card-img-top">
                                    <img src="img/Alimijjaman - Copy.jpg" class="img-fluid" alt="" />
                                </div>
                                <div class="card-body custom-box-shadow-2">

                                    <h4 class="text-color-dark font-weight-medium text-5-5 mb-2">
                                        <em><?php echo $row['title']; ?></em>
                                    </h4>
                                    <span
                                        class="custom-read-more font-weight-medium d-inline-flex justify-content-center align-items-center svg-fill-color-primary svg-stroke-color-primary">
                                        VIEW DETAILS
                                        <svg class="ml-2" version="1.1" viewBox="0 0 15.698 8.706" width="17"
                                            xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <polygon stroke="#777" stroke-width="0.1" fill="#777"
                                                points="11.354,0 10.646,0.706 13.786,3.853 0,3.853 0,4.853 13.786,4.853 10.646,8 11.354,8.706 15.698,4.353 " />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    <?php } ?>



                </div>
            </div>



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