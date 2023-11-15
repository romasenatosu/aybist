<?php

require_once __DIR__ . '/../../database/Company.php';
require_once __DIR__ . '/../../database/User.php';

$company = new Company();
$user = new User();

?>

<div class="container-fluid mw-100">
    <section class="forms">
        <div class="row gy-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <nav style="--bs-breadcrumb-divider: '>'">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="?page=home">Ana Sayfa</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    İşletme Ayarları
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="isletme.php" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $company->title->name ?>">
                                            Ünvan
                                            <span class="text-danger"><?= ($company->title->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Ünvan giriniz" <?= $company->title->get_attr() ?>>
                                        <span class="text-danger"><?= ($company->title->error_msg) ?></span>
                                        <span class="text-muted"><?= ($company->title->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $company->name_surname->name ?>">
                                            İsim Soyisim
                                            <span class="text-danger"><?= ($company->name_surname->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="İsim soyisim giriniz" <?= $company->name_surname->get_attr() ?>>
                                        <span class="text-danger"><?= ($company->name_surname->error_msg) ?></span>
                                        <span class="text-muted"><?= ($company->name_surname->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $company->address->name ?>">
                                            Adres
                                            <span class="text-danger"><?= ($company->address->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Adres giriniz" <?= $company->address->get_attr() ?>>
                                        <span class="text-danger"><?= ($company->address->error_msg) ?></span>
                                        <span class="text-muted"><?= ($company->address->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $company->tax_office->name ?>">
                                            Vergi Dairesi
                                            <span class="text-danger"><?= ($company->tax_office->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Vergi dairesi giriniz" <?= $company->tax_office->get_attr() ?>>
                                        <span class="text-danger"><?= ($company->tax_office->error_msg) ?></span>
                                        <span class="text-muted"><?= ($company->tax_office->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $company->tax_number->name ?>">
                                            Vergi Numarası
                                            <span class="text-danger"><?= ($company->tax_number->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Vergi numarası giriniz" <?= $company->tax_number->get_attr() ?>>
                                        <span class="text-danger"><?= ($company->tax_number->error_msg) ?></span>
                                        <span class="text-muted"><?= ($company->tax_number->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $company->registration_number->name ?>">
                                            Sicil Numarası
                                            <span class="text-danger"><?= ($company->registration_number->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Sicil numarası giriniz" <?= $company->registration_number->get_attr() ?>>
                                        <span class="text-danger"><?= ($company->registration_number->error_msg) ?></span>
                                        <span class="text-muted"><?= ($company->registration_number->help_msg) ?></span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Onayla</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <nav style="--bs-breadcrumb-divider: '>'">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="?page=home">Ana Sayfa</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Hesap Ayarları
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="hesap.php" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $user->name_surname->name ?>">
                                            İsim Soyisim
                                            <span class="text-danger"><?= ($user->name_surname->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="İsim soyisim giriniz" <?= $user->name_surname->get_attr() ?>>
                                        <span class="text-danger"><?= ($user->name_surname->error_msg) ?></span>
                                        <span class="text-muted"><?= ($user->name_surname->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $user->email->name ?>">
                                            Email
                                            <span class="text-danger"><?= ($user->email->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Email giriniz" <?= $user->email->get_attr() ?>>
                                        <span class="text-danger"><?= ($user->email->error_msg) ?></span>
                                        <span class="text-muted"><?= ($user->email->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $user->password->name ?>">
                                            Mevcut Parola
                                            <span class="text-danger"><?= ($user->password->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="*******" <?= $user->password->get_attr() ?>>
                                        <span class="text-danger"><?= ($user->password->error_msg) ?></span>
                                        <span class="text-muted"><?= ($user->password->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $user->new_password->name ?>">
                                            Yeni Parola
                                            <span class="text-danger"><?= ($user->new_password->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="*******" <?= $user->new_password->get_attr() ?>>
                                        <span class="text-danger"><?= ($user->new_password->error_msg) ?></span>
                                        <span class="text-muted"><?= ($user->new_password->help_msg) ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="<?= $user->new_password_again->name ?>">
                                            Yeni Parola Tekrar
                                            <span class="text-danger"><?= ($user->new_password_again->required) ? '*': '' ?></span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="*******" <?= $user->new_password_again->get_attr() ?>>
                                        <span class="text-danger"><?= ($user->new_password_again->error_msg) ?></span>
                                        <span class="text-muted"><?= ($user->new_password_again->help_msg) ?></span>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="userEngagement" required>
                                        <label class="form-check-label" for="userEngagement">
                                            <a href='#'>Kullanıcı Sözleşmesini</a> okudum.
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="personalData" required>
                                        <label class="form-check-label" for="personalData">
                                            <a href='#'>KVKK</a> metnini okudum.
                                        </label>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Onayla</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
