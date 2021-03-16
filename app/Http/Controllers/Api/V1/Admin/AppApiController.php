<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppRequest;
use App\Http\Requests\UpdateAppRequest;
use App\Http\Resources\Admin\AppResource;
use App\Models\App;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('app_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AppResource(App::all());
    }

    public function store(StoreAppRequest $request)
    {
        $app = App::create($request->all());

        return (new AppResource($app))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(App $app)
    {
        abort_if(Gate::denies('app_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AppResource($app);
    }

    public function update(UpdateAppRequest $request, App $app)
    {
        $app->update($request->all());

        return (new AppResource($app))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(App $app)
    {
        abort_if(Gate::denies('app_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $app->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
