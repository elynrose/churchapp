<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyModuleRequest;
use App\Http\Requests\StoreModuleRequest;
use App\Http\Requests\UpdateModuleRequest;
use App\Models\Module;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModulesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('module_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $modules = Module::all();

        return view('frontend.modules.index', compact('modules'));
    }

    public function create()
    {
        abort_if(Gate::denies('module_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.modules.create');
    }

    public function store(StoreModuleRequest $request)
    {
        $module = Module::create($request->all());

        return redirect()->route('frontend.modules.index');
    }

    public function edit(Module $module)
    {
        abort_if(Gate::denies('module_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.modules.edit', compact('module'));
    }

    public function update(UpdateModuleRequest $request, Module $module)
    {
        $module->update($request->all());

        return redirect()->route('frontend.modules.index');
    }

    public function show(Module $module)
    {
        abort_if(Gate::denies('module_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $module->load('modulePageLayouts');

        return view('frontend.modules.show', compact('module'));
    }

    public function destroy(Module $module)
    {
        abort_if(Gate::denies('module_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $module->delete();

        return back();
    }

    public function massDestroy(MassDestroyModuleRequest $request)
    {
        Module::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
