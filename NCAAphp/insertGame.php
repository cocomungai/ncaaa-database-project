<?php

if (isset($_POST['submit'])) {

    require_once("conn.php");

    $game_id = $_POST['game_id'];
    $season = $_POST['season'];
    $neutral_site = $_POST['neutral_site'];
    $scheduled_date = $_POST['scheduled_date'];
    $gametime = $_POST['gametime'];

    $query = "INSERT INTO games (game_id, season, neutral_site, scheduled_date, gametime)"
          .  "VALUES (:game_id, :season, :neutral_site, :scheduled_date, :gametime)";

    try
    {
        $prepared_stmt = $dbo->prepare($query);
        $prepared_stmt->bindValue(':game_id', $game_id, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':season', $season, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':neutral_site', $neutral_site, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':scheduled_date', $scheduled_date, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':gametime', $gametime, PDO::PARAM_STR);
        $prepared_stmt->execute();

    }
    catch (PDOException $ex)
    { // Error in database processing.
        echo $sql . "<br>" . $error->getMessage(); // HTTP 500 - Internal Server Error
    }
}

?>

<style>
    label {
        display: block;
        margin: 5px 0;
    }

</style>

<a href="index.php">Return to home page</a>
<h1> Insert New Game </h1>

<form method="post">
    <table>
        <tr>
            <td>
                <label for="game_id">game_id</label>
                <input type="text" name="game_id" id="game_id">
            </td>
            <td>
                <label for="season">season</label>
                <input type="text" name="season" id="season">
            </td>
            <td>
                <label for="neutral_site">neutral_site</label>
                <input type="text" name="neutral_site" id="neutral_site">
            </td>
            <td>
                <label for="scheduled_date">scheduled_date</label>
                <input type="text" name="scheduled_date" id="scheduled_date">
            </td>
            <td>
                <label for="gametime">gametime</label>
                <input type="text" name="gametime" id="gametime">
            </td>
        </tr>
    </table>
    <input type="submit" name="submit" value="Submit">
</form>
