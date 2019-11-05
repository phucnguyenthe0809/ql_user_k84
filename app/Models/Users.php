<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //liên kết bảng
    protected $table="users";

    //Bảng không sử dụng timestamps(created_at,updated_at)
    public $timestamps=false;
}
