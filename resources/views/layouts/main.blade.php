<!DOCTYPE html>
<html>
    <head>
	    <meta charset="utf-8">
        <title>Тестовое задание</title>
    </head>
    <body>
        @if( \Auth::check() )
            <div style="text-align:right">
                <a href="">Корзина</a>
                <a href="/logout">Выйти</a>
            </div>
        @endif
        @yield( 'content' )
    </body>
</html>