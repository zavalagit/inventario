<table>
    <thead>
       <tr>
         {{-- <th>ID_MUESTRA</th> --}}
         <th>SRT</th>
         <th>RM</th>
         <th>Relationship</th>
         <th>Evidence ID</th>
         <th>Sample Info</th>
         <th>Assay Kit</th>
         
         
          <th>Evidence Description</th>
          
          @foreach($data['muestras'] as $muestra)
             @foreach ($data['orden_marcadores'] as $capturavalor)
                <th>{{$capturavalor->marcadores->LOCUS}}<b> 1</b></th>
                <th>{{$capturavalor->marcadores->LOCUS}}<b> 2</b></th>
             @endforeach
             @break
          @endforeach
       </tr>
    </thead>
            
    <tbody>
       @foreach($data['muestras'] as $muestra)
      
          <tr>
             {{-- <td>{{$muestra->id}}</td> --}}
             <td></td>
             <td></td>
             <td>Victim</td>
             <td>{{ $muestra->Nota }}</td> {{--Aqui debemos de sacar el nuc--}}
             <td>{{ $muestra->muestra }}</td>
             <td>{{ $muestra->kits->descripcion }}</td>
             
             
             <td>{{ $muestra->Nombre }}</td>
             
             @foreach ($data['orden_marcadores'] as $capturavalor)
             @if ($muestra->capturavalores->contains('id_locus',$capturavalor->id_marcador))
                 @if ($muestra->capturavalores->firstWhere('id_locus', $capturavalor->id_marcador)->valor_locus == '')
                         <td class="tdcolorborde">#$</td>
                 @else
                     <td class="tdcolorborde">{{$muestra->capturavalores->firstWhere('id_locus', $capturavalor->id_marcador)->valor_locus}}</td>
                 @endif
                 
                 @if ($muestra->capturavalores->firstWhere('id_locus', $capturavalor->id_marcador)->valor_locus2 == '')
                         <td class="tdcolorborde">#$</td>
                 @else
                     <td class="tdcolorborde">{{$muestra->capturavalores->firstWhere('id_locus', $capturavalor->id_marcador)->valor_locus2}}</td>
                 @endif
                 
                                                     
             @else
             <td class="tdcolorborde"></td>
             <td class="tdcolorborde"></td>
              
                 
             @endif
                 
             @endforeach
          </tr>
      
          @endforeach
    </tbody>
 </table>