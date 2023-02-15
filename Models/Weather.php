<?php

class Weather
{
    private $file;
    private $withoutATitle;

    function __construct($file)
    {
        $this->file = $file;
    }

    function csvToArray()
    {
        $result = [];
        
        if (($this->file = fopen('./src/weather_statistics.csv', 'r')) !== false) {
            fgetcsv($this->file, 1000, ";");
            while (($data = fgetcsv($this->file, 3000, ";")) !== false) {
                $result []= [
                    'datetime' => $data[0],
                    'temperature' => $data[1]
                ];
            }
        }
        return $result;
    }

    function csvToArrayWithoutATitle()
    {
        if ($this->withoutATitle) {
            return $this->withoutATitle;
        }
        $result = $this->csvToArray();

        array_shift($result);
        $this->withoutATitle = $result;

        return $result;
    }

    function averageTemperatureByFormat($format)
    {

        $result = $this->weatherByFormat($format);
        return array_map([$this, 'arithmeticMeanOfArray'], $result);

    }
    
    function weatherByFormat($format)
    {
        $result = [];
        foreach($this->csvToArrayWithoutATitle() as $value) {
            $datetime = new DateTime($value['datetime']);
            if ('2023-02-15' === $datetime->format($format)) {
                echo($value['datetime']);
            }
            if (!$result[$datetime->format($format)]) {
                $result[$datetime->format($format)] = [];
            }
            $result[$datetime->format($format)] []= $value['temperature'];
        }
        return $result;
    }

    function arithmeticMeanOfArray($a)
    {
        return array_sum($a)/count($a);
    }
}
