<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();

    //store user input field
     if (isset($_POST['submit']) === true) {
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['street'] = $_POST['street'];
    $_SESSION['streetnumber'] = $_POST['streetnumber'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['zipcode'] = $_POST['zipcode'];
    }

$streetErr = $streetnumberErr = $cityErr = $zipcodeErr = "";
$email = $street = $streetnumber = $city = $zipcode = "";
$emailErr = "";
$isTime = "";

// calculate delivery time
if (isset($_POST["express_delivery"]) === true) {
    $expectTime = date("H:i:a", strtotime("45 minutes"));
} else {
    $expectTime = date("H:i:a", strtotime("2 hours"));
}



//validation form

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) === true && empty($_POST['email']) === false) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == true) {
            $email = htmlspecialchars($_POST['email']);
        }
    else {
            $emailErr = "Email is required or invalid Email";
        }
    }

    if (empty($_POST["street"]) === true) {
        $streetErr = "Street name is required";
    } else {
        $street = htmlspecialchars($_POST["street"]);
    }

    if (empty($_POST["streetnumber"]) === true || is_numeric($_POST["streetnumber"]) === false){
        $streetnumberErr = "Streetnumber is required or must contain only mumber";
    } else {
        $streetnumber = htmlspecialchars($_POST['streetnumber']);
    }


    if (empty($_POST["city"]) === true) {
        $cityErr = "City is required";
    } else {
        $city = htmlspecialchars($_POST['city']);
    }

    if (empty($_POST["zipcode"]) === true || is_numeric($_POST['zipcode']) === false) {
        $zipcodeErr = "zipcode is required or must contain only number";
    } else {
        $zipcode = htmlspecialchars($_POST['zipcode']);
    }
}

//check if the input field is empty
if (isset($_POST['submit']) === true ) {

    function complete() {
        global $email, $street, $streetnumber, $city, $zipcode, $expectTime;
        if (isset($email) === true && isset($street) === true && isset($streetnumber) === true && isset($city) === true && isset($zipcode) === true) {
            echo '<div class="alert alert-primary" role="alert">' . "Your order has been sent" . '</div>';
            echo '<div class="alert alert-primary" role="alert">' . "Your expected delivery time is ".$expectTime.'</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">' . "Please complete the form !" . '</div>';
        }
    }
    complete();
}



function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}
//your products with their price.


 if (isset($_GET["food"]) && $_GET["food"] == 0) {
     //$value = isset($_GET['food']) ? $_GET['food'] : $_POST['food'];
     //if (isset($_GET['food']) == 0) {
         $products = [
             ['name' => 'Cola', 'price' => 2],
             ['name' => 'Fanta', 'price' => 2],
             ['name' => 'Sprite', 'price' => 2],
             ['name' => 'Ice-tea', 'price' => 3],
         ];
     }
 else {
         $products = [
             ['name' => 'Club Ham', 'price' => 3.20],
             ['name' => 'Club Cheese', 'price' => 3],
             ['name' => 'Club Cheese & Ham', 'price' => 4],
             ['name' => 'Club Chicken', 'price' => 4],
             ['name' => 'Club Salmon', 'price' => 5]
         ];
     }

 foreach ($products AS $price => $value);
    $value +=


$totalValue = 0;





require 'form-view.php';