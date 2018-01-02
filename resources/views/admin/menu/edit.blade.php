@extends ('layouts.admin')

@section('content')
<form class="" action="{{route('menu.store')}}" method="post">
  <!-- apsauga -->
  {{ csrf_field() }}
  <div class="form-group">
    <label for="menu_title" class="control-label col-sm-2">Title</label>
    <div class="col-sm-2">
      <input id="menu-title" class="form-control" type="text" name="menu_title" value="{{ $menu->title }}">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <button class="btn btn-primary" type="submit" name="button">Edit</button>
    </div>
  </div>
</form>
@endsection
