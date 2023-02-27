<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\PackageResource;
use App\Models\Package;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return PackageResource::collection(Package::with('skus')->get());
    }

    /**
     * Display the specified resource.
     *
     * @param Package $package
     * @return PackageResource
     */
    public function show(Package $package): PackageResource
    {
        return new PackageResource($package->load('skus'));
    }
}
