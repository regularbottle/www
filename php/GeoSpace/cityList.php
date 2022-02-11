<?php
include 'city.php';

class cityList
{
    private array $cityList;

    public function __construct()
    {
        $tmp_file = fopen('CityCoordinates.csv', "r");
        if ($tmp_file) {
            while (($line = fgets($tmp_file)) !== false) {
                $campi = preg_split('/;/', $line);
                $cella = preg_split('/ /', $campi[3]);
                if (count($cella) > 1) {
                    $city = new city($campi[0], $campi[1], $campi[2], $cella[1], $cella[0], $campi[4]);
                    $this->cityList[] = $city->getCity();
                }
            }
            fclose($tmp_file);
        } else echo "ERROR while reading";
    }

    public function getCityList(): array
    {
        return $array = $this->cityList;
    }
}