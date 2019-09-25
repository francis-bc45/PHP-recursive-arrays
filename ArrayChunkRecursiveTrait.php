<?php

trait ArrayChunkRecursiveTrait
{
    public static function arrayChunkRecursive(array $input, int $size, bool $preserve_key = false) : array
    {
        return self::array_chunk_recursive($input, $size, $preserve_key);
    }

    private static function array_chunk_recursive($array, $size, $preserve_key)
    {        
        $loop = 0;

        foreach($array as $key => $value):

            if(is_array($value)):
                $result[$loop][] = self::array_chunk_recursive($value, $size, $preserve_key);
                    if($size === 1) $loop++;
                        continue;
            endif;

            $preserve_key ? $result[$loop][$key] = $value : $result[$loop][] = $value;
      
            if(count($result[$loop]) === $size)
                $loop++;

        endforeach;

        return $result;
    }
}