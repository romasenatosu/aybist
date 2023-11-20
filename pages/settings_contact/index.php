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
                                    <tr>
                                        <td>1</td>
                                        <td>başlık</td>
                                        <td>başlık2</td>
                                        <td>başlık3</td>
                                        <td>başlık4</td>
                                        <td>lorem ipsum dolor sit amet</td>
                                        <td>lorem ipsum dolor sit amet</td>
                                        <td>lorem ipsum dolor sit amet</td>
                                        <td>lorem ipsum dolor sit amet</td>
                                        <td><?= date($datetime_format, strtotime($datum['created_at'])); ?></td>
                                        <td><?= date($datetime_format, strtotime($datum['updated_at'])); ?></td>
                                        <td class="col-1">
                                            <a href="<?= "?locale=$locale&page=settings_contact&action=update&id=$data_id" ?>">
                                                <i class="ti ti-pencil" title="<?= $lang['text_edit'] ?>" data-bs-toggle="tooltip"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
