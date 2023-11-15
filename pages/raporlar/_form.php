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
                                    <a href="?page=raporlar">Raporlar</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($action=='update') ? 'Düzenle' : 'Yeni Ekle' ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="?page=raporlar?action=create" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                <div class="col-md-4">
                                        <label class="form-label" for="<?= $raporlar->member_name_surname->name ?>">
                                        Üye Adı Soyadı
                                            <span class="text-danger"><?= ($raporlar->member_name_surname->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Üye adı soyadı giriniz" <?= $raporlar->member_name_surname->get_attr() ?>>
                                        <span class="text-danger"><?= ($raporlar->member_name_surname->error_msg) ?></span>
                                        <span class="text-muted"><?= ($raporlar->member_name_surname->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $raporlar->income_type->name ?>">
                                        Gelir Türü
                                            <span class="text-danger"><?= ($raporlar->income_type->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Gelir türü giriniz" <?= $raporlar->income_type->get_attr() ?>>
                                        <span class="text-danger"><?= ($raporlar->income_type->error_msg) ?></span>
                                        <span class="text-muted"><?= ($raporlar->income_type->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $raporlar->month_payment->name ?>">
                                        Aidat Ödenecek Ay
                                            <span class="text-danger"><?= ($raporlar->month_payment->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Aidat ödenecek giriniz" <?= $raporlar->month_payment->get_attr() ?>>
                                        <span class="text-danger"><?= ($raporlar->month_payment->error_msg) ?></span>
                                        <span class="text-muted"><?= ($raporlar->month_payment->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $raporlar->year->name ?>">
                                        Yıl
                                            <span class="text-danger"><?= ($raporlar->year->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Yıl giriniz" <?= $raporlar->year->get_attr() ?>>
                                        <span class="text-danger"><?= ($raporlar->year->error_msg) ?></span>
                                        <span class="text-muted"><?= ($raporlar->year->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $raporlar->date->name ?>">
                                        Tarih
                                            <span class="text-danger"><?= ($raporlar->date->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Tarih giriniz" <?= $raporlar->date->get_attr() ?>>
                                        <span class="text-danger"><?= ($raporlar->date->error_msg) ?></span>
                                        <span class="text-muted"><?= ($raporlar->date->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $raporlar->paid_amount->name ?>">
                                        Ödenen Tutar
                                            <span class="text-danger"><?= ($raporlar->paid_amount->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Ödenen tutar giriniz" <?= $raporlar->paid_amount->get_attr() ?>>
                                        <span class="text-danger"><?= ($raporlar->paid_amount->error_msg) ?></span>
                                        <span class="text-muted"><?= ($raporlar->paid_amount->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $raporlar->voucher_no->name ?>">
                                        Makbuz No
                                            <span class="text-danger"><?= ($raporlar->voucher_no->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Makbuz no giriniz" <?= $raporlar->voucher_no->get_attr() ?>>
                                        <span class="text-danger"><?= ($raporlar->voucher_no->error_msg) ?></span>
                                        <span class="text-muted"><?= ($raporlar->voucher_no->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $raporlar->account_name->name ?>">
                                        Hesap Adı
                                            <span class="text-danger"><?= ($raporlar->account_name->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Hesap adı giriniz" <?= $raporlar->account_name->get_attr() ?>>
                                        <span class="text-danger"><?= ($raporlar->account_name->error_msg) ?></span>
                                        <span class="text-muted"><?= ($raporlar->account_name->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $raporlar->city->name ?>">
                                        Şehir
                                            <span class="text-danger"><?= ($raporlar->city->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Şehir giriniz" <?= $raporlar->city->get_attr() ?>>
                                        <span class="text-danger"><?= ($raporlar->city->error_msg) ?></span>
                                        <span class="text-muted"><?= ($raporlar->city->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label" for="<?= $raporlar->description->name ?>">
                                        Açıklama
                                            <span class="text-danger"><?= ($raporlar->description->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Açıklama giriniz" <?= $raporlar->description->get_attr() ?>><?= $raporlar->description->value ?></textarea>
                                        <span class="text-danger"><?= ($raporlar->description->error_msg) ?></span>
                                        <span class="text-muted"><?= ($raporlar->description->help_msg) ?></span>
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
