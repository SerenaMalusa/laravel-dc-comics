    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('comics', function (Blueprint $table) {
                $table->id();
                $table->string('title', 50);
                $table->text('description');
                $table->text('thumb')->nullable();
                $table->float('price', 5, 2)->unsigned();
                $table->tinyText('price_unit');
                // $table->tinyText('price');
                $table->tinyText('series');
                $table->date('sale_date');
                // $table->tinyText('type');
                $table->enum('type', ['comic book', 'graphic novel']);
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('comics');
        }
    };
