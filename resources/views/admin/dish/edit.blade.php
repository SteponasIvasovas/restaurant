{{ method_field('put') }}
@extends ('layouts.admin')

@section('content')


<form class="col-md-8" action="{{route('dish.update', $dish)}}" method="post" enctype="multipart/form-data">
  @if ($errors->count() > 0)
    <ul style="padding-left: 0px;">
      @foreach($errors->all() as $error)
        <li class="alert alert-info" style="list-style: none;">{{ $error }}</li>
      @endforeach
    </ul>
  @endif
  <!-- apsauga -->
  {{ csrf_field() }}
  {{ method_field('put') }}
  <div class="form-group">
    <label for="dish_title" class="control-label col-sm-12">Title</label>
    <div class="col-sm-10">
      <input id="dish-title" class="form-control" type="text" name="title" value="{{$dish->title}}">
    </div>
  </div>
  <div class="form-group">
    <label for="dish_description" class="control-label col-sm-12">Description</label>
    <div class="col-sm-10">
      <textarea id="dish-description" class="form-control" type="text" name="description" value="">{{$dish->description}}</textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="dish_price" class="control-label col-sm-12">Price</label>
    <div class="col-sm-10">
      <input id="dish-price" class="form-control" type="text" name="price" value="{{$dish->price}}">
    </div>
  </div>
  <div class="form-group">
    <label for="dish-menu_id" class="control-label col-sm-12">Menu ID</label>
    <div class="col-sm-10">
      <select id="dish-menu_id" class="form-control" name="menu_id">
        @foreach ($menus as $menu)
          <option value="{{$menu->id}}" @if($menu->id == $dish->menu_id) selected @endif>{{$menu->title}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="dish-photo-old" class="control-label col-sm-12">Current image</label>
    <div class="col-sm-10">
      <img src="/storage/images/{{$dish->photo}}" alt="no-image-available" style="max-height: 100px;">
      <input id="dish-photo-old" class="form-control-file" type="hidden" name="photo-old" value="{{$dish->photo}}">
    </div>
  </div>
  <div class="form-group">
    <label for="dish-photo" class="control-label col-sm-12">Change image file</label>
    <div class="col-sm-10">
      <input id="dish-photo" class="form-control-file" type="file" name="photo" value="">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-12" style="margin-top: 10px;">
      <button class="btn btn-primary" type="submit" name="button">Update</button>
    </div>
  </div>
</form>
@endsection
