@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('/artis') }}">
	@csrf
	<h3>Daftar Track<a id="input" href="{{ url('track/create') }}">+</a></h3>
	<table class="table">
  <thead class="thead-dark">
		<tr>
			<th>ID</th>
			<th>JUDUL LAGU</th>
			<th>ALBUM</th>
			<th>FILE</th>
			<th>HAPUS</th>
		</tr>
		@foreach($rows as $row)
		<tr class="cen">
			<td>{{ $row->track_id }}</td>
			<td>{{ $row->nama_track }}</td>
			<td>{{ $row->album->artis->nama_artis }} - {{ $row->album->nama_album }}</td>
			<td>
				<audio controls>
        			<source src="lagu/{{ $row->file }}" type="audio/mp3">
        		</audio>
			</td>
			<td><form action="{{ url('/track/'.$row->track_id) }}" method="post">
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