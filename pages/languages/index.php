<?php

$stmt = $pdo->prepare("SELECT * FROM languages");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();

?>


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
                                    <?= $lang['page_languages'] ?>
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
                                        <td><?= $lang['table_code'] ?></td>
                                        <td><?= $lang['table_lang'] ?></td>
                                        <td><?= $lang['table_flag'] ?></td>
                                        <td><?= $lang['table_created_at'] ?></td>
                                        <td><?= $lang['table_updated_at'] ?></td>
                                        <th data-priority="1"><?= $lang['table_action'] ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($data as $datum): ?>
                                        <?php $data_id = $datum['id'] ?>
                                        <tr>
                                            <td><?= $data_id ?></td>
                                            <td><?= $datum['code'] ?></td>
                                            <td><?= $datum['lang'] ?></td>
                                            <td>
                                                <?php if ($datum['flag']): ?>
                                                    <a href="<?= Helpers::getServer() . $datum['flag'] ?>">
                                                        <img src="<?= $datum['flag'] ?>" alt="<?= $datum['flag'] ?>" class="img-fluid" width="32" height="32">
                                                    </a>
                                                <?php endif ?>
                                            </td>
                                            <td><?= date($datetime_format, strtotime($datum['created_at'])); ?></td>
                                            <td><?= date($datetime_format, strtotime($datum['updated_at'])); ?></td>
                                            <td class="col-1">
                                                <a href="<?= "?locale=$locale&page=languages&action=read&id=$data_id" ?>">
                                                    <i class="ti ti-eye" title="<?= $lang['text_read'] ?>" data-bs-toggle="tooltip"></i>
                                                </a>
                                                <a href="<?= "?locale=$locale&page=languages&action=update&id=$data_id" ?>">
                                                    <i class="ti ti-pencil" title="<?= $lang['text_edit'] ?>" data-bs-toggle="tooltip"></i>
                                                </a>
                                                <?php
                                                    include __DIR__ . '/_delete_form.php';
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a class="btn btn-primary" href="<?= "?locale=$locale&page=languages&action=create" ?>"><?= $lang['text_new'] ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
