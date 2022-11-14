<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyWeeksMessageRequest;
use App\Http\Requests\StoreWeeksMessageRequest;
use App\Http\Requests\UpdateWeeksMessageRequest;
use App\Models\WeeksMessage;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class WeeksMessagesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('weeks_message_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $weeksMessages = WeeksMessage::with(['media'])->get();

        return view('frontend.weeksMessages.index', compact('weeksMessages'));
    }

    public function create()
    {
        abort_if(Gate::denies('weeks_message_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.weeksMessages.create');
    }

    public function store(StoreWeeksMessageRequest $request)
    {
        $weeksMessage = WeeksMessage::create($request->all());

        foreach ($request->input('files', []) as $file) {
            $weeksMessage->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $weeksMessage->id]);
        }

        return redirect()->route('frontend.weeks-messages.index');
    }

    public function edit(WeeksMessage $weeksMessage)
    {
        abort_if(Gate::denies('weeks_message_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.weeksMessages.edit', compact('weeksMessage'));
    }

    public function update(UpdateWeeksMessageRequest $request, WeeksMessage $weeksMessage)
    {
        $weeksMessage->update($request->all());

        if (count($weeksMessage->files) > 0) {
            foreach ($weeksMessage->files as $media) {
                if (!in_array($media->file_name, $request->input('files', []))) {
                    $media->delete();
                }
            }
        }
        $media = $weeksMessage->files->pluck('file_name')->toArray();
        foreach ($request->input('files', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $weeksMessage->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
            }
        }

        return redirect()->route('frontend.weeks-messages.index');
    }

    public function show(WeeksMessage $weeksMessage)
    {
        abort_if(Gate::denies('weeks_message_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.weeksMessages.show', compact('weeksMessage'));
    }

    public function destroy(WeeksMessage $weeksMessage)
    {
        abort_if(Gate::denies('weeks_message_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $weeksMessage->delete();

        return back();
    }

    public function massDestroy(MassDestroyWeeksMessageRequest $request)
    {
        WeeksMessage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('weeks_message_create') && Gate::denies('weeks_message_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new WeeksMessage();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
