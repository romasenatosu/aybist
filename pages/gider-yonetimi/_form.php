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
                                    <a href="?page=gider-yonetimi">Gider Yönetimi</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($action=='update') ? 'Düzenle' : 'Yeni Ekle' ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="?page=gider-yonetimi?action=create" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $giderYonetimi->expense_type->name ?>">
                                        Gider Türü
                                            <span class="text-danger"><?= ($giderYonetimi->expense_type->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Gider türü giriniz" <?= $giderYonetimi->expense_type->get_attr() ?>>
                                        <span class="text-danger"><?= ($giderYonetimi->expense_type->error_msg) ?></span>
                                        <span class="text-muted"><?= ($giderYonetimi->expense_type->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $giderYonetimi->date->name ?>">
                                        Tarih
                                            <span class="text-danger"><?= ($giderYonetimi->date->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Tarih giriniz" <?= $giderYonetimi->date->get_attr() ?>>
                                        <span class="text-danger"><?= ($giderYonetimi->date->error_msg) ?></span>
                                        <span class="text-muted"><?= ($giderYonetimi->date->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $giderYonetimi->paid_amount->name ?>">
                                        Ödenen tutar
                                            <span class="text-danger"><?= ($giderYonetimi->paid_amount->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Ödenen tutar giriniz" <?= $giderYonetimi->paid_amount->get_attr() ?>>
                                        <span class="text-danger"><?= ($giderYonetimi->paid_amount->error_msg) ?></span>
                                        <span class="text-muted"><?= ($giderYonetimi->paid_amount->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $giderYonetimi->voucher_no->name ?>">
                                        Makbuz No
                                            <span class="text-danger"><?= ($giderYonetimi->voucher_no->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Makbuz no giriniz" <?= $giderYonetimi->voucher_no->get_attr() ?>>
                                        <span class="text-danger"><?= ($giderYonetimi->voucher_no->error_msg) ?></span>
                                        <span class="text-muted"><?= ($giderYonetimi->voucher_no->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $giderYonetimi->account_name->name ?>">
                                        Hesap Adı
                                            <span class="text-danger"><?= ($giderYonetimi->account_name->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Hesap adı giriniz" <?= $giderYonetimi->account_name->get_attr() ?>>
                                        <span class="text-danger"><?= ($giderYonetimi->account_name->error_msg) ?></span>
                                        <span class="text-muted"><?= ($giderYonetimi->account_name->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $giderYonetimi->city->name ?>">
                                        Şehir
                                            <span class="text-danger"><?= ($giderYonetimi->city->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Şehir giriniz" <?= $giderYonetimi->city->get_attr() ?>>
                                        <span class="text-danger"><?= ($giderYonetimi->city->error_msg) ?></span>
                                        <span class="text-muted"><?= ($giderYonetimi->city->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label" for="<?= $giderYonetimi->description->name ?>">
                                        Açıklama
                                            <span class="text-danger"><?= ($giderYonetimi->description->required) ? '*': '' ?></span>
                                        </label>
                                        <textarea  class="form-control" placeholder="Açıklama giriniz" <?= $giderYonetimi->description->get_attr() ?>><?= $giderYonetimi->description->value ?></textarea>
                                        <span class="text-danger"><?= ($giderYonetimi->description->error_msg) ?></span>
                                        <span class="text-muted"><?= ($giderYonetimi->description->help_msg) ?></span>
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
