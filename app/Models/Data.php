<?php

namespace App\Models;

use App\Models\Device;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Data extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function device(){
        return $this->belongsTo(Device::class, 'device_id');
    }

    public function scopeFilter($query, array $fillters) {
        $query->when($fillters['device'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('device_id',$search);
            });
        });
    }

}
