<?php

namespace App\Traits;

# Simple library for recursing array values method.

trait ArrayValuesRecursiveTrait
{
    public static function arrayValuesRecursive(array $input, $maxDepth = INF) : array
    {
        return self::array_values_recursive($input, $maxDepth);
    }

    private static function array_values_recursive($input, $maxDepth = INF, $depth = 0, $arrayValues = [])
    {
        if($depth < $maxDepth)
        {
			$depth++;
            $values = array_values($input);
            
            foreach($values as $key => $value)
            {
				if(is_array($value))
                    $arrayValues[$key] = self::array_values_recursive($value, $maxDepth, $depth);
                    
                else
					$arrayValues[] = $value;
			}
		}
		return $arrayValues;
    }
}