<div class="modal fade" id="videoModal-{{ $video->id }}" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel-{{ $video->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel-{{ $video->id }}">{{ $video->titulo }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    Cerrar
                </button>
            </div>
            <div class="modal-body">
                <div class="video-info">
                    
                    <video controls width="100%" height="auto" style="outline: none;">
                        <source src="{{ Storage::url($video->link) }}" type="video/mp4">
                        Tu navegador no admite la etiqueta de video.
                    </video>
                    <p>{!! nl2br(e($video->descripcion)) !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
