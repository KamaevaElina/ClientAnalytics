<?php
require_once ("./dbconf.php");

$sql = "SELECT * FROM Clients";
$params = array();

if (!empty($_POST["city"]) || !empty($_POST["niche"]) || !empty($_POST["tag"]))
    $sql .= " WHERE";
if (!empty($_POST["city"])) {
    $sql .= " city=:city";
    $params[':city'] = $_POST["city"];
}
if (!empty($_POST["niche"])) {
    if (!empty($_POST["city"]))
        $sql .= " AND";
    $sql .= " niche=:niche";
    $params[':niche'] = $_POST["niche"];
}
if (!empty($_POST["tag"])) {
    if (!empty($_POST["city"]) || !empty($_POST["niche"]))
        $sql .= " AND";
    $sql .= " tag_tittle=:tag_tittle";
    $params[':tag_tittle'] = $_POST["tag"];
}

$sql .= " ORDER BY id ASC LIMIT 10";
$get_clients = $conn->prepare($sql, $params);
$get_clients->execute($params);
$result = $get_clients->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
