<?php
$servername = "localhost"; $db = "user_system"; $user = "dbadmin"; $pwd = "losen1";

$conn = new mysqli($servername, $user, $pwd, $db);  // Create connection
if ($conn->connect_error) { // Check connection
        die("Connection failed: " . $conn->connect_error);
}
if (!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["username"])) {
$stmt = $conn->prepare("INSERT INTO users (first_name, last_name, username) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $username);

$firstname = $_POST["first_name"];
$lastname = $_POST["last_name"];
$username = $_POST["username"];
$stmt->execute();

echo "<h1>Sucessfully created new account!</h1>";
echo "<p><a href='index.html'>Head back to the main site</a></p>";
}
else {
echo "<h1>Error: You haven't entered all the fields.</h1>";
echo "<p><a href='insertpage.html'>Try inputting again</a></p>";
}
?>
