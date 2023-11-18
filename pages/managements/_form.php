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
                                    <a href="<?= "?locale=$locale&page=managements" ?>"><?= $lang['page_managements'] ?></a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($id <= 0) ? $lang['text_new'] : $lang['text_update'] ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="<?= "?locale=$locale&page=managements&action=create" ?>" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $managements->block_id->name ?>">
                                            <?= $lang['label_block_id'] ?>
                                            <span class="text-danger"><?= ($managements->block_id->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_block_id'] ?>" <?= $managements->block_id->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($managements->block_id->error_msg) ?></span>
                                        <span class="text-muted"><?= ($managements->block_id->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $managements->floor_id->name ?>">
                                            <?= $lang['label_floor_id'] ?>
                                            <span class="text-danger"><?= ($managements->floor_id->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_floor_id'] ?>" <?= $managements->floor_id->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($managements->floor_id->error_msg) ?></span>
                                        <span class="text-muted"><?= ($managements->floor_id->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $managements->flat_id->name ?>">
                                            <?= $lang['label_flat_id'] ?>
                                            <span class="text-danger"><?= ($managements->flat_id->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_flat_id'] ?>" <?= $managements->flat_id->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($managements->flat_id->error_msg) ?></span>
                                        <span class="text-muted"><?= ($managements->flat_id->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $managements->manager_owner_id->name ?>">
                                            <?= $lang['label_manager_owner_id'] ?>
                                            <span class="text-danger"><?= ($managements->manager_owner_id->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_manager_owner_id'] ?>" <?= $managements->manager_owner_id->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($managements->manager_owner_id->error_msg) ?></span>
                                        <span class="text-muted"><?= ($managements->manager_owner_id->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $managements->manager_rental_id->name ?>">
                                            <?= $lang['label_manager_rental_id'] ?>
                                            <span class="text-danger"><?= ($managements->manager_rental_id->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_manager_rental_id'] ?>" <?= $managements->manager_rental_id->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($managements->manager_rental_id->error_msg) ?></span>
                                        <span class="text-muted"><?= ($managements->manager_rental_id->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $managements->name->name ?>">
                                            <?= $lang['label_name'] ?>
                                            <span class="text-danger"><?= ($managements->name->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_name'] ?>" <?= $managements->name->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($managements->name->error_msg) ?></span>
                                        <span class="text-muted"><?= ($managements->name->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $managements->description->name ?>">
                                            <?= $lang['label_description'] ?>
                                            <span class="text-danger"><?= ($managements->description->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_description'] ?>" <?= $managements->description->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($managements->description->error_msg) ?></span>
                                        <span class="text-muted"><?= ($managements->description->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $managements->fee_status->name ?>">
                                            <?= $lang['label_fee_status'] ?>
                                            <span class="text-danger"><?= ($managements->fee_status->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" <?= $managements->fee_status->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($managements->fee_status->error_msg) ?></span>
                                        <span class="text-muted"><?= ($managements->fee_status->help_msg) ?></span>
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
