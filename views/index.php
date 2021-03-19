<?php
require('../controller/StarshipController.php');

// accept only 2 parameter
if (sizeof($_GET) > 2) {
    echo 'Only 2 parameters. <br>';
    exit();
}
$starshipController = new StarshipController();
$data = [];
// check whether there is any query parameter or not
if (sizeof($_GET) > 0 && sizeof($_GET) < 3) {
    $data = $starshipController->actionGetByParams();
} else {
    $data = $starshipController->actionGetAll();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Starship</title>
</head>
<body>
<h4>Starships List</h4>
<div class="row">
    <?php $i = 1;
    foreach ($data as $starship) { ?>
        <div class="col s4 m6">
            <div class="card-panel teal">
                <p class="white-text">Nb: <?= $i ?></p>
                <hr class="white-text"/>
                <p class="white-text">Name: <?= $starship->name ?></p>
                <p class="white-text">Model: <?= $starship->model ?></p>
                <p class="white-text">Manufacturer: <?= $starship->manufacturer ?></p>
                <p class="white-text">Cost in credits: <?= $starship->cost_in_credits ?></p>
                <p class="white-text">Length: <?= $starship->length ?></p>
                <p class="white-text">Max At. Speed: <?= $starship->max_atmosphering_speed ?></p>
                <p class="white-text">Crew: <?= $starship->crew ?></p>
                <p class="white-text">Passengers: <?= $starship->passengers ?></p>
                <p class="white-text">Cargo capacity: <?= $starship->cargo_capacity ?></p>
                <p class="white-text">Consumables: <?= $starship->consumables ?></p>
                <p class="white-text">Hyperdrive rating: <?= $starship->hyperdrive_rating ?></p>
                <p class="white-text">MGLT: <?= $starship->MGLT ?></p>
                <p class="white-text">Starship class: <?= $starship->starship_class ?></p>
                <p class="white-text">Pilots:
                    <?php if (sizeof($starship->pilots) > 0) { ?>
                    <ul class="white-text" style="margin-left: 4em">
                        <?php foreach ($starship->pilots as $pilot) { ?>
                            <li><?= $pilot ?></li>
                        <?php } ?>
                    </ul>
                    <?php } else { ?>
                        []
                    <?php } ?>
                </p>
                <p class="white-text">Films:
                    <?php if (sizeof($starship->films) > 0) { ?>
                    <ul class="white-text" style="margin-left: 4em">
                        <?php foreach ($starship->films as $film) { ?>
                            <li><?= $film ?></li>
                        <?php } ?>
                    </ul>
                    <?php } else { ?>
                        []
                    <?php } ?>
                </p>
                <p class="white-text">Created: <?= $starship->created ?></p>
                <p class="white-text">Edited: <?= $starship->edited ?></p>
                <p class="white-text">Url: <?= $starship->url ?></p>
            </div>
        </div>
        <?php $i++;
    } ?>
</div>
</body>
</html>
