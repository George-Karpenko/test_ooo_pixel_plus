<?php
include "Controllers/TablesWithWeatherController.php";
include "Models/Weather.php";
include "View.php";

$data = new TablesWithWeatherController();
return $data->index();