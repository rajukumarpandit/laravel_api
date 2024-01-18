<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        if(count($products)>0){
            $response=[
                "message"=>count($products)."_products",
                "status"=>True,
                "data"=>$products,
            ];
        }else{
            $response=[
                "message"=>count($products)."_products",
                "status"=>False,
            ];
        }
        return response()->json($response,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validator=Validator::make($request->all(),[
            'p_name'=>'required',
            'p_image'=>'required|mimes:jpeg,jpg,png,gif',
            'p_price'=>'required|numeric',
            'p_description'=>'required',
         ]);
        if($validator->fails()){
            return response()->json($validator->messages(),400);
        }else{
            DB::beginTransaction();
            $imageName=rand().'.'.$request->p_image->extension();
            $request->p_image->move(public_path('productImage'), $imageName);
            $data=[
                'product_name'=>$request->p_name,
                'product_image'=>$imageName,
                'product_price'=>$request->p_price,
                'product_description'=>$request->p_description
            ];
            try {
                $product= new Product();
                $product->create($data);
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
            }
            if(is_null($product)){
                $response= ["message"=>"Product not insert successfully!", "status"=>False];
            }else{
                $response= ["message"=>"Product insert successfully!", "status"=>True];
                
            }
        }
        return response()->json($response,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product=Product::find($id);
        if(is_null($product)){
            $response=[
                "message"=>"Product is not available",
                "status"=>False,
            ];
        }else{
            $response=[
                "message"=>"Product",
                "status"=>True,
                "data"=>$product,
            ];
        }
        return response()->json($response,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $product=Product::find($id);
        if(is_null($product)){
            return response()->json([
                "message"=>"Product is not available",
                "status"=>False,
            ]);
        }else{
            return response()->json([
                "status"=>True,
                "data"=>$product,
            ]);
        } 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product=Product::find($id);
        if(is_null($product)){
            return $response->json([
                "message"=>"Product is not available",
                "status"=>False,
            ],400);
        }else{
            $validator=Validator::make($request->all(),[
                'p_name'=>'required',
                'p_image'=>'required|mimes:jpeg,jpg,png,gif',
                'p_price'=>'required|numeric',
                'p_description'=>'required',
             ]);
            if($validator->fails()){
                return response()->json($validator->messages(),400);
            }else{
                DB::beginTransaction();
                $imageName=rand().'.'.$request->p_image->extension();
                $request->p_image->move(public_path('productImage'), $imageName);
                $data=[
                    'product_name'=>$request->p_name,
                    'product_image'=>$imageName,
                    'product_price'=>$request->p_price,
                    'product_description'=>$request->p_description
                ];
                try {
                    //$product= new Product();
                    $product->update($data);
                    DB::commit();
                } catch (\Throwable $th) {
                    DB::rollBack();
                    $product=null;
                }
                if(is_null($product)){
                    return response()->json([
                        "message"=>"internal error",
                        "status"=>False,
                        "error_message"=>$th->getMessage(),
                    ],500);
                }else{
                    return response()->json([
                        "message"=>"Product updated successfully!",
                        "status"=>True,
                    ],200);
                }
                
            }

        }
        return response()->json($data,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=Product::find($id);
        if(is_null($product)){
            $response=[
                "message"=>"Product is not available!",
                "status"=>False,
            ];
        }else{
            DB::beginTransaction();
            try {
                $path='productImage/'.$product->product_image;
                if(File::exists($path)){
                    File::delete($path);
                }
                $product->delete($path);
                DB::commit();
                $response=[
                    "message"=>"Product deleted successfully!",
                    "status"=>True,
                ];
            } catch (\Throwable $th) {
                DB::rallBack();
            }
        }
        return response()->json($response,200);
    }
}
