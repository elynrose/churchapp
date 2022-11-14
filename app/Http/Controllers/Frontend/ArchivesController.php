<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyArchiveRequest;
use App\Http\Requests\StoreArchiveRequest;
use App\Http\Requests\UpdateArchiveRequest;
use App\Models\Archive;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArchivesController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('archive_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $archives = Archive::all();

        return view('frontend.archives.index', compact('archives'));
    }

    public function create()
    {
        abort_if(Gate::denies('archive_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.archives.create');
    }

    public function store(StoreArchiveRequest $request)
    {
        $archive = Archive::create($request->all());

        return redirect()->route('frontend.archives.index');
    }

    public function edit(Archive $archive)
    {
        abort_if(Gate::denies('archive_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.archives.edit', compact('archive'));
    }

    public function update(UpdateArchiveRequest $request, Archive $archive)
    {
        $archive->update($request->all());

        return redirect()->route('frontend.archives.index');
    }

    public function show(Archive $archive)
    {
        abort_if(Gate::denies('archive_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.archives.show', compact('archive'));
    }

    public function destroy(Archive $archive)
    {
        abort_if(Gate::denies('archive_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $archive->delete();

        return back();
    }

    public function massDestroy(MassDestroyArchiveRequest $request)
    {
        Archive::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
