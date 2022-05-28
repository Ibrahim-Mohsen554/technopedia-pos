<?php

namespace App\Http\Controllers;


use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = categories::all()->sortDesc();
        return view('categories.categories', compact('categories'));
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
            'category_name' => 'required|unique:categories|max:100',

        ]);


        categories::create([
            'category_name' => $request->category_name,
            'category_descreption' => $request->category_descreption,
            'created_by' => (Auth::user()->name),

        ]);
        notify()->success('Category Added Successfully !');

        return redirect('dashboard/categories');
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

            'category_name' => 'required|max:150|unique:categories,category_name,' . $id,
        ]);


        $categories = categories::find($id);
        $categories->update([
            'category_name' => $request->category_name,
            'category_descreption' => $request->category_descreption,
        ]);

        notify()->success('Category Updated Successfully !');

        return redirect('dashboard/categories');
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
        categories::find($id)->delete();
        notify()->success('Category Deleted Successfully !');

        return redirect('dashboard/categories');
    }
}
