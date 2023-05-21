<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Uuid;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $appends = ['icons_url'];

    protected $fillable = [
        'name',
        'icons',
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

    public function getIconsUrlAttribute()
    {
        return Storage::url('public/upload/icons/' . $this->icons);
    }
}
