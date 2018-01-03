@extends ('layouts.admin')

@section('content')
<form class="col-md-8" action="{{route('menu.store')}}" method="post">
  <!-- apsauga -->
  {{ csrf_field() }}
  <div class="form-group">
    <label for="menu_title" class="control-label col-sm-12">Title</label>
    <div class="col-sm-10">
      <input id="menu-title" class="form-control" type="text" name="title" value="">
    </div>
  </div>
  <div class="form-group" >
    <div class="col-sm-12" style="margin-top: 10px;">
      <button class="btn btn-primary" type="submit" name="button">Create</button>
    </div>
  </div>
</form>
@endsection
