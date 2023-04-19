<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Group;
use App\Rules\AlreadyInGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Rules\CodeExists;

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
        $matches = $group->restaurants;

        return view('groups.show', compact('group', 'members', 'matches'));
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

    public function showJoin()
    {
        return view('groups.join');
    }

    public function join(Request $request)
    {
        $validatedData = $request->validate([
            'code' => ['required', new CodeExists, new AlreadyInGroup],
        ]);

        $user = auth()->user();

        $group = Group::where('code', $request->code)->firstOrFail();
        $user->groups()->attach($group->id);

        return redirect()->route('groups.show', $group);
    }

    public function leave(Group $group)
    {
        $user = auth()->user();

        $group->users()->detach($user);
        return back();
    }
}
