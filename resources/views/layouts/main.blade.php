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

        @if( $warning = \Session::get('warning') )
            <div style="color: #900; font-weight:bold">{{ $warning }}</div>
        @endif

        @if( $message = \Session::get('message') )
            <div style="color: #090; font-weight:bold">{{ $message }}</div>
        @endif

        @yield( 'content' )
    </body>
</html>