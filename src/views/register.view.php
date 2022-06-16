<?php

include 'header.view.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>Register</h1>
    </header>

    <main>
            <form action="register/register" method="post">
                <input type="text" name="username" placeholder="Username" />
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="passwd" placeholder="Password" />
                <input type="curso" name="curso" placeholder="Curso" />
                <select name="role">
                    <option value="student">Alumno</option>
                    <option value="teacher">Profesor</option>
                </select>
                <input type="submit" value="REGISTER NOW" />


            </form>
            
        </main>
</body>
</html>
