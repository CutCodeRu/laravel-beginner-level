<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUserFormRequest;
use App\Models\AdminUser;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = AdminUser::orderBy("created_at", "DESC")->paginate(3);

        return view("admin.admin_users.index", [
            "users" => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.admin_users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AdminUserFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserFormRequest $request)
    {
        $data = $request->validated();

        AdminUser::create($data);

        return redirect(route("admin.admin_users.index"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = AdminUser::findOrFail($id);

        return view("admin.admin_users.create", [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AdminUserFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserFormRequest $request, $id)
    {
        $user = AdminUser::findOrFail($id);

        $user->update($request->validated());

        return redirect(route("admin.admin_users.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdminUser::destroy($id);

        return redirect(route("admin.admin_users.index"));
    }
}
