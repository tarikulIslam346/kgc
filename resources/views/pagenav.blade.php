          <ul>
              
                    @if(isset($menu))
                    
                    @foreach($menu->submenus as $submenu)
                    
                     {{--   @for($i=0;$i<count($nav->submenulist);$i++)
                       @php 
                       $var = \App\Submenu::where('name',$nav->submenulist[$i])->get();
                     
                        @endphp
 --}}
                      {{--  @foreach($var as $v) --}}

                      <li class="text-center">

                        <a href="/navigation/{{$submenu->name}}/{{$submenu->id}}/{{$menu->id}}" id="loadcontent">

                          {{$submenu->name}}
                          
                        </a>

                      </li>

             {{--          @endforeach
                      @endfor --}}

                      @endforeach

                      @endif

</ul>