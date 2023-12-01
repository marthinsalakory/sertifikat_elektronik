<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sertifikat extends Model
{
    use HasFactory;

    protected $table = 'sertifikat';
    protected $guarded = ['id'];


    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
