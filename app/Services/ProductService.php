<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\AttributeRepository;
use App\Repositories\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\Filters\Filter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductService
{
    /** @var ProductRepository $productRepository*/
    private $productRepository;
    private $attributeRepository;

    public function __construct(ProductRepository $productRepo, AttributeRepository $attributeRepository)
    {
        $this->productRepository = $productRepo;
        $this->attributeRepository = $attributeRepository;
    }

    public function search($input)
    {
        $attributesFilterValues = $this->transformAttributesFiltersForBuilder();

        $productsQuery = $this->productRepository->allQuery();
//        $productsQuery = Product::select();
        $products = QueryBuilder::for($productsQuery)
            ->allowedFilters(
                AllowedFilter::exact('id'),
                'name',
                'price',
                ...$attributesFilterValues
            )
            ->defaultSort('-price')
            ->allowedSorts('name', 'price')
//            ->allowedIncludes('')
//            ->allowedFields('*')
//            ->get();
            ->paginate($input->pagesize ?? 10000000);

        return $products;
    }

    private function transformAttributesFiltersForBuilder(): array
    {
        $attributesFilterArray = $this->attributeRepository->all()->pluck('name')->toArray();
        foreach ($attributesFilterArray as $attributeKey => $attributeValue) {
            $attributesFilterArray[$attributeKey] = 'attributes->'.$attributeValue;
        }
        return $attributesFilterArray;
    }

}
