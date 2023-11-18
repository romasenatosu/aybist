<div class="container-fluid mw-100">
    <section class="forms">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <nav style="--bs-breadcrumb-divider: '>'">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?= "?locale=$locale&page=home" ?>"><?= $lang['page_home'] ?></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="<?= "?locale=$locale&page=settings_users" ?>"><?= $lang['page_settings_users'] ?></a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($id <= 0) ? $lang['text_new'] : $lang['text_update'] ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="<?= "?locale=$locale&page=settings_users&action=create" ?>" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $users->fullname->name ?>">
                                            <?= $lang['label_fullname'] ?>
                                            <span class="text-danger"><?= ($users->fullname->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_fullname'] ?>" <?= $users->fullname->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($users->fullname->error_msg) ?></span>
                                        <span class="text-muted"><?= ($users->fullname->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $users->email->name ?>">
                                            <?= $lang['label_email'] ?>
                                            <span class="text-danger"><?= ($users->email->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_email'] ?>" <?= $users->email->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($users->email->error_msg) ?></span>
                                        <span class="text-muted"><?= ($users->email->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $users->phone->name ?>">
                                            <?= $lang['label_phone'] ?>
                                            <span class="text-danger"><?= ($users->phone->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_phone'] ?>" <?= $users->phone->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($users->phone->error_msg) ?></span>
                                        <span class="text-muted"><?= ($users->phone->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $users->address->name ?>">
                                            <?= $lang['label_address'] ?>
                                            <span class="text-danger"><?= ($users->address->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_address'] ?>" <?= $users->address->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($users->address->error_msg) ?></span>
                                        <span class="text-muted"><?= ($users->address->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $users->password->name ?>">
                                            <?= $lang['label_password'] ?>
                                            <span class="text-danger"><?= ($users->password->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_password'] ?>" <?= $users->password->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($users->password->error_msg) ?></span>
                                        <span class="text-muted"><?= ($users->password->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $users->is_admin->name ?>">
                                            <?= $lang['label_is_admin'] ?>
                                            <span class="text-danger"><?= ($users->is_admin->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" <?= $users->is_admin->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($users->is_admin->error_msg) ?></span>
                                        <span class="text-muted"><?= ($users->is_admin->help_msg) ?></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary"><?= ($id <= 0) ? $lang['text_create'] : $lang['text_update'] ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
