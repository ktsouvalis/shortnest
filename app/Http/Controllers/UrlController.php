<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\ShowUrlRequest;
use App\Http\Requests\ShortenUrlRequest;

class UrlController extends Controller
{
    public function shorten(ShortenUrlRequest $request)
    {
        $input = $request->validated();
        $url = Url::create([
            'original_url' => $request->original_url,
            'short_url' => Str::random(6),
            'user_id' => $request->user()->id,
        ]);

        return response()->json(['url' => $url], 201);
    }

    public function visit($something){
        $intended = Url::where('short_url', $something)->firstOrFail();
        $intended->increment('clicks');
        return redirect($intended->original_url);
        
    }

    public function index(Request $request)
    {
        $urls = $request->user()->urls()->paginate(10);

        return response()->json([
            'total' => $urls->total(),
            'current_page' => $urls->currentPage(),
            'per_page' => $urls->perPage(),
            'last_page' => $urls->lastPage(),
            'next_page_url' => $urls->nextPageUrl(),
            'prev_page_url' => $urls->previousPageUrl(),
            'urls' => $urls->items(),
        ], 200);
    }

    public function show(ShowUrlRequest $request, $url)
    {
        $url = Url::findOrFail($url);
        return response()->json(['url' => $url], 200);
    }

    public function destroy(Request $request, $url)
    {
        $url = Url::findOrFail($url);
        $url->delete();

        return response()->json(['message' => 'Url deleted'], 200);
    }
}