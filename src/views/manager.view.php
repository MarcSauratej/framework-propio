<?php

include 'header.view.php';
?>

<main>
  <div id="listSelect">
    <h3>Select one of your task lists:</h3><br>
    <label for="listSelection">List Selection: </label>
    <?php if ($result != NULL or isset($_SESSION['currentList'])) : ?>
      <form action="/taskmanage" method="post">
        <select name="listSelection" id="listSelection" cont="Select List">
          <?php
          foreach ($result as $row) { ?>
              <option value="<?= $row; ?>"><?= $row; ?></option>
              <?php } ?>
        </select>
        <button type="submit">Show Tasks</button>
      <?php endif; ?>
      </form>

      <?php if ($tasks != NULL) : ?>
        <table>
          <?php 
          foreach ($tasks as $rowTask) { ?>
            <tr>
                <td><?=  $rowTask ; ?></td>
            </tr>
          <?php } ?>
        </table>
      </div>
      <?php endif; ?>
      <?php if (isset($_SESSION['currentList'])) : { ?>
          <div id="taskTable">
            <h3>Create a new task for the selected list:</h3>
            <form action="manager/taskcreation" method="post">
              <label for="taskname">Task Name</label>
              <input type="text" name="taskname" id="taskname">
              <button type="submit">Create Task</button>
            </form><br>
        <?php }
      endif; ?>
          
  </div>
  <div id="createListForm">
    <form action="manager/listcreation" method="post">
      <label for="listname">Create a new task List</label><br>
      <input type="text" name="listname" placeholder="List Name" id="listname"></input>
      <button type="submit">Create List</button>
    </form>
  </div>
</main>
</body>
</html>