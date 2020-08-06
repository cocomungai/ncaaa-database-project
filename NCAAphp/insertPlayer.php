<?php

if (isset($_POST['submit'])) {

    require_once("conn.php");

    $player_id = $_POST['player_id'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $full_name = $first_name . " " . $last_name;
    $abbr_name = $_POST['abbr_name'];
    $birthplace_city = $_POST['birthplace_city'];
    $birthplace_state = $_POST['birthplace_state'];
    $birthplace_country = $_POST['birthplace_country'];
    $birthplace = $birthplace_city . "," . $birthplace_state . "," . $birthplace_country ;


    $query = "INSERT INTO players (player_id, last_name, first_name, full_name, abbr_name, birthplace, 
                            birthplace_city, birthplace_state, birthplace_country)"
        .  "VALUES (:player_id, :last_name, :first_name, :full_name, :abbr_name, :birthplace, 
			:birthplace_city, :birthplace_state, :birthplace_country)";

    try
    {
        $prepared_stmt = $dbo->prepare($query);
        $prepared_stmt->bindValue(':player_id', $player_id, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':first_name', $first_name, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':full_name', $full_name, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':abbr_name', $abbr_name, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':birthplace_city', $birthplace_city, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':birthplace_state', $birthplace_state, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':birthplace_country', $birthplace_country, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':birthplace', $birthplace, PDO::PARAM_STR);
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
<h1> Insert New Player </h1>

<form method="post">
    <table>
        <tr>
            <td>
                <label for="player_id">player_id</label>
                <input type="text" name="player_id" id="player_id">
            </td>
            <td>
                <label for="last_name">last_name</label>
                <input type="text" name="last_name" id="last_name">
            </td>
            <td>
                <label for="first_name">first_name</label>
                <input type="text" name="first_name" id="first_name">
            </td>
            <td>
                <label for="abbr_name">abbr_name</label>
                <input type="text" name="abbr_name" id="abbr_name">
            </td>
        </tr>
        <tr>
            <td>
                <label for="birthplace_city">birthplace_city</label>
                <input type="text" name="birthplace_city" id="birthplace_city">
            </td>
            <td>
                <label for="birthplace_state">birthplace_state</label>
                <input type="text" name="birthplace_state" id="birthplace_state">
            </td>
            <td>
                <label for="birthplace_country">birthplace_country</label>
                <input type="text" name="birthplace_country" id="birthplace_country">
            </td>
        </tr>
    </table>

    <input type="submit" name="submit" value="Submit">
</form>
