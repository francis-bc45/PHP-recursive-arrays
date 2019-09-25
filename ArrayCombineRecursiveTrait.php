<?php 

namespace App\Traits;

trait ArrayCombineRecursiveTrait
{
    public static function arrayCombineRecursive(array $array1, array $array2) : array
    {
        return self::array_combine_recursive($array1, $array2);
    }

    private static function array_combine_recursive($array1, $array2)
    {
        $count = 0;

        foreach($array1 as $key => $arrayKeys)
        {
            if(is_array($arrayKeys))
            {
                if(empty($arrayKeys))
                    $combinedArray[$key] = $array2[$count];

                else
                $combinedArray[$key] = self::array_combine_recursive($array1[$key], $array2[$count]);
            }

            else
                $combinedArray[$arrayKeys] = $array2[$count];

            $count++;
        }

        return $combinedArray;
    }
}