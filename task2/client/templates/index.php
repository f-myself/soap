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
            <div class="col-3 border border-primary">
                    <form class="p-3" method="POST" action="index.php">
                        <div class="form-group">
                            <label for="Year">Year: <span class="js_year"></span></label>
                            <input type="range" name="year" class="form-control" id="Year" min="2000" max="2019" required>
                        </div>
                        <div class="form-group">
                            <label for="Model">Model</label>
                            <input type="text" name="model" class="form-control" id="Model" placeholder="X5">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Engine capacity</label>
                            <select class="form-control" name="capacity" id="exampleFormControlSelect1">
                                <option value="">Any Engine capacity</option>
                                <option value="1.0">less then 1.0</option>
                                <option value="2.0">less then 2.0</option>
                                <option value="3.0">less then 3.0</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Color</label>
                            <select class="form-control" name="color" id="exampleFormControlSelect2">
                                <option value="">Any color</option>
                                <option>silver</option>
                                <option>black</option>
                                <option>brown</option>
                                <option>blue</option>
                                <option>orange</option>
                                <option>cyan</option>
                                <option>red</option>
                                <option>violet</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="maxSpeed">Max speed: <span class="js_maxspeed"></span></label>
                            <input type="range" name="maxSpeed" class="form-control" id="maxSpeed" min="187" max="302">
                        </div>
                        <div class="form-group">
                            <label for="Price">Price (km/h): <span class="js_price"></span></label>
                            <input type="range" name="price" class="form-control" id="Price" min="17000" max="165000" step="1000">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="index.php" class="btn btn-primary">Clear Results</a>
                        </div>
                    </form>
            </div>
            <div class="col-9">
                <h2><?=$errors?> <?=$status?></h2>
                <div class="row">
                    <?
                    if(!$errors)
                    {
                        foreach($allCars as $car)
                        {
                    ?>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xl-2 border border-light ml-1 mb-1">
                        <a href="?car=<?=$car->id?>"><?=$car->brand?> <?=$car->model?></a>
                        </div>
                    <?
                        }
                    }
                    ?>
                </div>
                
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
            var $yearSpan = $('.js_year');
            var $year = $('#Year');
            $year.on('input', function(){
                $yearSpan[0].textContent = $year.val();
            });
            $yearSpan[0].textContent = $year.val();

            var $speedSpan = $('.js_maxspeed');
            var $speed = $('#maxSpeed');
            $speed.on('input', function(){
                $speedSpan[0].textContent = $speed.val() + " km/h";
            });
            $speedSpan[0].textContent = $speed.val() + " km/h";

            var $priceSpan = $('.js_price');
            var $price = $('#Price');
            $price.on('input', function(){
                $priceSpan[0].textContent = $price.val() + "$";
            });
            $priceSpan[0].textContent = $price.val() + "$";
    </script>
</body>
</html>