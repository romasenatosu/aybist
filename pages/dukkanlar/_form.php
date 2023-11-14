<?php
// create entities
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
                                    Yeni Ekle
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="?page=dukkanlar?action=create" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="nameSurname">Ad Soyad</label>
                                        <input type="text" class="form-control" id="nameSurname" placeholder="Ad Soyad giriniz">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="identification">Kimlik No</label>
                                        <input type="text" class="form-control" id="identification" placeholder="Kimlik no giriniz">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="email">E-Mail</label>
                                        <input type="email" class="form-control" id="email" placeholder="E-Mail giriniz">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="password">Parola</label>
                                        <input type="password" class="form-control" id="password" placeholder="Parola giriniz">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="phone">Telefon</label>
                                        <input type="text" class="form-control" id="phone" placeholder="Telefon giriniz">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="companyName">Dükkan Adı</label>
                                        <input type="text" class="form-control" id="companyName" placeholder="Dükkan Adı giriniz">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="companyId">Dükkan No</label>
                                        <input type="text" class="form-control" id="companyId" placeholder="Dükkan no giriniz">
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label" for="companyDescription">Dükkan Açıklaması</label>
                                        <textarea class="form-control" id="companyDescription" placeholder="Dükkan açıklaması giriniz"></textarea>
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
