@extends ('layouts.admin')

@section('content')
<form class="col-md-8" action="{{route('menu.update', $menu)}}" method="post">
  <!-- apsauga -->
  {{ csrf_field() }}
  {{ method_field('put') }}
  <div class="form-group">
    <label for="menu-title" class="control-label col-sm-12">Title</label>
    <div class="col-sm-10 ">
      <input id="menu-title" class="form-control" type="text" name="title" value="{{ $menu->title }}">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-12">
      <button class="btn btn-primary" type="submit" name="button" style="margin-top: 10px;">Edit</button>
    </div>
  </div>
</form>
@endsection
