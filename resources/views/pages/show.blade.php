@extends('layout')
<title>display</title>
@section('content')


<h1>showing all the students in different sections</h1>

<div class="container">
	<div class="row">
		<div class="col-xs-2">

			@if(isset($var1))
			<h2>In Section 1</h2>
			@foreach($var1 as $name)
			<P>{{$name->name}}</P><br>
			@endforeach
			@endif

		</div>

		<div class="col-xs-2">

			@if(isset($var2))
			<h2>In Section 2</h2>
			@foreach($var2 as $name)
			<P>{{$name->name}}</P><br>
			@endforeach
			@endif

		</div>

		<div class="col-xs-2">

			@if(isset($var3))
			<h2>In Section 3</h2>
			@foreach($var3 as $name)
			<P>{{$name->name}}</P><br>
			@endforeach
			@endif

		</div>

		<div class="col-xs-2">

			@if(isset($var4))
			<h2>In Section 4</h2>
			@foreach($var4 as $name)
			<P>{{$name->name}}</P><br>
			@endforeach
			@endif

		</div>
		

	</div>
</div>


@stop