<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;

class UserController extends Controller
{
    public function index()
    {   
        abort_if(Gate::denies('user_index'), 403);
        $users = User::paginate(20);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), 403);
        $roles = Role::all()->pluck('name', 'id');
        return view('users.create',  compact('roles'));
    }

    public function searchuser( Request $request)
    {
        $users = User::all();
        $searchuser = $request->get('searchuser');
        $users= User::firstOrNew()->where('cedula', 'like', '%'.$searchuser.'%')->paginate(20);
        return view('users.index', ['users' => $users]);
    }

    public function store(UserCreateRequest $request){        

        $user = User::create($request->only('name', 'username', 'email', 'cedula')
        +[
            'password' => bcrypt($request->input('password')),
        ]);

        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('users')->with('success', 'Usuario creado correctamente');
    }

    public function show($id)
    {
        abort_if(Gate::denies('user_show'), 403);
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name', 'id');
        $user->load('roles');
        return view('users.edit', compact('user', 'roles'));
    }

    public function update( Request $request, $id)
    {
        abort_if(Gate::denies('user_edit'), 403);
        $user =User::findOrFail($id);
        $data = $request->only('name', 'username', 'email', 'cedula');
        if(trim($request->password)==''){
            $data=$request->except('password');
        } 
        else{
            $data=$request->all();
            $data['password']=bcrypt($request->password);
        }

        $user->update($data);

        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('users')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {        
        abort_if(Gate::denies('user_destroy'), 403);
        if (auth()->user()->id == $user->id) {
            return redirect()->route('users.index');
        }
        $user->delete();
        return back()->with('success'. 'usuario eliminado correctamente');
    }
public function exportExcel()
    {
         return Excel::download(new UserExport, 'User.xlsx');  
    }
}
