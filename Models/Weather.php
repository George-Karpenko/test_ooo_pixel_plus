<?php

class Weather
{
    private $file;
    private $withoutTitle;

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

    function csvToArrayWithoutTitle()
    {
        if ($this->withoutTitle) {
            return $this->withoutTitle;
        }
        $result = $this->csvToArray();

        array_shift($result);
        $this->withoutTitle = $result;

        return $result;
    }

    function averageTemperatureByFormat($format)
    {
        $result = $this->weatherByFormat($format);
        return array_map([Helper::class, 'arithmeticMeanOfArray'], $result);
    }
    
    function weatherByFormat($format)
    {
        $result = [];
        foreach($this->csvToArrayWithoutTitle() as $value) {
            $datetime = new DateTime($value['datetime']);
            if (!$result[$datetime->format($format)]) {
                $result[$datetime->format($format)] = [];
            }
            $result[$datetime->format($format)] []= $value['temperature'];
        }
        return $result;
    }
}
