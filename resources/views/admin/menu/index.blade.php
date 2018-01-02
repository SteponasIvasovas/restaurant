@extends ('layouts.admin')

@section('content')
<div class="col-md-8">
  <ul class="list-group">
    @foreach($menus as $menu)
    <li class="list-group-item clearfix">
      <div class="pull-left">
        <span>{{ $menu->title }}</span>
      </div>
      <div class="pull-right">
        <a class="btn btn-primary" href="{{route('menu.edit', $menu->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('menu.destroy', $menu->id)}}">Delete</a>
      </div>
    </li>
    @endforeach
    <li class="clearfix" style="list-style: none; margin-top: 20px;">
      <a class="btn btn-success" href="{{route('menu.create')}}">Create</a>
      <a class="btn btn-default" href="{{route('menu.create')}}">Back</a>
    </li>
  </ul>
</div>
@endsection
