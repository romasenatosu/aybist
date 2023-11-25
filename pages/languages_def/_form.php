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
                                    <a href="<?= "/$locale/languages_def" ?>"><?= $lang['page_languages_def'] ?></a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($id <= 0) ? $lang['text_new'] : $lang['text_update'] ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="<?= "/$locale/languages_def/" . (($id <= 0) ? "create" : "update/$id") ?>" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3 align-items-baseline">
                                    <div class="col-md-6">
                                        <label class="form-label" for="<?= $languagesDef->keyword->name ?>">
                                            <?= $lang['label_keyword'] ?>
                                            <span class="text-danger"><?= ($languagesDef->keyword->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" <?= $languagesDef->keyword->get_text_attr() ?> readonly>
                                        <span class="text-danger"><?= ($languagesDef->keyword->error_msg) ?></span>
                                        <span class="text-muted"><?= ($languagesDef->keyword->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="<?= $languagesDef->value->name ?>">
                                            <?= $lang['label_value'] ?>
                                            <span class="text-danger"><?= ($languagesDef->value->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_value'] ?>" <?= $languagesDef->value->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($languagesDef->value->error_msg) ?></span>
                                        <span class="text-muted"><?= ($languagesDef->value->help_msg) ?></span>
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
