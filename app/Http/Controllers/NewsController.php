<?php

namespace App\Http\Controllers;

use App\Http\Requests\{ListNewsRequest, UpsertNewsRequest};
use App\Models\NewModel;
use Illuminate\Http\{JsonResponse, Response};
use PhpParser\Node\Expr\Cast\Object_;

class NewsController extends Controller
{
    public function __construct(
        protected NewModel $newsRepository,
        protected $defaultPerPage = 10
    ) {
        // 
    }

    public function list(ListNewsRequest $request): Object
    {
        $page = $request->page ?? 1;
        $perPage =  $request->perPage ?? $this->defaultPerPage;
        $filter = $request->filter ?? null;

        $news = $this->newsRepository
            ->when($filter, function ($query) use ($filter) {
                return $query->where('title', 'like', "%{$filter}%");
            })
            ->paginate($perPage, "*", "page", $page)
            ->withQueryString();

        return $news;
    }

    public function store(UpsertNewsRequest $request): JsonResponse
    {
        $news = $this->newsRepository->create($request->all());
        return response()->json($news, Response::HTTP_CREATED);
    }

    public function findOne(int $id): JsonResponse
    {
        $news = $this->newsRepository->findOrFail($id);
        return response()->json($news,  Response::HTTP_OK);
    }

    public function update(int $id, UpsertNewsRequest $request): JsonResponse
    {
        $news = $this->newsRepository->findOrFail($id);
        $news->update($request->all());
        return response()->json($news,  Response::HTTP_OK);
    }

    public function destroy(int $id): JsonResponse
    {
        $news = $this->newsRepository->findOrFail($id);
        $news->delete();
        return response()->json(null,  Response::HTTP_NO_CONTENT);
    }
}
