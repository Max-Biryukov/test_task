@extends( 'layout' )
@section( 'content' )
<div>Список книг:</div>
<div>
	@forelse( $books as $book )
		<p><a href="/detail/{{ $book->url }}">{{ $book->name }}</a></p>
	@empty
		<div>Список книг пока еще не загружен</div>
	@endforelse
</div>
<div>Список тегов:</div>
@endsection