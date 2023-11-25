<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="<?= "/$locale/home" ?>" class="text-nowrap logo-img">
                <img src="/assets/images/logos/logo.png" class="img-fluid">
            </a>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8 text-muted"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
                <li class="sidebar-item <?= ($page == 'home') ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= ($page == 'home') ? 'active' : '' ?>" href="<?= "/$locale/home" ?>">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu"><?= $lang['page_home'] ?></span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow <?= str_contains($page, 'managements') ? 'active' : '' ?>" href="javascript:void(0)">
                        <span class="d-flex">
                            <i class="ti ti-building-skyscraper"></i>
                        </span>
                        <span class="hide-menu"><?= $lang['page_managements'] ?></span>
                    </a>
                    <ul class="collapse <?= str_contains($page, 'managements') ? 'in' : '' ?>">
                        <li class="sidebar-item <?= ($page == 'managements') ? 'selected' : '' ?>">
                            <a class="sidebar-link <?= ($page == 'managements') ? 'active' : '' ?>" href="<?= "/$locale/managements" ?>">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"><?= $lang['page_managements'] ?></span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= ($page == 'managements_flats') ? 'selected' : '' ?>">
                            <a class="sidebar-link <?= ($page == 'managements_flats') ? 'active' : '' ?>" href="<?= "/$locale/managements_flats" ?>">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"><?= $lang['page_managements_flats'] ?></span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= ($page == 'managements_blocks') ? 'selected' : '' ?>">
                            <a class="sidebar-link <?= ($page == 'managements_blocks') ? 'active' : '' ?>" href="<?= "/$locale/managements_blocks" ?>">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"><?= $lang['page_managements_blocks'] ?></span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= ($page == 'managements_floors') ? 'selected' : '' ?>">
                            <a class="sidebar-link <?= ($page == 'managements_floors') ? 'active' : '' ?>" href="<?= "/$locale/managements_floors" ?>">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"><?= $lang['page_managements_floors'] ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow <?= str_contains($page, 'languages') ? 'active' : '' ?>" href="javascript:void(0)">
                        <span class="d-flex">
                            <i class="ti ti-language"></i>
                        </span>
                        <span class="hide-menu"><?= $lang['page_languages'] ?></span>
                    </a>
                    <ul class="collapse <?= str_contains($page, 'languages') ? 'in' : '' ?>">
                        <li class="sidebar-item <?= ($page == 'languages') ? 'selected' : '' ?>">
                            <a class="sidebar-link <?= ($page == 'languages') ? 'active' : '' ?>" href="<?= "/$locale/languages" ?>">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"><?= $lang['page_languages'] ?></span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= ($page == 'languages_def') ? 'selected' : '' ?>">
                            <a class="sidebar-link <?= ($page == 'languages_def') ? 'active' : '' ?>" href="<?= "/$locale/languages_def" ?>">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"><?= $lang['page_languages_def'] ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow <?= str_contains($page, 'notifications') ? 'active' : '' ?>" href="javascript:void(0)">
                        <span class="d-flex">
                            <i class="ti ti-notification"></i>
                        </span>
                        <span class="hide-menu"><?= $lang['page_notifications'] ?></span>
                    </a>
                    <ul class="collapse <?= str_contains($page, 'notifications') ? 'in' : '' ?>">
                        <li class="sidebar-item <?= ($page == 'notifications') ? 'selected' : '' ?>">
                            <a class="sidebar-link <?= ($page == 'notifications') ? 'active' : '' ?>" href="<?= "/$locale/notifications" ?>">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"><?= $lang['page_notifications'] ?></span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= ($page == 'notifications_ips') ? 'selected' : '' ?>">
                            <a class="sidebar-link <?= ($page == 'notifications_ips') ? 'active' : '' ?>" href="<?= "/$locale/notifications_ips" ?>">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"><?= $lang['page_notifications_ips'] ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow <?= str_contains($page, 'places') ? 'active' : '' ?>" href="javascript:void(0)">
                        <span class="d-flex">
                            <i class="ti ti-world"></i>
                        </span>
                        <span class="hide-menu"><?= $lang['page_places'] ?></span>
                    </a>
                    <ul class="collapse <?= str_contains($page, 'places') ? 'in' : '' ?>">
                        <li class="sidebar-item <?= ($page == 'places_countries') ? 'selected' : '' ?>">
                            <a class="sidebar-link <?= ($page == 'places_countries') ? 'active' : '' ?>" href="<?= "/$locale/places_countries" ?>">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"><?= $lang['page_places_countries'] ?></span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= ($page == 'places_cities') ? 'selected' : '' ?>">
                            <a class="sidebar-link <?= ($page == 'places_cities') ? 'active' : '' ?>" href="<?= "/$locale/places_cities" ?>">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"><?= $lang['page_places_cities'] ?></span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= ($page == 'places_districts') ? 'selected' : '' ?>">
                            <a class="sidebar-link <?= ($page == 'places_districts') ? 'active' : '' ?>" href="<?= "/$locale/places_districts" ?>">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"><?= $lang['page_places_districts'] ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow <?= str_contains($page, 'settings') ? 'active' : '' ?>" href="javascript:void(0)">
                        <span class="d-flex">
                            <i class="ti ti-settings-cog"></i>
                        </span>
                        <span class="hide-menu"><?= $lang['page_settings'] ?></span>
                    </a>
                    <ul class="collapse <?= str_contains($page, 'settings') ? 'in' : '' ?>">
                        <li class="sidebar-item <?= ($page == 'settings_general') ? 'selected' : '' ?>">
                            <a class="sidebar-link <?= ($page == 'settings_general') ? 'active' : '' ?>" href="<?= "/$locale/settings_general" ?>">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"><?= $lang['page_settings_general'] ?></span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= ($page == 'settings_contact') ? 'selected' : '' ?>">
                            <a class="sidebar-link <?= ($page == 'settings_contact') ? 'active' : '' ?>" href="<?= "/$locale/settings_contact" ?>">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"><?= $lang['page_settings_contact'] ?></span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= ($page == 'settings_currency') ? 'selected' : '' ?>">
                            <a class="sidebar-link <?= ($page == 'settings_currency') ? 'active' : '' ?>" href="<?= "/$locale/settings_currency" ?>">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"><?= $lang['page_settings_currency'] ?></span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= ($page == 'settings_vat') ? 'selected' : '' ?>">
                            <a class="sidebar-link <?= ($page == 'settings_vat') ? 'active' : '' ?>" href="<?= "/$locale/settings_vat" ?>">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"><?= $lang['page_settings_vat'] ?></span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= ($page == 'settings_users') ? 'selected' : '' ?>">
                            <a class="sidebar-link <?= ($page == 'settings_users') ? 'active' : '' ?>" href="<?= "/$locale/settings_users" ?>">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu"><?= $lang['page_settings_users'] ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item <?= ($page == 'logout') ? 'selected' : '' ?>">
                    <a class="sidebar-link <?= ($page == 'logout') ? 'active' : '' ?>" href="<?= "/$locale/logout" ?>">
                        <span>
                            <i class="ti ti-logout"></i>
                        </span>
                        <span class="hide-menu"><?= $lang['text_logout'] ?></span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
            <div class="hstack gap-3">
                <div class="john-img">
                    <img src="/assets/images/profile/user-1.jpg" class="rounded-circle" width="40" height="40" alt="">
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

<?php
    $stmt = $pdo->prepare("SELECT * FROM languages");
    $stmt->execute();
    $languages_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    $stmt = $pdo->prepare("SELECT * FROM languages WHERE code = :code");
    $stmt->bindParam(':code', $locale, PDO::PARAM_STR);
    $stmt->execute();
    $current_language_data = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
?>

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
                <img src="/assets/images/logos/logo.png" width="180" alt="" />
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
                                <img src="<?= $current_language_data['flag'] ?>" alt="<?= $current_language_data['code'] ?>" class="rounded-circle object-fit-cover round-20">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up">
                                <div class="message-body" data-simplebar>
                                    <?php foreach ($languages_data as $language_data): ?>
                                        <a href="<?= $language->changeLocale($language_data['code']) ?>" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                            <div class="position-relative">
                                                <img src="<?= $language_data['flag'] ?>" alt="<?= $language_data['code'] ?>" class="rounded-circle object-fit-cover round-20">
                                            </div>
                                            <p class="mb-0 fs-3"><?= $language_data['lang'] ?></p>
                                        </a>
                                    <?php endforeach;
                                        unset($languages_data, $current_language_data);
                                    ?>
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
                                            <img src="/assets/images/profile/user-1.jpg" alt="user" class="rounded-circle" width="48" height="48" />
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
                                    <img src="/assets/images/profile/user-1.jpg" class="rounded-circle" width="35" height="35" alt="" />
                                </div>
                                </div>
                            </a>
                            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up">
                                <div class="profile-dropdown position-relative" data-simplebar>
                                    <div class="py-3 px-7 pb-0">
                                        <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                    </div>
                                    <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                        <img src="/assets/images/profile/user-1.jpg" class="rounded-circle" width="80" height="80" alt="" />
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
                                                <img src="/assets/images/svgs/icon-account.svg" alt="" width="24" height="24">
                                            </span>
                                            <div class="w-75 d-inline-block v-middle ps-3">
                                                <h6 class="mb-1 bg-hover-primary fw-semibold"> My Profile </h6>
                                                <span class="d-block text-dark">Account Settings</span>
                                            </div>
                                        </a>
                                        <a href="#" class="py-8 px-7 d-flex align-items-center">
                                            <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                <img src="/assets/images/svgs/icon-inbox.svg" alt="" width="24" height="24">
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