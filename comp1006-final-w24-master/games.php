<?php
$title = 'Our Games';
require 'include/header.php'; 
require 'include/auth.php';?>

<h1>Our Games</h1>
<?php
if ($_SESSION['username']) {
    echo '<button onclick="confirmDelete()">Delete All</button>';
    echo '<script>
    function confirmDelete() {
        if (confirm("Are you sure you want to delete all games?")) {
            window.location.href = "delete-all.php";
        }
    }
    </script>';
}
?>
<?php
if (!empty($_SESSION['username'])) {
    echo '<a href="game-details.php">Add a New Game</a>';
}

require 'include/db.php';

$sql = "SELECT examgames.*, exampublishers.name FROM examgames 
        INNER JOIN exampublishers ON examgames.publisherId = exampublishers.publisherId";

$cmd = $db->prepare($sql);
$cmd->execute();
$games = $cmd->fetchAll();
echo '<table class="table table-striped table-hover">
        <thead>
            <th>Title</th>
            <th></th>
            <th>Release Year</th>
            <th>Rating</th>
            <th>Publisher</th>        
            <th></th>
        </thead>';

foreach ($games as $v) {
    echo '<tr><td>';
    if (!empty($_SESSION['username'])) {
        echo '<a href="game-details.php?gameId=' . $v['gameId'] . '">
                ' . $v['title'] . '</a>';
    } else {
        echo $v['title'];
    }
    echo '</td>';
    echo '<td>';
    if ($v['photo'] != null) {
        echo '<img src="img/game-uploads/' . $v['photo'] . '" alt="Game Image"
                class="thumbnail">';
    }

    echo '</td>';
    echo   '<td>' . $v['releaseYear'] . '</td>
            <td>' . $v['rating'] . '</td>
            <td>' . $v['name'] . '</td>
            <td>';
    if (!empty($_SESSION['username'])) {
        echo '<a href="delete-game.php?gameId=' . $v['gameId'] . '" 
                class="btn btn-danger" onclick="return yaSure();">Delete</a>';
    }
    echo '</td></tr>';
}

echo '</table>';

$db = null;

?>
<?php if (isset($_SESSION['is_authenticated']) && $_SESSION['is_authenticated']) { ?>
    <button onclick="confirmDelete()">Delete All</button>
    <script>
    function confirmDelete() {
        if (confirm('Are you sure you want to delete all games?')) {
            window.location.href = 'delete-all.php';
        }
    }
    </script>
<?php } ?>
</body>

</html>