<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAppRequest;
use App\Http\Requests\StoreAppRequest;
use App\Http\Requests\UpdateAppRequest;
use App\Models\App;
use App\Models\Role;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('app_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $apps = App::with(['roles'])->get();

        return view('frontend.apps.index', compact('apps'));
    }

    public function create()
    {
        abort_if(Gate::denies('app_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        return view('frontend.apps.create', compact('roles'));
    }

    public function store(StoreAppRequest $request)
    {
        $app = App::create($request->all());
        $app->roles()->sync($request->input('roles', []));

        return redirect()->route('frontend.apps.index');
    }

    public function edit(App $app)
    {
        abort_if(Gate::denies('app_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $app->load('roles');

        return view('frontend.apps.edit', compact('roles', 'app'));
    }

    public function update(UpdateAppRequest $request, App $app)
    {
        $app->update($request->all());
        $app->roles()->sync($request->input('roles', []));

        return redirect()->route('frontend.apps.index');
    }

    public function show(App $app)
    {
        abort_if(Gate::denies('app_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $app->load('roles', 'appPages');

        return view('frontend.apps.show', compact('app'));
    }

    public function destroy(App $app)
    {
        abort_if(Gate::denies('app_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $app->delete();

        return back();
    }

    public function massDestroy(MassDestroyAppRequest $request)
    {
        App::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
