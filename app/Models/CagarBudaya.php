<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Uuid;

class CagarBudaya extends Model
{
    use HasFactory;
    protected $table = 'cagar_budayas';

    public $incrementing = false;
    protected $keyType = 'string';
    protected $appends = ['photo_url'];

    protected $fillable = [
        'name',
        'description',
        'sound',
        'videos',
        'photo',
        'lat',
        'long',
        'category_id',
        'opened',
        'closed',
        'additional_info',
        'address',
        'color',
        'ticket',
        'info_ticket',
        'contact_number',
        'contact_name',
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
        return Storage::url('public/upload/cagar-budaya/' . $this->photo);
    }

    public function cagarBudayaImg()
    {
        return $this->hasMany('App\Models\CagarBudayaImg', 'cagar_budaya_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
