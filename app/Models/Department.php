<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    //protected $primarykey = 'd_id';  กรณี pk เป็นชื่ออื่นที่ไม่ใช่ id
    //protected $keyType = 'string'; กรณี pk เป็น varchar

    //public $incrementing = false; //pk ไม่ได้เป็น auto_increment
    public $timestamps = false; // ตารางไม่มี created_at update_at ในตาราง ห



}
