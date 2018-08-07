@extends('layouts.master')

@section('content')
<!--designe-->

<!--designe-->
<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-6">

<div class="card">
	 <div class="card-body">
	 	
	 	 <form action="/create_menu" method="POST">
	 	 	@csrf
  			<div class="input-group mb-3">
    			<div class="input-group-prepend">
      				<span class="input-group-text">Add menu title here</span>
    			</div>

    			<input type="text" class="form-control" name="name" placeholder="Title">

    			<button type="submit" class="btn btn-success" style="border-radius:25px;"><i class="fa fa-plus"></i></button>

  			</div>

          
		</form>

		
         
		
	
		  <table class="table table-dark">
    <thead>
      <tr>
       
        <th>Navigation name</th>
        <th>Delete</th>
        <th> Edit</th>
       
      </tr>
    </thead>
    <tbody>
   @if(isset($menus))
    @foreach($menus as $menu)
      <tr>
     
        <td>{{ $menu->name }}</td>
        <td><a href="/delete_menu/{{ $menu->id }}" class="btn btn-primary"><i class="fa fa-minus-square"></i></a></td>
         <td><a href="" class="btn btn-primary" id="edit"><i class="fa fa-edit"></i></a></td>
      </tr>
      @endforeach
      @endif
   

      
    </tbody>
  </table>
	</div>
</div>
</div>
<div class="col-sm-4">


</div>
</div>

<script>

$('#edit').click(function() {

      // Initialize the plugin
     alert("Helo");

    });
</script>
@endsection