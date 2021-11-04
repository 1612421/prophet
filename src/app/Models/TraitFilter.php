<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

trait TraitFilter
{
    /**
     * @param Builder $builder
     * @param array $filters
     * @return Builder
     */
    public function scopeFilter(Builder $builder, array $filters): Builder
    {
        $request = request();
        foreach ($filters as $column => $condition) {
            if (empty($request->get($column))) {
                continue;
            }

            $value = $request->get($column);
            switch ($condition) {
                case '=' :
                case '>' :
                case '<' :
                case '>=' :
                case '<=' :
                    $builder->where($column, $condition, $value);
                    break;
                case '!=' :
                    //not_id
                    $column = str_replace('not_', '', $column);
                    $builder->where($column, $condition, $value);
                    break;
                case 'in':
                    //ids with value array
                    $column = substr($column, 0, -1);
                    $builder->whereIn($column, $value);
                    break;
                case 'not_in':
                    //not_ids with value array
                    $column = str_replace('not_', '', $column);
                    $column = substr($column, 0, -1);
                    $builder->whereNotIn($column, $value);
                    break;
                case 'in_set':
                    //ids with value string
                    $column = substr($column, 0, -1);
                    $builder->whereRaw("FIND_IN_SET({$value},{$column})");
                    break;
                case 'not_in_set':
                    //not_ids with value string
                    $column = str_replace('not_', '', $column);
                    $column = substr($column, 0, -1);
                    $builder->whereRaw("NOT FIND_IN_SET({$value},{$column})");
                    break;
                case '%like%':
                    $builder->where($column, 'like', '%' . $value . '%');
                    break;
                case 'like%':
                    $builder->where($column, 'like', $value . '%');
                    break;
                case '%like':
                    $builder->where($column, 'like', '%' . $value);
                    break;
                case 'date_=':
                    $format = Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
                    $builder->whereDate($column, '=', $format);
                    break;
                case 'date_>':
                    $column = str_replace('_from','', $column);
                    $format = Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
                    $builder->whereDate($column, '>=', $format);
                    break;
                case 'date_<':
                    $column = str_replace('_to','', $column);
                    $format = Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
                    $builder->whereDate($column, '<=', $format);
                    break;
                case 'datetime_=':
                    $format = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d H:i:s');
                    $builder->whereDate($column, '=', $format);
                    break;
                case 'datetime_>':
                    $column = str_replace('_from','', $column);
                    $format = Carbon::createFromFormat('Y-m-d H:i:s',$value)->format('Y-m-d H:i:s');
                    $builder->whereDate($column, '>=', $format);
                    break;
                case 'datetime_<':
                    $column = str_replace('_to','', $column);
                    $format = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d H:i:s');
                    $builder->whereDate($column, '<=', $format);
                    break;
            }

            if ($condition instanceof \Closure) {
                $builder = $condition($builder, $value);
            }
        }
        return $builder;
    }
}
