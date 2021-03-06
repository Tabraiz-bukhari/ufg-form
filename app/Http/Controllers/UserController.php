<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use App\Role;
use App\Brand;
use App\Currency;

class UserController extends Controller
{
    public $pagination = 10;
    public function __CONSTRUCT()
    {

    }

    public function index()
    {
        $data['users'] = User::paginate($this->pagination);

        return view('users.listing', $data);
    }

    public function create()
    {
        $data['supervisors'] = User::whereHas('getRole', function ($query) {
            $query->where('slug', 'supervisor');
        })->orderBy('name', 'ASC')->get();

        $data['roles'] = Role::orderBy('name', 'ASC')->get();

        $data['currencies'] = Currency::where('status', 1)->orderBy('name', 'ASC')->get();

        $data['brands'] = Brand::orderBy('id', 'ASC')->get();

        return view('users.create', $data);
    }

    public function store(UserRequest $request)
    {
        $request->validate(['password' => 'required|min:8', 'email' => 'unique:users']);

        $data = [
            'name'           => $request->name,
            'email'          => $request->email,
            'role_id'        => $request->role,
            'password'       => $request->password,
            'supervisor_id'  => $request->supervisor,
            'currency_id'    => $request->currency,
            'brand_id'       => $request->brand,
            'holidaytype_id' => $request->holiday_type,
        ];

        User::create($data);

        return redirect()->route('users.index')->with('success_message', 'User created successfully');
    }
    public function edit($id)
    {
        $data['user'] = User::findOrFail(decrypt($id));

        $data['supervisors'] = User::whereHas('getRole', function ($query) {
            $query->where('slug', 'supervisor');
        })->orderBy('name', 'ASC')->get();

        $data['roles'] = Role::orderBy('name', 'ASC')->get();

        $data['currencies'] = Currency::where('status', 1)->orderBy('name', 'ASC')->get();

        $data['brands'] = Brand::orderBy('id', 'ASC')->get();


        return view('users.edit', $data);

    }

    public function update(UserRequest $request, $id)
    {

        $user = User::findOrFail(decrypt($id));

        $data = [
            'name'           => $request->name,
            'email'          => $request->email,
            'role_id'        => $request->role,
            'supervisor_id'  => $request->supervisor,
            'currency_id'    => $request->currency,
            'brand_id'       => $request->brand,
            'holidaytype_id' => $request->holiday_type,
        ];

        if ($request->has('password') && !empty($request->password)) {
            $data['password'] = $request->password;
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success_message', 'User updated successfully');
    }

    public function delete($id)
    {
        $user = User::findOrFail(decrypt($id));

        if (count($user->getSaleAgent) > 0) {
            return redirect()->back()->with('error_message', 'You can not delete this user because it assosiated with more sales agent ');
        } else {
            $user->delete();
        }
        
        return redirect()->route('users.index')->with('success_message', 'User deleted successfully');
    }
}
