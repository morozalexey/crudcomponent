<?php $this->layout('layout', ['title' => 'Registration Page']) ?>

<div class="col-md-8">
    <div class="card">
        <div class="card-header">Register</div>

        <div class="card-body">
            <?php echo flash()->display();?>
            <form method="POST" action="/registration">

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control <?= isset($errors['name']) ? "@error('name') is-invalid @enderror" : "" ; ?>" name="name" autofocus value="<?= $name ?>">
                        <span class="invalid-feedback" role="alert">
                            <strong><?= isset($errors['name']) ? $errors['name'] : "" ; ?></strong>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="text" class="form-control <?= isset($errors['email']) ? "@error('name') is-invalid @enderror" : "" ; ?>" name="email" value="<?= $email ?>">
                        <span class="invalid-feedback" role="alert">
                            <strong><?= isset($errors['email']) ? $errors['email'] : "" ; ?></strong>
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control <?= isset($errors['password']) ? "@error('name') is-invalid @enderror" : "" ; ?>" name="password"  autocomplete="new-password">
                        <span class="invalid-feedback" role="alert">
                            <strong><?= isset($errors['password']) ? $errors['password'] : "" ; ?></strong>
                        </span>                                            
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control <?= isset($errors['password_confirmation']) ? "@error('name') is-invalid @enderror" : "" ; ?>" name="password_confirmation"  autocomplete="new-password">
                        <span class="invalid-feedback" role="alert">
                            <strong><?= isset($errors['password_confirmation']) ? $errors['password_confirmation'] : "" ; ?></strong>
                        </span>
                    </div>
                </div>
                

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>