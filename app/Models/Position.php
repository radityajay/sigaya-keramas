<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Uuid;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name'
    ];

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Uuid::generate(4);
        });
    }
}
