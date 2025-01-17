<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Yajra\DataTables\DataTables; // library untuk tampilan tabel dinamis
use RealRashid\SweetAlert\Facades\Alert; //library untuk memperindah tampilan notifikasi
use Illuminate\Support\Facades\DB; // library agar dapat menjalankan query kedatabase pada saat dibutuhkan
use Illuminate\Support\Facades\Storage; // libary agar dapat mengahapus file pada folder public

use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('product')
                ->join('category', 'product.category_id', '=', 'category.id')
                ->select('product.*', 'category.nama')
                ->get();
        return view('Product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get();
        return view('Product.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['image' => 'image']);
        $image = $request->file('image')->store('product-images');
        Product::create([
            'category_id' => $request->category,
            'name' => $request->name,
            'size' => $request->size,
            'image' => $image,
            'price' => $request->price
        ]);

        Alert::success('Success', 'You\'ve Successfully Registered');
        return redirect()->route('product.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::get();
        $product = Product::find($id);
        return view('Product.edit', ['category' => $category, 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->category_id = $request->category;
        $product->size = $request->size;
        $product->price = $request->price;
        if ($request->file('image')) {
            # code...
            if ($request->oldImage) {
                # code...
                Storage::delete($request->oldImage);
            }
            $image = $request->file('image')->store('product-images');
            $product->image = $image;
            $product->save();
        } else {
            # code...
            $product->save();
        }
        Alert::success('Success', 'You\'ve Successfully Updated');
        return redirect()->route('product.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->image) {
            # code...
            Storage::delete($product->image);
        }
        $product->delete();

        Alert::success('Success', 'You\'ve Successfully Deleted');
        return redirect()->route('product.index');
    }
}
