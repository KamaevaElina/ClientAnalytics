<?php
require_once ("./dbconf.php");
$blockId = $_POST["blockID"];
if (strcmp($blockId, "TagSelect") === 0) {
    $fieldName = "tag_tittle";
    $queryResult = $conn->query("SELECT tag_tittle from Tags");
} else {
    if (strcmp($blockId, "CitySelect") === 0)
        $fieldName = "city";
    else if (strcmp($blockId, "NicheSelect") === 0)
        $fieldName = "niche";
    else
        die(400);
    $queryResult = $conn->query("SELECT DISTINCT $fieldName from Clients");
}
$response = array();
while ($row = $queryResult->fetch())
{
    $response[] = $row[$fieldName];
}
echo json_encode($response);