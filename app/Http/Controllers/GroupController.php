<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GroupController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $groups = Group::whereHas('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        return view('groups.index', compact('groups'));
    }

    public function create()
    {
        return view('groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $group = new Group();
        $group->name = $request->name;
        $group->code = Str::random(6);
        $group->save();

        $user = auth()->user();
        $group->users()->sync([$user->id]);

        return redirect()->route('groups.index');
    }

    public function show(Group $group)
    {
        $members = $group->users;

        return view('groups.show', compact('group', 'members'));
    }

    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $group->name = $request->name;
        $group->save();

        return redirect()->route('groups.show', $group);
    }

    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('groups.index');
    }

    public function join(Request $request, Group $group)
    {
        $request->validate([
            'code' => 'required',
        ]);

        $user = auth()->user();

        $existingGroup = $user->groups()->where('id', $group->id)->first();

        if ($existingGroup) {
            return redirect()->route('groups.show', $group);
        }

        $group->users()->syncWithoutDetaching([$user->id => ['code' => $request->code]]);

        return redirect()->route('groups.show', $group);
    }
}
