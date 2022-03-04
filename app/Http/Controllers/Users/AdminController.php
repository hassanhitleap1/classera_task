<?php


namespace App\Http\Controllers\Users;


use App\Http\Controllers\Controller;
use App\Http\Requests\User\AdminRequest;
use App\Http\Resources\Users\AdminResource;
use App\Model\Users\Admin;
use App\User;


class AdminController extends  Controller
{
    public function __construct()
    {
     //   $this->middleware('jwt.verify')->only(['index','store','update','show','destroy']);
    }
    public function index(){
        return AdminResource::collection(Admin::paginate(10));
    }

    public function store(AdminRequest $request){
       $admin= Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
             'password'=>bcrypt($request->password),
            'type'=>User::ADMIN,
           
        ]);

        return new AdminResource($admin);
    }


    public function show(Admin $admin){
        return new AdminResource($admin);
    }

    public function update(Admin $admin,AdminRequest $request){

        $admin= tap($admin)->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);

        return new AdminResource($admin);
    }


    public function destroy(Admin $admin){
        $admin->delete();
        return Response('',201);
    }



}
