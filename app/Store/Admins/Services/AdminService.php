<?php

namespace Store\Admins\Services;

use Store\Admins\Repositories\AdminRepositories;
use Validator;
use Store\Services;

class AdminService extends Services
{
    private $adminRepository;

    public function __construct()
    {
        $this->adminRepository = new AdminRepositories();
    }

    public function PostAdminLogin($data)
    {
        //validation
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        $messages = [
            'email.required' => 'برجاء ادخال ميل ',
            'password.required' => 'برجاء ادخال الرقم السرى',
        ];
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            $this->setError($validator);
            return false;
        }

        if ($this->adminRepository->processAdminLogin($data))
            return true;
        return false;

    }
}
