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
                                <a href="<?= "/$locale/places_districts" ?>"><?= $lang['page_places_districts'] ?></a>
                            </li>
                            <li class="breadcrumb-item active">
                                <?= ($id <= 0) ? $lang['text_new'] : $lang['text_update'] ?>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <div class="container">
                        <form action="<?= "/$locale/places_districts/" . (($id <= 0) ? "create" : "update/$id") ?>" method="post">
                            <div class="row gx-md-4 gx-0 gy-4 mb-3 align-items-baseline">
                                <div class="col-md-6">
                                    <div class="row gx-md-4 gx-0 gy-4 align-items-end">
                                        <div class="col-10">
                                            <label class="form-label" for="<?= $districts->city_id->name ?>">
                                                <?= $lang['label_city_id'] ?>
                                                <span class="text-danger"><?= ($districts->city_id->required) ? '*': '' ?></span>
                                            </label>
                                            <select class="form-select" <?= $districts->city_id->get_attr() ?>>
                                                <?php
                                                    $options = $districts->city_id->get_select_options($lang['placeholder_city_id']);
                                                    foreach ($options as $option) {
                                                        echo $option . PHP_EOL;
                                                    }
                                                ?>
                                            </select>
                                            <span class="text-danger"><?= ($districts->city_id->error_msg) ?></span>
                                            <span class="text-muted"><?= ($districts->city_id->help_msg) ?></span>
                                        </div>
                                        <div class="col-2">
                                            <a href="<?= "/$locale/places_cities/create" ?>" class="btn btn-primary" title="<?= $lang['text_create'] ?>" data-bs-toggle="tooltip">&plus;</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="<?= $districts->district->name ?>">
                                        <?= $lang['label_district'] ?>
                                        <span class="text-danger"><?= ($districts->district->required) ? '*': '' ?></span>
                                    </label>
                                    <input class="form-control" placeholder="<?= $lang['placeholder_district'] ?>" <?= $districts->district->get_attr() ?>>
                                    <span class="text-danger"><?= ($districts->district->error_msg) ?></span>
                                    <span class="text-muted"><?= ($districts->district->help_msg) ?></span>
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
