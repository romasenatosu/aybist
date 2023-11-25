<?php
    $users = $auth->getUser();
    $error_msg = "";

    if (Helpers::getRequestMethod() == 'POST') {
        $users->email->value = htmlspecialchars($_POST[$users->email->name] ?? '');
        $users->password->value = htmlspecialchars($_POST[$users->password->name] ?? '');
        $remember_me = htmlspecialchars($_POST["remember_me"] ?? '');
    
        // check if given data is ok
        $checks = $users->email->check() || $users->password->check();

        if ($checks) {
            if ($auth->login($pdo)) {
                // $_SESSION['remember_me'] = ($remember_me) ? true : false;
                Helpers::redirectHome();
            } else {
                $error_msg = $lang['text_invalid_login'];
            }
        }
    }
?>

<div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
                <div class="card mb-0">
                    <div class="card-body">
                        <a href="<?= "/$locale/home" ?>" class="text-nowrap logo-img text-center d-block mb-5 w-100">
                            <img src="/assets/images/logos/logo.png" width="180" alt="">
                        </a>
                        <form action="<?= "/$locale/login" ?>" method="post">
                            <div class="mb-3">
                                <label class="form-label" for="<?= $users->email->name ?>">
                                    <?= $lang['label_email'] ?>
                                    <span class="text-danger"><?= ($users->email->required) ? '*': '' ?></span>
                                </label>
                                <input type="email" class="form-control" placeholder="<?= $lang['placeholder_email'] ?>" <?= $users->email->get_text_attr() ?>>
                                <span class="text-danger"><?= ($users->email->error_msg) ?></span>
                                <span class="text-muted"><?= ($users->email->help_msg) ?></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="<?= $users->password->name ?>">
                                    <?= $lang['label_password'] ?>
                                    <span class="text-danger"><?= ($users->password->required) ? '*': '' ?></span>
                                </label>
                                <input type="password" class="form-control" placeholder="<?= $lang['placeholder_password'] ?>" <?= $users->password->get_text_attr() ?>>
                                <span class="text-danger"><?= ($users->password->error_msg) ?></span>
                                <span class="text-muted"><?= ($users->password->help_msg) ?></span>
                            </div>
                            <div class="mb-3">
                                <span class="text-danger"><?= $error_msg ?></span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input class="form-check-input primary" type="checkbox" id="remember_me" name="remember_me">
                                    <label class="form-check-label text-dark" for="remember_me">
                                        <?= $lang['label_remember_me'] ?>
                                    </label>
                                </div>
                                <!-- <a class="text-primary fw-medium" href="#"><?= $lang['text_forgot_password'] ?><a> -->
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2"><?= $lang['text_login'] ?></button>
                            <!-- <div class="d-flex align-items-center justify-content-center">
                                <p class="fs-4 mb-0 fw-medium">New to Modernize?</p>
                                <a class="text-primary fw-medium ms-2" href="authentication-register.html">Create an account</a>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
