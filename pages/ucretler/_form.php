<?php
if (!isset($text_action)) {
    $text_action = 'Ekle';
}
?>

<div class="container-fluid mw-100">
    <section class="forms">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <nav style="--bs-breadcrumb-divider: '>'">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="?page=home">Ana Sayfa</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="?page=ucretler">Ücret Yönetimi</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($action=='update') ? 'Düzenle' : 'Yeni Ekle' ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="?page=ucretler?action=create" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $ucretler->title->name ?>">
                                            Ücret Adı
                                            <span class="text-danger"><?= ($ucretler->title->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Ücret adı giriniz" <?= $ucretler->title->get_attr() ?>>
                                        <span class="text-danger"><?= ($ucretler->title->error_msg) ?></span>
                                        <span class="text-muted"><?= ($ucretler->title->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $ucretler->amount->name ?>">
                                        Ücret Miktarı
                                            <span class="text-danger"><?= ($ucretler->amount->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Ücret miktarı giriniz" <?= $ucretler->amount->get_attr() ?>>
                                        <span class="text-danger"><?= ($ucretler->amount->error_msg) ?></span>
                                        <span class="text-muted"><?= ($ucretler->amount->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $ucretler->type->name ?>">
                                        Ücret Tipi
                                            <span class="text-danger"><?= ($ucretler->type->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Ücret tipi giriniz" <?= $ucretler->type->get_attr() ?>>
                                        <span class="text-danger"><?= ($ucretler->type->error_msg) ?></span>
                                        <span class="text-muted"><?= ($ucretler->type->help_msg) ?></span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary"><?= $text_action ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
