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
                                    <a href="?page=belge-yonetimi">Belge Yönetimi</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($action=='update') ? 'Düzenle' : 'Yeni Ekle' ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="?page=belge-yonetimi?action=create" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $belgeYonetimi->title->name ?>">
                                            Başlık
                                            <span class="text-danger"><?= ($belgeYonetimi->title->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Başlık giriniz" <?= $belgeYonetimi->title->get_attr() ?>>
                                        <span class="text-danger"><?= ($belgeYonetimi->title->error_msg) ?></span>
                                        <span class="text-muted"><?= ($belgeYonetimi->title->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $belgeYonetimi->file->name ?>">
                                            Dosya Seçin
                                            <span class="text-danger"><?= ($belgeYonetimi->file->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="file" class="form-control" <?= $belgeYonetimi->file->get_attr() ?>>
                                        <span class="text-danger"><?= ($belgeYonetimi->file->error_msg) ?></span>
                                        <span class="text-muted"><?= ($belgeYonetimi->file->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label" for="<?= $belgeYonetimi->description->name ?>">
                                            Açıklama
                                            <span class="text-danger"><?= ($belgeYonetimi->description->required) ? '*': '' ?></span>
                                        </label>
                                        <textarea class="form-control" placeholder="Açıklama giriniz" <?= $belgeYonetimi->description->get_attr() ?>><?= $belgeYonetimi->description->value ?></textarea>
                                        <span class="text-danger"><?= ($belgeYonetimi->description->error_msg) ?></span>
                                        <span class="text-muted"><?= ($belgeYonetimi->description->help_msg) ?></span>
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
