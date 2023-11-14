<?php
// create entities
if (!isset($text_action)) {
    $text_action = 'Ekle';
}

require_once __DIR__ . '/../../database/BelgeYonetimi.php';

$belgeYonetimi = new BelgeYonetimi();
/* $belgeYonetimi->title->value = 'hello';
$belgeYonetimi->title->required = true;

$belgeYonetimi->description->value = 'lorem ipsum';
$belgeYonetimi->description->required = true;
 */
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
                                    Yeni Ekle
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
                                        <input type="text" class="form-control" placeholder="Başlık giriniz" id="<?= $belgeYonetimi->title->name ?>"
                                                name="<?= $belgeYonetimi->title->name ?>" value="<?= $belgeYonetimi->title->value ?>"
                                                pattern="<?= $belgeYonetimi->title->pattern ?>" minlength="<?= $belgeYonetimi->title->minlength ?>"
                                                maxlength="<?= $belgeYonetimi->title->maxlength ?>" <?= ($belgeYonetimi->title->required) ? 'required': '' ?>>
                                        <span class="text-danger"><?= ($belgeYonetimi->title->error_msg) ?></span>
                                        <span class="text-muted"><?= ($belgeYonetimi->title->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $belgeYonetimi->file->name ?>">
                                            Dosya Seçin
                                            <span class="text-danger"><?= ($belgeYonetimi->file->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="file" class="form-control" id="<?= $belgeYonetimi->file->name ?>"
                                                name="<?= $belgeYonetimi->file->name ?>" value="<?= $belgeYonetimi->file->value ?>"
                                                pattern="<?= $belgeYonetimi->file->pattern ?>" minlength="<?= $belgeYonetimi->file->minlength ?>"
                                                maxlength="<?= $belgeYonetimi->file->maxlength ?>" <?= ($belgeYonetimi->file->required) ? 'required': '' ?>>
                                        <span class="text-danger"><?= ($belgeYonetimi->file->error_msg) ?></span>
                                        <span class="text-muted"><?= ($belgeYonetimi->file->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label" for="<?= $belgeYonetimi->description->name ?>">
                                            Açıklama
                                            <span class="text-danger"><?= ($belgeYonetimi->description->required) ? '*': '' ?></span>
                                        </label>
                                        <textarea class="form-control" placeholder="Açıklama giriniz" id="<?= $belgeYonetimi->description->name ?>" 
                                                    name="<?= $belgeYonetimi->description->name ?>"
                                                    pattern="<?= $belgeYonetimi->description->pattern ?>" minlength="<?= $belgeYonetimi->description->minlength ?>"
                                                    maxlength="<?= $belgeYonetimi->description->maxlength ?>"
                                                    <?= ($belgeYonetimi->description->required) ? 'required': '' ?>><?= $belgeYonetimi->description->value ?></textarea>
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
