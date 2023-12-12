<?php

namespace App\Http\Controllers;

use App\Formato_P07;

use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Support\Carbon;


use DB;


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
     * Show the application.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $categorias = Categoria::where('estatus', 'A') // Filtra las categorías con estatus 'A'
        ->with(['subcategorias' => function ($query) {
            $query->where('estatus', 'A'); // Filtra las subcategorías con estatus 'A'
        }, 'subcategorias.videos' => function ($query) {
            $query->where('estatus', 'A'); // Filtra los videos con estatus 'A'
        }])->get();


        return view('inicio', compact('categorias'));
    }


}
