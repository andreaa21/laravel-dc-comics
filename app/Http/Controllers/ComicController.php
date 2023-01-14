<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::paginate(4);
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:100|min:2',
                'image' => 'max:255|min:10',
                'price' => 'required|max:10|min:2',
                'series' => 'required|max:100|min:2',
                'sale_date' => 'required|max:20|min:2',
                'type' => 'required|max:20|min:2',
            ],
            [
                'title.required' => 'il titolo è un campo obbligatorio',
                'title.max' => 'il titolo deve avere al massimo :max caratteri',
                'title.min' => 'il titolo deve avere minimo :min caratteri',
                'image.max' => 'la URL dell\' immagine deve avere al massimo :max caratteri',
                'image.min' => 'la URL dell\' immagine deve avere minimo :min caratteri',
                'price.required' => 'il prezzo è un campo obbligatorio',
                'price.max' => 'il prezzo deve avere al massimo :max caratteri',
                'price.min' => 'il prezzo deve avere minimo :min caratteri',
                'series.required' => 'la serie è un campo obbligatorio',
                'series.max' => 'la serie deve avere al massimo :max caratteri',
                'series.min' => 'la serie deve avere minimo :min caratteri',
                'sale_date.required' => 'la data di vendita è un campo obbligatorio',
                'sale_date.max' => 'la data di vendita deve avere al massimo :max caratteri',
                'sale_date.min' => 'la data di vendita deve avere minimo :min caratteri',
                'type.required' => 'il genere è un campo obbligatorio',
                'type.max' => 'il genere deve avere al massimo :max caratteri',
                'type.min' => 'il genere deve avere minimo :min caratteri'
            ]
        );


        $form_data = $request->all();

        $new_comic = new Comic();
        $form_data['slug'] = Comic::generateSlug($form_data['title']);
        $new_comic->fill($form_data);
        $new_comic->save();

        return redirect()->route('comics.show', $new_comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::findorfail($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $form_data = $request->all();

        if ($form_data['title'] != $comic->title) {
            $form_data['slug'] = Comic::generateSlug($form_data['title']);
        } else {
            $form_data['slug'] = $comic->slug;
        }

        $comic->update($form_data);

        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index')->with('deleted', "Il fumetto $comic->title è stato eliminato correttamente");
    }
}
