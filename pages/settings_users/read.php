<?php

$stmt = $pdo->prepare("SELECT u.id, u.fullname, u.email, u.phone, CONCAT('+', c.phone_code) AS phone_code, u.address, u.avatar, u.is_admin, u.created_at, u.updated_at
FROM users u
INNER JOIN countries c ON c.id = phone_code_id
WHERE u.id = :id
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
                                    <a href="<?= "/$locale/settings_users" ?>"><?= $lang['page_settings_users'] ?></a>
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
                                        <th><?= $lang['table_fullname'] ?></th>
                                        <td><?= $datum['fullname'] ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_email'] ?></th>
                                        <td><?= $datum['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_phone'] ?></th>
                                        <td><?= $datum['phone_code'] . ' ' . $datum['phone'] ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_address'] ?></th>
                                        <td><?= $datum['address'] ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_is_admin'] ?></th>
                                        <td><?= ($datum['is_admin']) ? $lang['text_yes'] : $lang['text_no'] ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_avatar'] ?></th>
                                        <td>
                                            <?php if ($datum['avatar']): ?>
                                                <a href="<?= Helpers::getHost() . $datum['avatar'] ?>">
                                                    <img src="<?= $datum['avatar'] ?>" alt="<?= $datum['avatar'] ?>" class="img-fluid" width="32" height="32">
                                                </a>
                                            <?php endif ?>
                                        </td>
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
                        <a class="btn btn-primary" href="<?= "/$locale/settings_users" ?>"><?= $lang['text_go_back'] ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
