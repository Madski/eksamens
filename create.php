<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eksamens";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("SELECT * FROM questions");
    $stmt->execute();


    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


    print_r($result);
} catch (PDOException $e) {

    echo "Error: " . $e->getMessage();
}


$conn = null;
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jautajumu izveide</title>
</head>
<body>
    <h1>Jautājuma izveide</h1>
    <form action="/create.php" method="post" class="box">
        <label for="questionText">Jautājums:</label>
        <input type="text" id="questionText" name="questionText" required>

        <label for="answer1">1.atbilde:</label>
        <input type="text" id="answer1" name="answer1" required>

        <label for="answer2">2.atbilde:</label>
        <input type="text" id="answer2" name="answer2" required>

        <label for="correctAnswer">Pareizā atbilde:</label>
        <input type="number" id="correctAnswer" name="correctAnswer" min="1" max="2" required>

        <button type="submit">Pievienot</button>
    </form>
</body>
</html>
