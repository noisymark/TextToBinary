<?php

class Mechanism{

    public static function cleanInput($string){
        $string = trim(preg_replace('/\s+/', ' ', $string));
        return $string;
    }

    public static function stringToBinary($string){
        $characters = str_split($string);
        $binary = [];
        foreach ($characters as $character) {
            $data = unpack('H*', $character);
            $binary[] = base_convert($data[1], 16, 2);
        }
        return implode(' ', $binary);
    }
}