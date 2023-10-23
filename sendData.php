<?php
$data = json_decode(file_get_contents('php://input'), true);

$host = "localhost";
$dbname = "snake_users";
$username = "root";
$password = "";
        
$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);


// Überprüfen Sie die Verbindung auf Fehler
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}



// Daten in die Datenbank einfügen (Beispiel)
$key1 = $conn->real_escape_string($data["key1"]);
$key2 = $conn->real_escape_string($data["key2"]);



$sql = "INSERT INTO users VALUES ('$key1', '$key2')
        ON DUPLICATE KEY UPDATE score = CASE
        WHEN $key2 > score THEN VALUES(score)
        ELSE score
        END;";

if ($conn->query($sql) === TRUE) {
    echo "Daten erfolgreich eingefügt";
} else {
    echo "Fehler beim Einfügen der Daten: " . $conn->error;
}

// Verbindung schließen
$conn->close();
?>
