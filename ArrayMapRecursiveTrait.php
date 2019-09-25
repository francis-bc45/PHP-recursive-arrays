<?php

namespace App\Traits;

trait ArrayMapRecursiveTrait
{
    public static function arrayMapRecursive(callable $function, array $input, bool $index = false) : array
    {
        return self::array_map_recursive($function, $input, $index);
    }

    private static function array_map_recursive($callback, $input, $index)
    {
        $output = [];

        foreach($input as $key => $data)
        {
            if(is_array($data))
            {
                if(is_string($key) && $index)
                    $key = $callback($key);
                
                $output[$key] = self::array_map_recursive($callback, $data, $index);
            }
                
            else
                $output[$key] = $callback($data);

        }
        return $output;
    }

}