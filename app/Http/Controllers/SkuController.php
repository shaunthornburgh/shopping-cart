<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\SkuCollection;
use App\Http\Resources\SkuResource;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SkuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): SkuCollection
    {
        return new SkuCollection(Sku::all());
    }

    /**
     * Display the specified resource.
     *
     * @param Sku $sku
     */
    public function show(Sku $sku): SkuResource
    {
        return new SkuResource($sku);
    }
}
