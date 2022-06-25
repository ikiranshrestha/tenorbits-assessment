<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ env('APP_NAME') }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>


    <section class="py-2 text-center container">
        <div class="row py-lg-2">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Youtube Playlist</h1>
            <p class="lead text-muted">This is a YouTube Playlist Project based on Youtube PlaylistItems API by Google. For this demonstration I've considered the channel: <a href="https://www.youtube.com/channel/{{ $playlistItems['channelId'] }}">
                <strong>{{ $playlistItems['channelName'] }}</strong></a>.</p>
                <p class ="h6 text-muted">Playlist Used: <a href="https://www.youtube.com/playlist?list={{ env('PLAYLIST_ID') }}">
                    <strong>DP Series - by Babbar</strong></a></p>
            <p class ="h6 text-muted">Attempted By: {{ env('DEVELOPER') }}</p>
          </div>
        </div>
      </section>

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
	
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('files/youtube-popup.css') }}">
<link rel="stylesheet" href="{{ asset('files/grt-youtube-popup.css') }}">
<script src="{{ asset('files/grt-youtube-popup.js') }}"></script>
<script type="text/javascript">
	$(".youtube-link").grtyoutube({
		autoplay:true,
		theme:"dark"
	});
</script>

</body>
</html>
