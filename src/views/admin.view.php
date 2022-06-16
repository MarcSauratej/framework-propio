<?php
include 'header.view.php'; 
?>

<h2>Administration Panel</h2>
<br><br>
<h2>Users</h2>

<table>
    <tr>
        <th>ID</th><th></th>
        <th>Username</th><th></th>
        <th>Email</th><th></th>
        <th>Role</th><th></th>
    </tr>
    <?php foreach($users as $user) { ?>
        <tr>
            <td><?= $user->id; ?></td><td></td>
            <td><?= $user->username; ?></td><td></td>
            <td><?= $user->email; ?></td><td></td>
            <td><?= $user->role; ?></td><td></td>
        </tr>
    <?php } ?>

</table>