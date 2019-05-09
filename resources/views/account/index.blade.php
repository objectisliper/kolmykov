<h2>Дообро пожаловать, {{\Auth::user()->email}}</h2>
<br>
@if(\Auth::user()->isAdmin == 1)
    <a href="{{route('admin')}}">Админка</a>
@endif
<br>
<a href="{{ route('logout') }}">Выйти</a>