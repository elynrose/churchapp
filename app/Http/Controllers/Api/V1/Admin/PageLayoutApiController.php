<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePageLayoutRequest;
use App\Http\Requests\UpdatePageLayoutRequest;
use App\Http\Resources\Admin\PageLayoutResource;
use App\Models\PageLayout;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PageLayoutApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('page_layout_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PageLayoutResource(PageLayout::with(['page', 'module'])->get());
    }

    public function store(StorePageLayoutRequest $request)
    {
        $pageLayout = PageLayout::create($request->all());

        return (new PageLayoutResource($pageLayout))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PageLayout $pageLayout)
    {
        abort_if(Gate::denies('page_layout_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PageLayoutResource($pageLayout->load(['page', 'module']));
    }

    public function update(UpdatePageLayoutRequest $request, PageLayout $pageLayout)
    {
        $pageLayout->update($request->all());

        return (new PageLayoutResource($pageLayout))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PageLayout $pageLayout)
    {
        abort_if(Gate::denies('page_layout_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pageLayout->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
