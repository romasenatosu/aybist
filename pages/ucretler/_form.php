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
                                    <a href="?page=ucretler">Ücret Yönetimi</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Yeni Ekle
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="?page=ucretler?action=create" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="priceName">Ücret Adı</label>
                                        <input type="text" class="form-control" id="priceName" placeholder="Ücret adı giriniz">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="priceAmount">Ücret Miktarı</label>
                                        <input type="text" class="form-control" id="priceAmount" placeholder="Ücret miktarı giriniz">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="priceType">Ücret Tipi</label>
                                        <input type="text" class="form-control" id="priceType" placeholder="Ücret tipi giriniz">
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
