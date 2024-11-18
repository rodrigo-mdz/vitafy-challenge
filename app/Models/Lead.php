<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Lead extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = ['uuid', 'name', 'email', 'phone', 'score'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($lead) {
            $lead->client()->delete();
        });
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }
}
