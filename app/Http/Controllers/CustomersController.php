<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CustomerRequest;

class CustomersController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $customers = Customers::all()->sortDesc();
      return view('customers.customers' ,compact('customers'));

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
  public function store(CustomerRequest $request)
  {
      $validated = $request->validated();
      $validated['created_by']  = (Auth::user()->name);
      $validated['company_name']  = $request->company_name;



      Customers::create($validated);

      notify()->success('Customer Created Successfully !');
      return redirect('dashboard/customers');

    //   return dd($request->all());



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
  public function update(CustomerRequest $request)
  {

        $id = $request->pro_id;
        $validated = $request->validated();
        $validated['created_by']  = (Auth::user()->name);
       $validated['company_name']  = $request->company_name;

       $customers = Customers::findOrFail($id);


       $customers->update($validated);
           notify()->success('Customer Updated Successfully !');
      return redirect('dashboard/customers');



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
        Customers::find($id)->delete();
        notify()->success('Customers Deleted Successfully !');

        return redirect('dashboard/customers');

  }

}

?>


