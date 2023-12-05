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
        return  view('video.video', compact('mensaje', 'Videos')); 
    }
    
    public function registroVideo(Request $request)
    {
        $request->validate([
            'tituloVideo' => 'required',
            'descripcionVideo' => 'required',
            'cargaVideo' => 'required|file|mimes:mp4,avi,mov' // Asegúrate de incluir los formatos que necesitas
        ]);

        $tituloVideo = $request->input('tituloVideo');
        $descripcionVideo = $request->input('descripcionVideo');
        
        // Procesar el archivo de video
        if ($request->hasFile('cargaVideo')) {
            $videoFile = $request->file('cargaVideo');
            $videoPath = $videoFile->store('videos', 'public'); // Cambia 'public' por el disco que desees usar

            $video = new Video();
            $video->titulo = $tituloVideo;
            $video->descripcion = $descripcionVideo;
            $video->estatus = "A";
            $video->link = $videoPath; // Asegúrate de tener una columna en tu base de datos para la ruta del video
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
        $mensaje = "Hola mundo ";
        $Videos = Video::all();
        return  view('video.video', compact('mensaje', 'Videos')); 
    }

}
