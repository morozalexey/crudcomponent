<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$this->e($title)?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">
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
						<?php if (!$_SESSION['auth_logged_in']) :?>
                            <li class="nav-item">
                                <a class="nav-link" href="/login_page">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/registration_page">Register</a>
                            </li>
						<?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/profile"><?= ($_SESSION['auth_username']); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
						<?php endif; ?>	
						
						<?php if ($_SESSION['auth_roles'] == 1) :?>
						<li class="nav-item">
							<a class="nav-link" href="/admin">Admin</a>
                        </li>
						<?php endif; ?>	
                        <?php //var_dump($_COOKIE);?>
						
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <?php echo flash()->display();?>
                    <?=$this->section('content')?>                    

                </div>
            </div>
        </main>
    </div>
</body>
</html>