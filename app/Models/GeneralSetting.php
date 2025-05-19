<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $fillable =[
        "site_title",
        "phone",
        "whatsapp_number",
        "whatsapp_default_message",
        "time_zone",
        "currency",
        "currency_format",
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    // Optional helpers if you want to separate them
    public function siteLogo()
    {
        return $this->morphOne(Image::class, 'imageable')->where('type', 'site_logo');
    }

    public function paymentLogo()
    {
        return $this->morphOne(Image::class, 'imageable')->where('type', 'payment_logo');
    }
}
