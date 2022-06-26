<section class="py-2 text-center container">
    <div class="row py-lg-2">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Youtube Playlist</h1>
        <p class="lead text-muted">This is a YouTube Playlist Project based on Youtube PlaylistItems API by Google. For this demonstration I've considered the channel: <a href="https://www.youtube.com/channel/{{ $playlistItems['channelId'] }}">
            <strong>{{ $playlistItems['channelName'] }}</strong></a>.</p>
            <p class ="h6 text-muted">Playlist Used: <a href="https://www.youtube.com/playlist?list={{ env('PLAYLIST_ID') }}">
                <strong>.NET Interview Questions</strong></a></p>
        <p class ="h6 text-muted">Attempted By: {{ env('DEVELOPER') }}</p>
      </div>
    </div>
  </section>
