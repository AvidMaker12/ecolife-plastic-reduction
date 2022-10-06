<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlasticProduct;

class PlasticProductController extends Controller
{
    //

    public function list()
    {
        return view('plastic_products.list', [
            // Second parameter is data from database organised into array for generating page content.
            'plastic_products' => PlasticProduct::all() // Data collected from table 'plastic_products', which is gathered via model 'PlasticProduct'.
        ]);
    }

    public function addForm()
    {
        return view('plastic_products.add');
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'plastic_product_name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'product_stat' => 'required',
        ]);

        $plastic_product = new PlasticProduct();
        $plastic_product->plastic_product_name = $attributes['plastic_product_name'];
        $plastic_product->category = $attributes['plastic_product_name'];
        $plastic_product->description = $attributes['plastic_product_name'];
        $plastic_product->product_stat = $attributes['plastic_product_name'];
        $plastic_product->user_id = Auth::user()->id;
        $plastic_product->save();

        return redirect('/console/plastic-products/list')
            ->with('message', 'Plastic product has been added.');
    }

    public function editForm(PlasticProduct $plastic_product)
    {
        return view('plastic_products.edit', [
            'plastic_product' => $plastic_product,
        ]);
    }

    public function edit(PlasticProduct $plastic_product)
    {

        $attributes = request()->validate([
            'plastic_product_name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'product_stat' => 'required',
        ]);

        $plastic_product->plastic_product_name = $attributes['plastic_product_name'];
        $plastic_product->category = $attributes['category'];
        $plastic_product->description = $attributes['description'];
        $plastic_product->product_stat = $attributes['product_stat'];
        $plastic_product->save();

        return redirect('/console/plastic-products/list')
            ->with('message', 'Plastic product has been edited.');
    }

    public function delete(PlasticProduct $plastic_product)
    {
        $plastic_product->delete();
        
        return redirect('/console/plastic-products/list')
            ->with('message', 'Plastic product has been deleted.');        
    }

    public function imageForm(PlasticProduct $plastic_product)
    {
        return view('plastic_products.image', [
            'project' => $plastic_product,
        ]);
    }

    public function image(PlasticProduct $plastic_product)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        Storage::delete($plastic_product->image);
        
        $path = request()->file('image')->store('plastic_products');

        $plastic_product->image = $path;
        $plastic_product->save();
        
        return redirect('/console/projects/list')
            ->with('message', 'Plastic product image has been edited.');
    }

}
