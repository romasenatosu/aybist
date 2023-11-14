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
                                    Mevzuat Yönetimi
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
                                        <td>BELGE İSMİ</td>
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
                                        <td>lorem ipsum dolor sit amet</td>
                                        <td>14.11.2023</td>
                                        <td>14.11.2023</td>
                                        <td class="col-1">
                                            <a href="?page=mevzuatlar&action=read">
                                                <i class="ti ti-eye" title="Göster" data-bs-toggle="tooltip"></i>
                                            </a>
                                            <a href="?page=mevzuatlar&action=update">
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
                                        <td>lorem ipsum dolor sit amet</td>
                                        <td>14.11.2023</td>
                                        <td>14.11.2023</td>
                                        <td class="col-1">
                                            <a href="?page=mevzuatlar&action=read">
                                                <i class="ti ti-eye" title="Göster" data-bs-toggle="tooltip"></i>
                                            </a>
                                            <a href="?page=mevzuatlar&action=update">
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
                                        <td>lorem ipsum dolor sit amet</td>
                                        <td>14.11.2023</td>
                                        <td>14.11.2023</td>
                                        <td class="col-1">
                                            <a href="?page=mevzuatlar&action=read">
                                                <i class="ti ti-eye" title="Göster" data-bs-toggle="tooltip"></i>
                                            </a>
                                            <a href="?page=mevzuatlar&action=update">
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
                        <a class="btn btn-primary" href="?page=mevzuatlar&action=create">Yeni Ekle</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
