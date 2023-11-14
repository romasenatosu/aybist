<?php
// create entities

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
                                        <label class="form-label" for="title">Ünvan</label>
                                        <input type="text" class="form-control" id="title" placeholder="Ünvan giriniz">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="shortName">Kısa İsim</label>
                                        <input type="text" class="form-control" id="shortName" placeholder="Kısa isim giriniz">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="address">Adres</label>
                                        <input type="text" class="form-control" id="address" placeholder="Adres giriniz">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="taxOffice">Vergi Dairesi</label>
                                        <input type="text" class="form-control" id="taxOffice" placeholder="Vergi dairesi giriniz">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="taxNumber">Vergi Numarası</label>
                                        <input type="text" class="form-control" id="taxNumber" placeholder="Vergi numarası giriniz">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="registrationNumber">Sicil Numarası</label>
                                        <input type="text" class="form-control" id="registrationNumber" placeholder="Sicil numarası giriniz">
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
                                        <label class="form-label" for="name">İsim</label>
                                        <input type="text" class="form-control" id="name" placeholder="İsim giriniz">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Email giriniz">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="currentPassword">Mevcut Parola</label>
                                        <input type="password" class="form-control" id="currentPassword" placeholder="*******">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="newPassword">Yeni Parola</label>
                                        <input type="password" class="form-control" id="newPassword" placeholder="*******">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="newPasswordConfirm">Yeni Parola Tekrar</label>
                                        <input type="password" class="form-control" id="newPasswordConfirm" placeholder="*******">
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
