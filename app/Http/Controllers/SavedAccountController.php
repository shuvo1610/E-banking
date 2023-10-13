<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\SavedAccount;
use Illuminate\Http\Request;

class SavedAccountController extends Controller
{
    public function index()
    {
        $data = [
            'account_lists' => SavedAccount::where('user_id',auth()->id())->get()
        ];

        return view('customer.favouritelist',$data);
    }
    public function create()
    {
        return view('saved_account.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'account_no' => 'required',
            'name' => 'required'
        ]);

        try {
            $data = [
                'account_id' => $request->account_no,
                'name' => $request->name,
                'user_id' => auth()->id(),
            ];
            SavedAccount::create($data);
            return back()->with(['success' => 'Account Added to Your Favourite List']);
        } catch (\Exception $e) {
            return back()->with(['error' => 'Something Went Wrong']);
        }
    }

    public function destroy($id)
    {

        try {
            SavedAccount::destroy($id);
            return back()->with(['success' => 'Account Added to Your Favourite List']);
        } catch (\Exception $e) {
            return back()->with(['error' => 'Something Went Wrong']);
        }
    }
}
