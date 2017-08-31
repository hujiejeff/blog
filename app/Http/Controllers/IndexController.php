<?php

namespace App\Http\Controllers;


use App\Articles;
use App\Cats;
use App\Tags;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private $arr;

    public function __construct()
    {
        $this->middleware('visited_record');
        $this->arr =
            [
                'articles_num' => Articles::all()->count(),
                'cats_num' => Cats::all()->count(),
                'tags_num' => Tags::all()->count(),
            ];
    }

    public function index(Request $request)
    {
        $articles = Articles::orderBy('created_at', 'desc')->paginate(3);
        return view('index.index', ['articles' => $articles, 'arr' => $this->arr]);
    }

    public function archives()
    {
        $articles = Articles::orderBy('created_at', 'desc')->paginate(8);
        return view('index.archives', ['articles' => $articles, 'arr' => $this->arr]);
    }

    public function article($id = 1)
    {
        $article = Articles::find($id);
        $article->read_num++;
        $article->save();
        return view('index.view', ['article' => $article, 'arr' => $this->arr]);
    }

    public function cats()
    {
        $cats = Cats::all();
        return view('index.cats', ['cats' => $cats, 'arr' => $this->arr]);
    }

    public function cat($id = 1)
    {
        $cat_name = Cats::find($id)->name;
        $articles = Articles::where('cat_id', $id)->orderBy('created_at', 'desc')->paginate(8);
        return view('index.cat', ['articles' => $articles, 'cat_name' => $cat_name, 'arr' => $this->arr]);
    }

    public function tags()
    {
        $tags = Tags::all();
        return view('index.tags', ['tags' => $tags,'arr' => $this->arr]);
    }

    public function tag($id)
    {
        $tag = Tags::find($id);
        $tag_name = $tag->name;
        $articles = $tag->articles->reverse();
        return view('index.tag', ['articles' => $articles,'arr' => $this->arr,'tag_name' => $tag_name]);
    }

    public function search(Request $request)
    {
        $key_word = $request->input('key_word',null);
        $before_time = microtime(true);
        if($key_word) {
            $articles = Articles::where('content', 'like', '%' . $key_word . '%')->get(['id','title'])->all();
        }else{
            $articles = null;
        }
        $after_time = microtime(true);
        $articles['time'] = ($after_time -$before_time)*1000;
        $articles['length'] = count($articles)-1;
        return response()->json($articles);
    }
}