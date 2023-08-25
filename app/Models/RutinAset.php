<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutinAset extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'rutin_asets';

    public function rutinaset(){
        return $this->belongsTo(Aset::class, 'aset_id');
    }
}