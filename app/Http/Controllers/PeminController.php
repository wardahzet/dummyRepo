<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PeminController extends Controller
{
    public function response($data)
    {
        try {
            return response()->json([
                'status' => 'success',
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error' => $data->getMessage(),
            ]);
        }
    }

    public function getDistributors()
    {
        return $this->response(Distributor::with(['sale'])->get());
    }

    public function getproducts()
    {
        return $this->response(Product::with(['sale'])->get());
    }

    public function getsales()
    {
        return $this->response(Sale::with(['product','distributor'])->get());
    }

    public function findDistributor($id)
    {
        return $this->response(Distributor::where('id',$id)->with(['sale'])->get());
    }

    public function findproduct($id)
    {
        return $this->response(Product::where('id',$id)->with(['sale'])->get());
    }

    public function findsale($id)
    {
        return $this->response(Sale::where('id',$id)->with(['product','distributor'])->get());
    }

    public function storesale(Request $request)
    {
        try{
            $validator = Validator::make($request->all, [
                'id_distributor' =>'required|exists:distributors,id',
                'id_product' =>'required|exists:products,id',
                'date' =>'required|date:Y-m-d',
                'jumlah' =>'required|int',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator->errors());
            }

            $data = collect($validator->validated())->merge('status', 'pesanan dibuat');
            $produk = Product::find($data['product_id']);

            if($data['jumlah'] > $produk['stok']){
                throw new \Exception('stok tidak memadai');
            }
            
            Sale::create($data->all());
            return response()->json([
                'status' => 'success',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
            ]);
        }
    }
}
