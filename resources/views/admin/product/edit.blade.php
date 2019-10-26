@extends('admin.master')
@section('title','Edit Product')
@section('admin')
        <!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
             <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if (session('edit'))
                        <p class="success">{{ session('edit')}}</p>
                    @endif
               
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="{{ $product->id }}">

                    <div class="form-group">
                        <label>Category Parent</label>
                        <select class="form-control" name="sltParent">
                            <option value="">Please Choose Category</option>
                            
                            @foreach ($cates as $item)
                            <option value="{{ $item->id }}" <?php if ($product->category->id == $item->id) echo "selected='selected'"; ?> >
                                {{ $item->name }}
                            </option>
                            @endforeach

                        </select>
                        @if ($errors->has('sltParent'))
                            <p class="error">{{ $errors->first('sltParent') }}</p>
                        @endif
                       
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{{ old('txtName',isset($product) ? $product->name:null) }}" />
                        @if ($errors->has('txtName'))
                            <p class="error">{{ $errors->first('txtName') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value="{{ old('txtPrice',isset($product)? $product->price:null) }}" />
                    </div>
                        @if ($errors->has('txtName'))
                            <p class="error">{{ $errors->first('txtPrice') }}</p>
                        @endif
                    <div class="form-group">
                        <label>Intro</label>
                        <textarea class="ckeditor form-control" rows="3" name="txtIntro">{{ old('txtIntro',isset($product)? $product->intro:null) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="ckeditor form-control" rows="3" name="txtContent">{{ old('txtContent',isset($product)? $product->content:null) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Images current</label>
                        <img src="resources/uploads/images/{{ $product->image }}" alt="" id="img-current">
                    </div>
                    <div class="form-group">
                        <label>Images new</label>
                        <input type="file" name="fImages" value="{{ $product->image }}">
                    </div>
                    <div class="form-group">
                        <label>Product Keywords</label>
                        <input class="form-control" name="txtKey" placeholder="Please Enter Category Keywords" value="{{ old('txtKey',isset($product)? $product->keywords:null) }}"/>
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="ckeditor form-control" rows="3" name="txtDesc">{{ old('txtDesc',isset($product)? $product->description:null) }}</textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-default">Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                
                </div>

                <div class="col-md-1"></div>
                <div class="col-md-4">
                    {{-- show ảnh detail hiện có --}}
                    @foreach ($product->productImg as $product_img)
                        <img src="resources/uploads/images/details/{{$product_img->image }}" alt="" id="img-detail-current">
                        <a href="" id="del-img" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
                    @endforeach
                    
                    {{-- // add images --}}
                   
                    <button type="button" class="btn btn-primary" id="add-img">Add Images Upload</button>
                    <div id="insert"></div>
                </div>
                     
                </div>

            <form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

@endsection