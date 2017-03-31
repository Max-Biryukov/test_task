@extends( 'layout' )
@section( 'content' )
<div>Список книг:</div>
<div>
    <ul>
		@forelse( $books as $book )
			<li><a href="/detail/{{ $book->url }}">{{ $book->name }}</a></li>
		@empty
			<li>Список книг пока еще не загружен</li>
		@endforelse
    </ul>
</div>

<div>Список тегов:</div>
    <ul>
		@forelse( $tags as $tag )
			<li><a href="">{{ $tag->name }}</a></li>
		@empty
			<li>Список тегов пока еще не загружен</li>
		@endforelse
    </ul>
<?php

    for( $i=1; $i<8; $i++ ){
    	$num = rand( 1, 4 );
        for( $j=0; $j<$num; $j++ ){
        	$tag = rand( 1, 8 );
        	 echo "<p>\DB::statement( \"INSERT INTO `books_tags` (`book_id`, `tag_id`) VALUES ( '".$i."', '".$tag."' )\");</p>";
        }
    }
?>


@endsection