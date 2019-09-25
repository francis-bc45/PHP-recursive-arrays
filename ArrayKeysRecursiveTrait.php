<?php

namespace App\Traits;

# Simple Library for recursing array keys method.

trait ArrayKeysRecursiveTrait
{
    public static function arrayKeysRecursive(array $input, $maxDepth = INF) : array
	{
		return self::array_keys_recursive($input, $maxDepth);
    }
    
    private static function array_keys_recursive($input, $maxDepth = INF, $depth = 0, $arrayKeys = [])
	{
        if($depth < $maxDepth)
        {
			$depth++;
            $keys = array_keys($input);
            
            foreach($keys as $key) 
            {
				if(is_array($input[$key]))
                    $arrayKeys[$key] = self::array_keys_recursive($input[$key], $maxDepth, $depth);
                    
                else
					$arrayKeys[] = $key;
			}
		}
		return $arrayKeys;
	}
}
