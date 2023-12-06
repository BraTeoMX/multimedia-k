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
                'titulo' => 'MAQUINARIA Y EQUIPOS',
                'descripcion' => 'Añade y gestiona tus videos.',
                'icono' => 'fas fa-video',
                'ruta' => 'video.maquinariayEquipos',
                'textoBoton' => 'Acceder'
            ],
            [
                'titulo' => 'METODOS',
                'descripcion' => 'Reproduce y explora la lista de videos.',
                'icono' => 'fas fa-play-circle',
                'ruta' => 'video.metodos',
                'textoBoton' => 'Acceder'
            ],
            [
                'titulo' => 'CALIDAD',
                'descripcion' => 'Parte para visualizar los videos .',
                'icono' => 'fas fa-video',
                'ruta' => 'video.calidad',
                'textoBoton' => 'Acceder'
            ],
            [
                'titulo' => 'INDUCCIONES',
                'descripcion' => 'Parte para visualizar los videos .',
                'icono' => 'fas fa-video',
                'ruta' => 'video.induccion',
                'textoBoton' => 'Acceder'
            ],
            
            // Añade más elementos según sea necesario
        ];

        return view('inicio', compact('mensaje', 'tarjetas'));
    }


}
