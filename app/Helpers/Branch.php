<?php

use App\Models\Branch;

if (!function_exists('getBranches')) {
    function getBranches()
    {
        return Branch::data()->get();
    }
}


if (!function_exists('getUserBranches')) {
    function getUserBranches($ids)
    {
        return Branch::data()->findMany($ids);
    }
}
