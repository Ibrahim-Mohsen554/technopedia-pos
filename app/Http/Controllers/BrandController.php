<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all()->sortDesc();
        $categories = categories::all()->sortDesc();
        return view('brands.brands', compact(['brands','categories']));
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
        // $request->all();

        $request->validate([
            'brand_name' => 'required|unique:brands|max:100',

        ]);


        Brand::create([
            'brand_name' => $request->brand_name,
            'brand_desc' => $request->brand_desc,
            'category_id' => $request->category_id,
            'created_by' => (Auth::user()->name),

        ]);
        notify()->success('Brand Added Successfully !');

        return redirect('dashboard/brands');
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
        $id = $request->pro_id;
        $this->validate($request, [

            'brand_name' => 'required|max:150|unique:brands,brand_name,' . $id,
        ]);



        $id = categories::where('category_name',$request->category_name)->first()->id;
        $brands =  Brand::findOrfail($request->pro_id);





        $brands->update([
            'brand_name' => $request->brand_name,
            'brand_desc' => $request->brand_desc,
            'category_id' => $id,
        ]);

        notify()->success('Brand Updated Successfully !');

        return redirect('dashboard/brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Brand::find($id)->delete();
        notify()->success('Brand Deleted Successfully !');

        return redirect('dashboard/brands');

        // dd($request->all());
    }

}

?>
