<?php

$datum = [];


if ($language_id > 0) {
    $stmt = $pdo->prepare("SELECT m.id, b.block, f.floor, flat.flat, u.fullname as owner, u2.fullname as rental, m.management, m.description, m.fee_status, m.created_at, m.updated_at
        FROM managements m
        INNER JOIN blocks b ON b.id = m.block_id
        INNER JOIN floors f ON f.id = m.floor_id
        INNER JOIN flats flat ON flat.id = m.flat_id
        INNER JOIN users u ON u.id = m.manager_owner_id
        INNER JOIN users u2 ON u2.id = m.manager_rental_id
        WHERE m.language_id = :language_id AND m.id = :id"
    );

    $stmt->bindParam(':language_id', $language_id, PDO::PARAM_INT);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $datum = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
}

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
                                    <a href="<?= "?locale=$locale&page=managements" ?>"><?= $lang['page_managements'] ?></a>
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
                                        <th><?= $lang['table_block'] ?></th>
                                        <td><?= $datum['block'] ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_floor'] ?></th>
                                        <td><?= $datum['floor'] ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_flat'] ?></th>
                                        <td><?= $datum['flat'] ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_manager_owner'] ?></th>
                                        <td><?= $datum['owner'] ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_manager_rental'] ?></th>
                                        <td><?= $datum['rental'] ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_name'] ?></th>
                                        <td><?= $datum['management'] ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_description'] ?></th>
                                        <td><?= $datum['description'] ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_fee_status'] ?></th>
                                        <td><?= ($datum['fee_status']) ? $lang['text_exempted'] : $lang['text_not_exempted'] ?></td>
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
                        <a class="btn btn-primary" href="<?= "?locale=$locale&page=managements" ?>"><?= $lang['text_go_back'] ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
