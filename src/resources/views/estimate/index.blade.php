@extends('layouts.app')

@section('content')
<div class="container estimate estimate_index_container">
    <div class="estimate_index">
        <div class="estimate_index_top flex">
            <p>見積もり一覧</p>
            <a href="" class="estimate_index_create"><i class="fas fa-plus-circle"></i>見積追加</a>
        </div>
        <div class="estimate_index_table">
            <table>
                <tr>
                    <th>
                        番号
                    </th>
                    <th colspan="2">
                        状況
                    </th>
                    <th>
                        顧客名
                    </th>
                    <th>
                        商品名
                    </th>
                    <th>
                        担当者名
                    </th>
                    <th>
                        金額
                    </th>
                </tr>
                <tr>
                    <td>
                        E20211214-00010
                    </td>
                    <td>
                        未受注
                    </td>
                    <td>
                        未発行
                    </td>
                    <td>
                        山田 太郎様
                    </td>
                    <td>
                        パーソナルジムHP制作
                    </td>
                    <td>
                        山下 一郎
                    </td>
                    <td>
                        ¥1,200,000
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection