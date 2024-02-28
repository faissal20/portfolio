<?php 

namespace App\Services;

class ArrayServices
{   
    public static function convertKeysToSnakeCase($array)
    {
        // convert from camelCase to snake_case
        $newArray = [];
        foreach ($array as $key => $value) {
            $newKey = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $key));
            $newArray[$newKey] = $value;
        }
        return $newArray;
    }

    public static function convertKeysToCamelCase($array)
    {
        // convert from snake_case to camelCase
        $newArray = [];
        foreach ($array as $key => $value) {
            $newKey = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            $newArray[$newKey] = $value;
        }
        return $newArray;
    }
    
}