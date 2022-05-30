<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Products;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
  public function store(Request $request)
  {
    // "sku_number" => "0020"
    // "product_name" => "مسامير 10"
    // "brand_name" => "2"
    // "category_name" => "3"
    // "qty_stock" => "500"
    // "buy_price" => "1200"
    // "Sell_price" => "1800"
    // "product_description" => "just test"


    $request->validate([
        'product_name' => 'required',
        'sku_num' => 'required',
        'buy_price' => 'required',
        'sell_price' => 'required',
        'brand_name' => 'required',
        'category_name' => 'required',

    ]);


    Products::create([



        'sku_num'=>$request->sku_num,
         'product_name'=>$request->product_name,
          'product_desc'=>$request->product_description,
           'brand_id'=>$request->brand_name,
            'category_id'=>$request->category_name,
           'Qty_instock'=>$request->qty_stock,
           'buy_price'=>$request->buy_price,
           'sell_price'=>$request->sell_price,
          'created_by' => (Auth::user()->name),


    ]);
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
    // "id" => "1"
    // "sku_num" => "001"
    // "product_name" => "hap mini v3"
    // "Qty_instock" => null
    // "buy_price" => "1200.00"
    // "sell_price" => "2200.00"
    // "product_desc" => "up to 100 user"

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
            'product_desc' => $request->product_desc,

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
