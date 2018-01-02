@extends ('layouts.admin')

@section('content')
<div class="col-md-8">
  <ul>
    @foreach($menus as $menu)
    <li>{{ $menu->title }}</li>
    @endforeach
  </ul>
  <a href="{{route('menu.create')}}">Create</a>
  <a href="{{route('menu.edit', $menu->id)}}">Edit</a>
</div>
@endsection
