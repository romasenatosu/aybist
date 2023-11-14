<?php
    $page = htmlspecialchars($_GET['page'] ?? '');
?>

<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="?page=home" class="text-nowrap logo-img">
                <img src="assets/images/logos/logo.png" class="img-fluid">
            </a>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8 text-muted"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
                <li class="sidebar-item <?= ($page == 'home') ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= ($page == 'home') ? 'active' : '' ?>">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Ana Sayfa</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($page == 'dukkanlar') ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= ($page == 'dukkanlar') ? 'active' : '' ?>" href="?page=dukkanlar">
                        <span>
                            <i class="ti ti-trademark"></i>
                        </span>
                        <span class="hide-menu">Dükkanlar</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($page == 'bloklar') ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= ($page == 'bloklar') ? 'active' : '' ?>" href="?page=bloklar">
                        <span>
                            <i class="ti ti-home-cog"></i>
                        </span>
                        <span class="hide-menu">Bloklar</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($page == 'gelir-yonetimi') ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= ($page == 'gelir-yonetimi') ? 'active' : '' ?>" href="?page=gelir-yonetimi">
                        <span>
                            <i class="ti ti-receipt-tax"></i>
                        </span>
                        <span class="hide-menu">Gelir Yönetimi</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($page == 'gider-yonetimi') ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= ($page == 'gider-yonetimi') ? 'active' : '' ?>" href="?page=gider-yonetimi">
                        <span>
                            <i class="ti ti-coin"></i>
                        </span>
                        <span class="hide-menu">Gider Yönetimi</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($page == 'uye-yonetimi') ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= ($page == 'uye-yonetimi') ? 'active' : '' ?>" href="?page=uye-yonetimi">
                        <span>
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">Üye Yönetimi</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($page == 'ucretler') ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= ($page == 'ucretler') ? 'active' : '' ?>" href="?page=ucretler">
                        <span>
                            <i class="ti ti-cash-banknote"></i>
                        </span>
                        <span class="hide-menu">Ücretler</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($page == 'raporlar') ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= ($page == 'raporlar') ? 'active' : '' ?>" href="?page=raporlar">
                        <span>
                            <i class="ti ti-file-description"></i>
                        </span>
                        <span class="hide-menu">Raporlar</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($page == 'ilanlar') ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= ($page == 'ilanlar') ? 'active' : '' ?>" href="?page=ilanlar">
                        <span>
                            <i class="ti ti-speakerphone"></i>
                        </span>
                        <span class="hide-menu">İlanlar</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($page == 'mevzuatlar') ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= ($page == 'mevzuatlar') ? 'active' : '' ?>" href="?page=mevzuatlar">
                        <span>
                            <i class="ti ti-gavel"></i>
                        </span>
                        <span class="hide-menu">Mevzuatlar</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($page == 'duyurular') ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= ($page == 'duyurular') ? 'active' : '' ?>" href="?page=duyurular">
                        <span>
                            <i class="ti ti-bell-filled"></i>
                        </span>
                        <span class="hide-menu">Duyurular</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($page == 'belge-yonetimi') ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= ($page == 'belge-yonetimi') ? 'active' : '' ?>" href="?page=belge-yonetimi">
                        <span>
                            <i class="ti ti-book"></i>
                        </span>
                        <span class="hide-menu">Belge Yönetimi</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($page == 'talepler') ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= ($page == 'talepler') ? 'active' : '' ?>" href="?page=talepler">
                        <span>
                            <i class="ti ti-user-question"></i>
                        </span>
                        <span class="hide-menu">Talepler</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($page == 'mesajlar') ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= ($page == 'mesajlar') ? 'active' : '' ?>" href="?page=mesajlar">
                        <span>
                            <i class="ti ti-message-2-check"></i>
                        </span>
                        <span class="hide-menu">Mesajlar</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($page == 'sms-gonder') ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= ($page == 'sms-gonder') ? 'active' : '' ?>" href="?page=sms-gonder">
                        <span>
                            <i class="ti ti-message-2-up"></i>
                        </span>
                        <span class="hide-menu">SMS Gönder</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($page == 'mail-gonder') ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= ($page == 'mail-gonder') ? 'active' : '' ?>" href="?page=mail-gonder">
                        <span>
                            <i class="ti ti-mail"></i>
                        </span>
                        <span class="hide-menu">Mail Gönder</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($page == 'ayarlar') ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= ($page == 'ayarlar') ? 'active' : '' ?>" href="?page=ayarlar">
                        <span>
                            <i class="ti ti-settings-filled"></i>
                        </span>
                        <span class="hide-menu">Ayarlar</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($page == 'logout') ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= ($page == 'logout') ? 'active' : '' ?>" href="?page=logout">
                        <span>
                            <i class="ti ti-logout"></i>
                        </span>
                        <span class="hide-menu">Çıkış</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
            <div class="hstack gap-3">
                <div class="john-img">
                    <img src="assets/images/profile/user-1.jpg" class="rounded-circle" width="40" height="40" alt="">
                </div>
                <div class="john-title">
                    <h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
                    <span class="fs-2 text-dark">Designer</span>
                </div>
                <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button"
                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                    <i class="ti ti-power fs-6"></i>
                </button>
            </div>
        </div>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
<!--  Main wrapper -->
<div class="body-wrapper">
    <!--  Header Start -->
    <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse"
                        href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="ti ti-search"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav quick-links d-none d-lg-flex">
                <li class="nav-item dropdown hover-dd d-none d-lg-block">
                    <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Apps<span class="mt-1"><i
                                class="ti ti-chevron-down"></i></span></a>
                    <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                        <div class="row">
                            <div class="col-8">
                                <div class=" ps-7 pt-7">
                                    <div class="border-bottom">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="position-relative">
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                                        <div
                                                            class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="assets/images/svgs/icon-dd-chat.svg" alt=""
                                                                class="img-fluid" width="24" height="24">
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold bg-hover-primary">Chat
                                                                Application</h6>
                                                            <span class="fs-2 d-block text-dark">New messages
                                                                arrived</span>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                                        <div
                                                            class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="assets/images/svgs/icon-dd-invoice.svg" alt=""
                                                                class="img-fluid" width="24" height="24">
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold bg-hover-primary">Invoice App
                                                            </h6>
                                                            <span class="fs-2 d-block text-dark">Get latest
                                                                invoice</span>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                                        <div
                                                            class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="assets/images/svgs/icon-dd-mobile.svg" alt=""
                                                                class="img-fluid" width="24" height="24">
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold bg-hover-primary">Contact
                                                                Application</h6>
                                                            <span class="fs-2 d-block text-dark">2 Unsaved
                                                                Contacts</span>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                                        <div
                                                            class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="assets/images/svgs/icon-dd-message-box.svg" alt=""
                                                                class="img-fluid" width="24" height="24">
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold bg-hover-primary">Email App</h6>
                                                            <span class="fs-2 d-block text-dark">Get new emails</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="position-relative">
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                                        <div
                                                            class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="assets/images/svgs/icon-dd-cart.svg" alt=""
                                                                class="img-fluid" width="24" height="24">
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold bg-hover-primary">User Profile
                                                            </h6>
                                                            <span class="fs-2 d-block text-dark">learn more
                                                                information</span>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                                        <div
                                                            class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="assets/images/svgs/icon-dd-date.svg" alt=""
                                                                class="img-fluid" width="24" height="24">
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold bg-hover-primary">Calendar App
                                                            </h6>
                                                            <span class="fs-2 d-block text-dark">Get dates</span>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                                        <div
                                                            class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="assets/images/svgs/icon-dd-lifebuoy.svg" alt=""
                                                                class="img-fluid" width="24" height="24">
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold bg-hover-primary">Contact List
                                                                Table</h6>
                                                            <span class="fs-2 d-block text-dark">Add new contact</span>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                                        <div
                                                            class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="assets/images/svgs/icon-dd-application.svg" alt=""
                                                                class="img-fluid" width="24" height="24">
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold bg-hover-primary">Notes
                                                                Application</h6>
                                                            <span class="fs-2 d-block text-dark">To-do and Daily
                                                                tasks</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center py-3">
                                        <div class="col-8">
                                            <a class="fw-semibold text-dark d-flex align-items-center lh-1 text-decoration-none"
                                                href="#"><i class="ti ti-help fs-6 me-2"></i>Frequently Asked
                                                Questions</a>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-end pe-4">
                                                <button class="btn btn-primary">Check</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 ms-n4">
                                <div class="position-relative p-7 border-start h-100">
                                    <h5 class="fs-5 mb-9 fw-semibold">Quick Links</h5>
                                    <ul class="">
                                        <li class="mb-3">
                                            <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                                                href="page-pricing.html">Pricing Page</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                                                href="authentication-login.html">Authentication Design</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                                                href="authentication-register.html">Register Now</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                                                href="authentication-error.html">404 Error Page</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                                                href="app-notes.html">Notes App</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                                                href="page-user-profile.html">User Application</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                                                href="page-account-settings.html">Account Settings</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="#">Chat</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="#">Calendar</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="#">Email</a>
                </li>
            </ul>
            <div class="d-block d-lg-none">
                <img src="assets/images/logos/logo.png" class="img-fluid">
            </div>
            <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="p-2">
                    <i class="ti ti-dots fs-7"></i>
                </span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="d-flex align-items-center justify-content-between">
                    <a href="javascript:void(0)"
                        class="nav-link d-flex d-lg-none align-items-center justify-content-center" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar">
                        <i class="ti ti-align-justified fs-7"></i>
                    </a>
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                data-bs-toggle="dropdown">
                                <img src="assets/images/svgs/icon-flag-en.svg" alt=""
                                    class="rounded-circle object-fit-cover round-20">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up">
                                <div class="message-body" data-simplebar>
                                    <a href="javascript:void(0)"
                                        class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                        <div class="position-relative">
                                            <img src="assets/images/svgs/icon-flag-en.svg" alt=""
                                                class="rounded-circle object-fit-cover round-20">
                                        </div>
                                        <p class="mb-0 fs-3">English (UK)</p>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                        <div class="position-relative">
                                            <img src="assets/images/svgs/icon-flag-cn.svg" alt=""
                                                class="rounded-circle object-fit-cover round-20">
                                        </div>
                                        <p class="mb-0 fs-3">中国人 (Chinese)</p>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                        <div class="position-relative">
                                            <img src="assets/images/svgs/icon-flag-fr.svg" alt=""
                                                class="rounded-circle object-fit-cover round-20">
                                        </div>
                                        <p class="mb-0 fs-3">français (French)</p>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                        <div class="position-relative">
                                            <img src="assets/images/svgs/icon-flag-sa.svg" alt=""
                                                class="rounded-circle object-fit-cover round-20">
                                        </div>
                                        <p class="mb-0 fs-3">عربي (Arabic)</p>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link notify-badge nav-icon-hover" href="javascript:void(0)"
                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
                                <i class="ti ti-basket"></i>
                                <span class="badge rounded-pill bg-danger fs-2">2</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                data-bs-toggle="dropdown">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up">
                                <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                    <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                    <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
                                </div>
                                <div class="message-body" data-simplebar>
                                    <a href="javascript:void(0)"
                                        class="py-6 px-7 d-flex align-items-center dropdown-item">
                                        <span class="me-3">
                                            <img src="assets/images/profile/user-1.jpg" alt="user"
                                                class="rounded-circle" width="48" height="48" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle">
                                            <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                                            <span class="d-block">Congratulate him</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="py-6 px-7 d-flex align-items-center dropdown-item">
                                        <span class="me-3">
                                            <img src="assets/images/profile/user-2.jpg" alt="user"
                                                class="rounded-circle" width="48" height="48" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle">
                                            <h6 class="mb-1 fw-semibold">New message</h6>
                                            <span class="d-block">Salma sent you new message</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="py-6 px-7 d-flex align-items-center dropdown-item">
                                        <span class="me-3">
                                            <img src="assets/images/profile/user-3.jpg" alt="user"
                                                class="rounded-circle" width="48" height="48" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle">
                                            <h6 class="mb-1 fw-semibold">Bianca sent payment</h6>
                                            <span class="d-block">Check your earnings</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="py-6 px-7 d-flex align-items-center dropdown-item">
                                        <span class="me-3">
                                            <img src="assets/images/profile/user-4.jpg" alt="user"
                                                class="rounded-circle" width="48" height="48" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle">
                                            <h6 class="mb-1 fw-semibold">Jolly completed tasks</h6>
                                            <span class="d-block">Assign her new tasks</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="py-6 px-7 d-flex align-items-center dropdown-item">
                                        <span class="me-3">
                                            <img src="assets/images/profile/user-5.jpg" alt="user"
                                                class="rounded-circle" width="48" height="48" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle">
                                            <h6 class="mb-1 fw-semibold">John received payment</h6>
                                            <span class="d-block">$230 deducted from account</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="py-6 px-7 d-flex align-items-center dropdown-item">
                                        <span class="me-3">
                                            <img src="assets/images/profile/user-1.jpg" alt="user"
                                                class="rounded-circle" width="48" height="48" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle">
                                            <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                                            <span class="d-block">Congratulate him</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="py-6 px-7 mb-1">
                                    <button class="btn btn-outline-primary w-100"> See All Notifications </button>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown">
                                <div class="d-flex align-items-center">
                                    <div class="user-profile-img">
                                        <img src="assets/images/profile/user-1.jpg" class="rounded-circle" width="35"
                                            height="35" alt="" />
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up">
                                <div class="profile-dropdown position-relative" data-simplebar>
                                    <div class="py-3 px-7 pb-0">
                                        <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                    </div>
                                    <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                        <img src="assets/images/profile/user-1.jpg" class="rounded-circle" width="80"
                                            height="80" alt="" />
                                        <div class="ms-3">
                                            <h5 class="mb-1 fs-3">Mathew Anderson</h5>
                                            <span class="mb-1 d-block text-dark">Designer</span>
                                            <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                                <i class="ti ti-mail fs-4"></i> info@modernize.com
                                            </p>
                                        </div>
                                    </div>
                                    <div class="message-body">
                                        <a href="#" class="py-8 px-7 mt-8 d-flex align-items-center">
                                            <span
                                                class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                <img src="assets/images/svgs/icon-account.svg" alt="" width="24"
                                                    height="24">
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 bg-hover-primary fw-semibold"> My Profile </h6>
                                                <span class="d-block text-dark">Account Settings</span>
                                            </div>
                                        </a>
                                        <a href="#" class="py-8 px-7 d-flex align-items-center">
                                            <span
                                                class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                <img src="assets/images/svgs/icon-inbox.svg" alt="" width="24"
                                                    height="24">
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 bg-hover-primary fw-semibold">My Inbox</h6>
                                                <span class="d-block text-dark">Messages & Emails</span>
                                            </div>
                                        </a>
                                        <a href="#" class="py-8 px-7 d-flex align-items-center">
                                            <span
                                                class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                <img src="assets/images/svgs/icon-tasks.svg" alt="" width="24"
                                                    height="24">
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 bg-hover-primary fw-semibold">My Task</h6>
                                                <span class="d-block text-dark">To-do and Daily Tasks</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="d-grid py-4 px-7 pt-8">
                                        <div
                                            class="upgrade-plan bg-light-primary position-relative overflow-hidden rounded-4 p-4 mb-9">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h5 class="fs-4 mb-3 w-50 fw-semibold text-dark">Unlimited Access
                                                    </h5>
                                                    <button class="btn btn-primary text-white">Upgrade</button>
                                                </div>
                                                <div class="col-6">
                                                    <div class="m-n4">
                                                        <img src="assets/images/backgrounds/unlimited-bg.png" alt=""
                                                            class="w-100">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn btn-outline-primary">Log Out</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--  Header End -->
<!-- NOTE: do not close div tag here because it was closed in home.php  -->