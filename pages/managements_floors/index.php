<?php

$data = [];


if ($language_id > 0) {
    $stmt = $pdo->prepare("SELECT * FROM floors WHERE language_id = :language_id");
    $stmt->bindParam(':language_id', $language_id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
}

?>

<section class="datatables">
    <div class="row gy-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <nav style="--bs-breadcrumb-divider: '>'">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?= "/$locale/home" ?>"><?= $lang['page_home'] ?></a>
                            </li>
                            <li class="breadcrumb-item active">
                                <?= $lang['page_managements_floors'] ?>
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
                                    <th><?= $lang['table_floor'] ?></th>
                                    <th><?= $lang['table_created_at'] ?></th>
                                    <th><?= $lang['table_updated_at'] ?></th>
                                    <th data-priority="1"><?= $lang['table_action'] ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data as $datum): ?>
                                    <?php $data_id = $datum['id'] ?>
                                    <tr>
                                        <td><?= $data_id ?></td>
                                        <td data-bs-toggle="tooltip" title="<?= $datum['floor'] ?>"><?= substr($datum['floor'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['floor'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                        <td><?= date($datetime_format, strtotime($datum['created_at'])); ?></td>
                                        <td><?= date($datetime_format, strtotime($datum['updated_at'])); ?></td>
                                        <td class="col-1">
                                            <a href="<?= "/$locale/managements_floors/read/$data_id" ?>">
                                                <i class="ti ti-eye" title="<?= $lang['text_read'] ?>" data-bs-toggle="tooltip"></i>
                                            </a>
                                            <a href="<?= "/$locale/managements_floors/update/$data_id" ?>">
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
                    <a class="btn btn-primary" href="<?= "/$locale/managements_floors/create" ?>"><?= $lang['text_new'] ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
