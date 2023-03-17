<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $users = User::paginate(15);

        return view('index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(UserRequest $request)
    {
        User::create($request->only(['name', 'email']));

        Session::flash('success', 'User '.$request->name.' created successfully');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function show(User $user)
    {
        return view('show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(User $user)
    {
        return view('form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User    $user
     *
     * @return RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->only(['name', 'email']));

        Session::flash('success', 'User '.$user->name.' updated successfully');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        Session::flash('danger', 'User '.$user->name.' deleted successfully');

        return redirect()->route('users.index');
    }
}
