<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Category;
use App\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('fashi.admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('fashi.admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            $product  = Product::create($request->all());
            $product->categories()->attach($request->category);

            foreach ($request->images as $image) {
                $filename = uniqid() . '-' . $image->getClientOriginalName();
                $image->move(config('image.move_url'), $filename);

                Image::create([
                    'product_id' => $product->id,
                    'link_to_image' => config('image.url') . $filename,
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);

            return back()->with('message', trans('message.product.create.error'));
        }

        return redirect()->route('admin.products.index')->with('message', trans('message.product.create.success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('fashi.admin.product.edit', compact(['product', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        try {
            $product->update($request->all());
            $productImage = Image::where('product_id', $product->id)->delete();

            foreach ($request->images as $image) {
                $filename = uniqid() . '-' . $image->getClientOriginalName();
                $image->move(config('image.move_url'), $filename);

                Image::create([
                    'product_id' => $product->id,
                    'link_to_image' => config('image.url') . $filename,
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);

            return back()->with('message', trans('message.product.edit.error'));
        }

        return redirect()->route('admin.products.index')->with('message', trans('message.product.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        try {
            $product->delete();
            $product->categories()->detach();

            foreach ($product->images as $image) {
                $image->delete();
            }
        } catch (Exception $e) {
            Log::error($e);

            return back()->with('message', trans('message.product.delete.error'));
        }

        return redirect()->route('admin.products.index')->with('message', trans('message.product.delete.success'));
    }
}
