<?php
/**
 * Created by PhpStorm.
 * User: mohsen1
 * Date: 1/14/19
 * Time: 3:38 PM
 */
use Illuminate\Contracts\View\Factory as ViewFactory;

if (!function_exists('mobile')) {
    function mobile($mobile)
    {
        $mobile = convertDigit($mobile);
        $mobileregex = "/^[0][1-9]\d{9}$|^[1-9]\d{9}$/";

        if (preg_match($mobileregex, $mobile) === 1) {
            if (strlen($mobile) === 11)
                $mobile = substr($mobile, 1, strlen($mobile) - 1);
            return $mobile;
        } else {
            return false;
        }
    }
}
if (!function_exists('convertDigit')) {
    function convertDigit($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

        return $englishNumbersOnly;
    }
}

if (!function_exists('page')) {
    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  string $view
     * @param  string $pageTitle
     * @param  array $data
     * @param  array $mergeData
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    function page($view, $pageTitle = null, $data = [], $mergeData = [])
    {
        $factory = app(ViewFactory::class);

        if (func_num_args() === 0) {
            return $factory;
        }


        if (empty($pageTitle))
            return $factory->make($view, $data, $mergeData);

        else
            return $factory->make($view, $data, $mergeData)->with('pageTitle', $pageTitle);
    }
}


if (!function_exists('user')) {
    /**
     *
     * @param  int $userId
     * @return \App\Http\Classes\User\UserHelper;
     *
     */
    function user($userId = null)
    {
        return new \App\Http\Classes\User\UserHelper($userId);
    }
}
if (!function_exists('image')) {
    /**
     *
     * @param  int $fileId
     * @return string;
     *
     */
    function image($fileId = null)
    {
        return url('common/file/show/' . $fileId);
    }
}

