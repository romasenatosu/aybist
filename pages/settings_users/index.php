<?php

$stmt = $pdo->prepare("SELECT u.id, u.fullname, u.email, u.phone, CONCAT('+', c.phone_code) AS phone_code, u.address, u.avatar, u.is_admin, u.created_at, u.updated_at
FROM users u
INNER JOIN countries c ON c.id = phone_code_id");
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
                                    <?= $lang['page_settings_users'] ?>
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
                                        <th><?= $lang['table_fullname'] ?></th>
                                        <th><?= $lang['table_email'] ?></th>
                                        <th><?= $lang['table_phone'] ?></th>
                                        <th><?= $lang['table_address'] ?></th>
                                        <th><?= $lang['table_avatar'] ?></th>
                                        <th><?= $lang['table_is_admin'] ?></th>
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
                                            <td data-bs-toggle="tooltip" title="<?= $datum['fullname'] ?>"><?= substr($datum['fullname'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['fullname'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td data-bs-toggle="tooltip" title="<?= $datum['email'] ?>"><?= substr($datum['email'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['email'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td data-bs-toggle="tooltip" title="<?= ($datum['phone_code'] . ' ' . $datum['phone']) ?>"><?= substr(($datum['phone_code'] . ' ' . $datum['phone']) ?? '', 0, $max_abbr) ?><?= (strlen(($datum['phone_code'] . ' ' . $datum['phone']) ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td data-bs-toggle="tooltip" title="<?= $datum['address'] ?>"><?= substr($datum['address'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['address'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td>
                                                <?php if ($datum['avatar']): ?>
                                                    <a href="<?= getServer() . $datum['avatar'] ?>">
                                                        <img src="<?= $datum['avatar'] ?>" alt="<?= $datum['avatar'] ?>" class="img-fluid" width="32" height="32">
                                                    </a>
                                                <?php endif ?>
                                            </td>
                                            <td><?= ($datum['is_admin']) ? $lang['text_yes'] : $lang['text_no'] ?></td>
                                            <td><?= date($datetime_format, strtotime($datum['created_at'])); ?></td>
                                            <td><?= date($datetime_format, strtotime($datum['updated_at'])); ?></td>
                                            <td class="col-1">
                                                <a href="<?= "?locale=$locale&page=settings_users&action=read&id=$data_id" ?>">
                                                    <i class="ti ti-eye" title="<?= $lang['text_read'] ?>" data-bs-toggle="tooltip"></i>
                                                </a>
                                                <a href="<?= "?locale=$locale&page=settings_users&action=update&id=$data_id" ?>">
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
                        <a class="btn btn-primary" href="<?= "?locale=$locale&page=settings_users&action=create" ?>"><?= $lang['text_new'] ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
