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
                    <a class="sidebar-link <?= ($page == 'home') ? 'active' : '' ?>" href="?page=home">
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
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)">
                        <span class="d-flex">
                            <i class="ti ti-box-multiple"></i>
                        </span>
                        <span class="hide-menu">Menu Level</span>
                    </a>
                    <ul class="collapse">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Level 1</span>
                            </a>
                        </li>
                    </ul>
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
                    <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
            </ul>
            <div class="d-block d-lg-none">
                <img src="assets/images/logos/logo.png" width="180" alt="" />
            </div>
            <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="p-2">
                    <i class="ti ti-dots fs-7"></i>
                </span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="d-flex align-items-center justify-content-between">
                    <a href="javascript:void(0)" class="nav-link d-flex d-lg-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar">
                        <i class="ti ti-align-justified fs-7"></i>
                    </a>
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown">
                                <img src="assets/images/flags/tr.png" alt="" class="rounded-circle object-fit-cover round-20">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up">
                                <div class="message-body" data-simplebar>
                                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                        <div class="position-relative">
                                            <img src="assets/images/flags/en.png" alt="" class="rounded-circle object-fit-cover round-20">
                                        </div>
                                        <p class="mb-0 fs-3">English (UK)</p>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                        <div class="position-relative">
                                            <img src="assets/images/flags/tr.png" alt="" class="rounded-circle object-fit-cover round-20">
                                        </div>
                                        <p class="mb-0 fs-3">Türkçe</p>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up">
                                <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                    <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                    <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">1 new</span>
                                </div>
                                <div class="message-body" data-simplebar>
                                    <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                        <span class="me-3">
                                            <img src="assets/images/profile/user-1.jpg" alt="user" class="rounded-circle" width="48" height="48" />
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
                                    <img src="assets/images/profile/user-1.jpg" class="rounded-circle" width="35" height="35" alt="" />
                                </div>
                                </div>
                            </a>
                            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up">
                                <div class="profile-dropdown position-relative" data-simplebar>
                                    <div class="py-3 px-7 pb-0">
                                        <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                    </div>
                                    <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                        <img src="assets/images/profile/user-1.jpg" class="rounded-circle" width="80" height="80" alt="" />
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
                                            <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                <img src="assets/images/svgs/icon-account.svg" alt="" width="24" height="24">
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 bg-hover-primary fw-semibold"> My Profile </h6>
                                                <span class="d-block text-dark">Account Settings</span>
                                            </div>
                                        </a>
                                        <a href="#" class="py-8 px-7 d-flex align-items-center">
                                            <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                <img src="assets/images/svgs/icon-inbox.svg" alt="" width="24" height="24">
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 bg-hover-primary fw-semibold">My Inbox</h6>
                                                <span class="d-block text-dark">Messages & Emails</span>
                                            </div>
                                        </a>
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