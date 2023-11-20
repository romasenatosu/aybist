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
                                    <tr>
                                        <td>1</td>
                                        <td>başlık</td>
                                        <td>başlık</td>
                                        <td>lorem ipsum dolor sit amet</td>
                                        <td>başlık</td>
                                        <td>başlık</td>
                                        <td>başlık</td>
                                        <td>başlık</td>
                                        <td>başlık</td>
                                        <td>başlık</td>
                                        <td>başlık</td>
                                        <td>başlık2</td>
                                        <td>başlık3</td>
                                        <td>başlık4</td>
                                        <td>hayır</td>
                                        <td>14.11.2023</td>
                                        <td>14.11.2023</td>
                                        <td class="col-1">
                                            <a href="<?= "?locale=$locale&page=settings_general&action=update&id=1" ?>">
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