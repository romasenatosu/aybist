<div class="container-fluid mw-100">
    <section class="datatables">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <nav style="--bs-breadcrumb-divider: '>'">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="?page=home">Ana Sayfa</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    İlanlar
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table border table-hover table-striped table-bordered text-nowrap display datatable">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>KULLANICI</td>
                                        <td>İLAN BAŞLIĞI</td>
                                        <td>İÇERİK</td>
                                        <td>AÇIKLAMA</td>
                                        <td>KAYIT TARİHİ</td>
                                        <td>GÜNCELLEME TARİHİ</td>
                                        <td>İŞLEM</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>başlık</td>
                                        <td>başlık2</td>
                                        <td>başlık3</td>
                                        <td>lorem ipsum dolor sit amet</td>
                                        <td>14.11.2023</td>
                                        <td>14.11.2023</td>
                                        <td class="col-1">
                                            <a href="?page=ilanlar&action=read">
                                                <i class="ti ti-eye" title="Göster" data-bs-toggle="tooltip"></i>
                                            </a>
                                            <a href="?page=ilanlar&action=update&id=1">
                                                <i class="ti ti-pencil" title="Düzenle" data-bs-toggle="tooltip"></i>
                                            </a>
                                            <?php
                                                include __DIR__ . '/_delete_form.php';
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>başlık</td>
                                        <td>başlık2</td>
                                        <td>başlık3</td>
                                        <td>lorem ipsum dolor sit amet</td>
                                        <td>14.11.2023</td>
                                        <td>14.11.2023</td>
                                        <td class="col-1">
                                            <a href="?page=ilanlar&action=read">
                                                <i class="ti ti-eye" title="Göster" data-bs-toggle="tooltip"></i>
                                            </a>
                                            <a href="?page=ilanlar&action=update&id=2">
                                                <i class="ti ti-pencil" title="Düzenle" data-bs-toggle="tooltip"></i>
                                            </a>
                                            <?php
                                                include __DIR__ . '/_delete_form.php';
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>başlık</td>
                                        <td>başlık2</td>
                                        <td>başlık3</td>
                                        <td>lorem ipsum dolor sit amet</td>
                                        <td>14.11.2023</td>
                                        <td>14.11.2023</td>
                                        <td class="col-1">
                                            <a href="?page=ilanlar&action=read">
                                                <i class="ti ti-eye" title="Göster" data-bs-toggle="tooltip"></i>
                                            </a>
                                            <a href="?page=ilanlar&action=update&id=3">
                                                <i class="ti ti-pencil" title="Düzenle" data-bs-toggle="tooltip"></i>
                                            </a>
                                            <?php
                                                include __DIR__ . '/_delete_form.php';
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a class="btn btn-primary" href="?page=ilanlar&action=create">Yeni Ekle</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
