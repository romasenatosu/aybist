<div class="container-fluid mw-100">
    <section class="datatables">
        <div class="row gy-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <nav style="--bs-breadcrumb-divider: '>'">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?= "?locale=$locale&page=home" ?>"><?= $lang['page_home'] ?></a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= $lang['page_places_cities'] ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table border table-hover table-striped table-bordered text-nowrap display datatable">
                                <thead>
                                    <tr>
                                        <th data-priority="1">#</th>
                                        <th><?= $lang['table_country'] ?></th>
                                        <th><?= $lang['table_city'] ?></th>
                                        <th><?= $lang['table_zip_code'] ?></th>
                                        <th><?= $lang['table_created_at'] ?></th>
                                        <th><?= $lang['table_updated_at'] ?></th>
                                        <th data-priority="1"><?= $lang['table_action'] ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>başlık</td>
                                        <td>başlık2</td>
                                        <td>başlık3</td>
                                        <td>14.11.2023</td>
                                        <td>14.11.2023</td>
                                        <td class="col-1">
                                            <a href="<?= "?locale=$locale&page=places_cities&action=read&id=1" ?>">
                                                <i class="ti ti-eye" title="Göster" data-bs-toggle="tooltip"></i>
                                            </a>
                                            <a href="<?= "?locale=$locale&page=places_cities&action=update&id=1" ?>">
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
                        <a class="btn btn-primary" href="?page=places_cities&action=create">Yeni Ekle</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
