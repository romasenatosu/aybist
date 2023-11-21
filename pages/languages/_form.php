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
                                    <a href="<?= "?locale=$locale&page=languages" ?>"><?= $lang['page_languages'] ?></a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($id <= 0) ? $lang['text_new'] : $lang['text_update'] ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="<?= "?locale=$locale&page=languages&action=create" ?>" method="post" enctype="multipart/form-data">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3 align-items-baseline">
                                    <div class="col-md-6">
                                        <label class="form-label" for="<?= $languages->code->name ?>">
                                            <?= $lang['label_code'] ?>
                                            <span class="text-danger"><?= ($languages->code->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_code'] ?>" <?= $languages->code->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($languages->code->error_msg) ?></span>
                                        <span class="text-muted"><?= ($languages->code->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="<?= $languages->lang->name ?>">
                                            <?= $lang['label_lang'] ?>
                                            <span class="text-danger"><?= ($languages->lang->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_lang'] ?>" <?= $languages->lang->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($languages->lang->error_msg) ?></span>
                                        <span class="text-muted"><?= ($languages->lang->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row gx-md-4 gx-0 gy-4 align-items-center">
                                            <div class="<?= ($languages->flag->value) ? 'col-10' : 'col-12' ?>">
                                                <label class="form-label" for="<?= $languages->flag->name ?>">
                                                    <?= $lang['label_flag'] ?>
                                                    <span class="text-danger"><?= ($languages->flag->required) ? '*': '' ?></span>
                                                </label>
                                                <input type="file" class="form-control" <?= $languages->flag->get_file_attr() ?>>
                                                
                                                <span class="text-danger"><?= ($languages->flag->error_msg) ?></span>
                                                <span class="text-muted"><?= ($languages->flag->help_msg) ?></span>
                                            </div>
                                            <?php
                                                if ($languages->flag->value):
                                            ?>
                                                <div class="col-2">
                                                    <a href="<?= get_server() . $languages->flag->value ?>">
                                                        <img src="<?= $languages->flag->value ?>" 
                                                        alt="<?= $languages->flag->value ?>" class="img-fluid" width="32" height="32">
                                                    </a>
                                                </div>
                                            <?php
                                                endif
                                            ?>
                                        </div>
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
