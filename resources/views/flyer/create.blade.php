@extends('layouts.app')

@section('content')
	<h1>Selling Your Home ?</h1>
	<hr>
	
		<form action="{{ route('flyers.store') }}" method="POST" enctype="multipart/form-data">
			@include('flyer.form')
		</form>
	
@stop