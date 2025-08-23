<?php

namespace App\Http\Controllers;

use App\Models\Attachments;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::where('user_id', Auth::id())
            ->with('category')
            ->get();
        return view("products.index", compact("products"));
    }

    public function dashboard()
    {
        $products = Products::with('attachments')->get();

        return view('dashboard', compact('products'));
    }

    public function add()
    {
        $categories = Categories::where('user_id', Auth::id())->get();
        return view("products.add", compact("categories"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sku' => 'required|string|max:50',
            'brand' => 'nullable|string|max:100',
            'name' => 'required|string|max:100',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'desc' => 'nullable|string|max:500',
            'is_available' => '|boolean',
            'expired_at' => 'required|date',
            'attachments' => 'required|array',
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);
        DB::beginTransaction();
        try {

            $product = Products::create([
                'user_id' => Auth::id(),
                'category_id' => $request->category_id,
                'sku' => $request->sku,
                'brand' => $request->brand,
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'description' => $request->desc ?? null,
                'expired_at' => $request->expired_at,
            ]);

            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $path = $file->store('attachments', 'public');

                    Attachments::create([
                        'product_id' => $product->id,
                        'name_img' => $path,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('products.index')->with('success', 'Product Added Successfully!');
        } catch (\Exception $th) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Failed to add product: ' . $th->getMessage()])->withInput();
        }
    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product Deleted Successfully!');
    }
}
