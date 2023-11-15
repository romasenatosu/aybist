<?php
// create sms...
?>

<div class="container-fluid mw-100">
    <section class="forms">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <nav style="--bs-breadcrumb-divider: '>'">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="?page=home">Ana Sayfa</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    SMS Gönder
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form action="?page=sms-gonder" method="post">
                                <div class="row gx-md-4 gx-0 gy-4 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="users">Kullanıcılar</label>
                                        <input type="text" class="form-control" id="users" placeholder="Kullanıcı giriniz">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="title">Başlık</label>
                                        <input type="text" class="form-control" id="title" placeholder="Başlık giriniz">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="sms">Mesaj</label>
                                        <textarea class="form-control" id="sms" placeholder="Mesajınızı giriniz"></textarea>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Gönder</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
