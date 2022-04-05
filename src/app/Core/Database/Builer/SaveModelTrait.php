<?php

namespace App\Core\Database\Builer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait SaveModelTrait
{
    public function save(Model $model): Model
    {
        if ($model->id === null) {
            $model->created_by = Auth::id();
        }
        $model->updated_by = Auth::id();
        $model->save();
        return $model;
    }
}
