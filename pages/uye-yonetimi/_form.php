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
                                    <a href="?page=uye-yonetimi">Üye Yönetimi</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($action=='update') ? 'Düzenle' : 'Yeni Ekle' ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="?page=uye-yonetimi?action=create" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $uyeYonetimi->name_surname->name ?>">
                                            Ad Soyad
                                            <span class="text-danger"><?= ($uyeYonetimi->name_surname->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Ad Soyad giriniz" <?= $uyeYonetimi->name_surname->get_attr() ?>>
                                        <span class="text-danger"><?= ($uyeYonetimi->name_surname->error_msg) ?></span>
                                        <span class="text-muted"><?= ($uyeYonetimi->name_surname->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $uyeYonetimi->identification->name ?>">
                                        Kimlik No
                                            <span class="text-danger"><?= ($uyeYonetimi->identification->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Kimlik no giriniz" <?= $uyeYonetimi->identification->get_attr() ?>>
                                        <span class="text-danger"><?= ($uyeYonetimi->identification->error_msg) ?></span>
                                        <span class="text-muted"><?= ($uyeYonetimi->identification->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $uyeYonetimi->email->name ?>">
                                            E-Mail
                                            <span class="text-danger"><?= ($uyeYonetimi->email->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="E-Mail giriniz" <?= $uyeYonetimi->email->get_attr() ?>>
                                        <span class="text-danger"><?= ($uyeYonetimi->email->error_msg) ?></span>
                                        <span class="text-muted"><?= ($uyeYonetimi->email->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $uyeYonetimi->password->name ?>">
                                            Parola
                                            <span class="text-danger"><?= ($uyeYonetimi->password->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Parola giriniz" <?= $uyeYonetimi->password->get_attr() ?>>
                                        <span class="text-danger"><?= ($uyeYonetimi->password->error_msg) ?></span>
                                        <span class="text-muted"><?= ($uyeYonetimi->password->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $uyeYonetimi->phone->name ?>">
                                            Telefon
                                            <span class="text-danger"><?= ($uyeYonetimi->phone->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Telefon giriniz" <?= $uyeYonetimi->phone->get_attr() ?>>
                                        <span class="text-danger"><?= ($uyeYonetimi->phone->error_msg) ?></span>
                                        <span class="text-muted"><?= ($uyeYonetimi->phone->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $uyeYonetimi->birthdate->name ?>">
                                        Doğum Tarihi
                                            <span class="text-danger"><?= ($uyeYonetimi->birthdate->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Doğum tarihi giriniz" <?= $uyeYonetimi->birthdate->get_attr() ?>>
                                        <span class="text-danger"><?= ($uyeYonetimi->birthdate->error_msg) ?></span>
                                        <span class="text-muted"><?= ($uyeYonetimi->birthdate->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $uyeYonetimi->birthplace->name ?>">
                                        Doğum Yeri
                                            <span class="text-danger"><?= ($uyeYonetimi->birthplace->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Doğum yeri giriniz" <?= $uyeYonetimi->birthplace->get_attr() ?>>
                                        <span class="text-danger"><?= ($uyeYonetimi->birthplace->error_msg) ?></span>
                                        <span class="text-muted"><?= ($uyeYonetimi->birthplace->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label" for="<?= $uyeYonetimi->description->name ?>">
                                            Açıklama
                                            <span class="text-danger"><?= ($uyeYonetimi->description->required) ? '*': '' ?></span>
                                        </label>
                                        <textarea class="form-control" placeholder="Açıklama giriniz" <?= $uyeYonetimi->description->get_attr() ?>><?= $uyeYonetimi->description->value ?></textarea>
                                        <span class="text-danger"><?= ($uyeYonetimi->description->error_msg) ?></span>
                                        <span class="text-muted"><?= ($uyeYonetimi->description->help_msg) ?></span>
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
