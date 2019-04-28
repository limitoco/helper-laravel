<?php
/**
 * Created by Limito Co.
 * User: Mohsen Shahbazi
 * Date: 1/13/19
 * Time: 3:20 PM
 */
if (! function_exists('success')) {
    function success($data=[], $message = null) {
        return Limito\Helper\Response::Instance()->data($data)->success($message);
    }
}

if (! function_exists('error')) {
    function error($message, $data = null) {
        return Limito\Helper\Response::Instance()->data($data)->error($message);
    }
}