@extends( 'layouts.main' )
@section( 'content' )
<div>Корзина:</div>

<div>
    <ul>
		@forelse( \Auth::user()->basket as $book )
  {{ dd( $book ) }}
			<li>
			    <a href="/detail/{{ $book->url }}">{{ $book->name }}</a>
			    <p>{{ $book->subhead }}</p>
			</li>
		@empty
			<li>Список книг пока еще не загружен</li>
		@endforelse
    </ul>
</div>


@endsection