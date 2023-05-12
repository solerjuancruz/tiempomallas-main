<?php

namespace App\Http\Controllers;

use App\Models\Convenio;
use App\Models\Noticias;
use Illuminate\Http\Request;
use PHPUnit\Framework\Error\Notice;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticias::all(); 
        $contador = Noticias::count();
        $viviendas = Convenio::where('convenio','vivienda')->orderby('created_at','desc')->take(1)->get();
        $cajas = Convenio::where('convenio','caja')->orderby('created_at','desc')->take(1)->get();
        $educativos = Convenio::where('convenio','educativo')->orderby('created_at','desc')->take(1)->get();
        $creditos = Convenio::where('convenio','credito')->orderby('created_at','desc')->take(1)->get();
        $otros = Convenio::where('convenio','otros')->orderby('created_at','desc')->take(1)->get();
       return view('news.news', compact('noticias','viviendas','cajas','educativos','creditos','otros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->get('title');
        $description = $request->get('description');
        $file_new = $request->get('file_new');
        $noticias = new Noticias();

        $noticias->title = $title;
        $noticias->description = $description;
        $noticias->file_new = $file_new;
        if ($request->hasFile('file_new')) {
            $noticias['file_new'] = $request->file('file_new')->store('uploads', 'public');
          }
          $noticias->save();

        return redirect('noticias/show')->with('success','Añadido correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticias = Noticias::orderby('id','desc')->paginate(10);
        return view('news.index',compact('noticias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = Noticias::find($id);
        return view('news.edit',compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $title = $request->get('title');
        $description = $request->get('description');
        $file_new = $request->get('file_new');

        $noticia = Noticias::find($id);
        $noticia->title = $title;
        $noticia->description = $description;
        $noticia->file_new = $file_new;
        if ($request->hasFile('file_new')) {
            $noticia['file_new'] = $request->file('file_new')->store('uploads', 'public');
          }
          $noticia->save();

        return redirect('noticias/show')->with('success','Editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = Noticias::find($id);
        $noticia->delete();
        return redirect('noticias/show')->with('success','Eliminado correctamente');
    }
}
