<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\SearchSkuRequest;
use App\Http\Requests\StoreSkuRequest;
use App\Http\Resources\SkuCollection;
use App\Http\Resources\SkuResource;
use App\Models\Sku;
use App\Repositories\SkuRepositoryInterface;
use Stripe\StripeClient;

class SkuController extends Controller
{
    private SkuRepositoryInterface $skuRepository;

    /**
     * @param SkuRepositoryInterface $skuRepository
     */
    public function __construct(SkuRepositoryInterface $skuRepository)
    {
        $this->skuRepository = $skuRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): SkuCollection
    {
        return new SkuCollection($this->skuRepository->getAllSkus());
    }

    /**
     * Display the specified resource.
     *
     * @param Sku $sku
     */
    public function show(Sku $sku): SkuResource
    {
        return new SkuResource($this->skuRepository->getSkuById($sku->id));
    }

    /**
     * Search for the resource.
     *
     */
    public function search(SearchSkuRequest $request): array
    {
        return $this->skuRepository->searchByAttribute($request->validated());
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(StoreSkuRequest $request): SkuResource
    {
        return new SkuResource($this->skuRepository->createSku($request->toArray()));
    }
}
