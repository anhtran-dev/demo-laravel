@extends('admin.master')
@section('title','Add User')
@section('admin')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if (session('regis'))
                    <p class="success">{{ session('regis') }}</p>
                @endif
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="txtUser" placeholder="Please Enter Username" value="{{ old('txtUser') }}" />
                        @if ($errors->has('txtUser'))
                            <p class="error">{{ $errors->first('txtUser') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" />
                        @if ($errors->has('txtPass'))
                            <p class="error">{{ $errors->first('txtPass') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>RePassword</label>
                        <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
                        @if ($errors->has('txtRePass'))
                            <p class="error">{{ $errors->first('txtRePass') }}</p>  
                        @endif
                       
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{{ old('txtEmail') }}" />
                        @if ($errors->has('txtEmail'))
                            <p class="error">{{ $errors->first('txtEmail') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>User Level</label>
                        <label class="radio-inline">
                            <input name="rdoLevel" value="1" checked="" type="radio">Admin
                        </label>
                        <label class="radio-inline">
                            <input name="rdoLevel" value="0" type="radio">Member
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

    
@endsection