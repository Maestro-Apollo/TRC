<?php



include('./class/database.php');
// ini_set('session.gc_maxlifetime',  10);
// ini_set('session.cookie_lifetime',  10);
class service extends database
{
    public function serviceClass()
    {
        $sql = "SELECT * from `service` order by id DESC limit 10";
        $res = mysqli_query($this->link, $sql);
        if (mysqli_num_rows($res) > 0) {
            return $res;
        } else {
            return false;
        }
        # code...
    }
    public function visitorFunction()
    {
        // echo 'Ok';
        // if (!isset($_SESSION['current_user'])) {

        $ip =  $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'];
        $ipencode = md5($ip);
        // $date = date("Y-m-d");
        // echo $ipencode;

        $sqlFind = "SELECT * from visitor where ip = '$ipencode' AND DAY(created_at) = DAY(CURRENT_DATE()) AND MONTH(created_at) = MONTH(CURRENT_DATE())
            AND YEAR(created_at) = YEAR(CURRENT_DATE()) ";
        $resFind = mysqli_query($this->link, $sqlFind);
        if (mysqli_num_rows($resFind) == 0) {
            // echo 'Ok';

            $sql = "INSERT INTO `visitor` (`id`, `ip`, `created_at`) VALUES (NULL, '$ipencode', CURRENT_DATE)";
            mysqli_query($this->link, $sql);

            // $_SESSION['current_user'] = $ipencode;
        }
        // $_SESSION['visitor_count'] = count($ipList);

        // }
        # code...
    }
    public function countFunction()
    {
        $data = array();

        $sql1 = "SELECT count(*) as day FROM `visitor` WHERE DAY(created_at) = DAY(CURRENT_DATE()) AND MONTH(created_at) = MONTH(CURRENT_DATE())
        AND YEAR(created_at) = YEAR(CURRENT_DATE())";
        $res1 = mysqli_query($this->link, $sql1);
        $row = mysqli_fetch_assoc($res1);
        $day = $row['day'];
        $sql1 = "SELECT count(*) as month FROM `visitor` WHERE MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE())";
        $res1 = mysqli_query($this->link, $sql1);
        $row = mysqli_fetch_assoc($res1);
        $month = $row['month'];
        $sql1 = "SELECT count(*) as year FROM `visitor` WHERE YEAR(created_at) = YEAR(CURRENT_DATE())";
        $res1 = mysqli_query($this->link, $sql1);
        $row = mysqli_fetch_assoc($res1);
        $year = $row['year'];

        $data['day'] = $day;
        $data['month'] = $month;
        $data['year'] = $year;
        return $data;
        # code...
    }
}
$obj = new service;
$objService = $obj->serviceClass();
$objInsert = $obj->visitorFunction();
$objCount = $obj->countFunction();
// $day = date('l');
// echo $day . date('F') . date("Y");
// echo $objCount['month'];
// echo date("Y-m-d");
// echo $_SERVER['HTTP_USER_AGENT'];
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

        <?php $page = 'Home';
        include('./layouts/header.php'); ?>
        <div role="main" class="main">

            <div class="owl-carousel-wrapper" style="height: 845px;">
                <div class="owl-carousel dots-inside dots-horizontal-center show-dots-hover show-dots-xs show-dots-sm show-dots-md nav-style-1 nav-inside nav-inside-plus nav-light nav-lg nav-font-size-lg show-nav-hover mb-0"
                    data-plugin-options="{'responsive': {'0': {'items': 1, 'dots': true, 'nav': false}, '479': {'items': 1, 'dots': true}, '768': {'items': 1, 'dots': true}, '979': {'items': 1}, '1199': {'items': 1}}, 'loop': false, 'autoHeight': false, 'margin': 0, 'dots': false, 'dotsVerticalOffset': '-235px', 'nav': true, 'navVerticalOffset': '70px', 'animateIn': 'fadeIn', 'animateOut': 'fadeOut', 'mouseDrag': false, 'touchDrag': false, 'pullDrag': false, 'autoplay': true, 'autoplayTimeout': 7000, 'autoplayHoverPause': false, 'rewind': true}">

                    <!-- Carousel Slide 1 -->
                    <div class="position-relative overlay overlay-show overlay-op-6 overflow-hidden pt-4"
                        data-dynamic-height="['845px','845px','845px','750px','750px']" style="height: 845px;">
                        <div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0"
                            data-appear-animation="kenBurnsToLeft" data-appear-animation-duration="25s"
                            data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show
                            style="background-image: url(img/Alimijjaman.jpg); background-size: cover; background-position: center;">
                        </div>
                        <div class="container position-relative z-index-3 pb-5 h-100">
                            <div class="row justify-content-center align-items-center pb-5 h-100">
                                <div class="col-lg-9 text-center pb-5 mb-5">
                                    <h1 class="text-color-light font-weight-bold line-height-1 text-12 text-md-14 positive-ls-3 mb-3 appear-animation text-capitalize"
                                        data-appear-animation="zoomIn" data-appear-animation-delay="300"
                                        data-plugin-options="{'minWindowWidth': 0}">A Leading Player <br> In VAT, TAX &
                                        Custom</h1>
                                    <!-- <h2 class="alternative-font-4 text-color-light font-weight-semibold line-height-3 text-5 positive-ls-1 mb-2 appear-animation"
                                        data-appear-animation="blurIn" data-appear-animation-delay="1300"
                                        data-plugin-options="{'minWindowWidth': 0}"><span
                                            class="text-color-primary">Attorneys At Law</span> <span
                                            class="opacity-9">Located In Los Angeles, Ca</span></h2> -->
                                    <!-- <p class="text-color-light opacity-6 text-3-5 mb-4" data-plugin-animated-letters
                                        data-plugin-options="{'startDelay': 2200, 'minWindowWidth': 0}">More Than 50
                                        Years Combined Experience Serving Businesses</p> -->
                                    <!-- <a href="demo-law-firm-2-contact.html"
                                        class="btn btn-primary font-weight-bold text-3-5 px-5 py-3 mt-3">CONTACT
                                        US</a> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Carousel Slide 2 -->
                    <div class="position-relative overlay overlay-show overlay-op-6 overflow-hidden pt-4"
                        data-dynamic-height="['845px','845px','845px','750px','750px']" style="height: 845px;">
                        <div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0"
                            data-appear-animation="kenBurnsToLeft" data-appear-animation-duration="30s"
                            data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show
                            style="background-image: url(img/IMG-20210912-WA0005.jpg); background-size: cover; background-position: center;">
                        </div>
                        <div class="container position-relative z-index-3 pb-5 h-100">
                            <div class="row justify-content-center align-items-center pb-5 h-100">
                                <div class="col-lg-8 text-center pb-5 mb-5">
                                    <h1 class="text-color-light font-weight-bold line-height-1 text-12 text-md-14 positive-ls-3 mb-3 appear-animation text-capitalize"
                                        data-appear-animation="zoomIn" data-appear-animation-delay="300"
                                        data-plugin-options="{'minWindowWidth': 0}">Developing VAT TAX <br>Expert People
                                    </h1>
                                    <!-- <h2 class="alternative-font-4 text-color-light font-weight-semibold line-height-3 text-5 positive-ls-1 mb-2 appear-animation"
                                        data-appear-animation="blurIn" data-appear-animation-delay="1300"
                                        data-plugin-options="{'minWindowWidth': 0}"><span class="opacity-9">Extensive
                                            Resources And Commitment To Client</span></h2> -->
                                    <!-- <p class="text-color-light opacity-6 text-3-5 mb-4" data-plugin-animated-letters
                                        data-plugin-options="{'startDelay': 2200, 'minWindowWidth': 0}">More Than 50
                                        Years Combined Experience Serving Businesses</p> -->
                                    <!-- <a href="demo-law-firm-2-contact.html"
                                        class="btn btn-primary font-weight-bold text-3-5 px-5 py-3 mt-3 appear-animation"
                                        data-appear-animation="fadeInUpShorterPlus"
                                        data-appear-animation-delay="3300">CONTACT US</a> -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="owl-carousel-wrapper position-relative z-index-1 appear-animation"
                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="100"
                style="margin-top: -222px; height: 470px;">
                <div class="owl-carousel owl-theme dots-horizontal-center custom-dots-style-1 dots-dark mb-0"
                    data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 2}, '992': {'items': 3}, '1200': {'items': 4}, '1440': {'items': 4}}, 'margin': 20, 'stagePadding': 20, 'loop': true, 'nav': false, 'dots': false, 'autoplay': true, 'autoplayTimeout': 4000,'autoplayHoverPause':false}">
                    <?php if ($objService) { ?>
                    <?php while ($row = mysqli_fetch_assoc($objService)) { ?>
                    <div class="py-5">
                        <a href="service-details.php?id=<?php echo $row['id']; ?>" class="text-decoration-none">
                            <div class="card custom-card-style-2 border-0 border-radius-0"
                                style="background-color: #AD9263;">
                                <div class="card-img-top">
                                    <img src="img/cont0-300x240.jpg" class="img-fluid" alt="" />
                                </div>
                                <div class="card-body custom-box-shadow-2" style="background-color: #AD9263;">

                                    <h4 class="text-color-white font-weight-medium text-5-5 mb-2">
                                        <em><?php echo $row['title']; ?></em>
                                    </h4>
                                    <span
                                        class="custom-read-more font-weight-medium d-inline-flex justify-content-center align-items-center svg-fill-color-dark svg-stroke-color-dark text-color-black">
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
            <div class="container py-5 mt-lg-3 mt-0">
                <div class="row">
                    <div class="col-md-10 offset-md-1 col-lg-10 offset-lg-1">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/1CNHi7hCouc"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container py-5 mt-3">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-9 col-lg-6 pl-lg-5">
                        <div class="position-relative">
                            <div class="custom-shape-1 appear-animation" data-appear-animation="fadeInUpShorterPlus"
                                data-appear-animation-delay="1100">
                                <div class="position-absolute top-0 left-0 right-0 bottom-0 bg-primary"
                                    data-plugin-float-element
                                    data-plugin-options="{'startPos': 'top', 'speed': 0.1, 'transition': true, 'transitionDuration': 1000, 'isInsideSVG': true}">
                                </div>
                            </div>
                            <div data-plugin-float-element
                                data-plugin-options="{'startPos': 'top', 'speed': 0.3, 'transition': true, 'transitionDuration': 1000, 'isInsideSVG': true}">
                                <img src="img/logo.jpg" class="img-fluid position-relative z-index-1 appear-animation"
                                    data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="900"
                                    alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h2 class="text-color-dark font-weight-extra-bold text-10 mb-4 appear-animation"
                            data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200"><em>TRC : The Real
                                Consultation</em></h2>
                        <p class="font-weight-light text-color-dark mb-4 appear-animation text-justify"
                            data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                            TRC offering Accounting, Tax planning, VAT planning and advisory services; working closely
                            with NBR for providing best services to our valuable clients for helping them to minimizing
                            risks and be compliant for maximizing their benefit applying our prudent knowledge.

                            Our vision is To become a leading player in vat, customs, accounting, taxation, assurance,
                            compliance and business consultancy services as a global business partner.</p>
                        <p class="positive-ls-3 text-color-grey mb-3 appear-animation"
                            data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">Md. Alimuzzaman -
                            Lead Consultant</p>
                        <!-- <img src="img/demos/law-firm-2/signature.png" class="img-fluid appear-animation"
                            data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700" alt="" /> -->
                    </div>

                </div>
            </div>


            <div class="container py-5 mt-lg-3 mt-0">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h2 class="text-color-dark font-weight-extra-bold text-10 mb-4 appear-animation"
                            data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200"><em>TRC : Lead
                                Consultant</em></h2>
                        <p class="font-weight-light text-color-dark mb-4 appear-animation text-justify"
                            data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                            As a Lead Consultant of TRC, He made a plane will be a number one Consultancy firm in
                            Bangladesh with in two years. In this regards he has finished 1st staged work by last six
                            months. That is as under:</p>
                        <p class="font-weight-light text-color-dark mb-4 appear-animation text-justify"
                            data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                            1. He started a Consultancy firm for VAT Tax and Customs in the Month of September -2019 by
                            rent an office at Banani. From the 1st month he doing work as per his commitments. He was
                            doing only special work regarding tax. He did not get any normal personal tax file.</p>
                        <p class="font-weight-light text-color-dark mb-4 appear-animation text-justify"
                            data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                            2. He started openly written in LINKEDIN regarding NEW VAT ACTS – 2012 and get a big support
                            from his linked and flower. He written only one VAT rate in every sectors of Business.</p>


                        <!-- <img src="img/demos/law-firm-2/signature.png" class="img-fluid appear-animation"
                            data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700" alt="" /> -->
                    </div>

                    <div class="col-md-9 col-lg-6 pl-lg-5">
                        <div class="position-relative">
                            <div class="custom-shape-1 appear-animation" data-appear-animation="fadeInUpShorterPlus"
                                data-appear-animation-delay="700">
                                <div class="position-absolute top-0 left-0 right-0 bottom-0 bg-primary"
                                    data-plugin-float-element
                                    data-plugin-options="{'startPos': 'top', 'speed': 0.1, 'transition': true, 'transitionDuration': 1000, 'isInsideSVG': true}">
                                </div>
                            </div>
                            <div data-plugin-float-element
                                data-plugin-options="{'startPos': 'top', 'speed': 0.3, 'transition': true, 'transitionDuration': 1000, 'isInsideSVG': true}">
                                <img src="img/Alimijjaman.jpg"
                                    class="img-fluid position-relative z-index-1 appear-animation"
                                    data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="500"
                                    alt="" />
                                <figcaption class="text-color-dark font-weight-extra-bold text-center"><em>Md.
                                        Alimuzzaman</em></figcaption>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="font-weight-light text-color-dark mb-4 appear-animation text-justify"
                            data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                            3. He arranged a seminar for importer and Trader regarding their VAT management under VAT
                            acts is more profitable 15% in state of 5%. In the Seminar Chief guest was Mr. Md. Abdul
                            Kafi, Ex. Commissioner, LTU-VAT, CEO, The VAT Solutions. Chief Speaker was Mr. Masud Khan,
                            FCA, FCMA, Chairman GSK. Bangladesh. Mr. Shahriar I. Halim, FCA, CFO, Purbani Group. The
                            Seminar Presented by Mr. Shuvongkor, FCA, The Chair Persons was Md. Masudur Rahman, CS, FCA.
                        </p>
                    </div>
                </div>
            </div>

            <div class="container py-5 mt-lg-3 mt-0">
                <div class="col-md-10 offset-md-1 col-lg-10 offset-lg-1">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/QYGxXbCMcLs"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>


            </div>

            <!-- <hr class="my-5"> -->

            <!-- <div class="container">
                <div class="row align-items-center text-center py-5 my-5">
                    <div class="col-sm-4 col-xl-2 mb-5 mb-xl-0">
                        <img src="img/logos/logo-8.png" alt class="img-fluid appear-animation"
                            data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="600"
                            data-plugin-options="{'accY': -250}" style="max-width: 90px;" />
                    </div>
                    <div class="col-sm-4 col-xl-2 mb-5 mb-xl-0">
                        <img src="img/logos/logo-9.png" alt class="img-fluid appear-animation"
                            data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="400"
                            data-plugin-options="{'accY': -250}" style="max-width: 140px;" />
                    </div>
                    <div class="col-sm-4 col-xl-2 mb-5 mb-xl-0">
                        <img src="img/logos/logo-10.png" alt class="img-fluid appear-animation"
                            data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="200"
                            data-plugin-options="{'accY': -250}" style="max-width: 140px;" />
                    </div>
                    <div class="col-sm-4 col-xl-2 mb-5 mb-md-0">
                        <img src="img/logos/logo-11.png" alt class="img-fluid appear-animation"
                            data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="200"
                            data-plugin-options="{'accY': -250}" style="max-width: 140px;" />
                    </div>
                    <div class="col-sm-4 col-xl-2 mb-5 mb-md-0">
                        <img src="img/logos/logo-12.png" alt class="img-fluid appear-animation"
                            data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="400"
                            data-plugin-options="{'accY': -250}" style="max-width: 100px;" />
                    </div>
                    <div class="col-sm-4 col-xl-2">
                        <img src="img/logos/logo-13.png" alt class="img-fluid appear-animation"
                            data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="600"
                            data-plugin-options="{'accY': -250}" style="max-width: 100px;" />
                    </div>
                </div>
            </div> -->

            <section class="section overlay overlay-show overlay-op-9 border-0 m-0 appear-animation"
                data-appear-animation="fadeIn" data-appear-animation-delay="300"
                style="background-image: url(img/facebook_1631424931963_6842692117833560672.jpg); background-size: cover; background-position: center;">
                <div class="container pt-5 pb-3">
                    <div class="row">
                        <div class="col text-center">
                            <!-- <h2 class="alternative-font-4 text-color-primary font-weight-semibold text-4 mb-2">
                                TESTIMONIALS & REVIEWS</h2> -->
                            <h3
                                class="text-transform-none text-color-light font-weight-bold text-10 negative-ls-1 pb-3 mb-5">
                                Statements</h3>
                            <p class="custom-font-secondary text-color-light custom-font-size-1 font-weight-extra-bold">
                                “</p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-7 text-center px-lg-0">
                            <div class="owl-carousel owl-theme dots-horizontal-center custom-dots-style-1 dots-light mb-0"
                                data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 1}, '1200': {'items': 1}}, 'loop': true, 'nav': false, 'dots': true, 'autoplay': 5000, 'autoplayTimeout': 5000,'autoplayHoverPause':true}">
                                <div>
                                    <p
                                        class="text-color-light text-6 custom-font-secondary line-height-4 opacity-8 pb-2 mb-0">
                                        “ Please be informed that, I always wish your good performance and good health
                                        and also would like to maintain a very good relationship. ”</p>
                                    <div class="divider divider-primary divider-small mt-2 mb-4 pb-2">
                                        <hr class="my-4 mx-auto">
                                    </div>
                                    <strong class="d-block text-color-light text-4">- MD JAHANGIR ALAM</strong>
                                    <strong class="d-block text-color-light text-4 mb-4"> CHAIRMAN,
                                        CROWN CEMENT GROUP</strong>
                                </div>
                                <div>
                                    <p
                                        class="text-color-light text-6 custom-font-secondary line-height-4 opacity-8 pb-2 mb-0">
                                        “ আপনার চিন্তা-ভাবনা, ধ্যান-ধারনা আমি পছন্দ করি। আল্লাহ্‌ আপনার এবং আপনার ভাল
                                        কাজ গুলোকে এগিয়ে নিতে সাহায্য করুন। ”</p>
                                    <div class="divider divider-primary divider-small mt-2 mb-4 pb-2">
                                        <hr class="my-4 mx-auto">
                                    </div>
                                    <strong class="d-block text-color-light text-4">- ড: আব্দুর রউফ, কমিশনার,
                                        এনবিআর</strong>
                                    <strong class="d-block text-color-light text-4 mb-4"> Chairman, VAT ফোরাম।</strong>
                                </div>
                                <div>
                                    <p
                                        class="text-color-light text-6 custom-font-secondary line-height-4 opacity-8 pb-2 mb-0">
                                        “ It is inspiring to all that you have proven record in this area. I think i you
                                        share your knowledge & experiences by article step by step It will help more to
                                        other. ”</p>
                                    <div class="divider divider-primary divider-small mt-2 mb-4 pb-2">
                                        <hr class="my-4 mx-auto">
                                    </div>
                                    <strong class="d-block text-color-light text-4">- A.B.M.Farhad Uddin
                                        Chowdhury</strong>
                                    <strong class="d-block text-color-light text-4 mb-4"> Assistant General Manager,
                                        Account & Finance at Northern Tosrifa Group.</strong>
                                </div>
                                <div>
                                    <p
                                        class="text-color-light text-6 custom-font-secondary line-height-4 opacity-8 pb-2 mb-0">
                                        “ Also seen your name as writer. Exceptional initiative. Appreciate your
                                        visionary thinking. Wish your great success. ”</p>
                                    <div class="divider divider-primary divider-small mt-2 mb-4 pb-2">
                                        <hr class="my-4 mx-auto">
                                    </div>
                                    <strong class="d-block text-color-light text-4">- HABIBUR RAHMAN MOLLAH</strong>
                                    <strong class="d-block text-color-light text-4 mb-4">FCA, EX CEO, TRANSCOM</strong>
                                </div>
                                <div>
                                    <p
                                        class="text-color-light text-6 custom-font-secondary line-height-4 opacity-8 pb-2 mb-0">
                                        “ You are taking this to newer dimensions…unique approach.. ”</p>
                                    <div class="divider divider-primary divider-small mt-2 mb-4 pb-2">
                                        <hr class="my-4 mx-auto">
                                    </div>
                                    <strong class="d-block text-color-light text-4">- SHAHRIAR I. HALIM</strong>
                                    <strong class="d-block text-color-light text-4 mb-4">FCA, Group CFO, Purbani
                                        Group</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row counters counters-sm py-5">
                        <div class="col-sm-6 col-lg-4 mb-5 mb-lg-0">
                            <div class="counter">
                                <strong class="text-color-light font-weight-bold line-height-1 text-13 mb-1"
                                    data-to="<?php echo $objCount['day']; ?>"
                                    data-plugin-options="{'appendWrapper': '<span class=text-color-primary></span>'}">0</strong>
                                <label class="text-color-light font-weight-bold text-4 mb-0"><?php echo date('l'); ?>'s
                                    Visitors</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-5 mb-lg-0">
                            <div class="counter">
                                <strong class="text-color-light font-weight-bold line-height-1 text-13 mb-1"
                                    data-to="<?php echo $objCount['month']; ?>"
                                    data-plugin-options="{'appendWrapper': '<span class=text-color-primary></span>'}">0</strong>
                                <label class="text-color-light font-weight-bold text-4 mb-0"><?php echo date('F'); ?>'s
                                    Visitors</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-5 mb-sm-0">
                            <div class="counter">
                                <strong class="text-color-light font-weight-bold line-height-1 text-13 mb-1"
                                    data-to="<?php echo $objCount['year']; ?>"
                                    data-plugin-options="{'appendWrapper': '<span class=text-color-primary></span>'}">0</strong>
                                <label class="text-color-light font-weight-bold text-4 mb-0"><?php echo date('Y'); ?>'s
                                    Visitors</label>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <div class="container py-5 my-3">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card bg-primary border-0 border-radius-0">
                            <div class="card-body p-5">
                                <h3
                                    class="d-block alternative-font-4 text-color-light font-weight-medium opacity-8 text-4 mb-0">
                                    ANY QUESTIONS?</h3>
                                <h2 class="text-color-light font-weight-bold text-9 pb-2 mb-4">Frequent Asked Questions
                                </h2>

                                <div class="custom-seemore-overlay mb-4" style="max-height: 400px;">
                                    <div class="custom-accordion-style-1 accordion accordion-modern" id="FAQAccordion">
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h4 class="card-title m-0">
                                                    <a class="accordion-toggle text-color-dark font-weight-semibold text-2-5 collapsed"
                                                        data-toggle="collapse" href="#collapseFAQOne">
                                                        1- What is Income Tax?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFAQOne" class="collapse" data-parent="#FAQAccordion">
                                                <div class="card-body pl-4 pt-2">
                                                    <p class="mb-0">
                                                        Income tax is a type of tax that governments impose on income
                                                        generated by businesses and individuals within their
                                                        jurisdiction</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h4 class="card-title m-0">
                                                    <a class="accordion-toggle text-color-dark font-weight-semibold text-2-5 collapsed"
                                                        data-toggle="collapse" href="#collapseFAQTwo">
                                                        2- What is VAT?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFAQTwo" class="collapse" data-parent="#FAQAccordion">
                                                <div class="card-body pl-4 pt-2">
                                                    <p class="mb-0">
                                                        VAT or Value Added Tax is a type of tax that is charged by the
                                                        Central Government on the sale of services and goods to the
                                                        consumers</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h4 class="card-title m-0">
                                                    <a class="accordion-toggle text-color-dark font-weight-semibold text-2-5 collapsed"
                                                        data-toggle="collapse" href="#collapseFAQFour">
                                                        3- Why need Consultant?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFAQFour" class="collapse" data-parent="#FAQAccordion">
                                                <div class="card-body pl-4 pt-2">
                                                    <p class="mb-0">A consultant is an investment in the success of the
                                                        project. If you trust your consultant, they will use their
                                                        experience and expertise to plan your project appropriately.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h4 class="card-title m-0">
                                                    <a class="accordion-toggle text-color-dark font-weight-semibold text-2-5 collapsed"
                                                        data-toggle="collapse" href="#collapseFAQFive">
                                                        4- Why TRC?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFAQFive" class="collapse" data-parent="#FAQAccordion">
                                                <div class="card-body pl-4 pt-2">
                                                    <p class="mb-0">TRC offering Accounting, Tax planning, VAT planning
                                                        and advisory services; working closely with NBR for providing
                                                        best services to our valuable clients for helping them to
                                                        minimizing risks and be compliant for maximizing their benefit
                                                        applying our prudent knowledge.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h4 class="card-title m-0">
                                                    <a class="accordion-toggle text-color-dark font-weight-semibold text-2-5 collapsed"
                                                        data-toggle="collapse" href="#collapseFAQSix">
                                                        5- What is our Mission?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFAQSix" class="collapse" data-parent="#FAQAccordion">
                                                <div class="card-body pl-4 pt-2">
                                                    <p class="mb-0">Remove the scare of compliance regarding vat, tax
                                                        and customs laws and solving complexity of business relating
                                                        other laws & regulations of the businessmen.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <h4 class="card-title m-0">
                                                    <a class="accordion-toggle text-color-dark font-weight-semibold text-2-5 collapsed"
                                                        data-toggle="collapse" href="#collapseFAQSeven">
                                                        6- Some of our Services?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFAQSeven" class="collapse" data-parent="#FAQAccordion">
                                                <div class="card-body pl-4 pt-2">
                                                    <p class="mb-0">
                                                    <ul>
                                                        <li>
                                                            <p>TRC vat practica limited</p>
                                                        </li>
                                                        <li>
                                                            <p>Tax Consultancy
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p>Value Added Tax Services</p>
                                                        </li>
                                                        <li>
                                                            <p>Audit & Assurance</p>
                                                        </li>
                                                    </ul>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <a href="#" class="custom-seemore-overlay-button text-color-light text-5"><i
                                            class="fas fa-chevron-down position-relative z-index-1"></i></a>
                                </div>

                                <a href="./YOU-HAVE-TO-KNOW.pdf" download
                                    class="btn custom-btn-primary-darken font-weight-bold btn-px-5 btn-py-3">DOWNLOAD
                                    FILE</a>
                            </div>
                        </div>
                    </div>
                    <div id="requestConsultation" class="col-lg-6 col-xl-5 offset-xl-1">
                        <h3 class="d-block alternative-font-4 text-color-primary font-weight-medium text-4 text-lg-right mb-0 appear-animation"
                            data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="300">LET'S TALK
                        </h3>
                        <h2 class="text-color-dark font-weight-bold text-9 text-lg-right pb-2 mb-4 appear-animation"
                            data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="300">Request
                            Consultation</h2>

                        <form class="contact-form custom-form-style-1 appear-animation"
                            data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="300" id="myForm">

                            <div id="output"></div>

                            <div class="form-row">
                                <div class="form-group col mb-3">
                                    <input type="text" value="" data-msg-required="Please enter your name."
                                        maxlength="100" class="form-control border-radius-0" name="name" id="name"
                                        required placeholder="Name *">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col mb-3">
                                    <input type="email" value="" data-msg-required="Please enter your email address."
                                        data-msg-email="Please enter a valid email address." maxlength="100"
                                        class="form-control border-radius-0" name="email" id="email" required
                                        placeholder="E-mail *">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col mb-3">
                                    <input type="text" value="" data-msg-required="Please enter your phone number."
                                        maxlength="100" class="form-control border-radius-0" name="phone" id="phone"
                                        required placeholder="Phone *">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col mb-4">
                                    <textarea maxlength="5000" data-msg-required="Please enter your message." rows="9"
                                        class="form-control border-radius-0" name="message" id="message" required
                                        placeholder="Message *"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col text-lg-right mb-0">
                                    <button type="submit"
                                        class="btn btn-primary font-weight-bold btn-px-5 btn-py-3 appear-animation"
                                        data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="300"
                                        data-loading-text="Loading...">REQUEST CONSULTATION</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <section class="section overlay overlay-show overlay-op-9 border-0 m-0"
                style="background-image: url(img/logo.jpg); background-size: cover; background-position: center;">
                <div class="container py-5 mb-5">
                    <div class="row pb-5 mb-4">
                        <div class="col text-center">
                            <!-- <h3 class="alternative-font-4 text-color-primary font-weight-semibold text-4 mb-2 appear-animation"
                                data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="200">ATTORNEYS
                                & PARTNERS</h3> -->
                            <h2 class="text-transform-none text-color-light font-weight-bold text-10 negative-ls-1 mb-0 appear-animation"
                                data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="">TRC Team
                                Consultants</h2>
                        </div>
                    </div>
                </div>
            </section>

            <div class="owl-carousel-wrapper position-relative z-index-3 pb-4 mb-5 appear-animation"
                data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay=""
                style="height: 373px; margin-top: -225px;">
                <div class="owl-carousel owl-theme dots-horizontal-center custom-dots-style-1 dots-dark mb-0"
                    data-plugin-options="{'responsive': {'576': {'items': 2}, '768': {'items': 2}, '992': {'items': 3}, '1200': {'items': 3}, '1440': {'items': 3}}, 'margin': 20, 'stagePadding': 20, 'loop': true, 'nav': false, 'dots': true, 'autoplay': true, 'autoplayTimeout': 3000,'autoplayHoverPause':true}">
                    <div class="py-5">
                        <a href="./team.php" class="text-decoration-none">
                            <div class="card custom-card-style-1 border-0 border-radius-0 custom-box-shadow-1">
                                <img src="img/Alimijjaman - Copy.jpg" class="card-img-top border-radius-0"
                                    alt="Md. Alimuzzaman Image" />
                                <div class="card-body text-center px-4 py-5">
                                    <h2
                                        class="card-title alternative-font-4 text-color-dark font-weight-semibold line-height-1 text-5 mb-1">
                                        Md. Alimuzzaman</h2>
                                    <p class="text-color-grey positive-ls-3 mb-3">VAT Tax and Customs</p>
                                    <!-- <p class="font-weight-light text-color-dark line-height-7 mb-2">Lorem ipsum dolor
                                        sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor lacus
                                        tincidunt ut...</p> -->
                                    <span
                                        class="custom-read-more d-inline-flex justify-content-center align-items-center text-3 font-weight-medium svg-fill-color-primary">
                                        VIEW PROFILE
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
                    <div class="py-5">
                        <a href="./team.php" class="text-decoration-none">
                            <div class="card custom-card-style-1 border-0 border-radius-0 custom-box-shadow-1">
                                <img src="team/WhatsApp Image 2021-09-19 at 6.43.06 PM.jpeg"
                                    class="card-img-top border-radius-0" alt="Towhidul Momin (Roman) Image" />
                                <div class="card-body text-center px-4 py-5">
                                    <h2
                                        class="card-title alternative-font-4 text-color-dark font-weight-semibold line-height-1 text-5 mb-1">
                                        Towhidul Momin (Roman)</h2>
                                    <p class="text-color-grey positive-ls-3 mb-3"> VAT Tax and Customs</p>
                                    <!-- <p class="font-weight-light text-color-dark line-height-7 mb-2">Lorem ipsum dolor
                                        sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor lacus
                                        tincidunt ut...</p> -->
                                    <span
                                        class="custom-read-more d-inline-flex justify-content-center align-items-center text-3 font-weight-medium svg-fill-color-primary">
                                        VIEW PROFILE
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
                    <div class="py-5">
                        <a href="./team.php" class="text-decoration-none">
                            <div class="card custom-card-style-1 border-0 border-radius-0 custom-box-shadow-1">
                                <img src="img/person-gray-photo-placeholder-man-costume-white-background-person-gray-photo-placeholder-man-136701248 - Copy.jpg"
                                    class="card-img-top border-radius-0" alt="Ahmed Milon Image" />
                                <div class="card-body text-center px-4 py-5">
                                    <h2
                                        class="card-title alternative-font-4 text-color-dark font-weight-semibold line-height-1 text-5 mb-1">
                                        Ahmed Milon</h2>
                                    <p class="text-color-grey positive-ls-3 mb-3">Tranne Consultant</p>
                                    <!-- <p class="font-weight-light text-color-dark line-height-7 mb-2">Lorem ipsum dolor
                                        sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor lacus
                                        tincidunt ut...</p> -->
                                    <span
                                        class="custom-read-more d-inline-flex justify-content-center align-items-center text-3 font-weight-medium svg-fill-color-primary">
                                        VIEW PROFILE
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

                </div>
            </div>

            <hr class="my-0">

            <div class="container pb-4 mb-5">
                <div class="row py-5 my-4">
                    <div class="col text-center">
                        <h2 class="text-color-dark text-12 font-weight-medium mb-0"><em>Extensive Resources and
                                Commitment</em></h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-7 mb-5 mb-lg-0">
                        <p class="font-weight-light mb-0">To become a leading player in vat, customs, accounting,
                            taxation, assurance, compliance and business consultancy services as a global business
                            partner.</p>
                        <div class="row py-4 my-2">
                            <div class="col-sm-6 col-xl-4">
                                <ul class="list list-icons list-icons-style-2 list-icons-lg mb-0">
                                    <li class="font-weight-semibold text-color-dark">
                                        <i class="fas fa-check text-color-dark border-color-grey-1 top-7 text-3"></i>
                                        VAT
                                    </li>
                                    <li class="font-weight-semibold text-color-dark">
                                        <i class="fas fa-check text-color-dark border-color-grey-1 top-7 text-3"></i>
                                        Customs
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6 col-xl-4">
                                <ul class="list list-icons list-icons-style-2 list-icons-lg mb-0">
                                    <li class="font-weight-semibold text-color-dark">
                                        <i class="fas fa-check text-color-dark border-color-grey-1 top-7 text-3"></i>
                                        Accounting
                                    </li>
                                    <li class="font-weight-semibold text-color-dark">
                                        <i class="fas fa-check text-color-dark border-color-grey-1 top-7 text-3"></i>
                                        Taxation
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xl-4">
                                <ul class="list list-icons list-icons-style-2 list-icons-lg mb-0">
                                    <li class="font-weight-semibold text-color-dark">
                                        <i class="fas fa-check text-color-dark border-color-grey-1 top-7 text-3"></i>
                                        Assurance
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <a href="./services.php"
                            class="custom-read-more-link d-flex align-items-center btn btn-link text-color-primary text-decoration-none svg-fill-color-primary svg-stroke-color-primary font-weight-semibold text-3 line-height-1 p-0">
                            LEARN MORE
                            <svg class="ml-2" version="1.1" viewBox="0 0 15.698 8.706" width="17" xml:space="preserve"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <polygon stroke="#777" stroke-width="0.1" fill="#777"
                                    points="11.354,0 10.646,0.706 13.786,3.853 0,3.853 0,4.853 13.786,4.853 10.646,8 11.354,8.706 15.698,4.353 " />
                            </svg>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4 text-center mx-auto">
                        <div class="owl-carousel-wrapper" style="height: 285px;">
                            <div class="owl-carousel owl-theme custom-carousel-style-1 dots-horizontal-center custom-dots-style-1 dots-dark mb-0"
                                data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 1}, '1200': {'items': 1}}, 'loop': true, 'nav': false, 'dots': true, 'autoplay': true, 'autoplayTimeout': 5000, 'autoplayHoverPause': true, 'autoplaySpeed': 500, 'dotsSpeed': 500}">
                                <div data-dynamic-height="['255px','255px','255px','750px','255px']"
                                    style="height: 255px;">
                                    <div class="custom-carousel-style-1-icon-wrapper mb-3">
                                        <img width="50" src="img/demos/law-firm-2/icons/icon-court.svg" alt="" data-icon
                                            data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                                    </div>
                                    <h4 class="alternative-font-4 text-color-dark font-weight-bold pb-1 mb-2">Get Legal
                                        Help</h4>
                                    <p class="font-weight-light text-color-dark mb-4">Our effort to reforms that
                                        strengthen the markets’ credibility of the business owners and do hassle free
                                        business from legal complexities.</p>
                                </div>
                                <div data-dynamic-height="['255px','255px','255px','750px','255px']"
                                    style="height: 255px;">
                                    <div class="custom-carousel-style-1-icon-wrapper mb-3">
                                        <img width="50" src="img/demos/law-firm-2/icons/icon-court.svg" alt="" data-icon
                                            data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                                    </div>
                                    <h4 class="alternative-font-4 text-color-dark font-weight-bold pb-1 mb-2">Get Legal
                                        Help</h4>
                                    <p class="font-weight-light text-color-dark mb-4">Our effort to reforms that
                                        strengthen the markets’ credibility of the business owners and do hassle free
                                        business from legal complexities.</p>
                                </div>
                                <div data-dynamic-height="['255px','255px','255px','750px','255px']"
                                    style="height: 255px;">
                                    <div class="custom-carousel-style-1-icon-wrapper mb-3">
                                        <img width="50" src="img/demos/law-firm-2/icons/icon-court.svg" alt="" data-icon
                                            data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                                    </div>
                                    <h4 class="alternative-font-4 text-color-dark font-weight-bold pb-1 mb-2">Get Legal
                                        Help</h4>
                                    <p class="font-weight-light text-color-dark mb-4">Our effort to reforms that
                                        strengthen the markets’ credibility of the business owners and do hassle free
                                        business from legal complexities.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="section section-height-3 bg-primary-darken border-0 m-0 appear-animation"
                data-appear-animation="fadeIn">
                <div class="container py-3">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-3 text-center text-xl-left mb-5 mb-xl-0">
                            <ul class="list list-unstyled d-lg-flex d-xl-block align-items-center justify-content-lg-center mb-0 appear-animation"
                                data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="300">
                                <li class="mb-lg-0 mb-xl-3">
                                    <i
                                        class="icons icon-phone text-color-primary text-5-5 position-relative top-2 mr-2"></i>
                                    <a href="#"
                                        class="text-color-light font-weight-bold text-decoration-none text-5 hover-effect-2">+88-02-55071634</a>
                                </li>
                                <li class="mx-lg-5 mx-xl-0 mb-3 mb-lg-0 mb-xl-3">
                                    <i
                                        class="icons icon-envelope text-color-primary text-6 position-relative top-6 mr-2"></i>
                                    <a href="mailto:info@trc.com.bd"
                                        class="text-color-light text-decoration-none text-4 hover-effect-2">info@trc.com.bd</a>
                                </li>
                                <li class="text-color-light text-4 mb-0">
                                    <i
                                        class="icons icon-calendar text-color-primary text-5 position-relative top-3 mr-2"></i>
                                    Mon - Fri 9am - 6pm
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-5 text-center mb-5 mb-xl-0">
                            <div class="appear-animation" data-appear-animation="zoomIn"
                                data-appear-animation-delay="500">
                                <h3
                                    class="alternative-font-4 text-color-light font-weight-semibold text-4 opacity-9 mb-1">
                                    ARE YOU LOOKING FOR</h3>
                            </div>
                            <h2 class="text-transform-none text-color-light font-weight-bold text-10 negative-ls-1 mb-2 appear-animation"
                                data-appear-animation="zoomIn" data-appear-animation-delay="750">Experienced Consultant?
                            </h2>
                            <div class="appear-animation" data-appear-animation="zoomIn"
                                data-appear-animation-delay="950">
                                <p class="text-color-light text-3-5 opacity-8 mb-0">Get a free initial consultation
                                    right now</p>
                            </div>
                        </div>
                        <div class="col-xl-3 text-center text-xl-right">
                            <a href="./contact.php" data-hash data-hash-offset="100"
                                class="btn btn-primary font-weight-bold btn-px-5 btn-py-3 appear-animation"
                                data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="300">REQUEST
                                CONSULTATION</a>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container py-5 my-5">
                <div class="row pb-2 mb-4">
                    <div class="col text-center">
                        <!-- <h3 class="alternative-font-4 text-color-primary font-weight-semibold text-4 mb-1 appear-animation"
                            data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="400">RECENT CASES
                        </h3> -->
                        <h2 class="text-transform-none text-color-dark font-weight-bold text-10 negative-ls-1 mb-2 appear-animation"
                            data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="600">TRC - Articles
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col appear-animation" data-appear-animation="fadeInUpShorterPlus"
                        data-appear-animation-delay="800">
                        <div class="custom-carousel-style-2 owl-carousel owl-theme dots-horizontal-center custom-dots-style-1 dots-dark mb-0"
                            data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 2}, '1200': {'items': 2}}, 'loop': true, 'nav': false, 'dots': true, 'margin': 25, 'stagePadding': 25, 'autoplay': false, 'autoplayTimeout': 7000}">
                            <div class="pb-5">
                                <a href="./article.php" class="text-decoration-none">
                                    <div class="card custom-card-style-2 border-0 border-radius-0">
                                        <div class="card-img-top">
                                            <img src="img/Alimijjaman.jpg" class="img-fluid" alt="" />
                                        </div>
                                        <div class="card-body">

                                            <h4 class="text-color-dark font-weight-medium text-5-5 mb-2"><em>ভ্যাট
                                                    ব্যবস্থাপনা ও দ্রব্য মূল্যের প্রভাব</em></h4>
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
                            <div class="pb-5">
                                <a href="./article.php" class="text-decoration-none">
                                    <div class="card custom-card-style-2 border-0 border-radius-0">
                                        <div class="card-img-top">
                                            <img src="img/Alimijjaman.jpg" class="img-fluid" alt="" />
                                        </div>
                                        <div class="card-body">

                                            <h4 class="text-color-dark font-weight-medium text-5-5 mb-2"><em>আবার ফিরে
                                                    এল উৎসে ভ্যাট কর্তন</em></h4>
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
                            <div class="pb-5">
                                <a href="./article.php" class="text-decoration-none">
                                    <div class="card custom-card-style-2 border-0 border-radius-0">
                                        <div class="card-img-top">
                                            <img src="img/Alimijjaman.jpg" class="img-fluid" alt="" />
                                        </div>
                                        <div class="card-body">

                                            <h4 class="text-color-dark font-weight-medium text-5-5 mb-2"><em>টিআরসি
                                                    রাজস্ব ভাবনার বাজেট পরিকল্পনা</em></h4>
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
                        </div>
                    </div>
                </div>
            </div>

            <!-- <section class="section parallax bg-transparent border-0 py-0 m-0" data-plugin-parallax
                data-image-src="img/164367824_258624772601591_5648816307643152375_n.jpg"
                data-plugin-options="{'speed': 1.5, 'scrollableParallax': true, 'scrollableParallaxMinWidth': 991, 'startOffset': 8, 'cssProperty': 'width', 'cssValueStart': 40, 'cssValueEnd': 100, 'cssValueUnit': 'vw'}">
                <div class="d-flex justify-content-center">
                    <div class="scrollable-parallax-wrapper overflow-hidden">
                        <div class="container custom-container-style-1 custom-container-position-1 py-5 my-5 mx-0">
                            <div class="row justify-content-center py-4">
                                <div class="col-lg-9 text-center">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->



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

    <script>
    $(document).ready(function() {
        $('#myForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "ajaxEmail.php",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#output').fadeIn().html(response);
                    // setTimeout(() => {
                    //     $('#output').fadeOut('slow');
                    // }, 2000);
                }
            });
        });
    })
    </script>

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