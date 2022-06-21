
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
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="invoice p-5">
                    <h5>Your order Confirmed!</h5>

                    <span class="font-weight-bold d-block mt-4">Hello</span>
                    <span>You order has been confirmed and will be delivered</span>
                    <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <td>
                                    <div class="py-2">
                                        <span class="d-block text-muted">delivery address</span>
                                        <span class="d-block"><?php echo $street." ".$streetnumber?></span>
                                        <span class="d-block"><?php echo $city." ".$zipcode?></span>
                                    </div>
                                </td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                    <div class="product border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <?php foreach ($ordered_products as $i => $product): ?>

                            <tr>
                                <td width="20%">
                                    <img src="https://i.imgur.com/u11K1qd.jpg" width="90">
                                </td>
                                <td width="60%">
                                    <span class="font-weight-bold"><?php echo "€ ".$product['name']?></span>
                                </td>
                                <td width="20%">
                                    <div class="text-right">
                                        <span class="font-weight-bold"><?php echo "€ ".$product['price']?></span>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                            </tbody>

                        </table>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-5">
                            <table class="table table-borderless">
                                <tbody class="totals">
                                <tr>
                                    <td>
                                        <div class="text-left">
                                            <span class="text-muted">Subtotal</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-right">
                                            <span><?php echo "€ ".$totalValue ?></span>
                                        </div>
                                    </td>
                                </tr>
                               <tr>
                                    <td>
                                        <div class="text-left">
                                            <span class="text-muted">Shipping Fee</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-right">
                                            <span>€ 2</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-top border-bottom">
                                    <td>
                                        <div class="text-left">
                                            <span class="font-weight-bold">total</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-right">
                                            <span class="font-weight-bold"><?php echo "€ ".$totalValue + 2 ?></span>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p>We will be sending shipping confirmation email when the item shipped successfully!</p>
                    <p class="font-weight-bold mb-0">Thanks for shopping with us!</p>
                    <span>Nike Team</span>
                </div>
                <div class="d-flex justify-content-between footer p-3">
                    <span><a href="index.php">back</a></span>
                    <span>12 June, 2020</span>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>

