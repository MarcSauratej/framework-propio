<?php

include 'header.view.php';
?>

    <main>
        <div>
        </div>
        <section class='dashboard'>
            <h2 id='welcome' >Bienvenido a Mordor,<?= $_SESSION['username']??'User';?>!</h2>

            <article class="tasklists">
                <div class="overview"> 
                    <h3>Overview</h3> 
                
                </div>
                <div class="lists">
                    <div class="card">
                        <h3>Manage your lists:</h3><br>
                        <a href="/manager"><button>Task Management</button></a>
                    </div>
                    
                </div>
            </article>
        </section>

        <button><a href="?url=logout">Expulsado de Mordor</a></button>
    </main>
</body>
</html>