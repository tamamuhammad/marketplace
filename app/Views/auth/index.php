<?= $this->extend('layout/auth') ?>

<?= $this->section('content') ?>
<div class="row w-100" style="background-color: #dc3545;justify-content:space-evenly; padding-top: 50px; padding-bottom: 50px;">
    <div class="brand-box d-flex flex-column align-items-center">
        <img src="/img/logo.png" width="240px"><br>
        <h4 class="text-white text-center login-logo">Tempat Jualan Online No.1<br>di Kabupaten Pekalongan</h4>
    </div>
    <div class="login-box">
        <?php if (session()->getFlashdata('false')) { ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('false') ?>
            </div>
        <?php } else if (session()->getFlashdata('true')) { ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('true') ?>
            </div>
        <?php } ?>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <div class="login-logo">
                    <a href="/">Login<b> Administrator</b></a>
                </div>
                <hr>
                <p class="login-box-msg">Silahkan Login untuk mengelola website anda</p>

                <form action="/user/login" method="post">
                    <?= csrf_field() ?>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" placeholder="Email" name="email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('email') ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('password') ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-danger btn-block">Log In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</div>
<!-- /.login-box -->

<?= $this->endSection() ?>