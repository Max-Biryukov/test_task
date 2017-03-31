@extends( 'layouts.main' )
@section( 'content' )
<div>Корзина:</div>

<div>
    <ul>
		@forelse( \Auth::user()->basket as $book )
			<li>
			    <a href="/detail/{{ $book->url }}">{{ $book->name }}</a>
			    <p>{{ $book->subhead }}</p>
                <p><a href="/basket/remove/{{ $book->id }}">Удалить из корзины</a></p>
			</li>
		@empty
			<li>Ваша корзина пуста. Перейдите в <a href="/">каталог</a></li>
		@endforelse
    </ul>
</div>

<div>
    <p><a href="/">К списку книг</a></p>
</div>

@endsection