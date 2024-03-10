<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sale extends Model
{
    use HasFactory;
	
	public function products(): HasMany
    {
        return $this->hasMany(SaleDetail::class);
    }

    public function saleDetails(): HasOne
    {
        return $this->hasOne(SaleDetail::class);
    }
}