<?php $no = 0;?>
@foreach($data as $value)
<?php $no++ ?>
<tr>
  <th scope="row">{{$no}}</th>
  <td>{{ $value->buku->judul }}</td>
  <td>{{ $value->buku->penulis }}</td>
  <td>{{ $value->buku->rak->nama }}</td>
</tr>
@endforeach