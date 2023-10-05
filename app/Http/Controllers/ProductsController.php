<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //

    public function adding(Request $request)
    {
        $items = new Products();
        $items->name = $request->name;
        $items->value = $request->value;
        $items->quantity = $request->quantity;
        $items->save();

        return response()->json('Added Successfully');
    }

    public function edit(Request $request)
    {
        $items = Products::findorfail($request->id);
        $items->name = $request->name;
        $items->value = $request->value;
        $items->quantity = $request->quantity;
        $items->update();

        return response()->json('Updated Successfully');
    }

    public function delete(Request $request)
    {
        $items = Products::findorfail($request->id)->delete();
        return response()->json('Deleted Successfully');
    }

    public function getData()
    {
        $items = Products::all();
        return response()->json($items);
    }
}
