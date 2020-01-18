<?php

namespace App\Http\Controllers;

use App\CustomerRequest;
use Illuminate\Http\Request;
use DB;

class CustomerRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($count)
    {
       return DB::table('customer_requests')
       ->join('areas','areas.id','customer_requests.area_id')
       ->join('categories','categories.id','customer_requests.category_id')
       ->join('statuses','statuses.id','customer_requests.status_id')
       ->select('customer_requests.*','areas.name as area_name','categories.name as category_name','statuses.status')
       ->orderBy('id','DESC')
       ->paginate($count);
    }

    public function populateData()
    {
        return DB::table('customer_requests')
       ->join('areas','areas.id','customer_requests.area_id')
       ->join('categories','categories.id','customer_requests.category_id')
       ->join('statuses','statuses.id','customer_requests.status_id')
       ->select('customer_requests.*','areas.name','categories.name','statuses.status')
       ->orderBy('id','DESC')
       ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
        // $this->validate($request,[
        //     'user_id'=>'required|max:50',
        //     'longitude'=>'required',
        //     'latitude'=>'required',
        //     'address'=>'required',
        //     'category_id'=>'required'
        //   ]);

         try {
            $customerRequest = new CustomerRequest();
            $customerRequest->user_id =  $request->user_id;
            $customerRequest->customer_name = $request->customer_name;
            $customerRequest->email = $request->email;
            $customerRequest->area_id = $request->area_id;
          //  $customerRequest->vehicle_id = $request->vehicle_id;
            $customerRequest->description =  $request->description;
            $customerRequest->tele_no =  $request->tele_no;
            $customerRequest->longitude = $request->longitude;
            $customerRequest->latitude =  $request->latitude;
            $customerRequest->address_1 =  $request->address_1;
            $customerRequest->address_2 =  $request->address_2;
            $customerRequest->address_3 =  $request->address_3;
            $customerRequest->category_id =  $request->category_id;
            $customerRequest->status_id =3;
            $result = $customerRequest->save();
 
             if($result)
                $customerRequest;
                 //return 1;
             else
                 return '0';
 
         } catch (Exception $th) {
             return $th->getException();
         }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CustomerRequest  $customerRequest
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerRequest $customerRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerRequest  $customerRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerRequest $customerRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerRequest  $customerRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerRequest $customerRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerRequest  $customerRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerRequest $customerRequest)
    {
        //
    }
}