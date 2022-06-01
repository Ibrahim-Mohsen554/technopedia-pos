<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Products;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductStore;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $categories = categories::all()->sortDesc();
      $brands = Brand::all()->sortDesc();
      $products = Products::all()->sortDesc();
    return view('products.products',compact('categories','brands','products'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(ProductStore $ProductStore)
  {
        $validated = $request->validated();
        $validated['created_by']  = (Auth::user()->name);



    $products =  Products::create($validated);


    notify()->success('Product Added Successfully !');

    return redirect('dashboard/products');





    //   dd($request->all());

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request)
  {


     $id = $request->id;
        $this->validate($request, [

            'product_name' => 'required|max:150|unique:products,product_name,' . $id,
        ]);


        $products =  Products::findOrfail($request->id);





        $products->update([
            'sku_num' => $request->sku_num,
            'product_name' => $request->product_name,
            'Qty_instock' => $request->Qty_instock,
            'buy_price' => $request->buy_price,
            'sell_price' => $request->sell_price,
            'barcode' => $request->barcode,

        ]);

        notify()->success('Product Updated Successfully !');

        return redirect('dashboard/products');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
    $id = $request->pro_id;
    Products::find($id)->delete();
    notify()->success('Product Deleted Successfully !');

    return redirect('dashboard/products');
  }



  public function getbrands($id)
  {
      $brands = DB::table("brands")->where("category_id", $id)->pluck("brand_name", "id");
      return json_encode($brands);
  }

}

?>
