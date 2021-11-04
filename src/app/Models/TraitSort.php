<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

trait TraitSort
{
    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeSort(Builder $builder): Builder
    {
        $request = request();
        if ($request->has('sortField')) {
            $builder->orderBy($request->get('sortField'), $request->get('sortOrder', 'asc'));
        } else {
            $builder->orderBy('id');
        }
        return $builder;
    }
}
