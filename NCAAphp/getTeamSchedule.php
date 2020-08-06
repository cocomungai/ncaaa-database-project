<?php

if (isset($_POST['submit'])) {

    require_once("conn.php");

    $inputStr = $_POST['inputStr'];

    $query = "SELECT * FROM both_teams WHERE away_id = :inputStr OR home_id = :inputStr OR away_school = :inputStr OR home_school = :inputStr ORDER BY scheduled_date";

    try
    {
        $prepared_stmt = $dbo->prepare($query);
        $prepared_stmt->bindValue(':inputStr', $inputStr, PDO::PARAM_STR);
        $prepared_stmt->execute();
        $result = $prepared_stmt->fetchAll();

    }
    catch (PDOException $ex)
    { // Error in database processing.
        echo $sql . "<br>" . $error->getMessage(); // HTTP 500 - Internal Server Error
    }
}
?>

    <style>
        html * {
            font-family: Arial, sans serif !important;
        }

        label {
            display: block;
            margin: 5px 0;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        td, th {
            padding: 5px 20px 5px 20px;
            border-bottom: 1px solid #aaa;
        }

    </style>

    <a href="index.php">Return to home page</a>
    <h1> Search Team Schedule by School or ID</h1>

    <form method="post">

        <label for="inputStr">School or ID</label>
        <input type="text" name="inputStr" id="inputStr">

        <input type="submit" name="submit" value="Search">
    </form>

<?php
if (isset($_POST['submit'])) { ?>
    <div>You searched for <?php echo $_POST['inputStr'] ?></div>
    <?php if ($result && $prepared_stmt->rowCount() > 0) { ?>

        <h2>Team Schedule</h2>

        <table>
            <thead>
            <tr>
                <th>Season</th>
                <th>Date</th>
                <th colspan="2">Away Team</th>
                <th colspan="2">Home Team</th>
                <th>Score</th>
                <th>Game ID</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo $row["season"]?></td>
                    <td><?php echo $row["scheduled_date"]; ?></td>
                    <td><?php echo $row["away_school"]; ?></td>
                    <td><?php echo $row["away_name"]; ?></td>
                    <td><?php echo $row["home_school"]; ?></td>
                    <td><?php echo $row["home_name"]; ?></td>
                    <td><?php echo $row["away_score"]; ?> - <?php echo $row["home_score"]; ?></td>
                    <td><?php echo $row["game_id"]; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

    <?php } else { ?>
        > No results found for <?php echo $_POST['inputStr']; ?>.
    <?php }
} ?>