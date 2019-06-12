<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="content pt-2 pl-4">
    <div class="row">
        <div class="col-3">
            <h2>Countries</h2>
            <ul class="list-group">
            <?php 
                foreach ($countries as $cnt)
                {
                    echo '<li class="list-group-item">' . $cnt->sISOCode . ": " . $cnt->sName . "</li>";
                }
            ?>
            </ul>
        </div>
        <div class="col-3">
                <h2>Capital of JP</h2>
                <?=$capital?>
        </div>
        <div class="col-3">
            <h2>Countries by cURL</h2>
            <ul class="list-group">
            <?php 
                foreach ($countries as $cnt)
                {
                    echo '<li class="list-group-item">' . $cnt->sISOCode . ": " . $cnt->sName . "</li>";
                }
            ?>
            </ul>
        </div>
        <div class="col-3">
                <h2>Capital of AU (cURL)</h2>
                <?=$curlCapital?>
        </div>
    </div>
    <div class="row">
        
    </div>
</div>    
</body>
</html>