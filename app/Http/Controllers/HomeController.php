<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Cats;
use App\Tags;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home.index',
            [
                'actions' => 'admin',
                'action' => 'index',
                'action_name' => '网站分析'
            ]);
    }

    public function createArticle(Request $request)
    {
        if ($request->isMethod('get')) {
            $cats = Cats::all()->toArray();
            $tags = Tags::all()->toArray();
            return view('home.create_article',
                [
                    'cats' => $cats,
                    'tags' => $tags,
                    'tagss' => [],
                    'actions' => 'article',
                    'action' => 'create',
                    'action_name' => '新建文章',
                ]);
        } else {
            $this->validate($request,
                [
                    'title' => 'bail|required|max:225',
                    'content' => 'required',
                    'cat_id' => 'required',
                    'tags' => 'nullable|array'
                ]);
            $article = new Articles();
            $article->cat_id = $request->input('cat_id');
            $article->title = $request->input('title');
            $article->content = $request->input('content');
            $tags = $request->input('tags');
            if ($article->save()) {
                if ($tags) {
                    foreach ($tags as $tag) {
                        $article->tags()->attach($tag,['created_at' => time(),'updated_at' => time()]);
                    }
                }
                return redirect()->route('article');
            }
        }
        return true;
    }

    public function deleteArticle($id)
    {
        $article = Articles::find($id);
        if ($article->delete()) {
            $article->tags()->detach();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function updateArticle(Request $request, $id)
    {
        $article = Articles::find($id);
        if ($request->isMethod('get')) {
            $cats = Cats::all()->toArray();
            $tags = Tags::all()->toArray();
            $model_tags = $article->tags->toArray();
            $article_tag = [];
            foreach ($model_tags as $el){
                $article_tag[] = $el['id'];
            }
            return view('home.update_article',
                [
                    'cats' => $cats,
                    'tags' => $tags,
                    'tagss' => $article_tag,
                    'article' => $article,
                    'actions' => 'article',
                    'action' => 'update',
                    'action_name' => '更新文章'
                ]);
        } else {
            $this->validate($request,
                [
                    'title' => 'bail|required|max:225',
                    'content' => 'required',
                    'cat_id' => 'required',
                ]);
            $article->cat_id = $request->input('cat_id');
            $article->title = $request->input('title');
            $article->content = $request->input('content');
            $tags = $request->input('tags');
            if ($article->save()) {
                if($tags){
                    $times = ['created_at' => time(),'updated_at' => time()];
                    $arr = array_fill_keys($tags,$times);
                    $article->tags()->sync($arr);
                }
                return redirect()->route('article');
            }
        }
        return true;

    }

    public function selectArticle()
    {
        $articles = Articles::all();
        return view('home.select_article',
            [
                'actions' => 'article',
                'action' => 'index',
                'action_name' => '文章显示',
                'articles' => $articles
            ]);
    }

    public function createCat(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('home.create_cat',
                [
                    'actions' => 'cat',
                    'action' => 'create',
                    'action_name' => '新建分类'
                ]);
        } else {
            $this->validate($request,
                [
                    'name' => 'bail|required|max:255'
                ]);
            $cat = new Cats();
            $cat->name = $request->input('name');
            if ($cat->save()) {
                return redirect()->route('cat');
            }
        }
        return true;
    }

    public function deleteCat($id)
    {
        if (Cats::find($id)->delete()) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function updateCat(Request $request, $id)
    {
        $cat = Cats::find($id);
        if ($request->isMethod('get')) {
            return view('home.update_cat',
                [
                    'actions' => 'cat',
                    'action' => 'update',
                    'action_name' => '更新分类',
                    'cat' => $cat,
                ]);
        } else {
            $this->validate($request, ['name' => 'bail|required|max:255']);
            $cat->name = $request->input('name');
            if ($cat->save()) {
                return redirect()->route('cat');
            }
        }
        return true;
    }

    public function selectCat()
    {
        $cats = Cats::all();
        return view('home.select_cat',
            [
                'actions' => 'cat',
                'action' => 'index',
                'action_name' => '分类显示',
                'cats' => $cats
            ]);
    }

    public function createTag(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('home.create_tag',
                [
                    'actions' => 'tag',
                    'action' => 'create',
                    'action_name' => '新建标签',
                ]);
        } else {
            $this->validate($request,
                [
                    'name' => 'bail|required|max:25',
                ]);
            $tag = new Tags();
            $tag->name = $request->input('name');
            if ($tag->save()) {
                return redirect()->route('tag');
            }
        }
        return true;
    }

    public function deleteTag($id)
    {
        if (Tags::find($id)->delete()) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function updateTag(Request $request, $id)
    {
        $tag = Tags::find($id);
        if ($request->isMethod('get')) {
            return view('home.update_tag',
                [
                    'actions' => 'tag',
                    'action' => 'update',
                    'action_name' => '更新标签',
                    'tag' => $tag
                ]);
        } else {
            $this->validate($request,
                [
                    'name' => 'bail|required|max:25'
                ]);
            $tag->name = $request->input('name');
            if ($tag->save()) {
                return redirect()->route('tag');
            }
        }
        return true;
    }

    public function selectTag()
    {
        $tags = Tags::all();
        return view('home.select_tag',
            [
                'actions' => 'tag',
                'action' => 'index',
                'action_name' => '标签显示',
                'tags' => $tags
            ]);
    }

}
