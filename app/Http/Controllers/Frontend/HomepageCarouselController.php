<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHomepageCarouselRequest;
use App\Http\Requests\StoreHomepageCarouselRequest;
use App\Http\Requests\UpdateHomepageCarouselRequest;
use App\Models\HomepageCarousel;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class HomepageCarouselController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('homepage_carousel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homepageCarousels = HomepageCarousel::with(['media'])->get();

        return view('frontend.homepageCarousels.index', compact('homepageCarousels'));
    }

    public function create()
    {
        abort_if(Gate::denies('homepage_carousel_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.homepageCarousels.create');
    }

    public function store(StoreHomepageCarouselRequest $request)
    {
        $homepageCarousel = HomepageCarousel::create($request->all());

        if ($request->input('photo', false)) {
            $homepageCarousel->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $homepageCarousel->id]);
        }

        return redirect()->route('frontend.homepage-carousels.index');
    }

    public function edit(HomepageCarousel $homepageCarousel)
    {
        abort_if(Gate::denies('homepage_carousel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.homepageCarousels.edit', compact('homepageCarousel'));
    }

    public function update(UpdateHomepageCarouselRequest $request, HomepageCarousel $homepageCarousel)
    {
        $homepageCarousel->update($request->all());

        if ($request->input('photo', false)) {
            if (!$homepageCarousel->photo || $request->input('photo') !== $homepageCarousel->photo->file_name) {
                if ($homepageCarousel->photo) {
                    $homepageCarousel->photo->delete();
                }
                $homepageCarousel->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($homepageCarousel->photo) {
            $homepageCarousel->photo->delete();
        }

        return redirect()->route('frontend.homepage-carousels.index');
    }

    public function show(HomepageCarousel $homepageCarousel)
    {
        abort_if(Gate::denies('homepage_carousel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.homepageCarousels.show', compact('homepageCarousel'));
    }

    public function destroy(HomepageCarousel $homepageCarousel)
    {
        abort_if(Gate::denies('homepage_carousel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homepageCarousel->delete();

        return back();
    }

    public function massDestroy(MassDestroyHomepageCarouselRequest $request)
    {
        HomepageCarousel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('homepage_carousel_create') && Gate::denies('homepage_carousel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new HomepageCarousel();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
