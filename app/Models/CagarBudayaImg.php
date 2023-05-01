<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Uuid;

class CagarBudayaImg extends Model
{
    use HasFactory;
    protected $table = 'cagar_budaya_img';

    public $incrementing = false;
    protected $keyType = 'string';
    protected $appends = ['photo_url'];

    protected $fillable = [
        'cagar_budaya_id',
        'image',
        'setfront',
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

    public function getPhotoUrlAttribute()
    {
        return Storage::url('public/upload/cagar-budaya/' . $this->image);
    }
}
