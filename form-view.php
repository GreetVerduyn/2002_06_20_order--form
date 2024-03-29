<?php // This file is mostly containing things for your view / html ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Your fancy store</title>
</head>
<body>

<div class="container" style="background-color: floralwhite">
 <!--   <?php //if (!empty($errors)) { var_dump($errors);?>
        <h3 style="color: brown">Errors</h3>
    <?php// } ?>
   <?php //foreach ($errors as $field){
       //echo "<p style='color: brown'> $field</p>";
   //}
      ?>-->
    <h1>Place your order</h1>
    <?php // Navigation for when you need it ?>
    <?php /*
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="?food=1">Order food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?food=0">Order drinks</a>
            </li>
        </ul>
    </nav>
    */ ?>
    <form method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                <?php if (empty($_SESSION["email"])) {?>
                    <span><div class="alert alert-warning" role="alert">e-mail must be entered</div></span>
                <?php } ?>
                <input type="text" id="email" value="<?php echo  $_SESSION["email"] ?>" name="email" class="form-control"/>
            </div>
            <div></div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <?php if (empty($_SESSION["street"])) {?>
                        <span><div class="alert alert-warning" role="alert">street must be entered</div></span>
                    <?php } ?>
                    <input type="text" name="street" value="<?php echo $_SESSION["street"] ?>" id="street" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label>
                    <?php if (empty($_SESSION["streetnumber"])) {?>
                        <span><div class="alert alert-warning" role="alert">streetnumber must be entered</div></span>
                    <?php } ?>
                    <input type="text" id="streetnumber" value="<?php echo $_SESSION["streetnumber"]?>" name="streetnumber" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <?php if (empty($_SESSION["city"])) {?>
                        <span><div class="alert alert-warning" role="alert">city must be entered</div></span>
                    <?php } ?>
                    <input type="text" id="city" name="city" value="<?php echo $_SESSION["city"]?> " class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label>
                    <?php if (empty($_SESSION["zipcode"])) {?>
                        <span><div class="alert alert-warning" role="alert">zipcode must be entered</div></span>
                    <?php } ?>
                    <input type="text" id="zipcode" name="zipcode" value="<?php echo $_SESSION["zipcode"] ?>" class="form-control">
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
                <?php foreach ($products as $i => $product): ?>
                <label>
					<?php // <?= is equal to <?php echo ?>
                    <input type="checkbox" value="<?php echo $i ?>" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                    &euro; <?= number_format($product['price'], 2) ?>
                </label>
                <br />
            <?php endforeach; ?>
        </fieldset>

        <button type="submit" class="btn btn-primary">Order!</button>
    </form>

    <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in food and drinks.</footer>
</div>

<style>
    footer {
        text-align: center;
    }
</style>
</body>
</html>
