<?php

namespace App\Http\Controllers;

use App\Models\StoreProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetProductsController extends Controller
{
    /**
     * Dummy data for the purpose of the test, normally this would be set by a store builder class
     */
    public int $storeId = 3;

    private string $imagesDomain;

    public function __construct()
    {
        $this->imagesDomain = "https://img.tmstor.es/";
    }

    public function __invoke(Request $request)
    {
        return $this->getStoreProductsBySectionWithPaginationAndSorting(
            $this->storeId,
            $request->input('section', '%'),
            $request->input('number', 8),
            $request->input('page', 1),
            $request->input('sort', 0)
        );
    }

    public function getStoreProductsBySectionWithPaginationAndSorting($storeId, $section, $number, $page, $sort)
    {
        $query = StoreProduct::query()
            ->where('store_id', $storeId)
            ->where('deleted', 0)
            ->where('available', 1);

        if ($section !== '%') {
            $query->whereHas('sections', function ($q) use ($section) {
                $q->where('description', $section);
            });
        }

        switch ($sort) {
            case "az":
                $query->orderBy('name', 'asc');
                break;
            case "za":
                $query->orderBy('name', 'desc');
                break;
            case "low":
                $query->orderBy('price', 'asc');
                break;
            case "high":
                $query->orderBy('price', 'desc');
                break;
            case "old":
                $query->orderBy('release_date', 'asc');
                break;
            case "new":
                $query->orderBy('release_date', 'desc');
                break;
            default:
                $query->orderBy('position', 'asc')
                    ->orderBy('release_date', 'desc');
                break;
        }

        $products = $query->paginate($number, ['*'], 'page', $page);

        $result = [];

        foreach ($products as $product) {
            $result[] = [
                'id' => $product->id,
                'artist' => $product->artist->name,
                'title' => strlen($product->display_name) > 3 ? $product->display_name : $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'format' => $product->type,
                'release_date' => $product->release_date,
                'image' => strlen($product->image_format) > 2 ? $this->imagesDomain . "/$product->id.$product->image_format" : $this->imagesDomain . "noimage.jpg",
            ];
        }

        return $result;
    }
    public function getProductsBySection($section)
    {
        $products = DB::table('store_products_section')
            ->select('store_products.id','store_products.description','store_products.price','store_products.name')
            ->where('store_products_section.section_id','=',$section)
            ->join('store_products','store_products.id','store_products_section.store_product_id')
            ->get();
        return $products;
    }

}