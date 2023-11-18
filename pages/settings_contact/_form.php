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
                                    <a href="<?= "?locale=$locale&page=settings_contact" ?>"><?= $lang['page_settings_contact'] ?></a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($id <= 0) ? $lang['text_new'] : $lang['text_update'] ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="<?= "?locale=$locale&page=settings_contact&action=create" ?>" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $settingsContact->address->name ?>">
                                            <?= $lang['label_address'] ?>
                                            <span class="text-danger"><?= ($settingsContact->address->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_address'] ?>" <?= $settingsContact->address->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($settingsContact->address->error_msg) ?></span>
                                        <span class="text-muted"><?= ($settingsContact->address->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $settingsContact->phone->name ?>">
                                            <?= $lang['label_phone'] ?>
                                            <span class="text-danger"><?= ($settingsContact->phone->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_phone'] ?>" <?= $settingsContact->phone->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($settingsContact->phone->error_msg) ?></span>
                                        <span class="text-muted"><?= ($settingsContact->phone->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $settingsContact->cell_phone->name ?>">
                                            <?= $lang['label_cell_phone'] ?>
                                            <span class="text-danger"><?= ($settingsContact->cell_phone->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_cell_phone'] ?>" <?= $settingsContact->cell_phone->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($settingsContact->cell_phone->error_msg) ?></span>
                                        <span class="text-muted"><?= ($settingsContact->cell_phone->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $settingsContact->fax->name ?>">
                                            <?= $lang['label_fax'] ?>
                                            <span class="text-danger"><?= ($settingsContact->fax->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_fax'] ?>" <?= $settingsContact->fax->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($settingsContact->fax->error_msg) ?></span>
                                        <span class="text-muted"><?= ($settingsContact->fax->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $settingsContact->email->name ?>">
                                            <?= $lang['label_email'] ?>
                                            <span class="text-danger"><?= ($settingsContact->email->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_email'] ?>" <?= $settingsContact->email->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($settingsContact->email->error_msg) ?></span>
                                        <span class="text-muted"><?= ($settingsContact->email->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $settingsContact->captcha_key->name ?>">
                                            <?= $lang['label_captcha_key'] ?>
                                            <span class="text-danger"><?= ($settingsContact->captcha_key->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_captcha_key'] ?>" <?= $settingsContact->captcha_key->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($settingsContact->captcha_key->error_msg) ?></span>
                                        <span class="text-muted"><?= ($settingsContact->captcha_key->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $settingsContact->captcha_secret_key->name ?>">
                                            <?= $lang['label_captcha_secret_key'] ?>
                                            <span class="text-danger"><?= ($settingsContact->captcha_secret_key->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_captcha_secret_key'] ?>" <?= $settingsContact->captcha_secret_key->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($settingsContact->captcha_secret_key->error_msg) ?></span>
                                        <span class="text-muted"><?= ($settingsContact->captcha_secret_key->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $settingsContact->google_maps->name ?>">
                                            <?= $lang['label_google_maps'] ?>
                                            <span class="text-danger"><?= ($settingsContact->google_maps->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_google_maps'] ?>" <?= $settingsContact->google_maps->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($settingsContact->google_maps->error_msg) ?></span>
                                        <span class="text-muted"><?= ($settingsContact->google_maps->help_msg) ?></span>
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
