<?= $this->extend('layout/dashboard') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="card card-widget widget-user" style="height: 600px;">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-olive" style="height: 250px">
        <h3 class="widget-user-username pt-5" style="font-size: 30pt"><?= $user['name'] ?></h3>
        <h5 class="widget-user-desc pb-5"><?= $user['username'] ?></h5>
    </div>
    <div class="widget-user-image" style="top: 175px; margin-left: -75px;">
        <i class="fad fa-10x fa-user-circle"></i>
        <div class="col-sm-12 text-center">
            <a href="/user/edit" style="color: black" data-toggle="modal" data-target="#addModal" data-id="<?= $user['id'] ?>"> Edit Profile</a>
        </div>
    </div>
    <div class="cardfooter" style="margin-top: 150px;padding-right: 1.25rem;padding-bottom: 0.75rem;padding-left: 1.25rem;">
        <div class="row">
            <div class="col-sm-4 border-right">
                <div class="description-block">
                    <h5 class="description-header"><?= $user['email'] ?></h5>
                    <span class="description-text">EMAIL</span>
                </div>
                <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 border-right">
                <div class="description-block">
                    <h5 class="description-header">+<?= $user['wa'] ?></h5>
                    <span class="description-text">NO WA</span>
                </div>
                <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4">
                <div class="description-block">
                    <h5 class="description-header"><?= $user['created_at'] ?></h5>
                    <span class="description-text">JOIN</span>
                </div>
                <!-- /.description-block -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addNewModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewModal">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/user/update/<?= $user['id'] ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="name">Nama Lengkap:</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?= $user['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" name="username" id="username" value="<?= $user['username'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= $user['email'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="wa">No. Whatsapp:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+62</span>
                            </div>
                            <input type="number" class="form-control" name="wa" id="wa" value="<?= substr($user['wa'], 2, 13) ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info">Edit Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>