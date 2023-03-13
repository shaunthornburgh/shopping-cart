<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\ShippingMethodCollection;
use App\Http\Resources\ShippingMethodResource;
use App\Models\ShippingMethod;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShippingMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): ShippingMethodCollection
    {
        return new ShippingMethodCollection(ShippingMethod::all());
    }

    /**
     * Display the specified resource.
     *
     * @param ShippingMethod $ShippingMethod
     */
    public function show(ShippingMethod $ShippingMethod): ShippingMethodResource
    {
        return new ShippingMethodResource($ShippingMethod);
    }
}
