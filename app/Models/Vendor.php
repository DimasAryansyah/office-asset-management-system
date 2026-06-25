<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'company_name',
        'contact_person',
        'phone',
        'address',
    ];

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
