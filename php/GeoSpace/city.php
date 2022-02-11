<?php

class City
{
    private int $index;
    private string $paese;
    private string $location;
    private string $longitudine;
    private string $latitudine;
    private int|float $longitudineAlt;
    private int|float $latitudineAlt;
    private string $nome;

    public function __construct($paese, $location, $nome, $longitudine, $latitudine, $indice)
    {
        $this->paese = $paese;
        $this->nome = $nome;
        $this->location = $location;
        $this->longitudine = $longitudine;
        $this->latitudine = $latitudine;
        $this->index = $indice;

        if (str_contains($longitudine, 'E') == true) {
            $this->longitudineAlt = (floatval(substr($longitudine, 0, 3)) + floatval(substr($longitudine, 3, 2))) / 60;
        }
        if (str_contains($longitudine, 'W') == true) {
            $this->longitudineAlt = -(floatval(substr($longitudine, 0, 3)) + floatval(substr($longitudine, 3, 2))) / 60;
        }
        if (str_contains($latitudine, 'N') == true) {
            $this->latitudineAlt = (floatval(substr($latitudine, 0, 2)) + floatval(substr($latitudine, 2, 2))) / 60;
        }
        if (str_contains($latitudine, 'S') == true) {
            $this->latitudineAlt = -(floatval(substr($latitudine, 0, 2)) + floatval(substr($latitudine, 2, 2))) / 60;
        }
    }

    public function getCity(): array
    {
        return $array = [ "Index" => $this->index, "Paese" => $this->paese, "Location" => $this->location,
                          "Longitudine" => $this->longitudine, "Latitudine" => $this->latitudine, "LongitudineAlt" => $this->longitudineAlt,
                          "LatitudineAlt" => $this->latitudineAlt, "Nome" => $this->nome];
    }
}


