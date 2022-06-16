<?php

include 'header.view.php';
$email=filter_input(INPUT_COOKIE,'email');
$passwd=filter_input(INPUT_COOKIE,'passwd');
?>


<main>
            <form action="login/login" method="post">
                <input type="text" name="email" placeholder="e-mail" value=<?php echo $email?>>
                <input type="password" name="passwd" placeholder="Password" value=<?php echo $passwd?>>
                <button type="submit">Login</button>
                <br/>
                Do you want the Empire to remind you your credentials? <input type="checkbox" name="remind">
                


            </form>
            
        </main>

</body>
</html>