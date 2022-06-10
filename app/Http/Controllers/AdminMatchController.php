<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use App\Models\Match;
use Illuminate\Http\Request;

class AdminMatchController extends Controller
{
    public function delete(Request $request,$id)
    {
        $request->merge(['id' => $request->route('id')]);

        $validator = $request->validate([
            'id' =>  ['required', 'exists:matches,id'],
        ]);

        $name = Match::find($id)->name;
        Match::find($id)->delete();
        return redirect()
            ->route('admin.dashboard.matches')
            ->with('status', __('Match') . ' ' . $name . ' ' . __('has been deleted'));
    }

}
