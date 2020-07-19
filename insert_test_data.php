<?php
$servername = "localhost";
$username = "unitsTask";
$password = "A5nkC9oM";
$dbname = "units";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $sql . PHP_EOL . $e->getMessage() . PHP_EOL;
}

$add = $conn->prepare("INSERT INTO Clients (firstname, lastname, phone, additional_phone, email, niche, role, staff,
gender, country, city, average_turnover, account_comment)
 VALUES (:firstname, :lastname, :phone, :additional_phone, :email, :niche, :role, :staff,
:gender, :country, :city, :average_turnover, :account_comment)");

function create_random_client()
{
    $arr_first_names = ["Андрей", "Светлана", "Игорь", "Сергей", "Георгий", "Вячеслав", "Кристина", "Михаил", "Александра",
        "Григорий", "Вероника", "Ольга", "Павел", "Борис", "Мария", "Нина", "Данил", "Диана"];
    $fn_length = count($arr_first_names);
    $arr_last_names = ["Шуткевич", "Черных", "Сухих", "Хосе", "Рыбак", "Толмач", "Мельник", "Гусь", "Ткаченко", "Смит"];
    $ln_length = count($arr_last_names);
    $arr_roles = ["Собственник", "Сотрудник"];
    $rl_length = count($arr_roles);
    $arr_niche = ["Автобизнес", "Туризм и отдых", "Интернет и IT", "Сфера услуг",
        "Торговля и магазины", "Промышленное производство", "Финансы и недвижимость"];
    $niche_length = count($arr_niche);
    $arr_cities = ["Москва", "Санкт-Петербург", "Сергиев Посад", "Серпухов", "Владимир", "Коломна",
        "Горьков", "Архангельск", "Пермь", "Екатеринбург", "Омск", "Тверь", "Казань"];
    $cities_length = count($arr_cities);
    static $uniq_int = 0;
    return (array("firstname" => $arr_first_names[rand(0, $fn_length - 1)],
        "lastname" => $arr_last_names[rand(0, $ln_length - 1)],
        "phone" => strval(++$uniq_int), "additional_phone" => strval(++$uniq_int), "email" => strval(++$uniq_int),
        "niche" => $arr_niche[rand(0, $niche_length - 1)], "role" => $arr_roles[rand(0, $rl_length - 1)],
        "staff"=> rand(1, 10000000), "gender" => rand(1, 2), "country" => "Россия",
        "city" => $arr_cities[rand(0, $cities_length - 1)], "average_turnover" => rand(0, PHP_INT_MAX),
        "account_comment" => "Текст коментария:"));
}

for ($i = 0; $i < 10000; $i++)
{
    $client_info = create_random_client();
    $add->execute($client_info);
}