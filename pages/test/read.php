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
                                    <a href="<?= "?locale=$locale&page=test" ?>"><?= $lang['page_test'] ?></a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <?= $id ?>
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
                                        <td><?= $id ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_title'] ?></th>
                                        <td>başlık1</td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_title'] ?></th>
                                        <td>başlık2</td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_title'] ?></th>
                                        <td>başlık3</td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_title'] ?></th>
                                        <td>başlık4</td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_description'] ?></th>
                                        <td>lorem ipsum dolor sit amet</td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_created_at'] ?></th>
                                        <td><?= date($datetime_format, strtotime($datum['created_at'])); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?= $lang['table_updated_at'] ?></th>
                                        <td><?= date($datetime_format, strtotime($datum['created_at'])); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a class="btn btn-primary" href="<?= "?locale=$locale&page=test" ?>"><?= $lang['text_go_back'] ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
