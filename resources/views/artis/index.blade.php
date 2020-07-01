@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('/artis') }}">
	@csrf
	<h3>Daftar Artis<a id="input" href="{{ url('track/create') }}">+</h3>
	<table class="table">
    <thead class="thead-dark">
		<tr>
			<th>ID</th>
			<th>NAMA ARTIS</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
		@foreach($rows as $row)
		<tr>
			<td>{{ $row->artis_id }}</td>
			<td>{{ $row->nama_artis }}</td>
			<td><a href="{{ url('artis/' . $row->id . '/edit')}}" class="btn btn-outline-warning">Update</a</td>
			<td><form action="{{ url('/artis/'.$row->artis_id) }}" method="post">
				<input  type="hidden" name="_method" value="DELETE">
				@csrf
				<button class="btn btn-outline-danger">DELETE</button>
			</form></td>
		</tr>
		@endforeach 
		</tbody>
</table>

</div>
@endsection