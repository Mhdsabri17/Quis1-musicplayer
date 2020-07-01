@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('/artis') }}">
	@csrf
	<h3>Daftar Album<a id="input" href="{{ url('track/create') }}">+</a></h3>
	<table class="table">
  <thead class="thead-dark">
  <th scope="col">ID</th>
  <th scope="col">>NAMA ALBUM</th>
  <th scope="col">NAMA ARTIS</th>
  <th scope="col">Update</th>
  <th scope="col">Delete</th>
		</tr>
		@foreach($rows as $row)
		<tr>
			<td>{{ $row->album_id }}</td>
			<td>{{ $row->nama_album }}</td>
			<td>{{ $row->artis->nama_artis }}</td>
			<td><a href="{{ url('album/' . $row->id . '/edit')}}" class="btn btn-outline-warning">Update</a</td>
			<td><form action="{{ url('/album/'.$row->album_id) }}" method="post">
				<input type="hidden" name="_method" value="DELETE">
				@csrf
				<button class="btn btn-outline-danger">DELETE</button>
			</form></td>
		</tr>
		@endforeach 
		</tbody>
</table>
  
</div>
@endsection