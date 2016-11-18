<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Lang;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin', false)->paginate(config('view.paginate'));
        return view('admin.users.index', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with([
                'flash_message', Lang::get('users.not_search_user'),
                'flash_level' => 'danger'
            ]);
        } else {
            $user->is_active = $user->is_active ? false : true;
            $user->save();
            return redirect()->back()->with([
                'flash_message' => Lang::get('users.update_user_success'),
                'flash_level' => 'success'
            ]);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with([
                'flash_message', Lang::get('users.not_search_user'),
                'flash_level' => 'danger'
            ]);
        } else {
            $user->delete();
            return redirect()->back()->with([
                'flash_message' => Lang::get('users.delete_success'),
                'flash_level' => 'success'
            ]);
        }
    }
}
