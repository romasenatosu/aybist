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
                                    <a href="<?= "?locale=$locale&page=settings_vat" ?>"><?= $lang['page_settings_vat'] ?></a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($id <= 0) ? $lang['text_new'] : $lang['text_update'] ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="<?= "?locale=$locale&page=settings_vat&action=" . (($id <= 0) ? "create" : "update&id=$id") ?>" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3 align-items-baseline">
                                    <div class="col-md-6">
                                        <label class="form-label" for="<?= $settingsVat->name->name ?>">
                                            <?= $lang['label_name'] ?>
                                            <span class="text-danger"><?= ($settingsVat->name->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_name'] ?>" <?= $settingsVat->name->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($settingsVat->name->error_msg) ?></span>
                                        <span class="text-muted"><?= ($settingsVat->name->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="<?= $settingsVat->rate->name ?>">
                                            <?= $lang['label_rate'] ?>
                                            <span class="text-danger"><?= ($settingsVat->rate->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="number" class="form-control" placeholder="<?= $lang['placeholder_rate'] ?>" <?= $settingsVat->rate->get_number_attr() ?>>
                                        <span class="text-danger"><?= ($settingsVat->rate->error_msg) ?></span>
                                        <span class="text-muted"><?= ($settingsVat->rate->help_msg) ?></span>
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
