<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Zone extends Model
{
    use HasFactory,CrudTrait;
    protected $fillable = [
        'name',
        'type',
        'description',
        'img',
    ];

    public function spaces()
    {
        return $this->hasMany(Space::class);
    }

    public function setImgAttribute($value)
    {
        $attribute_name = "img"; // <- Aquí debe ser 'img', no 'image'
        $disk = "public";
        $destination_path = "uploads/zones";

        if ($value && is_object($value)) {
            $this->attributes[$attribute_name] = $value->store($destination_path, $disk);
        }
      
    }
}
