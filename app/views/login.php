<?php $this->layout('layout', ['title' => 'Login Page']) ?>

<div class="col-md-8">
    <div class="card">
        <div class="card-header">Login</div>

        <div class="card-body">
            <?php echo flash()->display();?>
            <form method="POST" action="/login">                                    

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="text" class="form-control <?= isset($errors['email']) ? "is-invalid" : "" ; ?>" name="email"  autocomplete="email" autofocus value="<?= $email ?>">
                            <span class="invalid-feedback" role="alert">
                                <strong><?= isset($errors['email']) ? $errors['email'] : "" ; ?></strong>
                            </span>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control <?= isset($errors['password']) ? "is-invalid" : "" ; ?>" name="password"  autocomplete="current-password">
                        <span class="invalid-feedback" role="alert">
                            <strong><?= isset($errors['password']) ? $errors['password'] : "" ; ?></strong>
                        </span>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" >

                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>                                               
                            
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>