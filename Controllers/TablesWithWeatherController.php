<?php

class TablesWithWeatherController
{
    function __construct()
	{
		$this->view = new View();
	}

    function index() {
        if (($file = fopen('./src/weather_statistics.csv', 'r')) !== false) {
            $weather = new Weather($file);
        }

		$this->view->generate('index.php', 'template_view.php', [
            'averageTemperatureByDay' => $weather->averageTemperatureByFormat("Y-m-d"),
            'averageTemperatureByWeeks' => $weather->averageTemperatureByFormat("W"),
            'averageTemperatureByMonths' => $weather->averageTemperatureByFormat("M"),
        ]);
    }
}
