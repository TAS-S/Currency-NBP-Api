<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = ['id', 'name', 'currency_code', 'exchange_rate'];

    protected $keyType = 'string';

    protected $primaryKey = 'id';

    public $incrementing = false;
}
