@extends( 'layout' )
@section( 'content' )
<div>Список книг:</div>
<div>
    <ul>
		@forelse( $books as $book )
			<li>
			    <a href="/detail/{{ $book->url }}">{{ $book->name }}</a>
			    <p>{{ $book->subhead }}</p>
			</li>
		@empty
			<li>Список книг пока еще не загружен</li>
		@endforelse
    </ul>
</div>

<div>Список тегов:</div>
    <ul>
		@forelse( $tags as $tag )
			<li><a href="/by-tag/{{ $tag->id }}">{{ $tag->name }}</a></li>
		@empty
			<li>Список тегов пока еще не загружен</li>
		@endforelse
    </ul>

@endsection