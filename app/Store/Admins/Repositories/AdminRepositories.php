<?php

namespace Store\Admins\Repositories;

use Illuminate\Support\Arr;
use Store\Repository;

class AdminRepositories extends Repository
{

    public function processAdminLogin($data)
    {
        $requestAll=Arr::except($data,['_token']);
        $remember_me = isset($data['remember_me']) ? true : false;
        if (auth()->guard('admin')->attempt(['email' => $requestAll['email'], 'password' => $requestAll['password']], $remember_me)) {
            return true;
        }
        return false;

    }
}
