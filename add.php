
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style-add.css">
</head>
<body>
    <h1> Your Feedback for Library service ! </h1>
    <form method="post">
        <label>Username</label>
        <input type="text" name="username" required> <br>

        <label>Feedback</label>
        <input type="text" name="feedback" required> <br>
        
        <button type="submit" name="submit">Post</button>
        <button> <a href="all.php">View Feedbacks</a> </button>
    </form>

</body>
</html>

<?php 
// PHP CODE: 
include("database.php");

if (isset($_POST['submit'])) {

$feedback = $_POST['feedback'];
$username = $_POST['username'];

/* 
Table name: 'msgs'
Columns: 3 col. (numb, username, feedback)
*/

$sql = "INSERT INTO msgs (username, feedback) VALUES ('$username', '$feedback')";
$res1 = $conn->query($sql);

if ($res1) {
    echo "success";
} else {
     echo "error: " . $conn->error;
}

}
?>