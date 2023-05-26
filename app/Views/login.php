<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="assets/img/logo/logo-removebg-preview.png" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>

                        <!-- <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show  w-auto" role="alert">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">x</button>
                                    <b>Error!</b>
                                    <?php echo session()->getFlashdata('error'); ?>
                                </div>
                            </div>
                        <?php endif; ?> -->
                        <div class="card-body">
                            <?php if (session()->getFlashdata('error')) : ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">x</button>
                                        <b>Error!</b>
                                        <?php echo session()->getFlashdata('error'); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <!-- <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <?php echo session()->getFlashdata('error'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($validation)) : ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->listErrors() ?>
                                    </div>
                                </div>
                            <?php endif; ?> -->
                            <form method="POST" action="<?= base_url('login') ?>" class="needs-validation" novalidate="">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="email">NPM</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </div>
                                        <input id="email" type="text" class="form-control" name="u_npm" tabindex="1" required autofocus placeholder="Masukan NPM">
                                        <div class="invalid-feedback">
                                            Mohon Untuk Memasukan Username !
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="u_password" tabindex="2" required placeholder="Masukan Password">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <div class="form-control show">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            Mohon Untuk Memasukan Password !
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        <div class="float-right">
                                            <a href="auth-forgot-password.html" class="text-small">
                                                Forgot Password?
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; Arisya 2023
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>