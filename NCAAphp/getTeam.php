<?php

if (isset($_POST['submit'])) {

    require_once("conn.php");

    $inputStr = $_POST['inputStr'];

    $query = "SELECT * FROM teams WHERE team_name = :inputStr OR team_market = :inputStr OR team_id = :inputStr";

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
        }

    </style>

    <a href="index.php">Return to home page</a>
    <h1> Search Teams by School, Mascot, or ID</h1>

    <form method="post">

        <label for="inputStr">Name or ID</label>
        <input type="text" name="inputStr" id="inputStr">

        <input type="submit" name="submit" value="Search">
    </form>

<?php
if (isset($_POST['submit'])) { ?>
    <div>You searched for <?php echo $_POST['inputStr'] ?></div>
    <?php if ($result && $prepared_stmt->rowCount() > 0) { ?>

        <h2>Teams</h2>

        <table>
            <thead>
            <tr>
                <th>School</th>
                <th>Mascot</th>
                <th>Division</th>
                <th>Conference</th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo $row["team_market"]; ?></td>
                    <td><?php echo $row["team_name"]; ?></td>
                    <td><?php echo $row["division_name"]; ?></td>
                    <td><?php echo $row["conf_name"]; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

    <?php } else { ?>
        > No results found for <?php echo $_POST['inputStr']; ?>.
    <?php }
} ?>