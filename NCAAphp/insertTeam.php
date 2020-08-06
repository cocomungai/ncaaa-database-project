<?php

if (isset($_POST['submit'])) {

    require_once("conn.php");

    $team_id = $_POST['team_id'];
	$team_name = $_POST['team_name'];
    $team_market = $_POST['team_market'];
    $team_alias = $_POST['team_alias'];
    $conf_name = $_POST['conf_name'];
    $conf_alias = $_POST['conf_alias'];
    $division_name = $_POST['division_name'];
    $division_alias = $_POST['division_alias'];
    $league_name = $_POST['league_name'];

    $query = "INSERT INTO teams (team_id, team_market, team_name, team_alias, conf_name, conf_alias,
					division_name, division_alias, league_name)"
        .  "VALUES (:team_id, :team_market, :team_name, :team_alias, :conf_name, :conf_alias,
					:division_name, :division_alias, :league_name)";

    try
    {
        $prepared_stmt = $dbo->prepare($query);
        $prepared_stmt->bindValue(':team_id', $team_id, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':team_market', $team_market, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':team_name', $team_name, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':team_alias', $team_alias, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':conf_name', $conf_name, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':conf_alias', $conf_alias, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':division_name', $division_name, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':division_alias', $division_alias, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':league_name', $league_name, PDO::PARAM_STR);
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
<h1> Insert New Team </h1>

<form method="post">
    <table>
        <tr>
            <td>
                <label for="team_id">team_id</label>
                <input type="text" name="team_id" id="team_id">
            </td>
            <td>
                <label for="team_name">team_name</label>
                <input type="text" name="team_name" id="team_name">
            </td>
            <td>
                <label for="team_market">team_market</label>
                <input type="text" name="team_market" id="team_market">
            </td>
            <td>
                <label for="team_alias">team_alias</label>
                <input type="text" name="team_alias" id="team_alias">
            </td>
        </tr>
        <tr>
            <td>
                <label for="conf_name">conf_name</label>
                <input type="text" name="conf_name" id="conf_name">
            </td>
            <td>
                <label for="conf_alias">conf_alias</label>
                <input type="text" name="conf_alias" id="conf_alias">
            </td>
            <td>
                <label for="division_name">division_name</label>
                <input type="text" name="division_name" id="division_name">
            </td>
            <td>
                <label for="division_alias">division_alias</label>
                <input type="text" name="division_alias" id="division_alias">
            </td>
            <td>
                <label for="league_name">league_name</label>
                <input type="text" name="league_name" id="league_name">
            </td>
        </tr>
    </table>

    <input type="submit" name="submit" value="Submit">
</form>
