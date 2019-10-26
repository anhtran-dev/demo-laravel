
@extends('admin.master')
@section('title','Product Add')
@section('admin')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if (session('add'))
                        <p class="success">{{ session('add') }}</p>
                    @endif
                    
                    @csrf
                    <div class="form-group">
                        <label>Category Parent</label>
                        <select class="form-control" name="sltParent">
                            <option value="">Please Choose Category</option>
                            @foreach ($cates as $item)
                            <option value="{{ $item->id }}" >{{ $item->name }}</option>
                            @endforeach

                        </select>
                        @if ($errors->has('sltParent'))
                        <p class="error">{{ $errors->first('sltParent') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{{ old('txtName') }}"/>
                        @if ($errors->has('txtName'))
                        <p class="error">{{ $errors->first('txtName') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value="{{ old('txtPrice') }}"/>
                        @if ($errors->has('txtPrice'))
                        <p class="error">{{ $errors->first('txtPrice') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Intro</label>
                        <textarea class=" ckeditor form-control" rows="3" name="txtIntro" >{{ old('txtIntro') }}</textarea>

                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class=" ckeditor form-control" rows="3" name="txtContent">{{ old('txtContent') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="fImages">
                        @if ($errors->has('fImages'))
                        <p class="error">{{ $errors->first('fImages') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Product Keywords</label>
                        <input class="form-control" name="txtKey" placeholder="Please Enter Category Keywords" value="{{ old('txtKey') }}"/>
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="ckeditor form-control" rows="3" name="txtDesc">{{ old('txtDesc') }}</textarea>
                    </div>


                    <button type="submit" class="btn btn-default">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>

                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        @for ($i = 1; $i <=3 ; $i++)
                             <label for="" class="lbl-img">Image product detail-- {{ $i }}</label>
                             <input type="file" name="fProductDetail[]" value="{{ old('fProductDetail') }}">
                        @endfor
                        <button type="button" class="btn btn-primary" id="add-img">Add Images Upload</button>
                        <div id="insert"></div>
                    </div>
                     
                </div>
                 
                 
            </form>
        </div>
             <!-- /.row -->
         </div>
         <!-- /.container-fluid -->
     </div>
     <!-- /#page-wrapper -->

 </div>
 <!-- /#wrapper -->

 @endsection