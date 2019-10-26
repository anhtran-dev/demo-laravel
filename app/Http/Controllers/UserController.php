<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use App\Http\Requests\EditUserRequest;
class UserController extends Controller
{
    // login
    public function login(){
        
        return view('admin.user.login');
    }

    public function postLogin(LoginRequest $request){
        $username = $request->username;
        $password = $request->password;

        if(Auth::attempt(['username'=> $username,'password'=> $password,'level'=>1 ])){
            return redirect()->route('users.index');
        }else{
            return redirect()->back()->with('login','Tài khoản hoặc mật khẩu không chính xác');
        }
    }
    //logout
    public function logout(){
        Auth::logout();
        return redirect('admin/');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {   
        $users = User::all();
        return view('admin.user.list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        $username = $request->txtUser;
        $password = $request->txtPass;
        $email = $request->txtEmail;
        $level = $request->rdoLevel;
        $token = $request->_token;
        $user = new User;
        $user->username = $username;
        $user->password = bcrypt($password);
        $user->email = $email;
        $user->level = $level;
        $user->remember_token = $token;
        $user->save();
        return redirect()->back()->with('regis','Thêm tài khoản thành công');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "Thông tin admin có $id";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        $user = User::find($id);
  
        $user->password = bcrypt($request->txtPass);
        $user->email = $request->txtEmail;
        $user->level = $request->rdoLevel;
        $user->remember_token = $request->_token;
        $user->save();
        return redirect()->back()->with('edit','Chỉnh sửa tài khoản thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if($user->id == Auth::user()->id){
            return redirect()->back()->with('delete','You cannot delete your own account!');
        }
        else if($user->level == 1){
             
            return redirect()->back()->with('delete','You do not have permission to delete admin accounts');
        }
        else{
            $user->delete();
             return redirect()->route('users.index')->with('delete','Account successfully deleted');
        }
       
    }
    
}
