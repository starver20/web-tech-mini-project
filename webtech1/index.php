<?php

/** @var Connection $connection */
$connection = require_once 'pdo.php';
// Read notes from database
$notes = $connection->getNotes();

$currentNote = [
    'id' => '',
    'title' => '',
    'description' => ''
];
if (isset($_GET['id'])) {
    $currentNote = $connection->getNoteById($_GET['id']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="app.css">
</head>
<body style="background-color:rgba(120,180,240,0.2)">
<div>
    <h1 style="text-align:center">notes</h1>
<div >
<a href="team.xml" style="text-decoration: none;">
    <span style="background-color:red;padding:5px;margin:5px;border-radius:2px;font-size:20px;color:white">
    details
    </span>
</a>
<a href="angular.html" style="text-decoration: none;">
<span style="background-color:red;padding:5px;margin:5px;border-radius:2px;font-size:20px;color:white"">
    Feedback
    </span>
</a>
</div>
    <form class="new-note" action="create.php" method="post" >
        <input type="hidden" name="id" value="<?php echo $currentNote['id'] ?>" >
        <input id="tittle" type="text" name="title" placeholder="Note title" autocomplete="off"
               value="<?php echo $currentNote['title'] ?>" style="border-color:blue;background-color:rgba(0,180,230,0.2);border-radius:5px;box-shadow:2px 2px black">
        <textarea id="content" style="border-color:blue;background-color:rgba(0,180,230,0.2);border-radius:5px;box-shadow:2px 2px black" name="description" cols="30" rows="4"
                  placeholder="Note Description"><?php echo $currentNote['description'] ?></textarea>
        <button onclick="return validateForm()">
            <?php if ($currentNote['id']): ?>
                Update
            <?php else: ?>
                New note
            <?php endif ?>
        </button>
    </form>
    <div class="notes">
        <?php foreach ($notes as $note): ?>
            <div class="note">
                <div class="title">
                    <a href="?id=<?php echo $note['id'] ?>">
                        <?php echo $note['title'] ?>
                    </a>
                </div>
                <div class="description">
                    <?php echo $note['description'] ?>
                </div>
                <small><?php echo date('d/m/Y H:i', strtotime($note['create_date'])) ?></small>
                <form action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $note['id'] ?>">
                    <button class="close">X</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
<script>
    function validateForm() {
        
        var title = document.getElementById("tittle").value;
        if (title == "") {
            alert("Please give a title");
            return false;
        }

        var content = document.getElementById("content").value;
        if (content == "") {
            alert("Come On! How is this a blog without content?!");
            return false;
        }
    }
</script>