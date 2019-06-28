<?php
/**
 * Created by Limito Co.
 * User: Mohsen Shahbazi
 * Date: 4/24/19
 * Time: 8:51 PM
 */

namespace Limito\Helper;


class Response
{

    public $status = false;
    public $message = null;
    public $data = [];

    static function Instance()
    {
        return new Response();
    }

    function data($data)
    {
        $this->data = $data;
        return $this;
    }

    function success($message = null)
    {
        $this->status = true;
        $this->message = $message;
        return [
            'status' => $this->status,
            'message' => $this->message,
            'data' => $this->data,
        ];
    }

    function error($message = null,response=200)
    {
        $this->status = false;
        $this->message = $message;
        return response([
            'status' => $this->status,
            'message' => $this->message,
            'data' => $this->data,
        ],response);
    }

}
