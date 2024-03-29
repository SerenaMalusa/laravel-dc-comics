<?php

namespace Database\Seeders;

use App\Models\Comic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $records = config('comics');
        // dd($comics);

        foreach ($records as $i => $record) {
            // $price_num = substr($record['price'], 1);
            // $price_unit = substr($record['price'], 0, 1);
            // var_dump($i, $price_num, $price_unit);

            $comic = new Comic;
            $comic->title = $record['title'];
            $comic->description = $record['description'];
            $comic->thumb = $record['thumb'];
            $comic->price = substr($record['price'], 1);
            $comic->price_unit = substr($record['price'], 0, 1);
            $comic->series = $record['series'];
            $comic->sale_date = $record['sale_date'];
            $comic->type = $record['type'];

            // $comic->fill($record);
            $comic->save();
        };
    }
}
