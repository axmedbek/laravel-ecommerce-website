<?php

namespace App\Http\Controllers;

use App\User;
use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Debug\Dumper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function home(){
        return view('admin.home');
    }

    public function index(){

        if (request()->filled('search')){
            request()->flash();

            $search = request('search');

            $userList = User::where('fullname','like',"%$search%")
                ->orWhere('email','like',"%$search%")
                ->orderByDesc('created_at')
                ->paginate(8)
                ->appends('search',$search);
        }
        else{
            $userList = User::orderByDesc('created_at')->paginate(8);
        }
        return view('admin.user.index',compact('userList'));

    }

    public function edit($id = 0){

        $user = new User();

        if ($id>0){

            $user = User::find($id);

        }
        return view('admin.user.form',compact('user'));
    }


    public function save($id=0){

        $this->validate(request(),[
            'fullname' => 'required',
            'email' => 'required|email'
        ]);

        $data = request()->only('fullname','email');

        if (request()->filled('password')){
            $data['password'] = Hash::make(request('password'));

        }


            $data['status'] = request()->has('status') ? 1 : 0;

            $data['is_admin'] = request()->has('is_admin') ? 1 : 0;


        if ($id > 0){
            $user = User::where('id',$id)->firstOrFail();
            $user->update($data);
            UserDetail::updateOrCreate(
                ['user_id' => $id],
                [
                    'address' => request('address'),
                    'phone' => request('phone'),
                    'mobile_phone' => request('mobile_phone')
                ]
            );
        }
        else{
            $user = User::create($data);
            UserDetail::create([
                'user_id' => $user->id,
                'address' => request('address'),
                'phone' => request('phone'),
                'mobile_phone' => request('mobile_phone')
            ]);

        }
        return redirect()
            ->route('admin.user.edit',$user->id)
            ->with('message_status','success')
            ->with('message',$id >0 ? 'User update edildi' : 'User yaradildi');

    }


    public function delete($id){

        User::destroy($id);

        return redirect()->route('admin.user')
            ->with('message_status','success')
            ->with('message','User is deleted');

    }


    public function login(){
        if (request()->isMethod('POST')){
            $this->validate(request(),[

                'email' => 'required|email',
                'password' => 'required'
            ]);
            $credentials = [
              'email' => request('email'),
              'password' =>request('password'),
              'is_admin' => 1
            ];
            if (Auth::guard('admin')->attempt($credentials,request()->has('rememberme'))){
                return redirect()->route('admin.home');
            }
            else{
                return back()->withInput()->withErrors([
                    'email' => 'Girişdə xəta baş verdi'
                ]);
            }
        }
        return view('admin.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        request()->session()->flush();
        request()->session()->regenerate();

        return redirect()->route('admin.login');
    }


}
