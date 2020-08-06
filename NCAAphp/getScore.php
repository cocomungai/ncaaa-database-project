<?php

if (isset($_POST['submit'])) {

    require_once("conn.php");

    $inputStr = $_POST['inputStr'];

    $query = "SELECT * FROM team_scores WHERE game_id = :inputStr";

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
        padding: 5px 30px 5px 30px;
        border-bottom: 1px solid #aaa;
        text-align: center;
    }
</style>
<a href="index.php">Return to home page</a>
<h1>Search Games by ID</h1>

<form method="post">

    <label for="inputStr">Game ID</label>
    <input type="text" name="inputStr" id="inputStr">

    <input type="submit" name="submit" value="Search">
</form>

<?php if (isset($_POST['submit'])) { ?>
    <div>You searched for <?php echo $_POST['inputStr'] ?></div>
    <?php if ($result && $prepared_stmt->rowCount() == 2) { ?>

        <?php foreach ($result as $row) {
            if ($row["home_team"] == "true") {
                $homeArray = array($row["team_market"], $row["team_name"], $row["score"]);
            } else {
                $awayArray = array($row["team_market"], $row["team_name"], $row["score"]);
            }
        } ?>

        <h2>Game Result</h2>
        <table>
            <thead>
            <tr>
                <th>Away</th>
                <th></th>
                <th>Home</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo $awayArray[0]; ?></td>
                <td></td>
                <td><?php echo $homeArray[0]; ?></td>
            </tr>
            <tr>
                <td><?php echo $awayArray[1]; ?></td>
                <td>AT</td>
                <td><?php echo $homeArray[1]; ?></td>
            </tr>
            <tr>
                <td><?php echo $awayArray[2]; ?></td>
                <td>—</td>
                <td><?php echo $homeArray[2]; ?></td>
            </tr>
            </tbody>
        </table>

    <?php } elseif (!$result) { ?>
        > No results found for <?php echo $_POST['inputStr']; ?>
    <?php } else { ?>
        > Data for <?php echo $_POST['inputStr']?> is incomplete
    <?php }
}?>
