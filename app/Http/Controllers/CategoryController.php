<?php

namespace App\Http\Controllers;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = Category::SimplePaginate(10);

        return view('admin.category.list',compact('cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::select('id','name','parent_id')->get();
       
        return view('admin.category.add',compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $cate              = new Category;
        $cate->name        = $request->txtCateName;
        $cate->alias       = changeTitle($request->txtCateName);
        $cate->order       = $request->txtOrder;
        $cate->parent_id   = $request->sltParent;
        $cate->keywords    = $request->txtKeywords;
        $cate->description = $request->txtDesc;
        $cate ->save();
       return redirect()->route('categorys.create')->with('add','Thêm danh mục mới thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $cate = Category::find($id);
        // $parent_cate = Category::where($id,'parent_id')->get();
        $parents = Category::select('id','name','parent_id')->get();
        return view('admin.category.edit',compact('parents','cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $cate              = Category::find($id);
        $cate->name        = $request->txtCateName;
        $cate->alias       = changeTitle($request->txtCateName);
        $cate->order       = $request->txtOrder;
        $cate->parent_id   = $request->sltParent;
        $cate->keywords    = $request->txtKeywords;
        $cate->description = $request->txtDesc;
        $cate ->save();
        return redirect()->back()->with('edit','Chỉnh sửa sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parent = Category::where('parent_id',$id)->count();
        if($parent == 0){
            $cate = Category::find($id);
            $cate->delete();
            return redirect()->route('categorys.index')->with('delete','Xóa danh mục thành công');
        }
        else{
            echo "
                <script type='text/javascript'>
                    alert ('Sorry ! You can not delete');
                    window.location = '";
                    echo route('categorys.index');
                    echo "'
                </script>";
            
        }
        
    }
}
