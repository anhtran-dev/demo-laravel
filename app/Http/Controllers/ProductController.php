<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Products;
use App\Category;
use App\ProductImages;
use Illuminate\Support\Facades\Auth;
use File;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('admin.product.list',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates =  Category::all();

        return view('admin.product.add',['cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {   
        // kiểm tra upload file
        if($request->hasFile('fImages')){
            $file                  = $request->file('fImages');
            $filename              = $file->getClientOriginalName();  
            $file->move('resources/uploads/images/',$filename);  
        }
       
        $product               = new Products;
        $product ->name        = $request->txtName;
        $product ->alias       = changeTitle($request->txtName);
        $product ->price       = $request->txtPrice;
        $product ->intro       = $request->txtIntro;
        $product ->content     = $request->txtContent;
        $product ->image       = $filename;
        $product ->keywords    = $request->txtKey;
        $product ->description = $request->txtDesc;
        $product ->user_id     = Auth::user()->id;
        $product ->cate_id     = $request->sltParent;      
       
        $product->save();

        // id product create
        $product_id = $product->id;
        // kiểm tra input file chưa
        if(!empty($request->file('fProductDetail'))){

            // duyệt mảng file được input lên
            foreach($request->file('fProductDetail') as $file){
                // nếu tồn tại thì thêm vào bảng product_images
                if(isset($file)){
                    $product_img = new ProductImages;
                    $filename = $file->getClientOriginalName();
                    $product_img->image = $filename;
                    $product_img->product_id = $product_id;
                    // lưu file ảnh
                    $file->move('resources/uploads/images/details/',$filename);

                    $product_img->save();
                }
            }
            
        }
        return redirect()->back()->with(['add'=>'Thêm sản phẩm thành công']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   

        echo "Thông tin sản phẩm $id";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        $cates = Category::all();

        return view('admin.product.edit',compact('product','cates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        
        // validation
        $request->validate([
            'sltParent' => 'required',
            'txtName' => 'required',
            'txtPrice' => 'required',
        ]);

        $product = Products::find($id);

        if($request ->hasFile('fImages')){
            // xóa file ảnh cũ của product
            File::delete('resources/uploads/images/'.$product->image);
            // xử lí file ảnh mới
            $file                  = $request->file('fImages');
            $filename              = $file->getClientOriginalName('fImages');
            $file->move('resources/uploads/images',$filename);

            // lưu file ảnh vào database
            $product ->image       = $filename;
            
        }

        $product ->name        = $request->txtName;
        $product ->alias       = changeTitle($request->txtName);
        $product ->price       = $request->txtPrice;
        $product ->intro       = $request->txtIntro;
        $product ->content     = $request->txtContent;
        $product ->keywords    = $request->txtKey;
        $product ->description = $request->txtDesc;
        $product ->user_id     = Auth::user()->id;
        $product ->cate_id     = $request->sltParent;
        $product->save();

        // Thêm hình ảnh detail cho sản phẩm
        if(!empty($request->file('fProductDetail'))){

            // duyệt mảng file được input lên
            foreach($request->file('fProductDetail') as $file){
                // nếu tồn tại thì thêm vào bảng product_images
                if(isset($file)){
                    $product_img = new ProductImages;
                    $file_name = strtolower($file->getClientOriginalName());
                
                    $product_img->image = $file_name;
                    $product_img->product_id = $id;
                    // lưu file ảnh
                    $file->move('resources/uploads/images/details/',$file_name);

                    $product_img->save();
                }
            }
            
        }
        

        return redirect()->back()->with(['edit'=>'Chỉnh sửa sản phẩm thành công']);
        
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = Products::find($id);

        // lấy hình ảnh thuộc sản phẩm
        $product_img = $product->productImg;
        foreach($product_img as $item){
            File::delete('resources/uploads/images/details/'.$item->name);
        }
        File::delete('resources/uploads/images/'.$product->image);
        $product->delete();
        return redirect()->route('products.index')->with(['delete'=>'Xóa sản phẩm thành công']);

    }
}
