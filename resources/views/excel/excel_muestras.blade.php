@foreach($data as $muestra)
<table>
   <thead>
     
      <tr>
         <th>MUESTRA</th>
         <th>NOMBRE</th>
         <th>KIT</th>
         @foreach ($muestra->capturavalores as $capturavalor)
                                        <th>{{$capturavalor->marcadores->LOCUS}}<b> 1</b></th>
                                        <th>{{$capturavalor->marcadores->LOCUS}}<b> 2</b></th>
                                        @endforeach
      </tr>
   </thead>
   <tbody>
     
     
         <tr>
            
            <td>{{ $muestra->muestra }}</td>
            <td>{{ $muestra->Nombre }}</td>
            <td>{{ $muestra->kits->descripcion }}</td>
               @foreach ($muestra->capturavalores as $capturavalor)
                              <td>{{$capturavalor->valor_locus}}</td>
                              <td>{{$capturavalor->valor_locus2}}</td>
               @endforeach
         </tr>
     
   </tbody>
</table>
@endforeach