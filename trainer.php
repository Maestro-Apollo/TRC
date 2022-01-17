<?php
include('./class/database.php');
class team extends database
{
    public function teamFunction()
    {
        $sql = "SELECT * from team where type = 'TRAINERS'";
        $res = mysqli_query($this->link, $sql);
        if (mysqli_num_rows($res) > 0) {
            return $res;
        } else {
            return false;
        }
        # code...
    }
}
$obj = new team;
$objTeam = $obj->teamFunction();

?>
<!DOCTYPE html>
<html>

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php include('./layouts/meta.php') ?>

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
        <?php include('./layouts/header.php'); ?>

        <div role="main" class="main">

            <section class="page-header page-header-modern page-header-lg overlay overlay-show overlay-op-7 m-0"
                style="background-image: url(img/logo.jpg); background-size: cover; background-position: center;">
                <div class="container py-5">
                    <div class="row">
                        <div class="col text-center">

                            <h1 class="text-color-light font-weight-bold text-10">Trainers</h1>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container py-5 my-4">
                <h2 class="text-color-dark font-weight-extra-bold text-10 mb-4 appear-animation"
                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200"><em>TRC TEAM
                        TRAINERS</em>
                </h2>
                <div class="row row-gutter-sm py-2">
                    <?php if ($objTeam) { ?>
                    <?php while ($row = mysqli_fetch_assoc($objTeam)) { ?>
                    <div class="col-md-6 col-lg-4 mb-4 appear-animation" data-appear-animation="fadeInUpShorterPlus"
                        data-appear-animation-delay="200">

                        <div class="card custom-card-style-1 border-0 border-radius-0 custom-box-shadow-1">
                            <img src="team/<?php echo $row['image']; ?>" class="card-img-top border-radius-0"
                                alt="John Doe Image" />
                            <div class="card-body text-center px-4 py-5">
                                <h2
                                    class="card-title alternative-font-4 text-color-dark font-weight-semibold line-height-1 text-5 mb-1">
                                    <?php echo $row['title']; ?></h2>
                                <p class="text-color-grey positive-ls-3 mb-3"><?php echo $row['sub_title']; ?></p>
                                <p class="font-weight-light text-color-dark line-height-7 mb-2">
                                    <?php echo $row['details']; ?></p>

                            </div>
                        </div>

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