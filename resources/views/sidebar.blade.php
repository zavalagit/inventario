        

        <div id="dismiss">
            <i class="fa fa-angle-double-left"></i>
        </div>

        <div class="sidebar-header">
            <h3>Sistema Inventario</h3>
        </div>

        <ul class="sidebar-menu">
            {{--  <li>
                
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"><i style="color:rgb(24, 24, 231);" class="fas fa-dna"></i>&nbsp&nbspMuestras ADN</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="/muestras">TODOS</a>
                    </li>
                    <li>
                        <a href="/kit">POR KIT</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>  --}}
            
            <li>
                
                @foreach ($menusComposer as $key => $item)
                    @if ($item["menu_id"] != 0)
                        @break
                    @endif
                    @include("menu-item", ["item" => $item])
                @endforeach
            </li>
            
            <li>
                <a href="{{route('logout')}}">Salir</a>
            </li>
            {{-- <li>
                <a href="#">Contact</a>
            </li> --}}
        </ul>


