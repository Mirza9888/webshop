<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;



class Role extends Model
{
    use HasFactory,HasRoles;
    protected $fillable=['name','guard_name'];
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Permission::class,);
    }
    public function getPermissionNames()
    {
        // Pretpostavljajući da svaka uloga ima vezu "permissions" koja vraća kolekciju dozvola
        return $this->permissions->pluck('name');
    }



}
