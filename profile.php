<?php
require_once 'init.php';
require_once 'authorization.php';

$user_id = $_SESSION['user']['id'];

$stmt_profile = $pdo->prepare("SELECT * FROM users WHERE id =?");
$stmt_profile->execute([$user_id]); 
$result = $stmt_profile->fetchAll(PDO::FETCH_ASSOC);

if ($_SESSION['messageProfileSucces']) {
    $messageProfile = "<div class=\"alert alert-success\" role=\"alert\">Профиль успешно обновлен</div>";
  unset($_SESSION['messageProfileSucces']);
}

if ($_SESSION['messageProfileError']) {
    $messageProfile = "<div class=\"alert alert-danger\" role=\"alert\">Ошибка обновления профиля</div>";
  unset($_SESSION['messageProfileError']);
}

if ($_SESSION['messagePasswordSucces']) {
    $messagePassword = "<div class=\"alert alert-success\" role=\"alert\">Пароль успешно обновлен</div>";
  unset($_SESSION['messagePasswordSucces']);
}

if ($_SESSION['messagePasswordError']) {
    $messagePassword = "<div class=\"alert alert-danger\" role=\"alert\">Ошибка обновления пароля</div>";
  unset($_SESSION['messagePasswordError']);
}

$admin_role = $pdo->prepare("SELECT * FROM users WHERE id =?");
$admin_role->execute([$user_id]); 
$admin_result = $admin_role->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Comments</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    Project
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if (!isset($_SESSION['user'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.php">Register</a>
                            </li>
						<?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php"><?=strip_tags($_SESSION['user']['name']); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>                            					
						<?php endif; ?>
						
						<?php if ( isset($_SESSION['user']) AND ($admin_result['admin'] == '0') ): ?>
                        <?php elseif ( isset($_SESSION['user']) AND ($admin_result['admin'] == 'admin') ) : ?>
						<li class="nav-item">
							<a class="nav-link" href="admin.php">Admin</a>
                        </li>
						<?php endif; ?>	
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
          <div class="container">
            <div class="row justify-content-center">
                
                

            </div>
        </div>
        </main>
    </div>
</body>
</html>


<?php 
unset($_SESSION['errors']);
?>
