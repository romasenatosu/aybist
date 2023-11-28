<?php

$stmt = $pdo->prepare("SELECT n.id, u.fullname, n.ip, n.code, n.request_uri, n.request_method, n.created_at, n.updated_at
FROM notifications n
INNER JOIN users u ON u.id = user_id");
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
                                    <a href="<?= "/$locale/home" ?>"><?= $lang['page_home'] ?></a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= $lang['page_notifications'] ?>
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
                                        <th><?= $lang['table_user'] ?></th>
                                        <th><?= $lang['table_ip'] ?></th>
                                        <th><?= $lang['table_code'] ?></th>
                                        <th><?= $lang['table_request_uri'] ?></th>
                                        <th><?= $lang['table_request_method'] ?></th>
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
                                            <td data-bs-toggle="tooltip" title="<?= $datum['ip'] ?>"><?= substr($datum['ip'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['ip'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td data-bs-toggle="tooltip" title="<?= $datum['code'] ?>"><?= substr($datum['code'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['code'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td data-bs-toggle="tooltip" title="<?= $datum['request_uri'] ?>"><?= substr($datum['request_uri'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['request_uri'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td data-bs-toggle="tooltip" title="<?= $datum['request_method'] ?>"><?= substr($datum['request_method'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['request_method'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td><?= date($datetime_format, strtotime($datum['created_at'])); ?></td>
                                            <td><?= date($datetime_format, strtotime($datum['updated_at'])); ?></td>
                                            <td class="col-1">
                                                <a href="<?= "/$locale/notifications/read/$data_id" ?>">
                                                    <i class="ti ti-eye" title="<?= $lang['text_read'] ?>" data-bs-toggle="tooltip"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>