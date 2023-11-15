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
                                    <a href="?page=dukkanlar">Dükkanlar</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= ($action=='update') ? 'Düzenle' : 'Yeni Ekle' ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="?page=dukkanlar?action=create" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $dukkanlar->name_surname->name ?>">
                                            Ad Soyad
                                            <span class="text-danger"><?= ($dukkanlar->name_surname->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Ad soyad giriniz" <?= $dukkanlar->name_surname->get_attr() ?>>
                                        <span class="text-danger"><?= ($dukkanlar->name_surname->error_msg) ?></span>
                                        <span class="text-muted"><?= ($dukkanlar->name_surname->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $dukkanlar->identification->name ?>">
                                            Kimlik No
                                            <span class="text-danger"><?= ($dukkanlar->identification->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Kimlik no giriniz" <?= $dukkanlar->identification->get_attr() ?>>
                                        <span class="text-danger"><?= ($dukkanlar->identification->error_msg) ?></span>
                                        <span class="text-muted"><?= ($dukkanlar->identification->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $dukkanlar->email->name ?>">
                                            E-Mail
                                            <span class="text-danger"><?= ($dukkanlar->email->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="E-Mail giriniz" <?= $dukkanlar->email->get_attr() ?>>
                                        <span class="text-danger"><?= ($dukkanlar->email->error_msg) ?></span>
                                        <span class="text-muted"><?= ($dukkanlar->email->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $dukkanlar->password->name ?>">
                                            Parola
                                            <span class="text-danger"><?= ($dukkanlar->password->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Parola giriniz" <?= $dukkanlar->password->get_attr() ?>>
                                        <span class="text-danger"><?= ($dukkanlar->password->error_msg) ?></span>
                                        <span class="text-muted"><?= ($dukkanlar->password->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $dukkanlar->phone->name ?>">
                                            Telefon
                                            <span class="text-danger"><?= ($dukkanlar->phone->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Telefon giriniz" <?= $dukkanlar->phone->get_attr() ?>>
                                        <span class="text-danger"><?= ($dukkanlar->phone->error_msg) ?></span>
                                        <span class="text-muted"><?= ($dukkanlar->phone->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $dukkanlar->company_name->name ?>">
                                            Dükkan Adı
                                            <span class="text-danger"><?= ($dukkanlar->company_name->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Dükkan Adı giriniz" <?= $dukkanlar->company_name->get_attr() ?>>
                                        <span class="text-danger"><?= ($dukkanlar->company_name->error_msg) ?></span>
                                        <span class="text-muted"><?= ($dukkanlar->company_name->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $dukkanlar->company_id->name ?>">
                                            Dükkan No
                                            <span class="text-danger"><?= ($dukkanlar->company_id->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Dükkan no giriniz" <?= $dukkanlar->company_id->get_attr() ?>>
                                        <span class="text-danger"><?= ($dukkanlar->company_id->error_msg) ?></span>
                                        <span class="text-muted"><?= ($dukkanlar->company_id->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label" for="<?= $dukkanlar->company_description->name ?>">
                                            Dükkan Açıklaması
                                            <span class="text-danger"><?= ($dukkanlar->company_description->required) ? '*': '' ?></span>
                                        </label>
                                        <textarea class="form-control" placeholder="Dükkan açıklaması giriniz" <?= $dukkanlar->company_description->get_attr() ?>><?= $dukkanlar->company_description->value ?></textarea>
                                        <span class="text-danger"><?= ($dukkanlar->company_description->error_msg) ?></span>
                                        <span class="text-muted"><?= ($dukkanlar->company_description->help_msg) ?></span>
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
