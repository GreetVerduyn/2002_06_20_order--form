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
    ['name' => 'aardbeismoothie', 'price' => 4.5],
    ['name' => 'bananenbrood', 'price' => 4.5],
    ['name' => 'worteltaart', 'price' => 5.0],
    ['name' => 'pompoenmuffins', 'price' => 3.5],
    ['name' => 'thee', 'price' => 2.5],
    ['name' => 'chai', 'price' => 2.5],
];

$totalValue = 0;

whatIsHappening();

// This function will send a list of invalid fields back
function validate()
{
    $required_fields = [];
    if (empty($_POST['email'])) {
        array_push($required_fields, 'e-mail');
    } if (empty($_POST['street'])) {
        array_push($required_fields, 'street');
    }if (empty($_POST['streetnumber'])) {
        array_push($required_fields, 'street number');
    }if (empty($_POST['city'])) {
        array_push($required_fields, 'city');
    }if (empty($_POST['zipcode'])) {
        array_push($required_fields, 'zipcode');
    }if (!ctype_digit($_POST['zipcode'])){
        array_push($required_fields, 'zipcode NOT CORRECT');
    }

   var_dump($required_fields);
    return $required_fields;
}

function handleForm()
{
    global $totalValue;
    global $products;
    // TODO: form related tasks (step 1)
    $email = $_POST['email'];
    $street = $_POST['street'];
    $streetnumber = $_POST['streetnumber'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];
    $ordered_products = [];
    //
    if (isset($_POST["products"])) {
        $form_products = $_POST["products"];
        foreach ($form_products as $key => $value) {
            // do stuff

            array_push($ordered_products, $products[$key]);
            $totalValue = $totalValue + $products[$key]['price'];
        }
    }
    var_dump($ordered_products);




       // Validation (step 2)
    $invalidFields = validate();
    if (!empty($invalidFields)) {

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
    handleForm();
}

require 'form-view.php';