<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments( 'id' );
            $table->string( 'name' )
                  ->index();
            $table->timestamps();
        });

        //Заполнение тегов
        \DB::statement( "INSERT INTO `tags` (`name`, `created_at`, `updated_at`) VALUES ( 'Драма', '2017-03-31 00:00:00', '2017-03-31 00:00:00')");
		\DB::statement( "INSERT INTO `tags` (`name`, `created_at`, `updated_at`) VALUES ( 'Мелодрама', '2017-03-31 00:00:00', '2017-03-31 00:00:00')");
		\DB::statement( "INSERT INTO `tags` (`name`, `created_at`, `updated_at`) VALUES ( 'Триллер', '2017-03-31 00:00:00', '2017-03-31 00:00:00')");
		\DB::statement( "INSERT INTO `tags` (`name`, `created_at`, `updated_at`) VALUES ( 'Роман', '2017-03-31 00:00:00', '2017-03-31 00:00:00')");
        \DB::statement( "INSERT INTO `tags` (`name`, `created_at`, `updated_at`) VALUES ( 'Поэма', '2017-03-31 00:00:00', '2017-03-31 00:00:00')");
		\DB::statement( "INSERT INTO `tags` (`name`, `created_at`, `updated_at`) VALUES ( 'Стихи', '2017-03-31 00:00:00', '2017-03-31 00:00:00')");
		\DB::statement( "INSERT INTO `tags` (`name`, `created_at`, `updated_at`) VALUES ( 'Комедия', '2017-03-31 00:00:00', '2017-03-31 00:00:00')");
		\DB::statement( "INSERT INTO `tags` (`name`, `created_at`, `updated_at`) VALUES ( 'Детские книги', '2017-03-31 00:00:00', '2017-03-31 00:00:00')");

        //Pivot теги-книги
        Schema::create('book_tag', function (Blueprint $table) {
            $table->biginteger( 'book_id' )
                  ->index();
            $table->biginteger( 'tag_id' )
                  ->index();
        });

		\DB::statement( "INSERT INTO `book_tag` (`book_id`, `tag_id`) VALUES ( '1', '4' )");
		\DB::statement( "INSERT INTO `book_tag` (`book_id`, `tag_id`) VALUES ( '2', '7' )");
		\DB::statement( "INSERT INTO `book_tag` (`book_id`, `tag_id`) VALUES ( '2', '6' )");
		\DB::statement( "INSERT INTO `book_tag` (`book_id`, `tag_id`) VALUES ( '3', '3' )");
		\DB::statement( "INSERT INTO `book_tag` (`book_id`, `tag_id`) VALUES ( '3', '5' )");
		\DB::statement( "INSERT INTO `book_tag` (`book_id`, `tag_id`) VALUES ( '3', '6' )");
		\DB::statement( "INSERT INTO `book_tag` (`book_id`, `tag_id`) VALUES ( '3', '7' )");
		\DB::statement( "INSERT INTO `book_tag` (`book_id`, `tag_id`) VALUES ( '4', '5' )");
		\DB::statement( "INSERT INTO `book_tag` (`book_id`, `tag_id`) VALUES ( '4', '1' )");
		\DB::statement( "INSERT INTO `book_tag` (`book_id`, `tag_id`) VALUES ( '4', '4' )");
		\DB::statement( "INSERT INTO `book_tag` (`book_id`, `tag_id`) VALUES ( '4', '2' )");
		\DB::statement( "INSERT INTO `book_tag` (`book_id`, `tag_id`) VALUES ( '5', '5' )");
		\DB::statement( "INSERT INTO `book_tag` (`book_id`, `tag_id`) VALUES ( '5', '3' )");
		\DB::statement( "INSERT INTO `book_tag` (`book_id`, `tag_id`) VALUES ( '5', '1' )");
		\DB::statement( "INSERT INTO `book_tag` (`book_id`, `tag_id`) VALUES ( '5', '8' )");
		\DB::statement( "INSERT INTO `book_tag` (`book_id`, `tag_id`) VALUES ( '6', '5' )");
		\DB::statement( "INSERT INTO `book_tag` (`book_id`, `tag_id`) VALUES ( '7', '5' )");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('book_tag');
        Schema::drop('tags');
    }
}
