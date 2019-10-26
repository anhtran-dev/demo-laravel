@extends('admin.master')
@section('title','User Edit')
@section('admin')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->

            <div class="col-lg-7" style="padding-bottom:120px">
                @if (session('edit'))
                    <p class="success">{{ session('edit')}}</p>
                @endif

                <form action="{{ route('users.update',$user->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="txtUser" value="{{ $user->username }}" disabled />
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
                        <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{{ old('txtEmail',isset($user)? $user->email:null) }}" />
                        @if ($errors->has('txtEmail'))
                            <p class="error">{{ $errors->first('txtEmail') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>User Level</label>
                        <label class="radio-inline">
                            <input name="rdoLevel" value="{{ $user->level }}" checked="" type="radio" <?php if($user->level == 1) echo "checked'" ?>>Admin
                        </label>
                        <label class="radio-inline">
                            <input name="rdoLevel" value="{{ $user->level }}" type="radio" <?php if($user->level == 0) echo "checked" ?>>Member
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
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