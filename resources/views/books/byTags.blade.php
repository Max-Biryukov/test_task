@extends( 'layouts.main' )
@section( 'content' )
<h1 style="text-align:center">Книги по тегу "{{ $tag->name }}"</h1>

<div>
    <ul>
		@forelse( $tag->books as $book )
			<li>
			    <a href="/detail/{{ $book->url }}">{{ $book->name }}</a>
			    <p>{{ $book->subhead }}</p>
			</li>
		@empty
			<li>Список книг пока еще не загружен</li>
		@endforelse
    </ul>
</div>

<div>
    <p><a href="/">К списку книг</a></p>
</div>

@endsection