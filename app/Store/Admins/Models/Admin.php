<?php

namespace Store\Admins\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    protected $table="admins";
    protected $guarded=[];
    public $timestamps=true;
}
