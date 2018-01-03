@extends ('layouts.admin')

@section('content')
<div class="col-md-8">
  @if (session('message'))
    <p class="alert alert-info">{{ session('message') }}</p>
  @endif
  <ul class="list-group">
    @foreach($menus as $menu)
    <li class="list-group-item clearfix">
      <div class="pull-left">
        <span>{{ $menu->title }}</span>
      </div>
      <div class="pull-right">
        <a class="btn btn-primary" href="{{route('menu.edit', $menu)}}" style="margin-right: 5px;">Edit</a>
        <form action="{{ route('menu.destroy', $menu) }}" method="POST"
         style="display: inline"
         onsubmit="return confirm('Are you sure?');">
          {{ csrf_field() }}
          {{ method_field('delete') }}
          <button class="btn btn-danger pull-right">Delete</button>
        </form>
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
