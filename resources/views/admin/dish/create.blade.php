@extends ('layouts.admin')

@section('content')
<form class="col-md-8" action="{{route('dish.store')}}" method="post" enctype="multipart/form-data">
  <!-- apsauga -->
  {{ csrf_field() }}
  <div class="form-group">
    <label for="dish_title" class="control-label col-sm-12">Title</label>
    <div class="col-sm-10">
      <input id="dish-title" class="form-control" type="text" name="title" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="dish_description" class="control-label col-sm-12">Description</label>
    <div class="col-sm-10">
      <textarea id="dish-description" class="form-control" type="text" name="description" value=""></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="dish_price" class="control-label col-sm-12">Price</label>
    <div class="col-sm-10">
      <input id="dish-price" class="form-control" type="text" name="price" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="dish_menu_id" class="control-label col-sm-12">Menu ID</label>
    <div class="col-sm-10">
      <select id="dish-menu_id" class="form-control" name="menu_id">
        @foreach ($menus as $menu)
          <option value="{{$menu->id}}">{{$menu->title}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="dish_photo" class="control-label col-sm-12">Image file</label>
    <div class="col-sm-10">
      <input id="dish-photo" class="form-control-file" type="file" name="photo" value="">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-12" style="margin-top: 10px;">
      <button class="btn btn-primary" type="submit" name="button">Create</button>
    </div>
  </div>
</form>
@endsection
