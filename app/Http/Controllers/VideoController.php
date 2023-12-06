<?php

namespace App\Http\Controllers;
use App\Tbl_Empleado_SIA;
use App\Sorteo;
use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function video(Request $request)
    {
        $mensaje = "Hola mundo ";
        $Videos = Video::all();
        $descripcionCategorias = [
            'maquinariayEquipos' => 'Maquinaria y Equipos',
            'calidad' => 'Calidad',
            'induccion' => 'Inducción',
            'equiposPesados' => 'Equipos Pesados',

        ];


        return  view('video.video', compact('mensaje', 'Videos', 'descripcionCategorias')); 
    }
    
    public function registroVideo(Request $request)
    {
        $request->validate([
            'tituloVideo' => 'required',
            'descripcionVideo' => 'required',
            'cargaVideo' => 'required|file|mimes:mp4,avi,mov', // Asegúrate de incluir los formatos que necesitas
            'categoria' => 'required' 
        ]);

        $tituloVideo = $request->input('tituloVideo');
        $descripcionVideo = $request->input('descripcionVideo');
        
        // Procesar el archivo de video
        if ($request->hasFile('cargaVideo')) {
            $videoFile = $request->file('cargaVideo');
            $videoPath = $videoFile->store('videos', 'public'); // Cambia 'public' por el disco que desees usar

            $video = new Video();
            $video->titulo = strtoupper($tituloVideo);
            $video->descripcion = $descripcionVideo;
            $video->estatus = "A";
            $video->link = $videoPath; // Asegúrate de tener una columna en tu base de datos para la ruta del video
            $video->categoria = $request->input('categoria'); 
            $video->subcategoria = $request->input('subcategoria'); 
            $video->save();
            //dd($request->all());
            return back()->with('success', 'Todos los datos han sido actualizados correctamente.');
        }

        return back()->with('error', 'El archivo de video es requerido.');
    }

    public function ActualizarEstatus(Request $request, $id) {
        $video = Video::findOrFail($id);
        $video->estatus = $request->input('estatus', 'A'); // Asumiendo 'A' como valor por defecto para "Dar de Alta"
        $video->save();
    
        $mensaje = $video->estatus == 'A' ? 'Video dado de alta.' : 'Video dado de baja.';
        
        return back()->with('status', $mensaje);
    }


    public function videoMostrar(Request $request)
    {
        $mensaje = "Hola mundo";
        $Videos = Video::all();
        return  view('video.videoMostrar', compact('mensaje', 'Videos'));  
    }







    // apartado para las 4 secciones 
    public function maquinariayEquipos(Request $request)
    {
        $mensaje = "Maquinaria y Equipos";
        $Videos = Video::where('categoria', 'maquinariayEquipos')->get();
        //dd($Videos);
        $subcategorias = Video::where('categoria', 'maquinariayEquipos')
                ->where('estatus', 'A')
                ->select('subcategoria')
                ->distinct()
                ->get();

        $videosPorSubcategoria = [];
        $descripcionesSubcategorias = [
            'partesAgujaColocacion' => 'Partes de Aguja y Colocación',
            'tensiones' => 'Tesiones',
            'partes' => 'Partes',
            'enhebrado' => 'enhebrado',
        ];
        foreach ($subcategorias as $subcategoria) {
        $videosPorSubcategoria[$subcategoria->subcategoria] = Video::where('categoria', 'maquinariayEquipos')
                                                        ->where('estatus', 'A')
                                                        ->where('subcategoria', $subcategoria->subcategoria)
                                                        ->get();
        }

        return  view('video.maquinariayEquipos', compact('mensaje', 'Videos', 'videosPorSubcategoria', 'descripcionesSubcategorias'));  
    }



    public function metodos(Request $request)
    {
        $mensaje = "Metodos";
        $Videos = Video::where('categoria', 'metodos')->get();
        return  view('video.metodos', compact('mensaje', 'Videos'));  
    }
    public function calidad(Request $request)
    {
        $mensaje = "Calidad";
        $Videos = Video::where('categoria', 'calidad')->get();
        return  view('video.calidad', compact('mensaje', 'Videos'));  
    }
    public function induccion(Request $request)
    {
        $mensaje = "Inducción";
        $Videos = Video::where('categoria', 'induccion')->get();
        return  view('video.induccion', compact('mensaje', 'Videos'));  
    }

}
