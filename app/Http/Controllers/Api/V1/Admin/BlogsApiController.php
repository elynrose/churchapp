<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Resources\Admin\BlogResource;
use App\Models\Blog;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BlogResource(Blog::with(['created_by', 'app'])->get());
    }

    public function store(StoreBlogRequest $request)
    {
        $blog = Blog::create($request->all());

        if ($request->input('blog_cover_image', false)) {
            $blog->addMedia(storage_path('tmp/uploads/' . basename($request->input('blog_cover_image'))))->toMediaCollection('blog_cover_image');
        }

        return (new BlogResource($blog))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Blog $blog)
    {
        abort_if(Gate::denies('blog_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BlogResource($blog->load(['created_by', 'app']));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->update($request->all());

        if ($request->input('blog_cover_image', false)) {
            if (!$blog->blog_cover_image || $request->input('blog_cover_image') !== $blog->blog_cover_image->file_name) {
                if ($blog->blog_cover_image) {
                    $blog->blog_cover_image->delete();
                }

                $blog->addMedia(storage_path('tmp/uploads/' . basename($request->input('blog_cover_image'))))->toMediaCollection('blog_cover_image');
            }
        } elseif ($blog->blog_cover_image) {
            $blog->blog_cover_image->delete();
        }

        return (new BlogResource($blog))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Blog $blog)
    {
        abort_if(Gate::denies('blog_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blog->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
