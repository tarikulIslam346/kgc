@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-6">
<div class="card">
	 <div class="card-body">
 <form action="/store" method="POST">
 	@csrf
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" name="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="password" class="form-control" id="pwd">
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 
</div>
</div>
</div>
</div>

@endsection