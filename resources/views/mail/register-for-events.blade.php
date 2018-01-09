<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF8">

</head>

<body>

<div style="font-family: \'Open Sans\', Geneva, sans-serif; color: #333333; font-size: 14px;">

	<p>Name: {{ $name }}</p>
	<p>Email: {{ $email }}</p>
	<p>Events

	<ul>
	@foreach ($events as $event)
		<li>{{ $event->title }} - {{ $event->date }} - {{ $event->location }}</li>
	@endforeach
	</ul>

</div>

</body>

</html>
