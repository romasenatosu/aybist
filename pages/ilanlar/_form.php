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
                                    <a href="?page=ilanlar">İlanlar</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($action=='update') ? 'Düzenle' : 'Yeni Ekle' ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="?page=ilanlar?action=create" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $ilanlar->member_name_surname->name ?>">
                                        Üye Adı Soyadı
                                            <span class="text-danger"><?= ($ilanlar->member_name_surname->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Üye adı soyadı giriniz" <?= $ilanlar->member_name_surname->get_attr() ?>>
                                        <span class="text-danger"><?= ($ilanlar->member_name_surname->error_msg) ?></span>
                                        <span class="text-muted"><?= ($ilanlar->member_name_surname->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $ilanlar->title->name ?>">
                                            Başlık
                                            <span class="text-danger"><?= ($ilanlar->title->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Başlık giriniz" <?= $ilanlar->title->get_attr() ?>>
                                        <span class="text-danger"><?= ($ilanlar->title->error_msg) ?></span>
                                        <span class="text-muted"><?= ($ilanlar->title->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label" for="<?= $ilanlar->description->name ?>">
                                            Açıklama
                                            <span class="text-danger"><?= ($ilanlar->description->required) ? '*': '' ?></span>
                                        </label>
                                        <textarea  class="form-control" placeholder="Açıklama giriniz" <?= $ilanlar->description->get_attr() ?>><?= $ilanlar->description->value ?></textarea>
                                        <span class="text-danger"><?= ($ilanlar->description->error_msg) ?></span>
                                        <span class="text-muted"><?= ($ilanlar->description->help_msg) ?></span>
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
