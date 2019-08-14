<?php

if (!function_exists('formataData')) {

    function formataData($data)
    {
        if(empty($data)){
            return "";
        }
        return date("d/m/Y", strtotime($data));
    }
}
