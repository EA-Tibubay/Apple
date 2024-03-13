<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale_detail extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'product_id',
		'quantity',
        'unit_price',
        // Otros campos según tus necesidades
    ];
	
	// En el modelo SaleDetail.php
	public function product(): BelongsTo
	{
		return $this->belongsTo(Product::class);
	}

	public function sale(): BelongsTo
	{
		return $this->belongsTo(Sale::class);
	}

}
