<?php

$data = [];


if ($language_id > 0) {
    $stmt = $pdo->prepare("SELECT * FROM settings WHERE language_id = :language_id");
    $stmt->bindParam(':language_id', $language_id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
}

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
                                    <?= $lang['page_settings_general'] ?>
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
                                        <th><?= $lang['table_company'] ?></th>
                                        <th><?= $lang['table_slogan'] ?></th>
                                        <th><?= $lang['table_description'] ?></th>
                                        <th><?= $lang['table_keywords'] ?></th>
                                        <th><?= $lang['table_site_title'] ?></th>
                                        <th><?= $lang['table_site_url'] ?></th>
                                        <th><?= $lang['table_smtp_url'] ?></th>
                                        <th><?= $lang['table_smtp_password'] ?></th>
                                        <th><?= $lang['table_smtp_port'] ?></th>
                                        <th><?= $lang['table_normal_photo'] ?></th> <!-- photo (w*h) -->
                                        <th><?= $lang['table_top_photo'] ?></th> <!-- photo (w*h) -->
                                        <th><?= $lang['table_small_photo'] ?></th> <!-- photo (w*h) -->
                                        <th><?= $lang['table_debug_mode'] ?></th>
                                        <th><?= $lang['table_maintenance_mod'] ?></th>
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
                                            <td data-bs-toggle="tooltip" title="<?= $datum['company'] ?>"><?= substr($datum['company'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['company'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td data-bs-toggle="tooltip" title="<?= $datum['slogan'] ?>"><?= substr($datum['slogan'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['slogan'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td data-bs-toggle="tooltip" title="<?= $datum['description'] ?>"><?= substr($datum['description'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['description'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td data-bs-toggle="tooltip" title="<?= $datum['keywords'] ?>"><?= substr($datum['keywords'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['keywords'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td data-bs-toggle="tooltip" title="<?= $datum['site_title'] ?>"><?= substr($datum['site_title'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['site_title'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td data-bs-toggle="tooltip" title="<?= $datum['site_url'] ?>"><?= substr($datum['site_url'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['site_url'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td data-bs-toggle="tooltip" title="<?= $datum['smtp_url'] ?>"><?= substr($datum['smtp_url'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['smtp_url'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td data-bs-toggle="tooltip" title="<?= $datum['smtp_password'] ?>"><?= substr($datum['smtp_password'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['smtp_password'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td><?= $datum['smtp_port'] ?></td>
                                            <td>
                                                <?php if ($datum['normal_photo']): ?>
                                                    <a href="<?= Helpers::getServer() . $datum['normal_photo'] ?>">
                                                        <img src="<?= $datum['normal_photo'] ?>" alt="<?= $datum['normal_photo'] ?>" class="img-fluid" width="32" height="32">
                                                    </a>
                                                    <?= "(" . $datum['normal_photo_width'] . "x" . $datum['normal_photo_height'] . ")" ?>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <?php if ($datum['top_photo']): ?>
                                                    <a href="<?= Helpers::getServer() . $datum['top_photo'] ?>">
                                                        <img src="<?= $datum['top_photo'] ?>" alt="<?= $datum['top_photo'] ?>" class="img-fluid" width="32" height="32">
                                                    </a>
                                                    <?= "(" . $datum['top_photo_width'] . "x" . $datum['top_photo_height'] . ")" ?>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <?php if ($datum['small_photo']): ?>
                                                    <a href="<?= Helpers::getServer() . $datum['small_photo'] ?>">
                                                        <img src="<?= $datum['flag'] ?>" alt="<?= $datum['small_photo'] ?>" class="img-fluid" width="32" height="32">
                                                    </a>
                                                    <?= "(" . $datum['small_photo_width'] . "x" . $datum['small_photo_height'] . ")" ?>
                                                <?php endif ?>
                                            </td>
                                            <td><?= ($datum['debug_mode']) ? $lang['text_yes'] : $lang['text_no'] ?></td>
                                            <td><?= ($datum['maintenance_mode']) ? $lang['text_yes'] : $lang['text_no'] ?></td>
                                            <td><?= date($datetime_format, strtotime($datum['created_at'])); ?></td>
                                            <td><?= date($datetime_format, strtotime($datum['updated_at'])); ?></td>
                                            <td class="col-1">
                                                <a href="<?= "?locale=$locale&page=settings_general&action=update&id=$data_id" ?>">
                                                    <i class="ti ti-pencil" title="<?= $lang['text_edit'] ?>" data-bs-toggle="tooltip"></i>
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
