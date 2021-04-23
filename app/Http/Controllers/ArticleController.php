<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comments;
use App\Http\Resources\Article as ArticleResources;
use App\Http\Resources\ArticleCollection;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

 /*   private static $rules = [
        'title'=> 'required|string|unique:articles|max:255',
        'body'=> 'required',
        'category_id'=>'required|exists:categories,id'
    ];

    private static $errorMessages = [
        'require'=>'El campo :atributo es obligatorio',
        'body.require'=>'Se requiere el body',
    ];
*/
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
/*
        $messages = [
            'require'=>'El campo :atributo es obligatorio',
            'body.require'=>'Se requiere el body',
        ];

        $validatedData = $request->validate([
            'title'=> 'required|string|unique:articles|max:255',
            'body'=> 'required'
        ], $messages );
    */
    //$validatedData = $request->validate(self::$rules, self::$errorMessages);

        $validateData = $request->validate([
            'title'=> 'required|string|unique:articles|max:255',
            'body'=> 'required',
            'category_id'=>'required|exists:categories,id',
            'image' => 'required|image|dimensions:min_width=500,min_height=500',
            ]);



            $article = new Article($request->all());
            $path = $request->image->store('public/articles');
            //$path = $request->image->storeAs('public/articles', $request->user()->id . '_' . $article->title . '.' . $request->image->extension());
            $article->image = $path;
            $article->save();

        return response()->json(new ArticleResources($article), 201);
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

        $validateData= $request->validate([
            'title'=> 'required|string|unique:articles|max:255',
            'body'=> 'required',
            'category_id'=>'required|exists:categories,title,'.$article->id.'|max:255',
            ]);

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
