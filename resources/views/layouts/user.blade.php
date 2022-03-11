<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    @include('includes.styles_user')
    <style>
        html {
            scroll-behavior: smooth;
        }

        .header_section {
            background-color: #002C3E
        }

        .custom_nav-container .navbar-nav .nav-item .nav-link {
            color: white;
        }

        .slider_section .detail-box a {
            background-color: #002C3E;
            border: 1px solid #002C3E;
        }

        .btn1:hover {
            color: #002C3E !important;
        }

        li.active {
            background-color: #002C3E !important;
        }

        .custom_nav-container .navbar-nav .nav-item .nav-link svg {
            fill: white !important;
            /*color: #0c0c0c !important; */
        }

        .product_section .btn-box a {
            background-color: #002C3E !important;
            border: 1px solid #002C3E;
            color: white !important;
        }

        .heading_container h2::after {
            background: #002C3E !important;
        }

        .footer_section {
            padding-top: 25px;
        }

        footer {
            padding: 90px 0 10px;
        }

        .btn-box a:hover {
            background-color: transparent !important;
            color: #002C3E !important;
        }

    </style>
</head>

<body>
    @include('includes.navbar_user')
    @yield('content')
    @include('includes.footer_user')
    @include('includes.scripts_user')
</body>

</html>
