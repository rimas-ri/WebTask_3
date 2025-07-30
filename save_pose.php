<?php
include 'db.php';

$sql = "INSERT INTO pose (servo1, servo2, servo3, servo4, servo5, servo6) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiiiii", $_POST['servo1'], $_POST['servo2'], $_POST['servo3'], $_POST['servo4'], $_POST['servo5'], $_POST['servo6']);
$stmt->execute();
$conn->close();

header("Location: index.php");
exit();
