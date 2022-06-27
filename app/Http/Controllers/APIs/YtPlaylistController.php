<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class YtPlaylistController extends Controller
{
    public static function fetchPlaylists()
    {
        $baseUrl = env('API_BASE_URL');
        $playlistId = env('PLAYLIST_ID');
        $key = env('API_AUTH_KEY');
        $part = env('PART');

        $endPoint = $baseUrl . '?part=' . $part . '&playlistId=' . $playlistId . '&key=' . $key;

        $playlistIitems = self::getPlaylistItems($endPoint); 
        return $playlistIitems;
        
    }

    public function getPlaylistItems($endPoint){
        $response = Http::get($endPoint);

        $title = [];
        $videoId = [];
        $publishedAt = [];
        $description = [];
        $thumbnail = [];
        $channelName = [];
        $channelId = [];

        if($response->status() == 200){
            $response = $response->json();
            $items = $response['items'];
            $channelName = $items[0]['snippet']['channelTitle'];
            $channelId = $items[0]['snippet']['channelId'];

            $c = 0;
            while($c < count($response['items'])){
                $title[] = $items[$c]['snippet']['title'];
                $videoId[] = $items[$c]['snippet']['resourceId']['videoId'];
                $publishedAt[] = substr($items[$c]['snippet']['publishedAt'], 0, 10);
                $thumbnaill = $items[$c]['snippet']['thumbnails']['high']['url'];
                $thumbnail[] = $thumbnaill;
                $description[] = mb_strimwidth($items[$c]['snippet']['description'], 0, 200, '...');
                $c++;
            }

            return [
                'title' => $title,
                'videoId' => $videoId,
                'publishedAt' => $publishedAt,
                'description' => $description,
                'thumbnail' => $thumbnail,
                'videoId' => $videoId,
                'channelName' => $channelName,
                'channelId' => $channelId
            ];
        }
        else{
            return response()->json(['error' => 'Something went wrong']);
        }
    }
}
