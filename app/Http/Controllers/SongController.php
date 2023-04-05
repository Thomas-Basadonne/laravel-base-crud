<?php

namespace App\Http\Controllers;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SongController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has("term")) {
            $term = $request->get("term");
            $songs = Song::where('name', 'LIKE', "%$term%");
        } else {
            $songs = Song::all();
        }

        return view("songs.index", compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("songs.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validation($request->all());

        $song = new Song;

        $song->fill($data);

        $song->save();

        return redirect()->route("songs.show", $song);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        return view('songs.show', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        return view('songs.edit', compact('song'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        $data = $this->validation($request->all());
        $song->update($data);

        return redirect()->route('songs.show', $song);
    }
            

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $song->delete();

        return redirect()->route("songs.index");
    }


    private function validation($data)
    {

        return Validator::make(
            $data,
            [
        'title' => 'required',
        'album' => 'required',
        'author' => 'required',
        'editor' => 'string',
        'length' => 'required',
        'poster' => 'string'
    ],
    [
        'title.required' => 'Il titolo della canzone è obbligatorio!!',
        'title.string' => 'Il titolo deve essere una stringa!!',
        'album.required' => "Il nome dell'album è obbligatorio!!",
        'album.string' => "Il titolo dell'album deve essere una stringa!!",
        'author.required' => "Il nome dell'autore è obbligatorio!!",
        'author.string' => "Il nome dell'autore deve essere una stringa!!",
        'editor.string' => "Il nome della casa editrice deve essere una stringa!!",
        'length.required' => 'La durata del brano è obbligatoria!!',
        'poster.string' => "L'url deve essere una stringa!!",

    ]
)->validate();


}
}



