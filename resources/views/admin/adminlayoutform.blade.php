@extends('layouts.master')

@section('content')

<!--designe-->   
                   
       
                  
                    <div class="container">
                      <h1>Upload image here</h1>
                      <hr>
                    @if(isset($choices))
                    @foreach($choices as $choice)

                  @if($choice->choice == "Heigher Commitee")

                  <form action="/heigher/{{$choice->submenu_id}}" method="POST" enctype="multipart/form-data">

                      @csrf
                 {{--        <label class="sr-only" for="inlineFormInputName2">Heading</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" 
                        id="inlineFormInputName2" placeholder="Jane Doe" name="heading">

                        <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                        <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text">Paragraph</div>
                          </div>
                          <input type="text" class="form-control" id="inlineFormInputGroupUsername2" 
                          placeholder="Username" name="paragraph">
                        </div> --}}
                       <input type="file" name="avatar">
                       
                        

                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                      {{--    @foreach($var as $v)
                        {{$v->name}}
                        @endforeach --}}
                      </form>
                   {{--    @endforeach --}}
                   @endif
                   @endforeach
                   @endif
                   </div> 
                   

<!--designe-->

@endsection