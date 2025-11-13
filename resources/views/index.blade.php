<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Nasgor Kebuli - Mas Ari</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('assets/img/logo.png') }}" rel="icon">
    <link href="{{ asset('assets/img/favicon.png') }}" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <style>
    :root {
        --default-color: #ffffff;
        --accent-color: #ffc107;
        --primary-color: #000000;
        --hover-color: #e0a800;
    }

    /* Menu Item Styles */
    .menu-item {
        position: relative;
        margin-bottom: 20px;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .menu-item:hover {
        transform: scale(1.02);
    }

    .menu-img {
        width: 100%;
        height: auto;
        max-height: 200px;
        object-fit: cover;
        cursor: pointer;
        transition: opacity 0.3s ease;
    }

    .menu-img:hover {
        opacity: 0.9;
    }

    .menu-content,
    .menu-ingredients {
        padding: 10px;
    }

    .menu-content a:active,
    .menu-content a:focus {
        color: var(--hover-color);
    }

    /* CTA Button Styles */
    .cta-btn {
        color: var(--default-color);
        border: 2px solid var(--accent-color);
        font-weight: 400;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: inline-block;
        padding: 8px 20px;
        border-radius: 50px;
        transition: 0.3s;
        flex-shrink: 0;
    }

    .cta-btn:hover,
    .cta-btn:active,
    .cta-btn:focus {
        background-color: var(--accent-color);
        color: var(--primary-color);
    }

    /* Fixed Buttons */
    .fixed-buttons {
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: flex;
        gap: 10px;
        z-index: 1000;
    }

    /* Modal Styles */
    .modal-content {
        border-radius: 12px;
        border: none;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        background: #fff;
    }

    .modal-header {
        background: var(--accent-color);
        color: var(--primary-color);
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        padding: 15px 20px;
        border-bottom: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-title {
        font-family: 'Poppins', sans-serif;
        font-size: 1.4rem;
        font-weight: 600;
    }

    .modal-body {
        padding: 20px;
    }

    .modal-dialog {
        max-width: 90%;
        margin: 1.5rem auto;
    }

    .modal-lg {
        max-width: 900px;
    }

    .modal-sm {
        max-width: 500px;
    }

    .modal-img {
        max-width: 100%;
        height: auto;
        max-height: 300px;
        object-fit: contain;
        border-radius: 8px;
    }

    /* Close button styles */
    .modal-header .btn-close {
        background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3E%3Cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707A1 1 0 01.293.293z'/%3E%3C/svg%3E") center / 1.2em auto no-repeat !important;
        opacity: 1;
    }

    /* Specific styling for cart and testimony modals */
    .testimony-modal .btn-close,
    .cart-modal .btn-close {
        background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3E%3Cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707A1 1 0 01.293.293z'/%3E%3C/svg%3E") center / 1.2em auto no-repeat !important;
        opacity: 1;
    }

    /* Menu Image Modal Specific Styles */
    .menu-image-modal .modal-header .btn-close {
        background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3E%3Cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707A1 1 0 01.293.293z'/%3E%3C/svg%3E") center / 1.2em auto no-repeat !important;
        opacity: 1;
    }

    /* Updated Cart Styles - Optimized for Mobile */
    .cart-container {
        max-width: 100%;
        padding: 15px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow-x: auto;
    }

    .cart-title {
        text-align: center;
        font-size: 1.4rem;
        margin-bottom: 15px;
        font-weight: 600;
        color: var(--primary-color);
        border-bottom: 2px solid var(--accent-color);
        padding-bottom: 8px;
    }

    /* Cart Grid Layout - Responsive */
    .cart-header,
    .cart-item,
    .cart-summary {
        display: grid;
        grid-template-columns: 3fr 1fr 1fr 1fr;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #e0e0e0;
        gap: 8px;
        color: var(--primary-color);
        font-size: 0.9rem;
        text-align: center;
    }

    .cart-header {
        font-weight: 600;
        background: rgba(0, 0, 0, 0.05);
        border-radius: 8px 8px 0 0;
        position: sticky;
        top: 0;
        z-index: 1;
    }

    .cart-item {
        transition: background-color 0.2s ease, transform 0.2s ease;
        touch-action: manipulation;
    }

    .cart-item:hover {
        background-color: rgba(0, 0, 0, 0.03);
        transform: translateY(-2px);
    }

    .cart-item img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #eee;
        transition: transform 0.3s ease;
    }

    .cart-item img:hover {
        transform: scale(1.05);
    }

    .item-info {
        display: flex;
        align-items: center;
        gap: 8px;
        text-align: left;
    }

    .item-info strong {
        font-size: 0.95rem;
        color: var(--primary-color);
    }

    .item-info p {
        margin: 0;
        font-size: 0.8rem;
        color: #666;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .quantity-form {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 4px;
    }

    .quantity-form input {
        width: 40px;
        padding: 4px;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 0.85rem;
        background: #fff;
        color: #000;
        -webkit-appearance: none;
        -moz-appearance: textfield;
    }

    .quantity-form button {
        width: 28px;
        height: 28px;
        border: none;
        background: var(--accent-color);
        color: var(--default-color);
        border-radius: 50%;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.2s ease;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        justify-content: center;
        touch-action: manipulation;
    }

    .quantity-form button:hover {
        background: var(--hover-color);
        transform: scale(1.1);
    }

    .quantity-form button:active {
        transform: scale(0.95);
    }

    .cart-summary {
        font-size: 1rem;
        font-weight: 600;
        background: rgba(0, 0, 0, 0.05);
        border-radius: 0 0 8px 8px;
        display: grid;
        grid-template-columns: 3fr 1fr;
        justify-content: end;
        padding: 12px;
        text-align: right;
    }

    .cart-actions {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
        margin-top: 15px;
    }

    .btn-primary {
        color: var(--primary-color);
        border: 2px solid var(--accent-color);
        font-weight: 500;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 8px 16px;
        border-radius: 50px;
        transition: all 0.3s ease;
        background: transparent;
        touch-action: manipulation;
    }

    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:focus {
        background-color: var(--accent-color);
        color: var(--primary-color);
        transform: scale(1.05);
    }

    /* Updated Tambah Menu Button with Logo */
    .btn-outline {
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: linear-gradient(45deg, var(--accent-color), var(--hover-color));
        color: var(--primary-color);
        border: 2px solid var(--accent-color);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        animation: pulse 2s infinite;
        width: 100%;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-outline::before {
        content: "\f067"; /* Bootstrap Icons plus icon */
        font-family: "bootstrap-icons";
        color: var(--primary-color);
    }

    .btn-outline:hover,
    .btn-outline:active,
    .btn-outline:focus {
        background: linear-gradient(45deg, #ffca2c, #f1b80b);
        color: var(--primary-color);
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }
        50% {
            transform: scale(1.02);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        100% {
            transform: scale(1);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }
    }

    /* Form Styles */
    .form-label {
        color: #000 !important;
        font-weight: 500;
        margin-bottom: 8px;
        display: block;
    }

    .form-control,
    .form-control-file {
        color: #000 !important;
        background-color: #fff;
        border: 1px solid #ced4da;
        padding: 8px;
        border-radius: 6px;
        width: 100%;
        margin-bottom: 12px;
    }

    .form-control:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 5px rgba(255, 193, 7, 0.3);
        outline: none;
    }

    /* Specific styling for cart modal inputs */
    #order-name,
    #order-address {
        color: var(--primary-color) !important;
    }

    /* Testimony Form Styles */
    .testimony-container {
        max-width: 100%;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .testimony-title {
        text-align: center;
        font-size: 1.8rem;
        margin-bottom: 20px;
        font-weight: 600;
        color: var(--primary-color);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        font-weight: 500;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
        display: block;
    }

    .rating {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 1rem;
    }

    .rating label {
        cursor: pointer;
    }

    .rating .star {
        color: #ccc;
        font-size: 1.8rem;
        transition: color 0.3s ease;
    }

    .rating input:checked + .star,
    .rating input:hover + .star,
    .rating input:checked ~ .star,
    .rating input:hover ~ .star {
        color: var(--accent-color);
    }

    /* Dropdown Menu Styles */
    .dropdown-menu {
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        max-height: 250px;
        overflow-y: auto;
        width: 100%;
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        padding: 8px;
        transition: background 0.3s ease;
        color: #000 !important;
    }

    .dropdown-item img {
        width: 35px;
        height: 35px;
        object-fit: cover;
        border-radius: 5px;
        margin-right: 8px;
    }

    .dropdown-item:hover {
        background: var(--accent-color);
        color: var(--primary-color) !important;
    }

    /* Menu Image Modal Styles */
    .menu-image-modal .modal-content {
        background: transparent;
        box-shadow: none;
        border: none;
    }

    .menu-image-modal .modal-header {
        background: transparent;
        border: none;
        padding: 8px 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .menu-image-modal .modal-title {
        font-family: 'Playfair Display', serif;
        color: #fff;
        font-size: 1.2rem;
    }

    .menu-image-modal .modal-body {
        background: transparent;
        padding: 10px;
        text-align: center;
    }

    /* Cart Modal Styles */
    .cart-modal .modal-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        font-weight: 600;
    }

    /* Testimony Modal Styles */
    .testimony-modal .modal-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        font-weight: 600;
    }

    /* Responsive Adjustments */
    @media (max-width: 1200px) {
        .modal-lg {
            max-width: 800px;
        }
    }

    @media (max-width: 992px) {
        .modal-lg {
            max-width: 90%;
        }

        .cart-header,
        .cart-item,
        .cart-summary {
            grid-template-columns: 2fr 1fr 1fr 1fr;
            font-size: 0.85rem;
            gap: 6px;
            text-align: center;
        }

        .item-info {
            text-align: left;
        }
    }

    @media (max-width: 768px) {
        .modal-lg {
            max-width: 95%;
            margin: 10px auto;
        }

        .cart-container {
            padding: 10px;
        }

        .cart-header,
        .cart-item {
            grid-template-columns: 2fr 1fr 1fr;
            grid-template-areas:
                "item price total"
                "item quantity total";
            gap: 6px;
            font-size: 0.8rem;
            text-align: center;
        }

        .cart-header div:nth-child(1),
        .cart-item .item-info {
            grid-area: item;
            text-align: left;
        }

        .cart-header div:nth-child(2),
        .cart-item div:nth-child(2) {
            grid-area: price;
        }

        .cart-header div:nth-child(3),
        .cart-item div:nth-child(3) {
            grid-area: quantity;
        }

        .cart-header div:nth-child(4),
        .cart-item div:nth-child(4) {
            grid-area: total;
        }

        .cart-summary {
            grid-template-columns: 1fr 1fr;
            font-size: 0.9rem;
            text-align: right;
        }

        .cart-item img {
            width: 40px;
            height: 40px;
        }

        .item-info {
            flex-direction: row;
            align-items: center;
        }

        .quantity-form input {
            width: 35px;
            font-size: 0.8rem;
        }

        .quantity-form button {
            width: 24px;
            height: 24px;
            font-size: 0.8rem;
        }

        .btn-outline {
            padding: 8px 16px;
            font-size: 0.9rem;
        }

        .cart-title {
            font-size: 1.2rem;
        }

        .cart-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            font-size: 0.85rem;
        }
    }

    @media (max-width: 576px) {
        .modal-lg {
            max-width: 98%;
            margin: 5px auto;
        }

        .modal-sm {
            max-width: 95%;
        }

        .cart-container {
            padding: 8px;
        }

        .cart-header,
        .cart-item {
            grid-template-columns: 2fr 1fr 1fr;
            grid-template-areas:
                "item price total"
                "item quantity total";
            font-size: 0.75rem;
            gap: 4px;
            text-align: center;
        }

        .cart-header div:nth-child(1),
        .cart-item .item-info {
            grid-area: item;
            text-align: left;
        }

        .cart-header div:nth-child(2),
        .cart-item div:nth-child(2) {
            grid-area: price;
        }

        .cart-header div:nth-child(3),
        .cart-item div:nth-child(3) {
            grid-area: quantity;
        }

        .cart-header div:nth-child(4),
        .cart-item div:nth-child(4) {
            grid-area: total;
        }

        .cart-summary {
            font-size: 0.85rem;
            padding: 10px;
            text-align: right;
        }

        .cart-title {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }

        .item-info strong {
            font-size: 0.85rem;
        }

        .item-info p {
            font-size: 0.7rem;
            -webkit-line-clamp: 1;
        }

        .quantity-form input {
            width: 30px;
            font-size: 0.75rem;
        }

        .quantity-form button {
            width: 22px;
            height: 22px;
            font-size: 0.75rem;
        }

        .btn-outline {
            padding: 6px 12px;
            font-size: 0.85rem;
        }

        .btn-primary {
            padding: 8px;
            font-size: 0.8rem;
        }

        .dropdown-menu {
            max-height: 200px;
        }

        .dropdown-item {
            font-size: 0.8rem;
            padding: 6px;
        }

        .dropdown-item img {
            width: 30px;
            height: 30px;
        }
    }

    /* Star Rating Styles */
    .star-rating .bi-star,
    .star-rating .bi-star-fill {
        color: var(--accent-color);
        cursor: pointer;
        font-size: 1.2rem;
        margin-right: 5px;
    }

    .star-rating .bi-star:hover {
        color: var(--hover-color);
    }
    </style>
</head>

<body class="index-page">
    <header id="header" class="header fixed-top">
        <div class="topbar d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-envelope d-flex align-items-center"><a
                            href="mailto:maulanafahmii916@gmail.com">maulanafahmii916@gmail.com</a></i>
                    <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 857-0261-0136</span></i>
                </div>
            </div>
        </div>
        <div class="branding d-flex align-items-center">
            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                    <h1 class="sitename">Nasgor Kebuli</h1>
                </a>
                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="#hero" class="active">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#menu">Menu</a></li>
                        <li><a href="#testimonials">Testimoni</a></li>
                        <li><a href="#contact">Kontak</a></li>
                    </ul>
                </nav>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                <a class="btn-book-a-table d-none d-xl-block" href="{{ route('login') }}">Log in</a>
            </div>
        </div>
    </header>

    <main class="main">
        <section id="hero" class="hero section dark-background">
            <img src="{{ asset('assets/img/bg.jpg') }}" alt="" data-aos="fade-in">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 d-flex flex-column align-items-center align-items-lg-start">
                        <h2 data-aos="fade-up" data-aos-delay="100">Welcome to <span>Our Store</span></h2>
                        <p data-aos="fade-up" data-aos-delay="200">Silahkan pilih menu yang anda inginkan</p>
                        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                            <a href="#menu" class="cta-btn">Our Menu</a>
                            <a href="{{ route('login') }}" class="cta-btn">Log in</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="about section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-lg-6 order-1 order-lg-2">
                        <img src="{{ asset('assets/img/bg2.jpeg') }}" class="img-fluid about-img" alt="">
                    </div>
                    <div class="col-lg-6 order-2 order-lg-1 content">
                        <h3>Nasi Goreng Kebuli</h3>
                        <p class="fst-italic">
                            Nasi Goreng Kebuli Mas Ari adalah sebuah usaha nasi gerobakan. Usaha ini didirikan pada
                            tahun 2022 di Kota Kudus. Berikut ada beberapa tempat atau lokasi cabang dari usaha ini
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>Pertama Berlokasi di Kaliwungu Depan lembaga
                                    kesejahteraan sosial anak (LKSA) Tunas Muria</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Lalu berikutnya berada di Gang Kradenan desa
                                    Demaan</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Untuk yang terakhir ini baru buka pada 8 January
                                    2025, Yang berlokasikan di Depan lembaga kesejahteraan sosial anak (LKSA)
                                    muhammadiyah samsah</span></li>
                        </ul>
                        <p>
                            Usaha ini didirikan oleh Muhammad asy'ari, seorang pengusaha asal Prambatan, Kudus. Makanan
                            utama yang disajikan oleh usaha ini adalah Nasi Kebuli yang memiliki beberapa menu seperti
                            Ayam, Telur & juga Sapi.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="menu" class="menu section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Menu</h2>
                <p>Berikut beberapa menu kami</p>
            </div>
            <div class="container isotope-layout" data-default-filter="*" data-layout="masonry"
                data-sort="original-order">
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul class="menu-filters isotope-filters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-makanan">Makanan</li>
                            <li data-filter=".filter-minuman">Minuman</li>
                        </ul>
                    </div>
                </div>
                <div class="row isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @use('Illuminate\Support\Str')
                    @foreach ($menus as $menu)
                        <div
                            class="col-lg-6 menu-item isotope-item filter-{{ str_replace(' ', '-', strtolower($menu->kategori)) }}">
                            @if ($menu->foto && file_exists(public_path('assets/img/menu/' . $menu->foto)))
                                <img src="{{ asset('assets/img/menu/' . $menu->foto . '?v=' . time()) }}"
                                    class="menu-img" alt="{{ $menu->nama }}" data-bs-toggle="modal"
                                    data-bs-target="#imageModal-{{ $loop->index }}" style="cursor: pointer;">
                            @else
                                <img src="{{ asset('assets/img/default-menu.jpg') }}"
                                    class="menu-img" alt="{{ $menu->nama }}" data-bs-toggle="modal"
                                    data-bs-target="#imageModal-{{ $loop->index }}" style="cursor: pointer;">
                            @endif
                            <div class="menu-content">
                                <a href="#">{{ $menu->nama }}</a>
                                <span>Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                            </div>
                            <div class="menu-ingredients">
                                {{ $menu->keterangan }}
                            </div>
                        </div>
                        <div class="modal fade menu-image-modal" id="imageModal-{{ $loop->index }}" tabindex="-1"
                            aria-labelledby="imageModalLabel-{{ $loop->index }}" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="imageModalLabel-{{ $loop->index }}">
                                            {{ $menu->nama }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @if ($menu->foto && file_exists(public_path('assets/img/menu/' . $menu->foto)))
                                            <img src="{{ asset('assets/img/menu/' . $menu->foto . '?v=' . time()) }}"
                                                class="modal-img img-fluid rounded" alt="{{ $menu->nama }}">
                                        @else
                                            <img src="{{ asset('assets/img/default-menu.jpg') }}"
                                                class="modal-img img-fluid rounded" alt="{{ $menu->nama }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if ($menus->isEmpty())
                        <p class="text-center">Menu tidak tersedia.</p>
                    @endif
                </div>
            </div>
        </section>

        <section id="testimonials" class="testimonials section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimoni</h2>
                <p>Berikut ulasan tentang toko kami</p>
            </div>
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper init-swiper" data-speed="600" data-delay="5000"
                    data-breakpoints="{ '320': { 'slidesPerView': 1, 'spaceBetween': 40 }, '1200': { 'slidesPerView': 3, 'spaceBetween': 20 } }">
                    <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 600,
                            "autoplay": { "delay": 5000 },
                            "slidesPerView": "auto",
                            "pagination": { "el": ".swiper-pagination", "type": "bullets", "clickable": true },
                            "breakpoints": { "320": { "slidesPerView": 1, "spaceBetween": 40 }, "1200": { "slidesPerView": 3, "spaceBetween": 20 } }
                        }
                    </script>
                    <div class="swiper-wrapper" id="testimonials-container">
                        @foreach ($testimonies as $testimony)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <p><i
                                            class="bi bi-quote quote-icon-left"></i><span>{{ $testimony->keterangan }}</span><i
                                            class="bi bi-quote quote-icon-right"></i></p>
                                    @if ($testimony->foto && file_exists(public_path('assets/img/testimonies/' . $testimony->foto)))
                                        <img src="{{ asset('assets/img/testimonies/' . $testimony->foto . '?v=' . time()) }}"
                                            class="testimonial-img" alt="{{ $testimony->nama }}">
                                    @else
                                        <img src="{{ asset('assets/img/default-testimony.jpg') }}"
                                            class="testimonial-img" alt="{{ $testimony->nama }}">
                                    @endif
                                    <h3>{{ $testimony->nama }}</h3>
                                    <h4>{{ $testimony->pekerjaan }}</h4>
                                    @if ($testimony->rating)
                                        <div class="star-rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i
                                                    class="bi bi-star{{ $i <= $testimony->rating ? '-fill' : '' }}"></i>
                                            @endfor
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="text-center mt-4" data-aos="fade-up" data-aos-delay="200">
                <a href="#" class="cta-btn" data-bs-toggle="modal" data-bs-target="#testimonyModal">
                    <i class="bi bi-chat-square-text-fill me-2"></i> + Testimoni Anda
                </a>
            </div>

            <div class="modal fade testimony-modal" id="testimonyModal" tabindex="-1" aria-labelledby="testimonyModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="testimonyModalLabel">Beri Testimoni Anda</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="testimony-container">
                                <h2 class="testimony-title">Beri Testimoni Anda</h2>
                                <form action="/testimoni/store" method="POST" enctype="multipart/form-data"
                                    id="testimonyForm">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="testimony-name">Nama</label>
                                        <input type="text" class="form-control" id="testimony-name" name="nama"
                                            placeholder="Silakan masukkan nama lengkap Anda" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="testimony-job">Pekerjaan</label>
                                        <input type="text" class="form-control" id="testimony-job" name="pekerjaan"
                                            placeholder="Silakan masukkan pekerjaan atau profesi Anda" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Rating</label>
                                        <div class="rating d-flex justify-content-center">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <label>
                                                    <input type="radio" name="rating" value="{{ $i }}" required hidden>
                                                    <span class="star">★</span>
                                                </label>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="testimony-text">Ulasan</label>
                                        <textarea class="form-control" id="testimony-text" name="keterangan" rows="4"
                                            placeholder="Silakan tulis pengalaman atau pendapat Anda tentang kami" required></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="testimony-photo">Foto (opsional)</label>
                                        <input type="file" class="form-control-file" id="testimony-photo" name="foto"
                                            accept="image/*">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn-primary">Kirim Ulasan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="contact section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Kontak</h2>
                <p>Kontak kami</p>
            </div>
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-lg-4">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Lokasi</h3>
                                <p>6Q3X+RPJ, Kedungdowo, Kec. Kaliwungu, Kabupaten Kudus</p>
                            </div>
                        </div>
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-alarm"></i>
                            <div>
                                <h3>Sabtu - Kamis</h3>
                                <p>Everyday :<br>05:30 AM - 08:30 PM</p>
                            </div>
                        </div>
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Telephone</h3>
                                <p>+62 857-0261-0136</p>
                            </div>
                        </div>
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email</h3>
                                <p>maulanafahmii916@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <form action="{{ route('kontak.store') }}" method="post" class="php-email-form"
                            data-aos="fade-up" data-aos-delay="200">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                    <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
                                        <iframe style="border:0; width: 100%; height: 400px;"
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.789824835424!2d110.79670267378883!3d-6.795407966457407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70dcacc8b5e96f%3A0xcad5c210126d00af!2sAsrama%20Pendidikan%20Tunas%20Muria!5e0!3m2!1sid!2sid!4v1738069390937!5m2!1sid!2sid"
                                            width="600" height="450" style="border:0;" allowfullscreen=""
                                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer id="footer" class="footer">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                        <span class="sitename">Kebuli Mas Ari</span>
                    </a>
                    <div class="social-links d-flex mt-4">
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Restaurantly</strong> <span>All Rights
                    Reserved</span></p>
            <div class="credits">
                Designed by <a href="https://www.instagram.com/fahmii_mlf/profilecard/?igsh=cmxyNGxoYnFxYnBq">Maulana
                    Fahmi</a>
            </div>
        </div>
    </footer>

    <div class="fixed-buttons">
        <a href="#" class="cta-btn" data-bs-toggle="modal" data-bs-target="#orderModal">
            <i class="bi bi-cart-fill me-2"></i> Pesan Sekarang
        </a>
    </div>

    <div class="modal fade cart-modal" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Keranjang Belanja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="orderForm" action="javascript:void(0);">
                        @csrf
                        <div class="mb-3">
                            <label for="order-name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="order-name" name="nama"
                                placeholder="Silakan masukkan nama lengkap Anda" required>
                        </div>
                        <div class="mb-3">
                            <label for="order-address" class="form-label">Alamat Pengiriman</label>
                            <textarea class="form-control" id="order-address" name="alamat"
                                placeholder="Silakan masukkan alamat lengkap Anda" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tambah Menu</label>
                            <div class="dropdown">
                                <button class="btn btn-outline w-100" type="button"
                                    id="menuDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Tambah Menu
                                </button>
                                <ul class="dropdown-menu w-100" aria-labelledby="menuDropdown">
                                    @foreach ($menus as $menu)
                                        <li>
                                            <a class="dropdown-item add-to-cart" href="#"
                                                data-id="{{ $menu->id }}"
                                                data-name="{{ $menu->nama }}"
                                                data-price="{{ $menu->harga }}"
                                                data-image="{{ $menu->foto && file_exists(public_path('assets/img/menu/' . $menu->foto)) ? asset('assets/img/menu/' . $menu->foto . '?v=' . time()) : asset('assets/img/default-menu.jpg') }}">
                                                <img src="{{ $menu->foto && file_exists(public_path('assets/img/menu/' . $menu->foto)) ? asset('assets/img/menu/' . $menu->foto . '?v=' . time()) : asset('assets/img/default-menu.jpg') }}"
                                                    alt="{{ $menu->nama }}">
                                                {{ $menu->nama }} - Rp {{ number_format($menu->harga, 0, ',', '.') }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="cart-container">
                            <h2 class="cart-title">Detail Pesanan</h2>
                            <div id="cart-items">
                                <div class="cart-header">
                                    <div>Item</div>
                                    <div>Harga</div>
                                    <div>Jumlah</div>
                                    <div>Total</div>
                                </div>
                            </div>
                            <div id="cart-summary" class="cart-summary"></div>
                            <div class="cart-actions">
                                <button type="submit" class="btn-primary">Lanjut Checkout</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="preloader"></div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/main.js') }}" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Mobile Menu Toggle
            function toggleMenu() {
                const navMenu = document.getElementById('navmenu');
                navMenu.classList.toggle('active');
            }

            // Cart Management
            let cart = [];

            // Menu data from PHP
            const menuData = [
                @foreach ($menus as $menu)
                {
                    id: {{ $menu->id }},
                    name: "{{ $menu->nama }}",
                    price: {{ $menu->harga }},
                    image: "{{ $menu->foto && file_exists(public_path('assets/img/menu/' . $menu->foto)) ? asset('assets/img/menu/' . $menu->foto . '?v=' . time()) : asset('assets/img/default-menu.jpg') }}",
                    description: "{{ $menu->keterangan }}"
                },
                @endforeach
            ];

            // Add to cart
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const item = {
                        id: parseInt(this.dataset.id),
                        name: this.dataset.name,
                        price: parseInt(this.dataset.price),
                        image: this.dataset.image,
                        quantity: 1,
                        description: menuData.find(menu => menu.id === parseInt(this.dataset.id)).description
                    };

                    const existingItem = cart.find(cartItem => cartItem.id === item.id);
                    if (existingItem) {
                        existingItem.quantity += 1;
                    } else {
                        cart.push(item);
                    }

                    updateCartDisplay();
                });
            });

            // Update cart display
            function updateCartDisplay() {
                const cartItemsContainer = document.getElementById('cart-items');
                const cartSummaryContainer = document.getElementById('cart-summary');
                cartItemsContainer.innerHTML = '<div class="cart-header"><div>Item</div><div>Harga</div><div>Jumlah</div><div>Total</div></div>';
                let total = 0;

                if (cart.length === 0) {
                    cartItemsContainer.innerHTML += '<div class="cart-item text-center py-4">Tidak ada item dalam keranjang</div>';
                } else {
                    cart.forEach((item, index) => {
                        const itemTotal = item.price * item.quantity;
                        total += itemTotal;
                        const cartItem = document.createElement('div');
                        cartItem.className = 'cart-item';
                        cartItem.innerHTML = `
                            <div class="item-info">
                                <img src="${item.image}" alt="${item.name}">
                                <div>
                                    <strong>${item.name}</strong>
                                    <p>${item.description}</p>
                                </div>
                            </div>
                            <div>Rp ${item.price.toLocaleString('id-ID')}</div>
                            <div>
                                <div class="quantity-form">
                                    <button class="decrease-quantity" data-index="${index}">-</button>
                                    <input type="number" value="${item.quantity}" min="1" readonly>
                                    <button class="increase-quantity" data-index="${index}">+</button>
                                </div>
                            </div>
                            <div>Rp ${itemTotal.toLocaleString('id-ID')}</div>
                        `;
                        cartItemsContainer.appendChild(cartItem);
                    });

                    cartSummaryContainer.innerHTML = `
                        <div><strong>Total:</strong></div>
                        <div><strong>Rp ${total.toLocaleString('id-ID')}</strong></div>
                    `;
                }

                // Add event listeners for quantity buttons
                document.querySelectorAll('.increase-quantity').forEach(button => {
                    button.addEventListener('click', function () {
                        const index = parseInt(this.dataset.index);
                        cart[index].quantity += 1;
                        updateCartDisplay();
                    });
                });

                document.querySelectorAll('.decrease-quantity').forEach(button => {
                    button.addEventListener('click', function () {
                        const index = parseInt(this.dataset.index);
                        if (cart[index].quantity > 1) {
                            cart[index].quantity -= 1;
                            updateCartDisplay();
                        } else {
                            cart.splice(index, 1);
                            updateCartDisplay();
                        }
                    });
                });
            }

            document.getElementById('orderForm').addEventListener('submit', function (e) {
                e.preventDefault();
                if (cart.length === 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Keranjang Kosong',
                        text: 'Silakan tambahkan item ke keranjang sebelum checkout.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#dc3545'
                    });
                    return;
                }

                const name = document.getElementById('order-name').value;
                const address = document.getElementById('order-address').value;
                let total = 0;
                let orderDetails = `Pesanan dari: ${name}\nAlamat: ${address}\n\nDetail Pesanan:\n`;
                cart.forEach(item => {
                    const itemTotal = item.price * item.quantity;
                    total += itemTotal;
                    orderDetails += `${item.name} x${item.quantity} = Rp ${itemTotal.toLocaleString('id-ID')}\n`;
                });
                orderDetails += `\nTotal: Rp ${total.toLocaleString('id-ID')}`;

                const phoneNumber = '6285712432595';
                const encodedMessage = encodeURIComponent(orderDetails);
                const whatsappLink = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;
                window.open(whatsappLink, '_blank');

                // Reset cart and form
                cart = [];
                updateCartDisplay();
                this.reset();
                $('#orderModal').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Pesanan Berhasil!',
                    text: 'Pesanan Anda telah dikirim melalui WhatsApp.',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#28a745'
                });
            });

            // Testimony Form Handling
            document.querySelectorAll('.rating label').forEach(label => {
                label.addEventListener('click', function () {
                    document.querySelectorAll('.rating .star').forEach(star => star.style.color = '#ccc');
                    this.querySelector('.star').style.color = 'var(--accent-color)';
                    let current = this;
                    while (current) {
                        current.querySelector('.star').style.color = 'var(--accent-color)';
                        current = current.previousElementSibling;
                    }
                    this.querySelector('input').checked = true;
                });
            });

            const testimonyForm = document.getElementById('testimonyForm');

            $('#testimonyModal').on('shown.bs.modal', function () {
                testimonyForm.reset();
                document.querySelectorAll('.rating .star').forEach(star => star.style.color = '#ccc');
            });

            testimonyForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const rating = document.querySelector('input[name="rating"]:checked');
                if (!rating) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Rating Belum Dipilih',
                        text: 'Silakan pilih rating sebelum mengirim testimoni.',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#dc3545'
                    });
                    return;
                }

                const formData = new FormData(this);
                const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                })
                    .then(response => {
                        if (!response.ok) {
                            return response.text().then(text => {
                                throw new Error(`Gagal menyimpan: ${response.status} ${response.statusText} - ${text}`);
                            });
                        }
                        return response.text().then(text => {
                            try {
                                return JSON.parse(text);
                            } catch (e) {
                                if (response.ok) {
                                    return { success: true, message: 'Testimoni berhasil dikirim dan menunggu persetujuan.' };
                                }
                                throw new Error('Respons server bukan JSON yang valid: ' + text);
                            }
                        });
                    })
                    .then(data => {
                        if (data.success || response.ok) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Testimoni Berhasil Dikirim!',
                                text: data.message || 'Testimoni Anda telah dikirim dan menunggu persetujuan admin.',
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#28a745',
                                timer: 5000,
                                timerProgressBar: true,
                                showClass: {
                                    popup: 'animate__animated animate__fadeInDown'
                                },
                                hideClass: {
                                    popup: 'animate__animated animate__fadeOutUp'
                                }
                            });

                            this.reset();
                            document.querySelectorAll('.rating .star').forEach(star => star.style.color = '#ccc');
                            $('#testimonyModal').modal('hide');

                            if (data.testimony && data.testimony.status === 'approved') {
                                const testimonialsContainer = document.getElementById('testimonials-container');
                                const newTestimony = document.createElement('div');
                                newTestimony.className = 'swiper-slide';
                                newTestimony.innerHTML = `
                                    <div class="testimonial-item">
                                        <p><i class="bi bi-quote quote-icon-left"></i><span>${data.testimony.keterangan}</span><i class="bi bi-quote quote-icon-right"></i></p>
                                        <img src="${data.testimony.foto ? '/assets/img/testimonies/' + data.testimony.foto + '?v=' + new Date().getTime() : '/assets/img/default-testimony.jpg'}" class="testimonial-img" alt="${data.testimony.nama}">
                                        <h3>${data.testimony.nama}</h3>
                                        <h4>${data.testimony.pekerjaan}</h4>
                                        <div class="star-rating">${[...Array(5)].map((_, i) => `<i class="bi bi-star${(i + 1) <= data.testimony.rating ? '-fill' : ''}"></i>`).join('')}</div>
                                    </div>
                                `;
                                testimonialsContainer.appendChild(newTestimony);
                                if (window.swiper) {
                                    window.swiper.update();
                                    window.swiper.slideTo(0);
                                }
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal Menyimpan',
                                text: data.message || 'Gagal menyimpan testimoni.',
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#dc3545'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: 'Terjadi kesalahan saat mengirim testimoni. Silakan coba lagi.',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#dc3545'
                        });
                    });
            });

            // Modal Image Handling
            document.querySelectorAll('.menu-image-modal').forEach(modal => {
                modal.addEventListener('click', function (e) {
                    if (e.target === this) {
                        $(this).modal('hide');
                    }
                });
            });
        });
    </script>
</body>

</html>
