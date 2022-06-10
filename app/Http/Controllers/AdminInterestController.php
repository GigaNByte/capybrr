<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInterestRequest;
use App\Http\Requests\UpdateInterestRequest;
use App\Models\Interest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminInterestController extends Controller
{
    public function create(CreateInterestRequest $request): RedirectResponse
    {
        Interest::create([
            'name' => $request->get('name'),
            'icon' => $request->get('icon'),
        ]);

        return redirect()
            ->back()
            ->with('status', __('New Interest has been added'));
    }

    public function delete(Request $request, $id)
    {
        $request->merge(['id' => $request->route('id')]);

        $validator = $request->validate([
            'id' =>  ['required', 'exists:interests,id'],
        ]);

        $name = Interest::find($id)->name;
        Interest::find($id)->delete();
        return redirect()
            ->route('admin.dashboard.interests')
            ->with('status', __('Interest') . ' ' . $name . ' ' . __('has been deleted'));
    }

    public function update(UpdateInterestRequest $request,$id)
    {
        $request->merge(['id' => $request->route('id')]);

        $validator = $request->validate([
            'id' =>  ['required', 'exists:interests,id'],
        ]);

        $interest = Interest::find($id);
        $name = $request->name;

        $interest->update([
            'name' => $name,
            'icon' => $request->icon
        ]);

        return redirect()
            ->route('admin.dashboard.interests')
            ->with('status', __('Interest') . ' ' . $name . ' ' . __('has been updated'));
    }



}
