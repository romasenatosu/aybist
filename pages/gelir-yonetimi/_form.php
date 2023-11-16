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
                                    <a href="?page=gelir-yonetimi">Gelir Yönetimi</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($action=='update') ? 'Düzenle' : 'Yeni Ekle' ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="?page=gelir-yonetimi?action=create" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $gelirYonetimi->member_name_surname->name ?>">
                                        Üye Adı Soyadı
                                            <span class="text-danger"><?= ($gelirYonetimi->member_name_surname->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Üye adı soyadı giriniz" <?= $gelirYonetimi->member_name_surname->get_attr() ?>>
                                        <span class="text-danger"><?= ($gelirYonetimi->member_name_surname->error_msg) ?></span>
                                        <span class="text-muted"><?= ($gelirYonetimi->member_name_surname->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $gelirYonetimi->income_type->name ?>">
                                        Gelir Türü
                                            <span class="text-danger"><?= ($gelirYonetimi->income_type->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Gelir türü giriniz" <?= $gelirYonetimi->income_type->get_attr() ?>>
                                        <span class="text-danger"><?= ($gelirYonetimi->income_type->error_msg) ?></span>
                                        <span class="text-muted"><?= ($gelirYonetimi->income_type->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $gelirYonetimi->month_payment->name ?>">
                                        Aidat Ödenecek Ay
                                            <span class="text-danger"><?= ($gelirYonetimi->month_payment->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Aidat ödenecek giriniz" <?= $gelirYonetimi->month_payment->get_attr() ?>>
                                        <span class="text-danger"><?= ($gelirYonetimi->month_payment->error_msg) ?></span>
                                        <span class="text-muted"><?= ($gelirYonetimi->month_payment->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $gelirYonetimi->year->name ?>">
                                        Yıl
                                            <span class="text-danger"><?= ($gelirYonetimi->year->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Yıl giriniz" <?= $gelirYonetimi->year->get_attr() ?>>
                                        <span class="text-danger"><?= ($gelirYonetimi->year->error_msg) ?></span>
                                        <span class="text-muted"><?= ($gelirYonetimi->year->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $gelirYonetimi->date->name ?>">
                                        Tarih
                                            <span class="text-danger"><?= ($gelirYonetimi->date->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Tarih giriniz" <?= $gelirYonetimi->date->get_attr() ?>>
                                        <span class="text-danger"><?= ($gelirYonetimi->date->error_msg) ?></span>
                                        <span class="text-muted"><?= ($gelirYonetimi->date->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $gelirYonetimi->paid_amount->name ?>">
                                        Ödenen Tutar
                                            <span class="text-danger"><?= ($gelirYonetimi->paid_amount->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Ödenen tutar giriniz" <?= $gelirYonetimi->paid_amount->get_attr() ?>>
                                        <span class="text-danger"><?= ($gelirYonetimi->paid_amount->error_msg) ?></span>
                                        <span class="text-muted"><?= ($gelirYonetimi->paid_amount->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $gelirYonetimi->voucher_no->name ?>">
                                        Makbuz No
                                            <span class="text-danger"><?= ($gelirYonetimi->voucher_no->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Makbuz no giriniz" <?= $gelirYonetimi->voucher_no->get_attr() ?>>
                                        <span class="text-danger"><?= ($gelirYonetimi->voucher_no->error_msg) ?></span>
                                        <span class="text-muted"><?= ($gelirYonetimi->voucher_no->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $gelirYonetimi->account_name->name ?>">
                                        Hesap Adı
                                            <span class="text-danger"><?= ($gelirYonetimi->account_name->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Hesap adı giriniz" <?= $gelirYonetimi->account_name->get_attr() ?>>
                                        <span class="text-danger"><?= ($gelirYonetimi->account_name->error_msg) ?></span>
                                        <span class="text-muted"><?= ($gelirYonetimi->account_name->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $gelirYonetimi->city->name ?>">
                                        Şehir
                                            <span class="text-danger"><?= ($gelirYonetimi->city->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Şehir giriniz" <?= $gelirYonetimi->city->get_attr() ?>>
                                        <span class="text-danger"><?= ($gelirYonetimi->city->error_msg) ?></span>
                                        <span class="text-muted"><?= ($gelirYonetimi->city->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label" for="<?= $gelirYonetimi->description->name ?>">
                                        Açıklama
                                            <span class="text-danger"><?= ($gelirYonetimi->description->required) ? '*': '' ?></span>
                                        </label>
                                        <textarea class="form-control" placeholder="Açıklama giriniz" <?= $gelirYonetimi->description->get_attr() ?>><?= $gelirYonetimi->description->value ?></textarea>
                                        <span class="text-danger"><?= ($gelirYonetimi->description->error_msg) ?></span>
                                        <span class="text-muted"><?= ($gelirYonetimi->description->help_msg) ?></span>
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
