<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticlesCategory;
use App\exercises;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    //

    public function createArticle(Request $request, $categoryID){

        $newArticle = new Article();
        $this->validate($request, [
            'image' => 'required|file|mimes:jpg,jpeg,png',
            'name' => 'required',
            'detail' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = storage_path() . '\app';
            $image->move($destinationPath, $name);
            $image = Storage::disk('local')->get($name);
            $newArticle->image = $image;
            $newArticle->articleName = $request->name;
            $newArticle->description = $request->detail;
            $newArticle->fk_categoryID = $categoryID;
            $newArticle->save();
            return redirect()->route('openArticleListView', $categoryID)->with('message', 'Sukurta');
        }
    }

    public function openCreateArticleView($categoryID){

        return view('Articles.Articles.CreateArticleView', [
            'categoryID' => $categoryID
        ]);
    }

    public  function openArticleListView($categoryID){
        $category = ArticlesCategory::find($categoryID);

        $articles = Article::where('fk_categoryID' ,'=',$categoryID )->get();

        if ($articles != null){
            foreach ($articles as $article){
                $article-> image = 'data:image/jpeg;base64,'.base64_encode( $article -> image ).'';
            }
        }

        return view('Articles.Articles.ArticleListView',[
            'categoryName' => $category->categoryName,
            'categoryID' => $category->id,
            'articles' => $articles,
            'userType' => $this->userType()
        ]);
    }

    private function userType(){
        $userType= "Guest";
        if(auth()->user() != null){
            $userType = auth()->user()->type;
        }
        return $userType;
    }

    public function openArticleCategorys()
    {
        $categorys = ArticlesCategory::all();

        if ($categorys != null){
            foreach ($categorys as $category){
                $category-> image = 'data:image/jpeg;base64,'.base64_encode( $category -> image ).'';
            }
        }

        return view('Articles.Categorys.ArticleCategoryView', [
            'categorys' =>$categorys,
            'userType' => $this->userType()
        ]);
    }

    public function openCreateCategory(){

        return view('Articles.Categorys.CreateArticleCategoryView');
    }

    public function CreateCategory(Request $request){
        $newCategory = new ArticlesCategory();
        $this->validate($request, [
            'image' => 'required|file|mimes:jpg,jpeg,png',
            'name' => 'required',
            'detail' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = storage_path() . '\app';
            $image->move($destinationPath, $name);
            $image = Storage::disk('local')->get($name);
            $newCategory->image = $image;
            $newCategory->categoryName = $request->name;
            $newCategory->description = $request->detail;
            $newCategory->save();
            return redirect()->route('artCategory')->with('message', 'Sukurta');
        }
    }


    public function updateCategory(Request $request, $categoryID){


        $this->validate($request, [
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required',
            'detail' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = storage_path() . '\app';
            $image->move($destinationPath, $name);
            $image = Storage::disk('local')->get($name);
            ArticlesCategory::find($categoryID)->update([
                'image' => $image
            ]);
        }

        ArticlesCategory::find($categoryID)->update([
            'categoryName' => $request->name,
            'description' => $request->detail,
        ]);

        return redirect()->route('artCategory')->with('message', 'Atnaujinta');

    }

    public function openEditArticleCategoryView(Request $request, $categoryID){

        $category = ArticlesCategory::where('id', '=', $categoryID)->first();
        return view('Articles.Categorys.EditArticleCategoryView', [
            'id' => $category->id,
            'name' => $category->categoryName,
            'description' => $category->description,
            'image' => $category->image
        ]);
    }

    public function deleteCategory($categoryID){


        $category = ArticlesCategory::where('id', '=', $categoryID)->first();

        $articles = Article::where('fk_categoryID','=', $categoryID)->get();

        foreach ($articles as $article){
            $article->delete();
        }

        $category->delete();


        return redirect()->route('artCategory')->with('message', 'Pašalinta');
    }


    public  function deleteArticle($id)
    {

        $article = Article::where('id','=', $id)->first();
        $fk_ID= $article->fk_categoryID;
        $article->delete();

        return redirect()->route('openArticleListView', ['Category'=>$fk_ID])->with('message', 'Pašalinta');
    }


    public function openArticleDescriptionView ($article_id){

        $article = Article::findOrFail($article_id);
        $article -> image = 'data:image/jpeg;base64,'.base64_encode( $article -> image ).'';
        $articleDesc = explode("\n", $article -> description);
        //dd($article);

        return view('Articles.Articles.ArticleDescriptionView', [
            'article' => $article,
            'desc' => $articleDesc,
            'categoryID' => $article->fk_categoryID,
            'userType' => $this->userType()
        ]);

    }

    public function openEditArticleView($id)
    {
        $article = Article::findOrFail($id);
        $article-> image = 'data:image/jpeg;base64,'.base64_encode( $article -> image ).'';


        return view('Articles.Articles.EditArticleView', [
            'id' => $article->id,
            'name'=>$article->exerciseName,
            'image' => $article->image,
            'description' => $article->description,
            'categoryID' => $article->fk_CategoryID
        ]);
    }

    public function updateArticle(Request $request, $id){
        $this->validate($request, [
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required',
            'detail' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = storage_path() . '\app';
            $image->move($destinationPath, $name);
            $image = Storage::disk('local')->get($name);
            Article::find($id)->update([
                'image' => $image
            ]);
        }

        Article::find($id)->update([
            'articleName' => $request->name,
            'description' => $request->detail,
        ]);

        return redirect()->route('openArticleDescView',['categoryID'=>$id])->with('message', 'Atnaujinta');;
    }

}
