<?php

namespace App\Core\Database\Builer;

use Illuminate\Database\Eloquent\Builder;

trait SelectModelTrait
{
    /**
     * 対象レコードを取得する
     *
     * @param int $id
     * @param bool $withTrashed 削除済みのデータを取得するか否か
     * @return Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function select(int $id, bool $withTrashed = false)
    {
        return $this->selectBuilder($id, $withTrashed)->first();
    }

    /**
     * 対象レコードのクエリビルダを取得する
     *
     * @param int $id
     * @param bool $withTrashed 削除済みのデータを取得するか否か
     * @return Builder
     */
    public function selectBuilder(int $id, bool $withTrashed = false)
    {
        $query = $this->builder()->where('id', '=', $id);
        if ($withTrashed) {
            return $query->withTrashed();
        }
        return $query;
    }

    /**
     * クエリビルダの取得
     *
     * @param bool $withTrashed
     * @return Builder
     */
    public function builder(bool $withTrashed = false)
    {
        if ($withTrashed) {
            return ($this->modelClass())::query()->withTrashed();
        }

        return ($this->modelClass())::query();
    }


    /**
     * すべてのレコードの取得を行う
     *
     * @param bool $withTrashed
     * @return Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function selectAll(bool $withTrashed = false)
    {
        if ($withTrashed) {
            return $this->builder()->withTrashed()->get();
        }

        return $this->builder()->get();
    }
}
