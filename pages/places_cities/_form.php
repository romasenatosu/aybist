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
                                    <a href="<?= "/$locale/places_cities" ?>"><?= $lang['page_places_cities'] ?></a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($id <= 0) ? $lang['text_new'] : $lang['text_update'] ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="<?= "/$locale/places_cities/" . (($id <= 0) ? "create" : "update/$id") ?>" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3 align-items-baseline">
                                    <div class="col-md-6">
                                        <div class="row gx-md-4 gx-0 gy-4 align-items-end">
                                            <div class="col-10">
                                                <label class="form-label" for="<?= $cities->country_id->name ?>">
                                                    <?= $lang['label_country_id'] ?>
                                                    <span class="text-danger"><?= ($cities->country_id->required) ? '*': '' ?></span>
                                                </label>
                                                <select class="form-select" <?= $cities->country_id->get_attr() ?>>
                                                    <?php
                                                        $options = $cities->country_id->get_select_options($lang['placeholder_country_id']);
                                                        foreach ($options as $option) {
                                                            echo $option . PHP_EOL;
                                                        }
                                                    ?>
                                                </select>
                                                <span class="text-danger"><?= ($cities->country_id->error_msg) ?></span>
                                                <span class="text-muted"><?= ($cities->country_id->help_msg) ?></span>
                                            </div>
                                            <div class="col-2">
                                                <a href="<?= "/$locale/places_countries/create" ?>" class="btn btn-primary" title="<?= $lang['text_create'] ?>" data-bs-toggle="tooltip">&plus;</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="<?= $cities->city->name ?>">
                                            <?= $lang['label_city'] ?>
                                            <span class="text-danger"><?= ($cities->city->required) ? '*': '' ?></span>
                                        </label>
                                        <input class="form-control" placeholder="<?= $lang['placeholder_city'] ?>" <?= $cities->city->get_attr() ?>>
                                        <span class="text-danger"><?= ($cities->city->error_msg) ?></span>
                                        <span class="text-muted"><?= ($cities->city->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="<?= $cities->zip_code->name ?>">
                                            <?= $lang['label_zip_code'] ?>
                                            <span class="text-danger"><?= ($cities->zip_code->required) ? '*': '' ?></span>
                                        </label>
                                        <input class="form-control" placeholder="<?= $lang['placeholder_zip_code'] ?>" <?= $cities->zip_code->get_attr() ?>>
                                        <span class="text-danger"><?= ($cities->zip_code->error_msg) ?></span>
                                        <span class="text-muted"><?= ($cities->zip_code->help_msg) ?></span>
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
