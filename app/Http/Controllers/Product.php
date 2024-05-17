<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProducts;
use Illuminate\Http\Request;

class Product extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $products = \App\Models\Product::query()->get();
        return response()->json($products);
    }

    public function create(StoreProducts $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validated();

        foreach($validated['products'] as $product) {
            \App\Models\Product::query()->create([
               'name' => $product['name'],
               'quantity' => $product['quantity'],
               'sum' => $product['sum'],
            ]);
        }


        return response()->json($validated);
    }
}
