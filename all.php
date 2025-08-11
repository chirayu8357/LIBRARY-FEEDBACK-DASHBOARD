
<?php 

include("database.php");

// DISPLAY : 
$sql = "SELECT * FROM msgs" ;
$res2 = $conn->query($sql);

if ($res2) {
    echo "success";
} else {
     echo "error: " . $conn->error;
}

// DELETE :
if (isset($_GET['delete']) && isset($_GET['numb'])) {
    $numb = intval($_GET['numb']);                 
    $sql = "DELETE FROM msgs where numb = $numb";
    $res3 = $conn->query($sql);

    if ($res3)
        echo "User has been deleted";
    else
        echo "Something went wrong, please try again";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style-all.css">
</head>
<body>
    <h1> All Feedbacks </h1>
    <div id="display">
        <?php 
            if ($res2->num_rows > 0) {
                echo "<h2>All Feedbacks</h2>";
                echo "<table border='1' cellpadding='8' cellspacing='0'>";
                echo "<tr>
                        <th>Numb</th>
                        <th>Username</th>
                        <th>Feedback</th>
                        <th>Option</th>
                    </tr>";

                while ($row = $res2->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['numb']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['feedback']) . "</td>"; ?>

                    <td> 
                        <form method="get">
                            <input type="hidden" name="numb" value="<?php echo $row['numb'];?>"> 
                            <button type="submit" name="delete"> Delete </button> 
                        </form>
                    </td>
                   <?php echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No data found.";
            }
        ?>
        <button> <a href="add.php"> Give Feedback </a> </button>
        
    </div>
</body>
</html>


