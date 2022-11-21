<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class DataDevice extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function device() {
        return $this->belongTo(User::class, 'device_id');
    }

    public function scopeFilter($query, array $fillters) {
        $query->when($fillters['created_at'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->whereDate('created_at',  $search == 0 ? $this->day($search) : $this->now());
            });
        });
        $query->when($fillters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('id', 'like', '%'. $search. '%');
            });
        });
        $query->when($fillters['device_id'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('device_id', $search);
            });
        });
    }

    public function day($subday){
        return Carbon::today()->subDay($subday);
    }

    public function now(){
        return Carbon::today();
    }
}
