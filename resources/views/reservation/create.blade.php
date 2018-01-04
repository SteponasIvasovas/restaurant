@extends ('layouts.app')

@section('content')



<div class="container">
  <form id="reservation-form" class="col-md-8" action="{{route('reservation.store')}}" method="post" enctype="multipart/form-data" style="padding-left: 0;">
    <h2>Reservation</h2>
    @if ($errors->count() > 0)
      <ul style="padding-left: 0px;">
        @foreach($errors->all() as $error)
          <li class="alert alert-info" style="list-style: none;">{{ $error }}</li>
        @endforeach
      </ul>
    @endif
    <!-- apsauga -->
    {{ csrf_field() }}
    <div class="form-group">
      <label for="reservation_person_count" class="control-label col-sm-12">Person count</label>
      <div class="col-sm-10">
        <input id="reservation-person_count" class="form-control" type="number" name="person_count" value="">
      </div>
    </div>
    <div class="form-group">
      <label for="reservation_time" class="control-label col-sm-12">Time</label>
      <div class="col-sm-10">
        <input id="reservation-time" class="form-control" type="time" name="time" value="">
      </div>
    </div>
    <div class="form-group">
      <label for="reservation_date" class="control-label col-sm-12">Date</label>
      <div class="col-sm-10">
        <input id="reservation-date" class="form-control" type="date" name="date" value="">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12" style="margin-top: 10px;">
        <button class="btn btn-primary" type="submit" name="button">Submit</button>
      </div>
    </div>
  </form>
</div>
@endsection
