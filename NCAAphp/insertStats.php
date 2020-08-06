<?php

if (isset($_POST['submit'])) {

    require_once("conn.php");

    $player_id = $_POST['player_id'];
    $status = $_POST['status'];
    $jersey_number = $_POST['jersey_number'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $class = $_POST['class'];
    $game_id = $_POST['game_id'];
    $home_team = $_POST['home_team'];
    $active = $_POST['active'];
    $played = $_POST['played'];
    $starter = $_POST['starter'];
    $minutes = $_POST['minutes'];
    $minutes_int64 = $_POST['minutes_int64'];
    $position = $_POST['position'];
    $primary_position = $_POST['primary_position'];
    $field_goals_made = $_POST['field_goals_made'];
    $field_goals_att = $_POST['field_goals_att'];
    $three_points_made = $_POST['three_points_made'];
    $three_points_att = $_POST['three_points_att'];
    $two_points_made = $_POST['two_points_made'];
    $two_points_att = $_POST['two_points_att'];
    $blocked_att = $_POST['blocked_att'];
    $free_throws_made = $_POST['free_throws_made'];
    $free_throws_att = $_POST['free_throws_att'];
    $offensive_rebounds = $_POST['offensive_rebounds'];
    $defensive_rebounds = $_POST['defensive_rebounds'];
    $rebounds = $_POST['rebounds'];
    $assists = $_POST['assists'];
    $turnovers = $_POST['turnovers'];
    $steals = $_POST['steals'];
    $blocks = $_POST['blocks'];
    $personal_fouls = $_POST['personal_fouls'];
    $tech_fouls = $_POST['tech_fouls'];
    $flagrant_fouls = $_POST['flagrant_fouls'];
    $points = $_POST['points'];
    $team_id = $_POST['team_id'];

    $query = "INSERT INTO player_stats (player_id, status, jersey_number, height, weight, class, game_id, home_team, active,
			played, starter, minutes, minutes_int64, position, primary_position, field_goals_made, field_goals_att,
			three_points_made, three_points_att, two_points_made, two_points_att, blocked_att, free_throws_made,
			free_throws_att, offensive_rebounds, defensive_rebounds, rebounds, assists, turnovers, steals,
			blocks, personal_fouls, tech_fouls, flagrant_fouls, points, team_id)"
        .  "VALUES (:player_id, :status, :jersey_number, :height, :weight, :class, :game_id, :home_team, :active,
			:played, :starter, :minutes, :minutes_int64, :position, :primary_position, :field_goals_made, :field_goals_att,
			:three_points_made, :three_points_att, :two_points_made, :two_points_att, :blocked_att, :free_throws_made,
			:free_throws_att, :offensive_rebounds, :defensive_rebounds, :rebounds, :assists, :turnovers, :steals,
			:blocks, :personal_fouls, :tech_fouls, :flagrant_fouls, :points, :team_id)";

    try
    {
        $prepared_stmt = $dbo->prepare($query);
        $prepared_stmt->bindValue(':player_id', $player_id, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':status', $status, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':jersey_number', $jersey_number, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':height', $height, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':weight', $weight, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':class', $class, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':game_id', $game_id, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':home_team', $home_team, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':active', $active, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':played', $played, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':starter', $starter, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':minutes', $minutes, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':minutes_int64', $minutes_int64, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':position', $position, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':primary_position', $primary_position, PDO::PARAM_STR);
        $prepared_stmt->bindValue(':field_goals_made', $field_goals_made, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':field_goals_att', $field_goals_att, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':three_points_made', $three_points_made, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':three_points_att', $three_points_att, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':two_points_made', $two_points_made, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':two_points_att', $two_points_att, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':blocked_att', $blocked_att, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':free_throws_made', $free_throws_made, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':free_throws_att', $free_throws_att, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':offensive_rebounds', $offensive_rebounds, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':defensive_rebounds', $defensive_rebounds, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':rebounds', $rebounds, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':assists', $assists, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':turnovers', $turnovers, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':steals', $steals, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':blocks', $blocks, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':personal_fouls', $personal_fouls, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':tech_fouls', $tech_fouls, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':flagrant_fouls', $flagrant_fouls, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':points', $points, PDO::PARAM_INT);
        $prepared_stmt->bindValue(':team_id', $team_id, PDO::PARAM_STR);
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
<h1> Insert Player Stats </h1>

<form method="post">
    <table>
        <tr>
            <td>
                <label for="player_id">player_id</label>
                <input type="text" name="player_id" id="player_id">
            </td>
            <td>
                <label for="status">status</label>
                <input type="text" name="status" id="status">
            </td>
            <td>
                <label for="jersey_number">jersey_number</label>
                <input type="text" name="jersey_number" id="jersey_number">
            </td>
            <td>
                <label for="height">height</label>
                <input type="text" name="height" id="height">
            </td>
            <td>
                <label for="weight">weight</label>
                <input type="text" name="weight" id="weight">
            </td>
            <td>
                <label for="class">class</label>
                <input type="text" name="class" id="class">
            </td>
        </tr>
        <tr>
            <td>
                <label for="game_id">game_id</label>
                <input type="text" name="game_id" id="game_id">
            </td>
            <td>
                <label for="team_id">team_id</label>
                <input type="text" name="team_id" id="team_id">
            </td>
            <td>
                <label for="home_team">home_team</label>
                <input type="text" name="home_team" id="home_team">
            </td>
            <td>
                <label for="active">active</label>
                <input type="text" name="active" id="active">
            </td>
            <td>
                <label for="played">played</label>
                <input type="text" name="played" id="played">
            </td>
            <td>
                <label for="starter">starter</label>
                <input type="text" name="starter" id="starter">
            </td>
        </tr>
        <tr>
            <td>
                <label for="minutes">minutes</label>
                <input type="text" name="minutes" id="minutes">
            </td>
            <td>
                <label for="minutes_int64">minutes_int64</label>
                <input type="text" name="minutes_int64" id="minutes_int64">
            </td>
            <td>
                <label for="position">position</label>
                <input type="text" name="position" id="position">
            </td>
            <td>
                <label for="primary_position">primary_position</label>
                <input type="text" name="primary_position" id="primary_position">
            </td>
        </tr>
        <tr>
            <td>
                <label for="field_goals_made">field_goals_made</label>
                <input type="text" name="field_goals_made" id="field_goals_made">
            </td>
            <td>
                <label for="field_goals_att">field_goals_att</label>
                <input type="text" name="field_goals_att" id="field_goals_att">
            </td>
            <td>
                <label for="three_points_made">three_points_made</label>
                <input type="text" name="three_points_made" id="three_points_made">
            </td>
            <td>
                <label for="three_points_att">three_points_att</label>
                <input type="text" name="three_points_att" id="three_points_att">
            </td>
            <td>
                <label for="two_points_made">two_points_made</label>
                <input type="text" name="two_points_made" id="two_points_made">
            </td>
            <td>
                <label for="two_points_att">two_points_att</label>
                <input type="text" name="two_points_att" id="two_points_att">
            </td>
        </tr>
        <tr>
            <td>
                <label for="blocked_att">blocked_att</label>
                <input type="text" name="blocked_att" id="blocked_att">
            </td>
            <td>
                <label for="free_throws_made">free_throws_made</label>
                <input type="text" name="free_throws_made" id="free_throws_made">
            </td>
            <td>
                <label for="free_throws_att">free_throws_att</label>
                <input type="text" name="free_throws_att" id="free_throws_att">
            </td>
            <td>
                <label for="offensive_rebounds">offensive_rebounds</label>
                <input type="text" name="offensive_rebounds" id="offensive_rebounds">
            </td>
            <td>
                <label for="defensive_rebounds">defensive_rebounds</label>
                <input type="text" name="defensive_rebounds" id="defensive_rebounds">
            </td>
            <td>
                <label for="rebounds">rebounds</label>
                <input type="text" name="rebounds" id="rebounds">
            </td>
        </tr>
        <tr>
            <td>
                <label for="assists">assists</label>
                <input type="text" name="assists" id="assists">
            </td>
            <td>
                <label for="turnovers">turnovers</label>
                <input type="text" name="turnovers" id="turnovers">
            </td>
            <td>
                <label for="steals">steals</label>
                <input type="text" name="steals" id="steals">
            </td>
            <td>
                <label for="blocks">blocks</label>
                <input type="text" name="blocks" id="blocks">
            </td>
        </tr>
        <tr>
            <td>
                <label for="personal_fouls">personal_fouls</label>
                <input type="text" name="personal_fouls" id="personal_fouls">
            </td>
            <td>
                <label for="tech_fouls">tech_fouls</label>
                <input type="text" name="tech_fouls" id="tech_fouls">
            </td>
            <td>
                <label for="flagrant_fouls">flagrant_fouls</label>
                <input type="text" name="flagrant_fouls" id="flagrant_fouls">
            </td>
            <td>
                <label for="points">points</label>
                <input type="text" name="points" id="points">
            </td>
        </tr>
    </table>
    <input type="submit" name="submit" value="Submit">
</form>
