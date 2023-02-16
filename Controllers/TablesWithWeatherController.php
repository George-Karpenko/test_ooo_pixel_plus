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
            'movingAverageAndAverageTemperatureByDay' => $weather->movingAverageAndAverageTemperatureByFormat("Y-m-d"),
            'movingAverageAndAverageTemperatureByWeeks' => $weather->movingAverageAndAverageTemperatureByFormat("W"),
            'movingAverageAndAverageTemperatureByMonths' => $weather->movingAverageAndAverageTemperatureByFormat("M"),
        ]);
    }
}
