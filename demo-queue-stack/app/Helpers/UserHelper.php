<?php

namespace App\Helpers;

class UserHelper
{
    public static function formatUserName($name)
    {
        return trim(ucwords(strtolower($name)));
    }
}
