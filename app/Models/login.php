<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class login extends Model
{
    protected $table="login";
    protected $primaryKey="id";
    protected $fillable=["nama", "username", "password", "email"];
}
?>