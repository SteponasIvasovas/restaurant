@extends ('layouts.admin')

@section('content')
<form class="" action="{{route('dish.store')}}" method="post">
  <!-- apsauga -->
  {{ csrf_field() }}
  <div class="form-group">
    <label for="dish_title" class="control-label col-sm-2">Title</label>
    <div class="col-sm-10">
      <input id="dish-title" class="form-control" type="text" name="title" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="dish_photo" class="control-label col-sm-2">Photo</label>
    <div class="col-sm-10">
      <input id="dish-photo" class="form-control" type="text" name="photo" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="dish_description" class="control-label col-sm-2">Description</label>
    <div class="col-sm-10">
      <input id="dish-description" class="form-control" type="text" name="description" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="dish_price" class="control-label col-sm-2">Price</label>
    <div class="col-sm-10">
      <input id="dish-price" class="form-control" type="text" name="price" value="">
    </div>
  </div>
  <div class="form-group">
    <label for="dish_menu_id" class="control-label col-sm-2">Menu ID</label>
    <div class="col-sm-10">
      <input id="dish-menu_id" class="form-control" type="text" name="menu_id" value="">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2">
      <button class="btn btn-primary" type="submit" name="button">Create</button>
    </div>
  </div>
</form>
@endsection
