<?php

$stmt = $pdo->prepare("SELECT n.id, u.fullname, n.ipv4, n.ipv6, n.created_at, n.updated_at
FROM notifications_ips n
INNER JOIN users u ON u.id = n.user_id
WHERE n.id = :id
");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$datum = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                                    <a href="<?= "?locale=$locale&page=home" ?>"><?= $lang['page_home'] ?></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="<?= "?locale=$locale&page=notifications_ips" ?>"><?= $lang['page_notifications_ips'] ?></a>
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
                                        <td data-bs-toggle="tooltip" title="<?= $datum['fullname'] ?>"><?= substr($datum['fullname'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['fullname'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_ipv4'] ?></th>
                                        <td data-bs-toggle="tooltip" title="<?= $datum['ipv4'] ?>"><?= substr($datum['ipv4'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['ipv4'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_ipv6'] ?></th>
                                        <td data-bs-toggle="tooltip" title="<?= $datum['ipv6'] ?>"><?= substr($datum['ipv6'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['ipv6'] ?? '') > $max_abbr) ? '...' : '' ?></td>
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
                        <a class="btn btn-primary" href="<?= "?locale=$locale&page=notifications_ips" ?>"><?= $lang['text_go_back'] ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
