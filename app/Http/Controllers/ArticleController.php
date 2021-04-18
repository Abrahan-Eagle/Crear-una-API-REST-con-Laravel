<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Resources\Article as ArticleResources;
use App\Http\Resources\ArticleCollection;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //return Article::all();
        //$article = Article::all();
        //return response()->json($article, 200);

        return new ArticleCollection(Article::paginate(6));

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
    public function store(Request $request)
    {   //return Article::create($request->all());
        /*$article = Article::create($request->all());
        return response()->json($article, 201);*/
        return response()->json(Article::create($request->all()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article) //public function show($id)
    {   //return Article::find($article);
        //return new ArticleResources($article);
        return response()->json(new ArticleResources($article), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article) //public function update(Request $request, $id)
    {   //return $articles = Article::findOrFail($id)->update($request->all());
        $article -> update($request->all());
        return response()->json($article, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article) //public function destroy($id)
    {   //$articles = Article::find($id)->delete(); return 204;
        $article -> delete();
        return response()->json(null, 204);
    }
}
