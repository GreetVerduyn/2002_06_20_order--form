<?php

// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();

// Use this function when you need to need an overview of these variables
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

// TODO: provide some products (you may overwrite the example)

$products = [
    ['name' => 'strawberry smoothie', 'price' => 4.5, 'image' => './images/aardbeismoothie.jpg'],
    ['name' => 'bananabread', 'price' => 4.5, 'image' => './images/bananenbrood.jpg'],
    ['name' => 'carrotcake', 'price' => 5.0, 'image' => './images/carrot-cake.jpg'],
    ['name' => 'pumpkinmuffin', 'price' => 3.5, 'image' => './images/pompoenmuffin.jpg'],
    ['name' => 'thee', 'price' => 2.5, 'image' => './images/thee.jpg'],
    ['name' => 'chai tea latte', 'price' => 2.5, 'image' => './images/chai-latte.jpg'],
];


$totalValue = 0;

//whatIsHappening();

// This function will send a list of invalid fields back
function validate()
{
    $required_fields = [];
    if (empty($_SESSION["email"])) {
        array_push($required_fields, 'e-mail is empty');
    } elseif (!filter_var($_SESSION["email"], FILTER_VALIDATE_EMAIL)){
        array_push($required_fields, 'e-mail not valid');
    }
    if (empty( $_SESSION["street"])) {
        array_push($required_fields, 'street is empty');
    }
    if (empty($_SESSION['streetnumber'])) {
        array_push($required_fields, 'street number is empty');
    }
    if (empty($_SESSION['city'])) {
        array_push($required_fields, 'city is empty');
    }
    if (empty($_SESSION['zipcode'])) {
        array_push($required_fields, 'zipcode is empty');
    }elseif (!ctype_digit($_SESSION['zipcode'])){
        array_push($required_fields, 'zipcode not valid, only use numbers');
    } if (empty($_SESSION['ordered_products'])) {
    array_push($required_fields, 'you forgot to choose');
    }
  //var_dump($required_fields);

    return $required_fields;
}
$errors=[];
function handleForm($errors)
{
    global $totalValue;
    global $products;
    // TODO: form related tasks (step 1)
    $_SESSION["email"]= $_POST['email'];
    $_SESSION["street"] = $_POST['street'];
    $_SESSION["streetnumber"] = $_POST['streetnumber'];
    $_SESSION["city"] = $_POST['city'];
    $_SESSION["zipcode"] = $_POST['zipcode'];
    $_SESSION["ordered_products"] = [];

    if (isset($_POST["products"])) {
        $form_products = $_POST["products"];
        foreach ($form_products as $key => $value) {
            array_push( $_SESSION["ordered_products"], $products[$key]);
            $totalValue = $totalValue + $products[$key]['price'];
        }
    }

       // Validation (step 2)
    $invalidFields = validate();
    if (!empty($invalidFields)) {
foreach ($invalidFields as $invalidField){
    array_push($errors, $invalidField);
 }
return $errors;

        // TODO: handle errors
    } else {
        include 'form-confirmation.php';
        exit();
        // TODO: handle successful submission
    }
}

// TODO: replace this if by an actual check
$formSubmitted = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $formSubmitted = true;
}

if ($formSubmitted) {
  $errors = handleForm($errors);
}

/*function geValue($val) {
    if (isset($_POST[$val])) {
        return $_POST[$val];
    } else {
        return '';
    }
}*/

require 'form-view.php';