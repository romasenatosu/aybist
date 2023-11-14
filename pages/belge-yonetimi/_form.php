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
                                    <a href="?page=belge-yonetimi">Belge Yönetimi</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Yeni Ekle
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="?page=belge-yonetimi?action=create" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label" for="title">Başlık</label>
                                        <input type="text" class="form-control" id="title" placeholder="Başlık giriniz">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="file">Dosya Seçin</label>
                                        <input type="file" class="form-control" id="file">
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label" for="description">Açıklama</label>
                                        <textarea class="form-control" id="description" placeholder="Açıklama giriniz"></textarea>
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
