@extends( 'layouts.main' )
@section( 'content' )
<div>Список пожеланий:</div>

<div>
    <ul>
		@forelse( \Auth::user()->wish_list as $book )
			<li>
			    <a href="/detail/{{ $book->url }}">{{ $book->name }}</a>
			    <p>{{ $book->subhead }}</p>
                <p><a href="/wish-list/remove/{{ $book->id }}">Удалить из списка пожеланий</a></p>
			</li>
		@empty
			<li>Ваша список пожеланий пуст. Перейдите в <a href="/">каталог</a></li>
		@endforelse
    </ul>
</div>

<div>
    <p><a href="/">К списку книг</a></p>
</div>

@endsection