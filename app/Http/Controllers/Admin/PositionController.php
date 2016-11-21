<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Position;
use Lang;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::paginate(config('view.paginate'));
        return view('admin.position.index', compact('positions'));
    }

    public function create()
    {
        return view('admin.position.create');
    }

    public function store(Request $request)
    {
        $position = new Position;
        $data = $request->only('name');
        if ($position->validate($data, 'storeRule')) {
            Position::create($data);
            return redirect()->route('admin.position.index')->with([
                'flash_level' => Lang::get('admin.success'),
                'flash_message' => Lang::get('admin.message.complate', ['name' => 'Position'])
            ]);
        }
        return redirect()->back()->withErrors($position->valid());
    }

    public function edit($id)
    {
        $position = Position::find($id);
        if (!$position) {
            return redirect()->route('admin.position.index')->with([
                'flash_level' => Lang::get('admin.danger'),
                'flash_message' => Lang::get('admin.message.not_found', ['name' => 'position'])
            ]);
        }
        return view('admin.position.edit', compact('position'));
    }

    public function update(Request $request, $id)
    {
        $position = Position::find($id);
        if (!$position) {
            return redirect()->route('admin.position.index')->with([
                'flash_level' => Lang::get('admin.danger'),
                'flash_message' => Lang::get('admin.message.not_found', ['name' => 'position'])
            ]);
        }
        $data = $request->only('name');
        if ($position->validate($data, 'updateRule')) {
            $position->update($data);
            return redirect()->route('admin.position.index')->with([
                'flash_level' => Lang::get('admin.success'),
                'flash_message' => Lang::get('admin.message.edit_success', ['name' => 'position'])
            ]);
        }
        return redirect()->back()->withErrors($position->valid());
    }

    public function destroy($id)
    {
        $position = Position::find($id);
        if (!$position) {
            return redirect()->route('admin.position.index')->with([
                'flash_level' => Lang::get('admin.danger'),
                'flash_message' => Lang::get('admin.message.not_found', ['name' => 'position'])
            ]);
        }
        $position->delete();
        return redirect()->route('admin.position.index')->with([
            'flash_level' => Lang::get('admin.success'),
            'flash_message' => Lang::get('admin.message.edit_success', ['name' => 'position'])
        ]);
    }
}
