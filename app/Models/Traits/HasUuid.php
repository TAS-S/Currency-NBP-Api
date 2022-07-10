<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

//auto uuid
trait HasUuid
{
    protected static function bootHasUuid()
    {
        static::creating(function($model)
        {
            if(empty($model->{$model->getKeyName()}))
            {
                $model->{$model->getKeyName()} = Str::uuid();
            }
        });
    }
}
