@if ($item["submenu"] == [])
    <li class="{{getMenuActivo($item["url"])}}">
        <a href="{{url($item['url'])}}" >
          <i class="fa {{$item["icono"]}}"></i> <span>{{$item["titulo"]}}</span>
        </a>
    </li>
@else
    <li>
        <a href="#{{$item["titulo"]}}" data-toggle="collapse" aria-expanded="false">
          <i class="fa {{$item["icono"]}}"></i> <span>{{$item["titulo"]}}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left float-right"></i>
          </span>
        </a>
        <ul class="collapse" id="{{$item["titulo"]}}">
            @foreach ($item["submenu"] as $submenu)
                @include("menu-item", ["item" => $submenu])
            @endforeach
        </ul>
    </li>
@endif