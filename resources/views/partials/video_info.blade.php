<div class="video-info" id="videoInfo-{{ $video->id }}" style="display: none;">
    <h5>{{ $video->titulo }}</h5>
    
    <video controls width="100%" height="auto" style="outline: none;">
        <source src="{{ Storage::url($video->link) }}" type="video/mp4">
        Tu navegador no admite la etiqueta de video.
    </video>
    <p>{!! nl2br(e($video->descripcion)) !!}</p>
</div>
