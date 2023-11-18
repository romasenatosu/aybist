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
                                    <a href="<?= "?locale=$locale&page=managements_floors" ?>"><?= $lang['page_managements_floors'] ?></a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($id <= 0) ? $lang['text_new'] : $lang['text_update'] ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="<?= "?locale=$locale&page=managements_floors&action=create" ?>" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $floors->floor->name ?>">
                                            <?= $lang['label_floor'] ?>
                                            <span class="text-danger"><?= ($floors->floor->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_floor'] ?>" <?= $floors->floor->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($floors->floor->error_msg) ?></span>
                                        <span class="text-muted"><?= ($floors->floor->help_msg) ?></span>
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
