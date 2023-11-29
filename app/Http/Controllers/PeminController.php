<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PeminController extends Controller
{
    public function response($data)
    {
        try {
            if (count($data) == 0) throw new ModelNotFoundException('Data tidak ditemukan', 404);
            return response()->json([
                'status' => 'success',
                'data' => $data,
                'status_code' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
                'status_code' => $e->getCode() == 0 ? 500 : $e->getCode(),
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
            $validator = Validator::make($request->all(), [
                'distributor_id' =>'required|exists:distributors,id',
                'product_id' =>'required|exists:products,id',
                'date' =>'required|date:Y-m-d',
                'jumlah' =>'required|int',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $data = $validator->validated();
            
            $sale = DB::transaction(function() use ($data) {
                $produk = Product::find($data['product_id']);

                if ($data['jumlah'] > $produk['stok']){
                    throw new \Exception('stok tidak memadai');
                }

                $produk->update(['stok' => $produk['stok'] - $data['jumlah']]);
                return Sale::create($data);
            });

            return response()->json([
                'status' => 'success',
                'data' => $sale,
                'status_code' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
                'status_code' => $e->getCode() == 0 ? 500 : $e->getCode(),
            ]);
        }
    }
}
