<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Post;
use App\Map;
use View;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $tag = $request->query('tag');
        $data['maps']  = Map::where('tags', 'LIKE', '%'.$tag.'%')->get();
        $data['posts'] = Post::where('tags', 'LIKE', '%'.$tag.'%')->get();
        $data['tag']   = $tag; 

        return view('tags.index', $data);
    }

    public function tags(Request $request)
    {
        $tags = array_merge(Post::where('tags', '!=', '')->pluck('tags')->toArray(), Map::where('tags', '!=', '')->pluck('tags')->toArray());

        $tags_array = [];

        foreach ($tags as $tag) {
          $tags_array[] = explode(",", $tag);
        }

        $all_tags = array_count_values(array_reduce($tags_array, 'array_merge', array()));

        arsort($all_tags);

        $rec = $request->rec + 5;

        $more = $rec >= count($all_tags) ? false : true;

        $all_tags = array_slice($all_tags, 0, $rec, true);

        return View::make('common.tags', ['tags' => $all_tags, 'rec' => $rec, 'more' => $more]);
    }
}
