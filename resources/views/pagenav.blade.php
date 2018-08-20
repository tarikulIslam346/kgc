                  <ul>
              
                    @if(isset($submenulist))
                    
                    @foreach($submenulist as $nav)
                    
                       @for($i=0;$i<count($nav->submenulist);$i++)

                       @php 

                       $var = \App\Submenu::where('name',$nav->submenulist[$i])->get();

                     
                        @endphp

                       @foreach($var as $v)

                      <li class="text-center active">

                        <a href="/{{$nav->submenulist[$i]}}/{{$v->id}}/{{$nav->menu}}" id="loadcontent">

                          {{$nav->submenulist[$i]}}
                          
                        </a>

                      </li>

                      @endforeach

                      @endfor

                      @endforeach

                      @endif

                    </ul>