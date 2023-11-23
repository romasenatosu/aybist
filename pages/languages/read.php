<?php

$stmt = $pdo->prepare("SELECT * FROM languages WHERE id = :id");
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
                                    <a href="<?= "?locale=$locale&page=home" ?>"><?= $lang['page_home'] ?></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="<?= "?locale=$locale&page=languages" ?>"><?= $lang['page_languages'] ?></a>
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
                                        <th><?= $lang['table_code'] ?></th>
                                        <td><?= $datum['code'] ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_lang'] ?></th>
                                        <td><?= $datum['lang'] ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_flag'] ?></th>
                                        <td>
                                            <?php if ($datum['flag']): ?>
                                                <a href="<?= getServer() . $datum['flag'] ?>">
                                                    <img src="<?= $datum['flag'] ?>" alt="<?= $datum['flag'] ?>" class="img-fluid" width="32" height="32">
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
                        <a class="btn btn-primary" href="<?= "?locale=$locale&page=languages" ?>"><?= $lang['text_go_back'] ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
