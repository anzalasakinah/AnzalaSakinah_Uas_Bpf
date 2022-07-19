<div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
                            </a>
                            <h3>Sign Up</h3>
                        </div>
                        <form class="user" method="POST" action="<?= base_url('auth/registrasi') ?>">
                        <div class="form-floating mb-3">
                            <input type="text" name="nama" value="<?= set_value('nama'); ?>" class="form-control from-control-user" id="nama" placeholder="Username">
                            <label for="nama">Username</label>
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="email" value="<?= set_value('email'); ?>" class="form-control from-control-user " id="email" placeholder="Email">
                            <label for="email">Email address</label>
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group row">
                        <div class="form-floating mb-4">
                            <input type="password" value="<?= set_value('password1'); ?>" class="form-control from-control-user" id="password1" name="password1" placeholder="Password">
                            <label for="floatingPassword1">Password</label>
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" value="<?= set_value('password2'); ?>" class="form-control from-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                            <label for="password2">Ulangi Password</label>
                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                        <p class="text-center mb-0">Already have an Account? <a  href="<?= base_url('Auth'); ?>">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>