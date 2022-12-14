<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\ClientAccount;

class ClientAccountController extends Controller
{
    public function list()
    {

        return view('client_accounts.list', [
            'client_accounts' => ClientAccount::all()
        ]);

    }

    public function addForm()
    {

        return view('client_accounts.add');

    }
    
    public function add()
    {

        $attributes = request()->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = new ClientAccount();
        $user->f_name = $attributes['f_name'];
        $user->l_name = $attributes['l_name'];
        $user->email = $attributes['email'];
        $user->password = $attributes['password'];
        $user->save();

        return redirect('/console/clients/list')
            ->with('message', 'Client has been added!');

    }

    public function editForm(ClientAccount $user)
    {

        return view('client_accounts.edit', [
            'client_account' => $user,
        ]);

    }

    public function edit(ClientAccount $user)
    {

        $attributes = request()->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('client_accounts')->ignore($user->id),
            ],
            'password' => 'nullable',
        ]);

        $user->f_name = $attributes['f_name'];
        $user->l_name = $attributes['l_name'];
        $user->email = $attributes['email'];

        if($attributes['password']) $user->password = $attributes['password'];

        $user->save();

        return redirect('/console/clients/list')
            ->with('message', 'Client has been edited!');

    }

    public function delete(ClientAccount $user)
    {

        if($user->id == auth()->user()->id)
        {
            return redirect('/console/clients/list')
                ->with('message', 'Cannot delete your own client account!');        
        }
        
        $user->delete();

        return redirect('/console/clients/list')
            ->with('message', 'Client has been deleted!');                
        
    }
}
