<?php

namespace App\Services;

class House
{
    public function cleanSearchFilters(array $filters): array
    {
        $filters = array_filter($filters, function ($value) {
            return !is_null($value);
        });
    
        foreach ($filters as $key => $value) {
            if (strpos($key, '-operator') !== false) {
                $field = str_replace('-operator', '', $key);
    
                if (!isset($filters[$field]) || is_null($filters[$field])) {
                    unset($filters[$key], $filters[$field]);
                }
            }
        }

        return $filters;
    }

}