<div class="container-fluid mw-100">
    <section class="forms">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <nav style="--bs-breadcrumb-divider: '>'">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?= "/$locale/home" ?>"><?= $lang['page_home'] ?></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="<?= "/$locale/settings_currency" ?>"><?= $lang['page_settings_currency'] ?></a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($id <= 0) ? $lang['text_new'] : $lang['text_update'] ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="<?= "/$locale/settings_currency/" . (($id <= 0) ? "create" : "update/$id") ?>" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3 align-items-baseline">
                                    <div class="col-md-6">
                                        <label class="form-label" for="<?= $settingsCurrency->name->name ?>">
                                            <?= $lang['label_name'] ?>
                                            <span class="text-danger"><?= ($settingsCurrency->name->required) ? '*': '' ?></span>
                                        </label>
                                        <input class="form-control" placeholder="<?= $lang['placeholder_name'] ?>" <?= $settingsCurrency->name->get_attr() ?>>
                                        <span class="text-danger"><?= ($settingsCurrency->name->error_msg) ?></span>
                                        <span class="text-muted"><?= ($settingsCurrency->name->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="<?= $settingsCurrency->symbol->name ?>">
                                            <?= $lang['label_symbol'] ?>
                                            <span class="text-danger"><?= ($settingsCurrency->symbol->required) ? '*': '' ?></span>
                                        </label>
                                        <input class="form-control" placeholder="<?= $lang['placeholder_symbol'] ?>" <?= $settingsCurrency->symbol->get_attr() ?>>
                                        <span class="text-danger"><?= ($settingsCurrency->symbol->error_msg) ?></span>
                                        <span class="text-muted"><?= ($settingsCurrency->symbol->help_msg) ?></span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary"><?= ($id <= 0) ? $lang['text_create'] : $lang['text_update'] ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
