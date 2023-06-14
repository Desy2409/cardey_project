<?php

namespace App\Repositories;


class BaseRepository
{
    public function findOrFail($model, $id)
    {
        return $model::findOrFail($id);
    }

    // >>>>>>>>>>> WITHOUT TRSAHED ELEMENTS <<<<<<<<<<<<<<

    // SELECT FIRST OR LAST
    public function first($model)
    {
        return $model::whereNull('deleted_at')->first();
    }

    public function firstOne($model, $column, $value)
    {
        return $model::where($column, $value)->whereNull('deleted_at')->first();
    }

    public function firstTwo($model, $column1, $value1, $column2, $value2)
    {
        return $model::where($column1, $value1)->where($column2, $value2)->whereNull('deleted_at')->first();
    }

    public function firstThree($model, $column1, $value1, $column2, $value2, $column3, $value3)
    {
        return $model::where($column1, $value1)->where($column2, $value2)->where($column3, $value3)->whereNull('deleted_at')->first();
    }

    public function lastOne($model, $column, $value)
    {
        return $model::where($column, $value)->whereNull('deleted_at')->latest()->first();
    }

    public function lastTwo($model, $column1, $value1, $column2, $value2)
    {
        return $model::where($column1, $value1)->where($column2, $value2)->whereNull('deleted_at')->latest()->first();
    }


    // SELECT ALL

    public function selectAllOne($model, $column, $value)
    {
        return $model::where($column, $value)->whereNull('deleted_at')->get();
    }

    public function selectAllTwo($model, $column1, $value1, $column2, $value2)
    {
        return $model::where($column1, $value1)->where($column2, $value2)->whereNull('deleted_at')->get();
    }

    public function selectAllThree($model, $column1, $value1, $column2, $value2, $column3, $value3)
    {
        return $model::where($column1, $value1)->where($column2, $value2)->where($column3, $value3)->whereNull('deleted_at')->get();
    }

    public function selectAllWhereInArray($model, $column1, $array)
    {
        return $model::whereIn($column1, $array)->whereNull('deleted_at')->get();
    }


    // SELECT ALL ORDER BY
    public function selectAllOrderBy($model, $column, $order)
    {
        return $model::orderBy($column, $order)->whereNull('deleted_at')->get();
    }

    public function selectAllOrderByV2($model, $column1, $order1, $column2, $order2)
    {
        return $model::orderBy($column1, $order1)->orderBy($column2, $order2)->whereNull('deleted_at')->get();
    }

    public function selectAllOrderByV3($model, $column1, $order1, $column2, $order2, $column3, $order3)
    {
        return $model::orderBy($column1, $order1)->orderBy($column2, $order2)->orderBy($column3, $order3)->whereNull('deleted_at')->get();
    }


    // SELECT LIKE
    public function selectOneStartWithByOne($model, $column, $value, $like_column, $like_value)
    {
        // dd($model::where($column, $value)->where($like_column, 'like', '%', $like_value)->first());
        return $model::where($column, $value)->where($like_column, 'like', $like_value.'%')->whereNull('deleted_at')->first();
    }
    public function selectOneStartWithByTwo($model, $column1, $value1, $column2, $value2, $like_column, $like_value)
    {
        // dd($model::where($column1, $value1)->where($column2, $value2)->where($like_column, 'like', $like_value.'%')->first());
        return $model::where($column1, $value1)->where($column2, $value2)->where($like_column, 'like', $like_value.'%')->whereNull('deleted_at')->first();
    }


    // >>>>>>>>>>> TRSAHED ELEMENTS <<<<<<<<<<<<<<

    // SELECT FIRST
    public function firstOneTrashed($model, $column, $value)
    {
        return $model::onlyTrashed()->where($column, $value)->first();
    }

    // SELECT ALL ORDER BY
    public function selectAllOrderByTrashed($model, $column, $order)
    {
        return $model::onlyTrashed()->orderBy($column, $order)->get();
    }

    public function selectAllOneTrashed($model, $column, $value)
    {
        return $model::onlyTrashed()->where($column, $value)->get();
    }

    public function selectAllTwoTrashed($model, $column1, $value1, $column2, $value2)
    {
        return $model::onlyTrashed()->where($column1, $value1)->where($column2, $value2)->get();
    }
}
