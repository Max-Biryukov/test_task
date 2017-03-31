@extends( 'layout' )
@section( 'content' )
<h1 style="text-align:center">Книга "{{ $book->name }}"</h1>
<img src="/images/{{ $book->picture }}" />
<p style="text-align:justify">{{ $book->description }}</p>
@if( $book->on_offer )
    <a href="">Купить</a>
@else
    <a href="">Подписаться</a>
@endif
<div>
    <p>Теги:</p>
    <ul>
		@forelse( $book->tags as $tag )
			<li><a href="">{{ $tag->name }}</a></li>
		@empty
			<li>Теги отсутствуют</li>
		@endforelse
	</ul>
</div>
<div>
    <p><a href="/">К списку книг</a></p>
</div>
@endsection