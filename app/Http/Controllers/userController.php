<?php


namespace App\Http\Controllers;


use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

class userController extends AppBaseController
{

    public function index(Request $request)
    {
        $users = User::all();
        return view('users.index')->with('users',$users);
    }

    protected function create(Request $request)
    {
        return view('users.create');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required'
        ]);
    }

    protected function registered(Request $request, $user)
    {
        //
    }

    protected function store(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered(User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role' => $request['role'],
            ])
        ));

        Flash::success('Usuario creado exitosamente.');
        
        return redirect(route('users.index'));
    }
}
