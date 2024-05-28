<?php

function check_app_name($app_name, $str_to_check, $true_return, $false_return='') {
    return $app_name === $str_to_check ? $true_return : $false_return;
}
