<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPageLayoutRequest;
use App\Http\Requests\StorePageLayoutRequest;
use App\Http\Requests\UpdatePageLayoutRequest;
use App\Models\Module;
use App\Models\Page;
use App\Models\PageLayout;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PageLayoutController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('page_layout_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pageLayouts = PageLayout::with(['page', 'module'])->get();

        return view('frontend.pageLayouts.index', compact('pageLayouts'));
    }

    public function create()
    {
        abort_if(Gate::denies('page_layout_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $modules = Module::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.pageLayouts.create', compact('pages', 'modules'));
    }

    public function store(StorePageLayoutRequest $request)
    {
        $pageLayout = PageLayout::create($request->all());

        return redirect()->route('frontend.page-layouts.index');
    }

    public function edit(PageLayout $pageLayout)
    {
        abort_if(Gate::denies('page_layout_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $modules = Module::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pageLayout->load('page', 'module');

        return view('frontend.pageLayouts.edit', compact('pages', 'modules', 'pageLayout'));
    }

    public function update(UpdatePageLayoutRequest $request, PageLayout $pageLayout)
    {
        $pageLayout->update($request->all());

        return redirect()->route('frontend.page-layouts.index');
    }

    public function show(PageLayout $pageLayout)
    {
        abort_if(Gate::denies('page_layout_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pageLayout->load('page', 'module');

        return view('frontend.pageLayouts.show', compact('pageLayout'));
    }

    public function destroy(PageLayout $pageLayout)
    {
        abort_if(Gate::denies('page_layout_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pageLayout->delete();

        return back();
    }

    public function massDestroy(MassDestroyPageLayoutRequest $request)
    {
        PageLayout::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
