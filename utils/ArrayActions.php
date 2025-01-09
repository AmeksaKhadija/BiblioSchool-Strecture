<?php 

class ArrayActions {
    public static string $string = "";

    public static function arrayToString(array $arr) : string{
        $sizeOfArray = count($arr);
        // die($sizeOfArray);
        if ($sizeOfArray  == 0) {
            return "array not found";
        }


        for ($i = 0; $i < $sizeOfArray ; $i++) {
            foreach($arr[$i] as $key => $value ) {
                self::$string += " " . $key . " : " . $value;
            }
        }
        
        // die(self::$string);

        return self::$string;
    }

}