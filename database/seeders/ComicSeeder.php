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

        foreach ($records as $record) {
            $comic = new Comic;
            $comic->fill($record);
            $comic->save();
        };
    }
}
