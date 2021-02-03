<?php

namespace App\Http\Controllers\Dashboard;


use Store\Admins\Services\AdminService;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    private $adminServices;

    public function __construct()
    {
        $this->adminServices = new AdminService();
    }

    public function login()
    {
        return view('dashboard.auth.login');
    }

    public function postlogin(Request $request)
    {
        $data = $request->all();

        if ($this->adminServices->PostAdminLogin($data))
            return redirect()->route('admin.index');

        $errors = $this->adminServices->errors();
        return redirect()->back()->withErrors($errors);


    }
}
