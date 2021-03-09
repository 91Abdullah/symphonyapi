<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fields extends Model
{
    use HasFactory;

    public function module()
    {
        return $this->hasMany(Module::class);
    }

    public function fieldOptions()
    {
        return $this->belongsTo(FieldsOptions::class);
    }

    public function fieldTypes()
    {
        return $this->belongsTo(FieldsTypes::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
