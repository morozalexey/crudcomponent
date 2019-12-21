<?php 
/*
require '../vendor/autoload.php';

use App\QueryBuilder;

$db = new QueryBuilder();


$user_id = $_SESSION['user']['id'];

$users = $db->getAll('users');
*/

$this->layout('layout', ['title' => 'User Profile']) 

?>

<div class="col-md-12">
    <div class="card">
        <div class="card-header"><h3>Профиль пользователя</h3></div>

        <div class="card-body">
          <?= $messageProfile ?>

            <form action="profile-edit.php" method="POST" enctype="multipart/form-data">
                <div class="row">
				<?php foreach($users as $profile_item):?>
				
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text" class="form-control <?= isset($_SESSION['errors']['name']) ? "@error('name') is-invalid @enderror" : "" ; ?>" name="name" id="exampleFormControlInput1" value="<?= $profile_item['name'] ?>"> 
                            <span class="text text-danger">
                                <?= isset($_SESSION['errors']['name']) ? $_SESSION['errors']['name'] : "" ; ?>
                            </span>                                          
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="text" class="form-control <?= isset($_SESSION['errors']['email']) ? "@error('name') is-invalid @enderror" : "" ; ?>" name="email" id="exampleFormControlInput1" value="<?= $profile_item['email'] ?>">
                            <span class="text text-danger">
                                <?= isset($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : "" ; ?>
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Аватар</label>
                            <input type="file" class="form-control <?= isset($_SESSION['errors']['image']) ? "@error('name') is-invalid @enderror" : "" ; ?>" name="image" id="exampleFormControlInput1">
							<span class="text text-danger">
                                <?= isset($_SESSION['errors']['image']) ? $_SESSION['errors']['image'] : "" ; ?>
                            </span>
                        </div>
                    </div>
					
                    <div class="col-md-4">
                        <img src="<?= $profile_item['avatar'] ?>" alt="" class="img-fluid">
                    </div>
					
				<?php endforeach; ?>	
                    <div class="col-md-12">
                        <button class="btn btn-warning">Edit profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-12" style="margin-top: 20px;">
    <div class="card">
        <div class="card-header"><h3>Безопасность</h3></div>

        <div class="card-body">
            <?= $messagePassword ?>

            <form action="password-edit.php" method="post">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Current password</label>
                            <input type="password" name="current" class="form-control <?= isset($_SESSION['errors']['current']) ? "@error('name') is-invalid @enderror" : "" ; ?>" id="exampleFormControlInput1">
                            <span class="text text-danger">
                                <?= isset($_SESSION['errors']['current']) ? $_SESSION['errors']['current'] : "" ; ?>
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">New password</label>
                            <input type="password" name="password" class="form-control <?= isset($_SESSION['errors']['password']) ? "@error('name') is-invalid @enderror" : "" ; ?>" id="exampleFormControlInput1">
                            <span class="text text-danger">
                                <?= isset($_SESSION['errors']['password']) ? $_SESSION['errors']['password'] : "" ; ?>
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Password confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control <?= isset($_SESSION['errors']['password_confirmation']) ? "@error('name') is-invalid @enderror" : "" ; ?>" id="exampleFormControlInput1">
                            <span class="text text-danger">
                                <?= isset($_SESSION['errors']['password_confirmation']) ? $_SESSION['errors']['password_confirmation'] : "" ; ?>
                            </span>
                        </div>

                        <button class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>