<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Uuid;

class Config extends Model
{
    use HasFactory;

    protected $table = 'config';

    public $incrementing = false;
    protected $keyType = 'string';
    protected $appends = ['logo_url'];

    protected $fillable = [
        'website_title',
        'website_description',
        'phone',
        'email',
        'address',
        'logo'
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

    public function getLogoUrlAttribute()
    {
        return Storage::url('public/upload/logos/' . $this->logo);
    }

    public function cagarBudayaImg()
    {
        return $this->hasMany('App\Models\CagarBudayaImg', 'cagar_budaya_id');
    }
}
