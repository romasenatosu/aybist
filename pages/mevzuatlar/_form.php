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
                                    <a href="?page=mevzuatlar">Mevzuatlar</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($action=='update') ? 'Düzenle' : 'Yeni Ekle' ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="?page=mevzuatlar?action=create" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $mevzuatlar->legistation_name->name ?>">
                                            Belge Adı
                                            <span class="text-danger"><?= ($mevzuatlar->legistation_name->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Belge adı giriniz" <?= $mevzuatlar->legistation_name->get_attr() ?>>
                                        <span class="text-danger"><?= ($mevzuatlar->legistation_name->error_msg) ?></span>
                                        <span class="text-muted"><?= ($mevzuatlar->legistation_name->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $mevzuatlar->file->name ?>">
                                            Dosya Seçin
                                            <span class="text-danger"><?= ($mevzuatlar->file->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="file" class="form-control" <?= $mevzuatlar->file->get_attr() ?>>
                                        <span class="text-danger"><?= ($mevzuatlar->file->error_msg) ?></span>
                                        <span class="text-muted"><?= ($mevzuatlar->file->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label" for="<?= $mevzuatlar->description->name ?>">
                                        Açıklama
                                            <span class="text-danger"><?= ($mevzuatlar->description->required) ? '*': '' ?></span>
                                        </label>
                                        <textarea type="text" class="form-control" placeholder="Açıklama giriniz" <?= $mevzuatlar->description->get_attr() ?>><?= $mevzuatlar->description->value ?></textarea>
                                        <span class="text-danger"><?= ($mevzuatlar->description->error_msg) ?></span>
                                        <span class="text-muted"><?= ($mevzuatlar->description->help_msg) ?></span>
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
