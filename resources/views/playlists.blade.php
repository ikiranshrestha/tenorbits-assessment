@extends('welcome')
@section('playlists')
@php $videoUrl = "https://www.youtube.com/embed/"; @endphp
        @for ($i = 0; $i < (count($playlistItems['title'])); $i++)
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card" style="">
                        <div class="video-gallery">
                            <a href="javascript:void(0);" class="youtube-link" youtubeid="{{ $playlistItems['videoId'][$i] }}"></a>
                            <iframe width="100%" height="500" src= "{{ $videoUrl.$playlistItems['videoId'][$i] }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title"><strong>{{ $playlistItems['title'][$i] }}</strong></</h5>
                        <p class="card-text h6">{{ $playlistItems['description'][$i] }}</</p>
                        <p class="card-text h6 text-muted">{{ $playlistItems['publishedAt'][$i] }}</</p>
                    </div>
                </div>
            </div>
          </div> 
        </div>
        @endfor

@endsection