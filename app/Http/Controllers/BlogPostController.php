<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;

class BlogPostController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = BlogPost::orderBy('id')->paginate(5);
        return view("blog.index", ["blogs" => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::categorySelect();
        return view("blog.create", ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blogPost = BlogPost::create([
            "title" => $request->title,
            "body" => $request->body,
            "user_id" => Auth::user()->id,
            "categories_id" => $request->categories_id,
        ]);

        return redirect(route("blog.show", $blogPost->id))->withSuccess("Post ajouté!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        $blogPost->join("users", "user_id", "users.id")->get();
        return view("blog.show", ["blogPost" => $blogPost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {

        $categories = Category::categorySelect();

        return view("blog.edit", ["blogPost" => $blogPost, "categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $blogPost->update([
            "title" => $request->title,
            "body" => $request->body,
            "categories_id" => $request->categories_id,
        ]);

        return redirect(route("blog.show", $blogPost->id))->withSuccess("Post a jour!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return redirect(route("blog.index"))->withSuccess("Post effacé.");
    }


    /**
     * Function QUERY...
     */
    public function query()
    {


        $blog = BlogPost::select()
            ->where("user_id", "=", 11)

            ->orwhere("title", "Abc")

            ->orderby("title", "DESC")
            ->get();

        return $blog;
    }


    public function page()
    {
        $blogs = BlogPost::select()
            ->paginate(5);

        return view("blog.page", ["blogs" => $blogs]);
    }



    public function showPdf(BlogPost $blogPost)
    {

        $pdf = Pdf::loadView("blog.show-pdf", ["blogPost" => $blogPost]);
        return $pdf->stream("blogs.pdf"); //ouvre dans le navigateur le fichier

    }
}
