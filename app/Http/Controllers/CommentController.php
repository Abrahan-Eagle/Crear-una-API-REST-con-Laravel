<?php

namespace App\Http\Controllers;


use App\Http\Resources\Comment as CommentResource;
use App\Models\Article;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $article)
    {
        //return new ArticleCollection(Article::paginate(6));
        $comments = $article->comments;
        return response()->json(CommentResource::collection($comments), 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article)
    {
        $validate = $request->validate([
            'text'=>'required|string',
        ]);

        $comment= $article->comments()->save(new Comments($request->all()));
        return response()->json($comment, 201);

    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article, Comments $comment)
    {
        return response()->json($article->comments()->where('id', $comment->id)->firstOrFail() , 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Comments $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comments $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comments $comment)
    {
        //
    }
}
