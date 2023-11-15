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
                                    <a href="?page=bloklar">Bloklar</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($action=='update') ? 'Düzenle' : 'Yeni Ekle' ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="?page=bloklar?action=create" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $bloklar->complex_name->name ?>">
                                            Blok Adı
                                            <span class="text-danger"><?= ($bloklar->complex_name->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Blok adı giriniz" <?= $bloklar->complex_name->get_attr() ?>>
                                        <span class="text-danger"><?= ($bloklar->complex_name->error_msg) ?></span>
                                        <span class="text-muted"><?= ($bloklar->complex_name->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $bloklar->level_count->name ?>">
                                            Kat Sayısı
                                            <span class="text-danger"><?= ($bloklar->level_count->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Kat sayısı giriniz" <?= $bloklar->level_count->get_attr() ?>>
                                        <span class="text-danger"><?= ($bloklar->level_count->error_msg) ?></span>
                                        <span class="text-muted"><?= ($bloklar->level_count->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label" for="<?= $bloklar->description->name ?>">
                                            Açıklama
                                            <span class="text-danger"><?= ($bloklar->description->required) ? '*': '' ?></span>
                                        </label>
                                        <textarea class="form-control" placeholder="Açıklama giriniz" <?= $bloklar->description->get_attr() ?>><?= $bloklar->description->value ?></textarea>
                                        <span class="text-danger"><?= ($bloklar->description->error_msg) ?></span>
                                        <span class="text-muted"><?= ($bloklar->description->help_msg) ?></span>
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
