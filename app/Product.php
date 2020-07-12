<?php

namespace App;

use App\Image;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'EAN', 'type', 'weight', 'color', 'active'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function histories()
    {
        $date = \Carbon\Carbon::today()->subDays(90);
        return $this->hasMany(History::class)->where('created_at','>=',$date)
            ->orderBy('created_at', 'asc');
    }
}
