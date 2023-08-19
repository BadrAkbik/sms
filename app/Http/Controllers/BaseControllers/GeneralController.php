<?php

namespace App\Http\Controllers\BaseControllers;

use App\Http\Controllers\Controller;

class GeneralController extends Controller
{

    protected $model;
    protected $resource;

    public function storeItem($request)
    {
        return new $this->resource($this->model::create($request->safe()->all()));
    }


    public function show($id)
    {
        $item = $this->model::findOrFail($id);
        return new $this->resource($item);
    }


    public function updateItem($request, $item)
    {
        $item->update($request->safe()->all());
        return new $this->resource($item);
    }

    public function destroy($id)
    {
        $item = $this->model::findOrFail($id);

        $item->delete();

        return response()->json([
            'data' => 'This item has been deleted successfuly'
        ]);
    }
}
