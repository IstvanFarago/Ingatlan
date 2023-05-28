<?php
$name=$_POST['name'];
$number=$_POST['number'];
$type_of_house=$_POST['type-of-house'] ?? '0';
$property_address=$_POST['property-address'];
$property_size=$_POST['property-size'];
$monthly_rent=$_POST['monthly-rent'];
$minimum_rent=$_POST['minimum-rent'];
$property_description = $_POST['property-description'];
$date_built = $_POST['date-built'] ?? '0';
$condition = $_POST['condition'] ?? '0';
$heating = $_POST['heating'] ?? '0';
$building_material = $_POST['building-material'] ?? '0';
$land_size=$_POST['land-size'] ?? '0';
$number_of_rooms = $_POST['number-of-rooms'] ?? '0';
$floor=$_POST['floor'] ?? '0';
$levels = $_POST['levels'] ?? '0';
$balcony = $_POST['balcony'] ?? '0';
$balcony_size = $_POST['balcony-size'] ?? '0';
$bathroom = $_POST['bathroom'] ?? '0';
$parking = $_POST['parking'] ?? '0';
$date_available = $_POST['date-available'] ?? '0';
$ac = $_POST['ac'] ?? '0';
$pets = $_POST['pets'] ?? '0';
$property_description = $_POST['property-description'] ?? '0';



$host = "localhost";
$dbname = "ingatlan";
$username = "root";
$password = "";
        
$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['flat-submit'])) {
        // The "Flat" button was pressed
        $type_of_property = "Lakás";
    } elseif (isset($_POST['house-submit'])) {
        // The "House" button was pressed
        $type_of_property = "Ház";
    } elseif (isset($_POST['land-submit'])) {
        // The "Land" button was pressed
        $type_of_property = "Telek";
    } elseif (isset($_POST['garage-submit'])) {
        // The "Land" button was pressed
        $type_of_property = "Garázs";
    } else {
        // No button was pressed or form not submitted
        // Handle the default case or show an error message
        // You can choose a default value for $type_of_property or display an error message
        $type_of_property = "Nyaraló";
    }
}

/* $type_of_house = isset($_POST['type-of-house']) ? $_POST['type-of-house'] : '0';
$land_size= isset($_POST['land-size']) ? $_POST['land-size'] : '0';
$floor = isset($_POST['floor']) ? $_POST['floor'] : '0'; */





    
$sql = "INSERT INTO `kiadas-reg` (`Tulaj`,`Tel`,`Ingatlan típusa`, `Ház típusa`, `Elhelyezkedés`, `Alapterület`, `Bérleti díj`, `Építés éve`, `Állapota`, `Fűtés`, `Min. bérleti idő`, `Építőanyaga`, `Telek mérete`, `Szobák száma`, `Emelet`, `Szint`, `Erkély`, `Erkély mérete`, `Fürdő/WC`, `Parkolás`, `Mikortól költözhető`, `Légkondi`, `Háziállat`, `Egyéb megjegyzés`)
        VALUES (?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}



mysqli_stmt_bind_param($stmt, "sssssiisssisiiiisissssss",
    $name,
    $number,
    $type_of_property,
    $type_of_house,
    $property_address,
    $property_size,
    $monthly_rent,
    $date_built,
    $condition,
    $heating,
    $minimum_rent,
    $building_material,
    $land_size,
    $number_of_rooms,
    $floor,
    $levels,
    $balcony,
    $balcony_size,
    $bathroom,
    $parking,
    $date_available,
    $ac,
    $pets,
    $property_description
);


mysqli_stmt_execute($stmt);

echo "Sikeres feltöltés.";