<?php

class NavHelper {
    public static function routes($array) {
        $temp = [];
        foreach($array as $item) {
            $temp[] = $item['route_name'];
        }
        return $temp;
    }
}