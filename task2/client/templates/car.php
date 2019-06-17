<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Car Service</title>
</head>
<body>
    <div class="container pt-4">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Show all cars</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-9">
            <h2><?=$errors?></h2>
            <?
            if (!$errors)
            {
            ?>
                <table class="table">
                    <tbody>
                        <tr>
                        <th scope="row">Brand and model</th>
                        <td><?=$carInfo->brand?> <?=$carInfo->model?></td>
                        </tr>
                        <tr>
                        <th scope="row">Year</th>
                        <td><?=$carInfo->year?></td>
                        </tr>
                        <tr>
                        <th scope="row">Engine capacity</th>
                        <td><?=$carInfo->capacity?></td>
                        </tr>
                        <tr>
                        <th scope="row">Color</th>
                        <td><?=$carInfo->color?></td>
                        </tr>
                        <tr>
                        <th scope="row">Max Speed</th>
                        <td><?=$carInfo->max_speed?></td>
                        </tr>
                        <tr>
                        <th scope="row">Price</th>
                        <td><?=$carInfo->price?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-3 text-center">
                <h4>Buy this car </h4>
                <form class="p-3" method="POST" action="index.php">
                    <div id="js_visible-form">
                        <input type="hidden" name="CarId" value="<?=$carInfo->id?>">
                        <div class="form-group">
                            <label for="FirstName">First Name</label>
                            <input type="text" name="FirstName" class="form-control" id="FirstName" placeholder="John" required>
                        </div>
                        <div class="form-group">
                            <label for="LastName">Last Name</label>
                            <input type="text" name="LastName" class="form-control" id="LastName" placeholder="Doe" required>
                        </div>
                        <div class="form-group">
                            <label for="PaymentId">Payment</label>
                            <select class="form-control" name="PaymentId" id="PaymentId" required>
                                <option value="1">Credit card</option>
                                <option value="2">Cash</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Buy</button>
                            <a href="index.php" class="btn btn-primary">Home Page</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            
            <div class="col-4"></div>
        </div>
        <?
            } else {
                echo "<h3>$carInfo</h3>";
            }
        ?>
    </div>
</body>
</html>

    