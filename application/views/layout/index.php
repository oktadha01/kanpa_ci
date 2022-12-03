<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">


    <title>

        <?php
        if (isset($_title)) {
            echo $_title;
        } else {
            echo 'Dashboard';
        }
        ?>
    </title>
    <style>
        .opacity-body {
            margin-top: 0;
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: 999;
            background: #0000008c;
        }
    </style>
    <!-- Favicons -->
    <link href="<?php echo base_url('assets'); ?>/img/favicon.png" rel="icon">

    <!-- Google Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Chathura" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url('assets'); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="<?php echo base_url('assets'); ?>/css/variables.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url('assets'); ?>/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/css/custom.css" rel="stylesheet">

</head>


<body>
    <?php $this->load->view('layout/alert/_alert') ?>
    <?php
    if (isset($_view_login) && !empty($_view_login)) {
        $this->load->view($_view_login);
    } else {

    ?>
        <?php
        include_once 'navbar.php';
        ?>
        <main id="page" class="ml-page">

            <?php
            if (isset($_view) && !empty($_view)) {
                $this->load->view($_view);
            }
            ?>

            <?php
            // include_once 'footer.php';
            ?>
        </main>
    <?php
    }
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/aos/aos.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/php-email-form/validate.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/select2-4.0.6-rc.1/dist/js/i18n/id.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/custom.js"></script>
    <!-- Template Main JS File -->
    <script src="<?php echo base_url('assets'); ?>/js/main.js"></script>

    <?php
    if (isset($_script) && !empty($_script)) {
        $this->load->view($_script);
    } ?>
    <?php if (!$this->session->userdata('is_login')) : ?>
        <script>
            // alert('ya');
            $('#page').removeClass('ml-page');
        </script>
    <?php endif ?>

    <script>
        $(document).ready(function() {
            var newURL = location.href.split("#")[0];
            window.history.pushState('object', document.title, newURL);
        });

        function footerToggle(footerBtn) {
            $(footerBtn).toggleClass("btnActive");
            $(footerBtn).next().toggleClass("active");
        }

        $(".sidebar").hover(function() {
            // alert('ya'); 
            openNav();
        }, function() {
            closeNav();
        });

        function openNav() {
            document.getElementById("page").style.marginLeft = "226px";
        }

        function closeNav() {
            document.getElementById("page").style.marginLeft = "74px";
        }
        $(function() {
            // this will get the full URL at the address bar
            var url = window.location.href;

            // passes on every "a" tag
            $("#navbar a").each(function() {
                // checks if its the same on the address bar
                if (url == (this.href)) {
                    $(this).closest(".sidebar__nav__link").addClass("sidebar-active");
                }
            });
        });
    </script>
</body>

</html>