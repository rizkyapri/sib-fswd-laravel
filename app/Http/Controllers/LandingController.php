<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        // mengambil data category
        $categories = Category::all();

        // mengambil data slider yang sudah di approve
        $sliders = Slider::where('approve', '1')->get();

        if ($request->category) {
            $products = Product::where('approve', 1)->with('category')->whereHas('category', function ($query) use ($request) {
                $query->where('name', $request->category);
            })->get();
        } else if ($request->min && $request->max) {
            $products = Product::where('price', '>=', $request->min)->where('price', '<=', $request->max)->get();
        } else {
            // mengambil 8 data produk secara acak
            $products = Product::where('approve', 1)->inRandomOrder()->limit(8)->get();
        }

        return view('landing', compact('products', 'categories', 'sliders'));
    }

    public function show(Request $request)
    {
        // mengambil data category
        $categories = Category::all();

        $selectedCategory = $request->category;

        if ($selectedCategory) {
            $products = Product::where('approve', 1)->with('category')->whereHas('category', function ($query) use ($selectedCategory) {
                $query->where('name', $selectedCategory);
            })->get();
        } else {
            // mengambil 8 data produk secara acak
            $products = Product::where('approve', 1)->inRandomOrder()->get();
        }

        return view('product.page', compact('products', 'categories', 'selectedCategory'));
    }

    public function find(Request $request)
    {
        $searchTerm = $request->search;

        if ($searchTerm) {
            $products = Product::where('approve', 1)->where(function ($query) use ($searchTerm) {
                $query->where('name', 'LIKE', "%$searchTerm%")
                    ->orWhere('price', 'LIKE', "%$searchTerm%")
                    ->orWhere('sale_price', 'LIKE', "%$searchTerm%");
            })
                ->get();
        } else {
            // mengambil 8 data produk secara acak
            $products = Product::where('approve', 1)->inRandomOrder()->get();
        }

        return view('product.find', compact('products', 'searchTerm'));
    }
}
