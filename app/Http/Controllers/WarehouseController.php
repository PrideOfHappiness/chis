<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouses;

class WarehouseController extends Controller
{
    public function index(){
        $data = Warehouses::paginate(10);
        $total = Warehouses::count();
        return view('warehouse.index', compact('data', 'total'));
    }

    public function create(){
        return view('warehouse.create');
    }

    public function store(Request $request){

    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }
}
