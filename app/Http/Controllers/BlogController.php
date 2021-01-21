<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Post;

use App\Autor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;




class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $blog = DB::table('posts')->get(); */

        $Post = Post::all();
        return view('Blog.Blog')->with('Post', $Post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autor= Autor::all(['id', 'nombre_completo']);
        return view('Blog.Create')->with('autor', $autor);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        /* Validación de los datos*/
        $data = $request->validate([
            'titulo' => 'required|min:10',
            'autor' => 'required',
            'contenido' => 'required|min:200',
            'imagen' => 'required|image'
        ]);

        /* Se obtiene la ruta de la imagen */
        $ruta_imagen = $request['imagen']->store('upload-Blog', 'public');

        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
        $img->save();
        
        /* Se almacena en la base de datos */
        Post::create([
            'titulo' => $data['titulo'],
            'contenido' => $data['contenido'],
            'id_autor' => $data['autor'],
            'imagen' => $ruta_imagen
        ]);



        
        //Redireccionar
        return redirect()->action('BlogController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $Blog
     * @return \Illuminate\Http\Response
     */
    public function show(Post $Post)
    {

        return view('Blog.Show', compact('Post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $Blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $Post)
    {
        $autor= Autor::all(['id', 'nombre_completo']);
        return view('Blog.Edit', compact('autor', 'Post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $Blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $Post)
    {
        /* Validación de los datos*/
        $data = $request->validate([
            'titulo' => 'required|min:10',
            'autor' => 'required',
            'contenido' => 'required|min:200',

        ]);

        /* Se asignan los nuevos valores */

        $Post->titulo = $data['titulo'];
        $Post->contenido = $data['contenido'];
        $Post->id_autor = $data['autor'];

        /* Si se quiere una nueva imagen */
        if(request('imagen')){
            /* Se obtiene la ruta de la imagen */
            $ruta_imagen = $request['imagen']->store('upload-Blog', 'public');

            $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
            $img->save();
            $Post->imagen = $ruta_imagen;
        }

        $Post->save();

        return redirect()->action('BlogController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $Blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $Post)
    {
        
        $Post->delete();
        return redirect()->action('BlogController@index');
    }
}
