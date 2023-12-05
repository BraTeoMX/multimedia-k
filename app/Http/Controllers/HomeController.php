<?php

namespace App\Http\Controllers;

use App\Formato_P07;

use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
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
        $mensaje = "Hola Mundo"; 
        $tarjetas = [
            [
                'titulo' => 'Gestión de Videos',
                'descripcion' => 'Añade y gestiona tus videos.',
                'icono' => 'fas fa-video',
                'ruta' => 'video.video',
                'textoBoton' => 'Ir a Videos'
            ],
            [
                'titulo' => 'Visualizar Videos',
                'descripcion' => 'Reproduce y explora la lista de videos.',
                'icono' => 'fas fa-play-circle',
                'ruta' => 'video.videoMostrar',
                'textoBoton' => 'Ver Videos'
            ],
            [
                'titulo' => 'Inicio',
                'descripcion' => 'Parte para visualizar los videos .',
                'icono' => 'fas fa-video',
                'ruta' => 'home',
                'textoBoton' => 'Inicio'
            ],
            // Añade más elementos según sea necesario
        ];

        return view('inicio', compact('mensaje', 'tarjetas'));
    }


}
