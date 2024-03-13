<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'sale_date',
        'total_amount',
        'payment_method',
        'sale_details_id',
    ];

	//public function saleDetails()
	//{
	//	return $this->hasMany(Sale_detail::class, 'sale_id');
	//}
	
	public function saleDetails(): HasMany
    {
        return $this->hasMany(Sale_detail::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
	
}
