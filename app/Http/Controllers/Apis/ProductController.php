<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Models\product\brand;
use App\Models\product\product;
use App\Models\product\subcategorie;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\traits\ApiTrait;
use App\Http\traits\media;

class ProductController extends Controller
{
    use media, ApiTrait;
    public function index()
    {
        $products = product::all();
        // return response()->json(compact('products'));
        return $this->Data(compact('products'), '');
    }

    public function create()
    {
        $SubCatigories = subcategorie::all();
        $prands = brand::select('id', 'name_en')->get();
        // return $this->Date(compact('SubCatigories', 'prands'));
        return $this->Data(compact('SubCatigories', 'prands'));
    }

    public function edit($id)
    {
        // $products = product::where('id', $id)->first();
        $products = product::find($id); // enhanced code ...
        $SubCatigories = subcategorie::all();
        $prands = brand::select('id', 'name_en')->get();
        // return response()->json(compact('products', 'SubCatigories', 'prands'));
        return $this->Data(compact('products', 'SubCatigories', 'prands'));
    }
    // --------------------------------------------------------------------------------------------------<>
    public function destroy($id)
    {
        $idChack = product::find($id);
        if ($idChack) {
            $oldPhotoName = product::find($id)->image;
            $path_image = public_path('/dist/img/products/');
            $this->DeletePhoto($path_image . $oldPhotoName);
            product::find($id)->delete();
            // return response()->json(['success' => true, 'Messange' => "Destroyed product Successfuly ."]);
            return $this->SuccessMessage("Destroyed product Successfuly .");
        } else {
            return $this->ErrorMessage(["id" => "ID product is Invalid "], "Invalid Parameter");
        }
    }
    // ----------------------------------------------------------------------------------------------------------------------
    public function store(StoreProductRequest $request)
    {
        // Upload Image and Move it To image folder in Pablic folder ---------------
        $PhotoName = $this->UploadPhoto($request->image, 'products');
        // except all data we don't need ----------------
        $data = $request->except('image');
        // Add new image name to object of data ------------
        $data['image'] = $PhotoName;
        // insert data in products table ------------
        product::create($data);
        // redirect ---------
        return $this->SuccessMessage("Story product Successfuly .", 201);
    }
    // ----------------------------------------------------------------------------------------------------------------------
    public function update(StoreProductRequest $request, $id)
    {
        // dd($request->all());
        // except image don't need ----------------
        $Valid = product::find($id);
        if ($Valid) {
            $data = $request->except('image', '_method');
            if ($request->has('image')) {
                // first remove old image ------------------
                $oldPhotoName = product::find($id)->image;
                $path_image = public_path('/dist/img/products/');
                $this->DeletePhoto($path_image . $oldPhotoName);
                $PhotoName = $this->UploadPhoto($request->image, 'products');
                $data['image'] = $PhotoName;
            }
            // insert data in products table ------------
            product::find($id)->update($data);
            return $this->SuccessMessage("Updated product Successfuly .");
        } else {
            return $this->ErrorMessage(["id" => "ID product is Invalid "], "Invalid Parameter");
        }
    }
}
