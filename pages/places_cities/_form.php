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
                                    <a href="<?= "?locale=$locale&page=places_cities" ?>"><?= $lang['page_places_cities'] ?></a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($id <= 0) ? $lang['text_new'] : $lang['text_update'] ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="<?= "?locale=$locale&page=places_cities&action=create" ?>" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $cities->country_id->name ?>">
                                            <?= $lang['label_country_id'] ?>
                                            <span class="text-danger"><?= ($cities->country_id->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_country_id'] ?>" <?= $cities->country_id->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($cities->country_id->error_msg) ?></span>
                                        <span class="text-muted"><?= ($cities->country_id->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $cities->city->name ?>">
                                            <?= $lang['label_city'] ?>
                                            <span class="text-danger"><?= ($cities->city->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_city'] ?>" <?= $cities->city->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($cities->city->error_msg) ?></span>
                                        <span class="text-muted"><?= ($cities->city->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $cities->zip_code->name ?>">
                                            <?= $lang['label_zip_code'] ?>
                                            <span class="text-danger"><?= ($cities->zip_code->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_zip_code'] ?>" <?= $cities->zip_code->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($cities->zip_code->error_msg) ?></span>
                                        <span class="text-muted"><?= ($cities->zip_code->help_msg) ?></span>
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
