<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::paginate(10);
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
        $data = $this->validation($request->all());
        $comic = new Comic;
        $comic->fill($data);
        $comic->save();

        return redirect()->route('comics.show', $comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
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
        $data = $this->validation($request->all());
        $comic->update($data);

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
        return redirect()->route('comics.index');
    }

    public function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'title' => 'required|string|max:50',
                'description' => 'required',
                'thumb' => 'nullable|string',
                'price' => "required|numeric|between:1,100",
                'price_unit' => 'required|in:$,€',
                'series' => 'required|string',
                'sale_date' => 'required|date',
                'type' => 'required|in:comic book,graphic novel'
            ],
            [
                'title.required' => 'the title is mandatory',
                'title.string' => 'the title must be a string',
                'title.max' => 'the character limit for the title is 50',

                'description.required' => 'the description is mandatory',

                'thumb.string' => 'the title must be a string',

                'price.required' => 'the price is mandatory',
                'price.numeric' => 'the price must be a number',
                'price.between' => 'the price must be between 1 and 100',

                'price_unit.required' => 'the price unit is mandatory',
                'price_unit.in' => 'the price unit must be $ or €',

                'series.required' => 'the serie is mandatory',
                'series.string' => 'the serie must be a string',

                'sale_date.required' => 'the sale_date is mandatory',
                'sale_date.date' => 'the sale_date must be a date',

                'type.required' => 'the type is mandatory',
                'type.in' => "the type must be 'comic book' or 'graphic novel'"

            ]
        )->validate();

        return $validator;
    }
}
