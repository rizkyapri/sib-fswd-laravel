<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        $sliders = Slider::all();
        // menghitung jumlah total produk, kategori, dan user
        $productCount = Product::count();
        $categoryCount = Category::count();
        $userCount = User::count();

        // menghitung approve slider dan product
        // approve menggunakan union
        $approveProductCount = Product::selectRaw('COUNT(*) as count')
            ->where('approve', 1);

        $approveSliderCount = Slider::selectRaw('COUNT(*) as count')
            ->where('approve', 1);

        $totalCount = $approveProductCount->union($approveSliderCount)->sum('count');

        // reject menggunakan union
        $rejectProductCount = Product::selectRaw('COUNT(*) as count')
            ->where('approve', 0);

        $rejectSliderCount = Slider::selectRaw('COUNT(*) as count')
            ->where('approve', 0);

        $totalRejectCount = $rejectProductCount->union($rejectSliderCount)->sum('count');


        if (Auth::user()->role->name == 'User') {
            return redirect()->route('product.index');
        } else {
            return view('dashboard', [
                'product_count' => $productCount,
                'category_count' => $categoryCount,
                'user_count' => $userCount,
                'approve_count' => $totalCount,
                'reject_count' => $totalRejectCount,
                'products' => $products,
                'sliders' => $sliders,
            ]);
        }
    }
}
