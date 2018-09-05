<?php

namespace Studio\Totem\Http\Controllers;

use Studio\Totem\Tag;
use Studio\Totem\Task;
use Studio\Totem\Totem;
use Studio\Totem\Frequency;
use Studio\Totem\Contracts\TaskInterface;
use Studio\Totem\Http\Requests\TagRequest;

class TagsController extends Controller
{

    /**
     * Display a listing of the tags.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $tags = Tag::get(['id', 'name']);

        return response()->json([
           'tags' => $tags
        ]);
    }

    /**
     * Store a newly created task in storage.
     *
     * @param TagRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TagRequest $request)
    {
        $tag = new Tag;
        $tag->fill($request->only('name'))->save();

        return response()->json($tag);
    }
}
