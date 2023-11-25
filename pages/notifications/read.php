<?php

$stmt = $pdo->prepare("SELECT n.id, u.fullname, n.code, n.request_uri, n.request_method, n.created_at, n.updated_at
FROM notifications n
INNER JOIN users u ON u.id = user_id
WHERE n.id = :id
");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$datum = $stmt->fetch(PDO::FETCH_ASSOC);
$stmt->closeCursor();

?>

<div class="container-fluid mw-100">
    <section class="datatables">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <nav style="--bs-breadcrumb-divider: '>'">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?= "/$locale/home" ?>"><?= $lang['page_home'] ?></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="<?= "/$locale/notifications" ?>"><?= $lang['page_notifications'] ?></a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= $datum['id'] ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table border table-hover table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th data-priority="1">#</th>
                                        <td><?= $datum['id'] ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_user'] ?></th>
                                        <td><?= $datum['fullname'] ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_code'] ?></th>
                                        <td><?= $datum['code'] ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_request_uri'] ?></th>
                                        <td><?= $datum['request_uri'] ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_request_method'] ?></th>
                                        <td><?= $datum['request_method'] ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_created_at'] ?></th>
                                        <td><?= date($datetime_format, strtotime($datum['created_at'])); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_updated_at'] ?></th>
                                        <td><?= date($datetime_format, strtotime($datum['updated_at'])); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a class="btn btn-primary" href="<?= "/$locale/notifications" ?>"><?= $lang['text_go_back'] ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
