<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldsValues extends Model
{
    use HasFactory;

    public function module()
    {
        return $this->hasMany(Module::class);
    }

    public function fields()
    {
        return $this->hasMany(Fields::class);
    }
}
