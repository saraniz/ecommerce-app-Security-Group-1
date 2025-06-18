<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function adminDashboard(Request $request){

        $search = $request->query('search');

        $orderCount = Order::count();
        $customerCount = User::count();
        $productCount = Product::count();
        $totalSales = Order::where('status', 'completed')->sum('total_amount');

        $query = Order::with('user')->orderBy('id');

        if ($search) {
            $query->where('id', $search);
        }

        $recentOrders = $query->take(10)->get();

        $ordersByCategory = OrderItem::join('products', 'order_items.product_id', '=', 'products.id')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('categories.name as category', DB::raw('SUM(order_items.quantity) as total'))
        ->groupBy('categories.name')
        ->get();

        $monthlySales = Order::selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
            ->groupByRaw('MONTH(created_at)')
            ->orderByRaw('MONTH(created_at)')
            ->pluck('total', 'month');

        $allMonths = collect(range(1, 12))->mapWithKeys(function ($month) use ($monthlySales) {
            return [$month => $monthlySales[$month] ?? 0];
        });

        $salesLabels = $allMonths->keys()->map(fn($m) => Carbon::create()->month($m)->format('M'));
        $salesData = $allMonths->values();

        return view('admin.adminDashboard', compact('orderCount', 'customerCount', 'productCount', 'recentOrders', 'totalSales', 'ordersByCategory','salesLabels', 'salesData'));
}

    public function adminProfile(){

        return view('admin.adminProfile');
    }

}
