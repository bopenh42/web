<?php
    function show_error($arr_err,$key){
        return isset($arr_err[$key]) ? $arr_err[$key] : '';
    }




?>