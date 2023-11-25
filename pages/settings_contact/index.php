<?php

$data = [];


if ($language_id > 0) {
    $stmt = $pdo->prepare("SELECT sc.id, sc.address, sc.phone, CONCAT('+', c_phone.phone_code) as phone_code, sc.cell_phone, CONCAT('+', c_cell_phone.phone_code) as cell_phone_code, sc.fax, CONCAT('+', c_fax.phone_code) as fax_code, sc.email, sc.captcha_key, sc.captcha_secret_key, sc.google_maps, sc.created_at, sc.updated_at
    FROM settings_contact sc
    INNER JOIN countries c_phone ON c_phone.id = sc.phone_code_id
    INNER JOIN countries c_cell_phone ON c_cell_phone.id = sc.cell_phone_code_id
    INNER JOIN countries c_fax ON c_fax.id = sc.fax_code_id
    WHERE sc.language_id = :language_id");
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
                                    <a href="<?= "/$locale/home" ?>"><?= $lang['page_home'] ?></a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= $lang['page_settings_contact'] ?>
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
                                        <th><?= $lang['table_address'] ?></th>
                                        <th><?= $lang['table_phone'] ?></th>
                                        <th><?= $lang['table_cell_phone'] ?></th>
                                        <th><?= $lang['table_fax'] ?></th>
                                        <th><?= $lang['table_email'] ?></th>
                                        <th><?= $lang['table_captcha_key'] ?></th>
                                        <th><?= $lang['table_captcha_secret_key'] ?></th>
                                        <th><?= $lang['table_google_maps'] ?></th>
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
                                            <td data-bs-toggle="tooltip" title="<?= $datum['address'] ?>"><?= substr($datum['address'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['address'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td data-bs-toggle="tooltip" title="<?= ($datum['phone_code'] . ' ' . $datum['phone']) ?>"><?= substr(($datum['phone_code'] . ' ' . $datum['phone']) ?? '', 0, $max_abbr) ?><?= (strlen(($datum['phone_code'] . ' ' . $datum['phone']) ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td data-bs-toggle="tooltip" title="<?= ($datum['cell_phone_code'] . ' ' . $datum['cell_phone']) ?>"><?= substr(($datum['cell_phone_code'] . ' ' . $datum['cell_phone']) ?? '', 0, $max_abbr) ?><?= (strlen(($datum['cell_phone_code'] . ' ' . $datum['cell_phone']) ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td data-bs-toggle="tooltip" title="<?= ($datum['fax_code'] . ' ' . $datum['fax']) ?>"><?= substr(($datum['fax_code'] . ' ' . $datum['fax']) ?? '', 0, $max_abbr) ?><?= (strlen(($datum['fax_code'] . ' ' . $datum['fax']) ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td data-bs-toggle="tooltip" title="<?= $datum['email'] ?>"><?= substr($datum['email'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['email'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td data-bs-toggle="tooltip" title="<?= $datum['captcha_key'] ?>"><?= substr($datum['captcha_key'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['captcha_key'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td data-bs-toggle="tooltip" title="<?= $datum['captcha_secret_key'] ?>"><?= substr($datum['captcha_secret_key'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['captcha_secret_key'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td data-bs-toggle="tooltip" title="<?= $datum['google_maps'] ?>"><?= substr($datum['google_maps'] ?? '', 0, $max_abbr) ?><?= (strlen($datum['google_maps'] ?? '') > $max_abbr) ? '...' : '' ?></td>
                                            <td><?= date($datetime_format, strtotime($datum['created_at'])); ?></td>
                                            <td><?= date($datetime_format, strtotime($datum['updated_at'])); ?></td>
                                            <td class="col-1">
                                                <a href="<?= "/$locale/settings_contact/update/$data_id" ?>">
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
