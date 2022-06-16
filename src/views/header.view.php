<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <title>home</title>
</head>
<body>
    <div class="cont1">
        <div class="header">
            <header>
                <h1>Actividad 2 M07</h1>
            </header>
        </div>
        <div class="menu">
        <aside>

<ul>
<?php if(isset($_SESSION['logged'])): ?>
    <li>
        <a href="#" onclick="window.location.href='/login/logout'">Log out</a>

    </li>
</ul>
<?php else: ?>
    <li>
        <a href="#" onclick="window.location.href='/login'">Login</a>

    </li>
</ul>
<ul>
    <li>
        <a href="#" onclick="window.location.href='/register'">Register</a>

    </li>
</ul>
<?php endif;?>
<ul>
    <?php if(isset($_SESSION['logged'])): ?>
    <li>
        <a href="#" onclick="window.location.href='/dashboard'">Dashboard</a>
    </li>
</ul>
<ul>
    <li>
        <a href="#" onclick="window.location.href='/manager/index'">Manager</a>
    </li>
</ul>
<ul>
    <?php if($_SESSION['role'] == 'admin'): ?>
    <li>
        <a href="#" onclick="window.location.href='/admin'">Admin Panel</a>
    </li>
    <?php endif;?>
</ul>
    <?php else: ?>
<ul>
    <li>
        <a href="#" onclick="window.location.href='/index'">Home</a>
    </li>
</ul>
    <?php endif;?>


</aside>
        </div>
    </div>
</body>
</html>