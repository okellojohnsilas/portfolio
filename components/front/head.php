<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> <?php print $app_name; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta content="" name="keywords"> -->
    <!-- Essential SEO -->
    <meta name="description"
        content="Official portfolio of Okello Johnsilas — showcasing AI, ML, software engineering, and IT consulting projects.">
    <!-- Canonical -->
    <link rel="canonical" href="<?php print base_url(); ?>">
    <!-- Open Graph (for Facebook, LinkedIn, etc) -->
    <meta property="og:title" content="Okello Johnsilas | AI Engineer & IT Consultant">
    <meta property="og:description"
        content="Explore my projects, AI research, software development, and IT consulting services.">
    <meta property="og:image" content="<?php print base_url().'assets/assets/dist/front/src/img/seo/portfolio-twitter.png'; ?>">
    <!-- Replace with your real image -->
    <meta property="og:url" content="<?php print base_url(); ?>">
    <meta property="og:type" content="website">
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Okello Johnsilas | AI Engineer & IT Consultant">
    <meta name="twitter:description"
        content="Explore my projects, AI research, software development, and IT consulting services.">
    <meta name="twitter:image" content="<?php print base_url().'assets/assets/dist/front/src/img/seo/portfolio-twitter.png'; ?>">
    <!-- Replace with your real image -->
    <meta name="twitter:site" content="@johnsilasokello"> 
    <!-- Optional -->
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php print base_url().'assets/dist/front/src/img'; ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php print base_url().'assets/dist/front/src/img'; ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php print base_url().'assets/dist/front/src/img'; ?>/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="<?php print base_url().'assets/dist/front/src/'; ?>vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php print base_url().'assets/dist/front/src/'; ?>vendor/glightbox/css/glightbox.min.css"
        rel="stylesheet">
    <link href="<?php print base_url().'assets/dist/front/src/'; ?>vendor/swiper/swiper-bundle.min.css"
        rel="stylesheet">
    <!-- Main CSS File -->
    <link href="<?php print base_url().'assets/dist/front/src/'; ?>css/main.css" rel="stylesheet">
    <!-- H captcha -->
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Toastify CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- hcaptcha -->
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
    <style>
    .primary-color {
        color: #040b15;
    }

    .primary-bg-color {
        background-color: #040b15;
    }

    .primary-border-color {
        border-color: #040b15;
    }

    .primary-btn {
        color: white;
        background: #040b15;
        font-weight: 600;
    }

    .primary-btn:hover {
        color: white;
    }

    .secondary-color {
        color: #62b76d;
    }

    .secondary-bg-color {
        background-color: #62b76d;
    }

    .text-justify {
        text-align: justify;
    }

    canvas#cap {
        display: block;
        margin-bottom: 8px;
    }
    </style>
</head>