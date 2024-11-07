<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    
    protected $table = 'nama_group';
    protected $fillable = ['nama_group'];

    public function users(){
        return $this->hasMany(User::class, 'id_user_group');
    }
}
