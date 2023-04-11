<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use illuminate\Support\Arr;

class UsuarioController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-usuarios | crear-usuarios | editar-usuarios | borrar-usuarios',['only'=>['index']]);
        $this->middleware('permission:crear-usuarios',['only'=>['create','store']]);
        $this->middleware('permission:editar-usuarios',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-usuarios',['only'=>['destroy']]);

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios=user::all();
        return view('usuarios.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //para poder asignar los roles a los usuarios.
        
        $roles=Role::all()->pluck(value:'name',key:'id');
        return view('usuarios.create',compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|same:confirm-password',
            'roles'=>'required'
        ]);
        $input=$request->all();
        $input['password'] = Hash::make($input['password']);
        $user =User::create($input);
        $user->assignRole($request->input('roles'));
        return view('usuarios.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user=User::find($id);
        $roles= Role::pluck('name','name')->all();
        $userRole=$user->roles->pluck('name','name')->all();

        return view('usuarios.edit', compact('user','roles','userRole'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users,email'.$id,
            'password'=>'same:confirm-password',
            'roles'=>'required'
        ]);
        $input=$request->all();
        if(!empty($input['password']))
        {
            $input['password']= Hash::make($input['password']);
        }else{
            $input=Arr::exeept($input, array('password'));
        }
        $user=User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        return view('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return view('usuarios.index');
    }
}
