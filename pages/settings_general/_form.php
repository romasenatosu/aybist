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
                                    <a href="<?= "?locale=$locale&page=settings_general" ?>"><?= $lang['page_settings_general'] ?></a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($id <= 0) ? $lang['text_new'] : $lang['text_update'] ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="<?= "?locale=$locale&page=settings_general&action=" . (($id <= 0) ? "create" : "update&id=$id") ?>" method="post" enctype="multipart/form-data">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3 align-items-baseline">
                                    <div class="col-md-6">
                                        <label class="form-label" for="<?= $settings->company->name ?>">
                                            <?= $lang['label_company'] ?>
                                            <span class="text-danger"><?= ($settings->company->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_company'] ?>" <?= $settings->company->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($settings->company->error_msg) ?></span>
                                        <span class="text-muted"><?= ($settings->company->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="<?= $settings->slogan->name ?>">
                                            <?= $lang['label_slogan'] ?>
                                            <span class="text-danger"><?= ($settings->slogan->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="<?= $lang['placeholder_slogan'] ?>" <?= $settings->slogan->get_text_attr() ?>>
                                        <span class="text-danger"><?= ($settings->slogan->error_msg) ?></span>
                                        <span class="text-muted"><?= ($settings->slogan->help_msg) ?></span>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="<?= $settings->description->name ?>">
                                            <?= $lang['label_description'] ?>
                                            <span class="text-danger"><?= ($settings->description->required) ? '*': '' ?></span>
                                        </label>
                                        <textarea class="form-control" placeholder="<?= $lang['placeholder_description'] ?>" <?= $settings->description->get_textarea_attr() ?>><?= $settings->description->value ?></textarea>
                                        <span class="text-danger"><?= ($settings->description->error_msg) ?></span>
                                        <span class="text-muted"><?= ($settings->description->help_msg) ?></span>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="<?= $settings->keywords->name ?>">
                                            <?= $lang['label_keywords'] ?>
                                            <span class="text-danger"><?= ($settings->keywords->required) ? '*': '' ?></span>
                                        </label>
                                        <textarea class="form-control" placeholder="<?= $lang['placeholder_keywords'] ?>" <?= $settings->keywords->get_textarea_attr() ?>><?= $settings->keywords->value ?></textarea>
                                        <span class="text-danger"><?= ($settings->keywords->error_msg) ?></span>
                                        <span class="text-muted"><?= ($settings->keywords->help_msg) ?></span>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="border p-3">
                                            <legend><?= $lang['text_site'] ?></legend>
                                            <div class="row gx-md-4 gx-0 gy-4 mb-3 align-items-baseline">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="<?= $settings->site_title->name ?>">
                                                        <?= $lang['label_site_title'] ?>
                                                        <span class="text-danger"><?= ($settings->site_title->required) ? '*': '' ?></span>
                                                    </label>
                                                    <input type="text" class="form-control" placeholder="<?= $lang['placeholder_site_title'] ?>" <?= $settings->site_title->get_text_attr() ?>>
                                                    <span class="text-danger"><?= ($settings->site_title->error_msg) ?></span>
                                                    <span class="text-muted"><?= ($settings->site_title->help_msg) ?></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="<?= $settings->site_url->name ?>">
                                                        <?= $lang['label_site_url'] ?>
                                                        <span class="text-danger"><?= ($settings->site_url->required) ? '*': '' ?></span>
                                                    </label>
                                                    <input type="url" class="form-control" placeholder="<?= $lang['placeholder_site_url'] ?>" <?= $settings->site_url->get_text_attr() ?>>
                                                    <span class="text-danger"><?= ($settings->site_url->error_msg) ?></span>
                                                    <span class="text-muted"><?= ($settings->site_url->help_msg) ?></span>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="border p-3">
                                            <legend><?= $lang['text_smtp'] ?></legend>
                                            <div class="row gx-md-4 gx-0 gy-4 mb-3 align-items-baseline">
                                                <div class="col-md-4">
                                                    <label class="form-label" for="<?= $settings->smtp_url->name ?>">
                                                        <?= $lang['label_smtp_url'] ?>
                                                        <span class="text-danger"><?= ($settings->smtp_url->required) ? '*': '' ?></span>
                                                    </label>
                                                    <input type="url" class="form-control" placeholder="<?= $lang['placeholder_smtp_url'] ?>" <?= $settings->smtp_url->get_text_attr() ?>>
                                                    <span class="text-danger"><?= ($settings->smtp_url->error_msg) ?></span>
                                                    <span class="text-muted"><?= ($settings->smtp_url->help_msg) ?></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="<?= $settings->smtp_password->name ?>">
                                                        <?= $lang['label_smtp_password'] ?>
                                                        <span class="text-danger"><?= ($settings->smtp_password->required) ? '*': '' ?></span>
                                                    </label>
                                                    <input type="password" class="form-control" placeholder="<?= $lang['placeholder_smtp_password'] ?>" <?= $settings->smtp_password->get_text_attr() ?>>
                                                    <span class="text-danger"><?= ($settings->smtp_password->error_msg) ?></span>
                                                    <span class="text-muted"><?= ($settings->smtp_password->help_msg) ?></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="<?= $settings->smtp_port->name ?>">
                                                        <?= $lang['label_smtp_port'] ?>
                                                        <span class="text-danger"><?= ($settings->smtp_port->required) ? '*': '' ?></span>
                                                    </label>
                                                    <input type="number" class="form-control" placeholder="<?= $lang['placeholder_smtp_port'] ?>" <?= $settings->smtp_port->get_number_attr() ?>>
                                                    <span class="text-danger"><?= ($settings->smtp_port->error_msg) ?></span>
                                                    <span class="text-muted"><?= ($settings->smtp_port->help_msg) ?></span>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="border p-3">
                                            <legend><?= $lang['text_normal_photo'] ?></legend>
                                            <div class="row gx-md-4 gx-0 gy-4 mb-3 align-items-baseline">
                                                <div class="col-md-4">
                                                    <div class="row gx-md-4 gx-0 gy-4 align-items-center">
                                                        <div class="<?= ($settings->normal_photo->value) ? 'col-10' : 'col-12' ?>">
                                                            <label class="form-label" for="<?= $settings->normal_photo->name ?>">
                                                                <?= $lang['label_photo'] ?>
                                                                <span class="text-danger"><?= ($settings->normal_photo->required) ? '*': '' ?></span>
                                                            </label>
                                                            <input type="file" class="form-control" <?= $settings->normal_photo->get_file_attr() ?>>
                                                            
                                                            <span class="text-danger"><?= ($settings->normal_photo->error_msg) ?></span>
                                                            <span class="text-muted"><?= ($settings->normal_photo->help_msg) ?></span>
                                                        </div>
                                                        <?php
                                                            if ($settings->normal_photo->value):
                                                        ?>
                                                            <div class="col-2">
                                                                <a href="<?= Helpers::getServer() . $settings->normal_photo->value ?>">
                                                                    <img src="<?= $settings->normal_photo->value ?>" 
                                                                    alt="<?= $settings->normal_photo->value ?>" class="img-fluid" width="32" height="32">
                                                                </a>
                                                            </div>
                                                        <?php
                                                            endif
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="<?= $settings->normal_photo_width->name ?>">
                                                        <?= $lang['label_width'] ?>
                                                        <span class="text-danger"><?= ($settings->normal_photo_width->required) ? '*': '' ?></span>
                                                    </label>
                                                    <input type="number" class="form-control" placeholder="<?= $lang['placeholder_width'] ?>" <?= $settings->normal_photo_width->get_number_attr() ?>>
                                                    <span class="text-danger"><?= ($settings->normal_photo_width->error_msg) ?></span>
                                                    <span class="text-muted"><?= ($settings->normal_photo_width->help_msg) ?></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="<?= $settings->normal_photo_height->name ?>">
                                                        <?= $lang['label_height'] ?>
                                                        <span class="text-danger"><?= ($settings->normal_photo_height->required) ? '*': '' ?></span>
                                                    </label>
                                                    <input type="number" class="form-control" placeholder="<?= $lang['placeholder_height'] ?>" <?= $settings->normal_photo_height->get_number_attr() ?>>
                                                    <span class="text-danger"><?= ($settings->normal_photo_height->error_msg) ?></span>
                                                    <span class="text-muted"><?= ($settings->normal_photo_height->help_msg) ?></span>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="border p-3">
                                            <legend><?= $lang['text_top_photo'] ?></legend>
                                            <div class="row gx-md-4 gx-0 gy-4 mb-3 align-items-baseline">
                                                <div class="col-md-4">
                                                    <div class="row gx-md-4 gx-0 gy-4 align-items-center">
                                                        <div class="<?= ($settings->top_photo->value) ? 'col-10' : 'col-12' ?>">
                                                            <label class="form-label" for="<?= $settings->top_photo->name ?>">
                                                                <?= $lang['label_photo'] ?>
                                                                <span class="text-danger"><?= ($settings->top_photo->required) ? '*': '' ?></span>
                                                            </label>
                                                            <input type="file" class="form-control" <?= $settings->top_photo->get_file_attr() ?>>
                                                            
                                                            <span class="text-danger"><?= ($settings->top_photo->error_msg) ?></span>
                                                            <span class="text-muted"><?= ($settings->top_photo->help_msg) ?></span>
                                                        </div>
                                                        <?php
                                                            if ($settings->top_photo->value):
                                                        ?>
                                                            <div class="col-2">
                                                                <a href="<?= Helpers::getServer() . $settings->top_photo->value ?>">
                                                                    <img src="<?= $settings->top_photo->value ?>" 
                                                                    alt="<?= $settings->top_photo->value ?>" class="img-fluid" width="32" height="32">
                                                                </a>
                                                            </div>
                                                        <?php
                                                            endif
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="<?= $settings->top_photo_width->name ?>">
                                                        <?= $lang['label_width'] ?>
                                                        <span class="text-danger"><?= ($settings->top_photo_width->required) ? '*': '' ?></span>
                                                    </label>
                                                    <input type="number" class="form-control" placeholder="<?= $lang['placeholder_width'] ?>" <?= $settings->top_photo_width->get_number_attr() ?>>
                                                    <span class="text-danger"><?= ($settings->top_photo_width->error_msg) ?></span>
                                                    <span class="text-muted"><?= ($settings->top_photo_width->help_msg) ?></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="<?= $settings->top_photo_height->name ?>">
                                                        <?= $lang['label_height'] ?>
                                                        <span class="text-danger"><?= ($settings->top_photo_height->required) ? '*': '' ?></span>
                                                    </label>
                                                    <input type="number" class="form-control" placeholder="<?= $lang['placeholder_height'] ?>" <?= $settings->top_photo_height->get_number_attr() ?>>
                                                    <span class="text-danger"><?= ($settings->top_photo_height->error_msg) ?></span>
                                                    <span class="text-muted"><?= ($settings->top_photo_height->help_msg) ?></span>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <fieldset class="border p-3">
                                            <legend><?= $lang['text_small_photo'] ?></legend>
                                            <div class="row gx-md-4 gx-0 gy-4 mb-3 align-items-baseline">
                                                <div class="col-md-4">
                                                    <div class="row gx-md-4 gx-0 gy-4 align-items-center">
                                                        <div class="<?= ($settings->small_photo->value) ? 'col-10' : 'col-12' ?>">
                                                            <label class="form-label" for="<?= $settings->small_photo->name ?>">
                                                                <?= $lang['label_photo'] ?>
                                                                <span class="text-danger"><?= ($settings->small_photo->required) ? '*': '' ?></span>
                                                            </label>
                                                            <input type="file" class="form-control" <?= $settings->small_photo->get_file_attr() ?>>
                                                            
                                                            <span class="text-danger"><?= ($settings->small_photo->error_msg) ?></span>
                                                            <span class="text-muted"><?= ($settings->small_photo->help_msg) ?></span>
                                                        </div>
                                                        <?php
                                                            if ($settings->small_photo->value):
                                                        ?>
                                                            <div class="col-2">
                                                                <a href="<?= Helpers::getServer() . $settings->small_photo->value ?>">
                                                                    <img src="<?= $settings->small_photo->value ?>" 
                                                                    alt="<?= $settings->small_photo->value ?>" class="img-fluid" width="32" height="32">
                                                                </a>
                                                            </div>
                                                        <?php
                                                            endif
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="<?= $settings->small_photo_width->name ?>">
                                                        <?= $lang['label_width'] ?>
                                                        <span class="text-danger"><?= ($settings->small_photo_width->required) ? '*': '' ?></span>
                                                    </label>
                                                    <input type="number" class="form-control" placeholder="<?= $lang['placeholder_width'] ?>" <?= $settings->small_photo_width->get_number_attr() ?>>
                                                    <span class="text-danger"><?= ($settings->small_photo_width->error_msg) ?></span>
                                                    <span class="text-muted"><?= ($settings->small_photo_width->help_msg) ?></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="<?= $settings->small_photo_height->name ?>">
                                                        <?= $lang['label_height'] ?>
                                                        <span class="text-danger"><?= ($settings->small_photo_height->required) ? '*': '' ?></span>
                                                    </label>
                                                    <input type="number" class="form-control" placeholder="<?= $lang['placeholder_height'] ?>" <?= $settings->small_photo_height->get_number_attr() ?>>
                                                    <span class="text-danger"><?= ($settings->small_photo_height->error_msg) ?></span>
                                                    <span class="text-muted"><?= ($settings->small_photo_height->help_msg) ?></span>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <label class="form-check-label" for="<?= $settings->debug_mode->name ?>">
                                                <?= $lang['label_debug_mode'] ?>
                                                <span class="text-danger"><?= ($settings->debug_mode->required) ? '*': '' ?></span>
                                            </label>
                                            <input type="checkbox" class="form-check-input" <?= $settings->debug_mode->get_check_attr() ?>>
                                            <span class="text-danger"><?= ($settings->debug_mode->error_msg) ?></span>
                                            <span class="text-muted"><?= ($settings->debug_mode->help_msg) ?></span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <label class="form-check-label" for="<?= $settings->maintenance_mode->name ?>">
                                                <?= $lang['label_maintenance_mod'] ?>
                                                <span class="text-danger"><?= ($settings->maintenance_mode->required) ? '*': '' ?></span>
                                            </label>
                                            <input type="checkbox" class="form-check-input" <?= $settings->maintenance_mode->get_check_attr() ?>>
                                            <span class="text-danger"><?= ($settings->maintenance_mode->error_msg) ?></span>
                                            <span class="text-muted"><?= ($settings->maintenance_mode->help_msg) ?></span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="<?= $settings->maintenance_mode_content->name ?>">
                                            <?= $lang['label_maintenance_mode_content'] ?>
                                            <span class="text-danger"><?= ($settings->maintenance_mode_content->required) ? '*': '' ?></span>
                                        </label>
                                        <textarea class="ck_field" <?= $settings->maintenance_mode_content->get_textarea_attr() ?>><?= $settings->maintenance_mode_content->value ?></textarea>
                                        <span class="text-danger"><?= ($settings->maintenance_mode_content->error_msg) ?></span>
                                        <span class="text-muted"><?= ($settings->maintenance_mode_content->help_msg) ?></span>
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
