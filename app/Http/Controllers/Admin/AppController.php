<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAppRequest;
use App\Http\Requests\StoreAppRequest;
use App\Http\Requests\UpdateAppRequest;
use App\Models\App;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('app_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $apps = App::all();

        return view('admin.apps.index', compact('apps'));
    }

    public function create()
    {
        abort_if(Gate::denies('app_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.apps.create');
    }

    public function store(StoreAppRequest $request)
    {
        $app = App::create($request->all());

        return redirect()->route('admin.apps.index');
    }

    public function edit(App $app)
    {
        abort_if(Gate::denies('app_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.apps.edit', compact('app'));
    }

    public function update(UpdateAppRequest $request, App $app)
    {
        $app->update($request->all());

        return redirect()->route('admin.apps.index');
    }

    public function show(App $app)
    {
        abort_if(Gate::denies('app_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.apps.show', compact('app'));
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
