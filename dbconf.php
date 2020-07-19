<?php
$servername = "localhost";
$username = "unitsTask";
$password = "A5nkC9oM";
$dbname = "units";
$charset = "utf8mb4";

try {
    $conn = new PDO("mysql:host=$servername;charset=$charset;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci" . PHP_EOL;
    $conn->exec($sql);
} catch(PDOException $e) {
    echo $sql . PHP_EOL . $e->getMessage() . PHP_EOL;
}

try {
    $conn->exec("USE $dbname");
    $sql = "CREATE TABLE IF NOT EXISTS Clients (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30),
    lastname VARCHAR(30),
    phone VARCHAR(20) UNIQUE,
    additional_phone VARCHAR(20),
    email VARCHAR(50) UNIQUE,
    niche VARCHAR(50),
    role VARCHAR(50),
    staff INT UNSIGNED,
    gender TINYINT UNSIGNED,
    country VARCHAR (50),
    city VARCHAR (50),
    average_turnover BIGINT UNSIGNED,
    funnel_entrance TIMESTAMP,
    id_account INT UNSIGNED,
    id_questionnaire INT UNSIGNED,
    account_status VARCHAR (30),
    account_comment TEXT,
    id_client_phase VARCHAR (30)
  )";
    $conn->exec($sql);
} catch(PDOException $e) {
    echo "Error in: " . $sql . PHP_EOL . $e->getMessage() . PHP_EOL;
}

try {
    $sql = "CREATE TABLE IF NOT EXISTS Tags (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tag_tittle VARCHAR(20) unique
  )";
    $conn->exec($sql);
} catch(PDOException $e) {
    echo "Error in: " . $sql . PHP_EOL . $e->getMessage() . PHP_EOL;
}

try {
    $sql = "CREATE TABLE IF NOT EXISTS Clients_Tags (
    client_id INT UNSIGNED NOT NULL,
    tag_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (client_id , tag_id ),
    FOREIGN KEY (client_id) REFERENCES Clients (id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES Tags (id) ON DELETE CASCADE
  )";
    $conn->exec($sql);
} catch(PDOException $e) {
    echo "Error in: " . $sql . PHP_EOL . $e->getMessage() . PHP_EOL;
}

//$addTag = $conn->prepare("INSERT INTO Tags (tag_tittle) VALUES (:tag_tittle)");
//$getTagId = $conn->prepare("SELECT id FROM Tags WHERE tag_tittle=(:tag_tittle)");
//$bindTag = $conn->prepare("INSERT INTO Clients_Tags (client_id, tag_id) VALUES (:client_id, :tag_id)");
//$getTagId->execute(array("tag_tittle" => "Exe"));
//$tag_id = $getTagId->fetch()['id'];
//$conn = null;
