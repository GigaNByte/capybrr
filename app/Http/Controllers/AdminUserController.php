<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function delete(Request $request,$id)
    {

        $request->merge(['id' => $request->route('id')]);

        $validator = $request->validate([
            'id' =>  ['required', 'exists:users,id'],
        ]);

        $name = User::find($id)->name;
        User::find($id)->delete();

        return redirect()
            ->route('admin.dashboard.users')
            ->with('status',__('User').' '.$name.' '.__('has been deleted'));
    }
}
