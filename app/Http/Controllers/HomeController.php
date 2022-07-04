<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    public function index()
    {
        $url = route('products.index');

        $data = Http::get($url);
        dd($data);
//        return Datatables::of($data)
//            ->addColumn('action', function ($data) {
//                if (request()->user()->can('kids.show')) {
//                    $html = '<a class="btn btn-sm btn-success" href="'.route('kids.show', $data->id).'"><i class="bi bi-gear"></i> Gerenciar</a>';
//
//                    return $html;
//                }
//            })
//            ->editColumn('name', function ($data) {
//                return $data->name;
//            })
//            ->editColumn('birth_date', function ($data) {
//                return Carbon::createFromFormat('Y-m-d', $data->birth_date)->format('d/m/Y');
//            })
//            ->rawColumns(['name', 'action'])
//            ->orderColumns(['id'], '-:column $1')
//            ->make(true);
//        return view('home.index');
    }
}
