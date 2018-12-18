<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF8">

</head>

<body>

<div style="font-family: \'Open Sans\', Geneva, sans-serif; color: #333333; font-size: 14px;">

    <h1>Brentwood Information Session Sign-Up</h1>

    <p>Hello {{ $name }},</p>

    <p>You have registered for the following information events</p>

	<ul>
	@foreach ($events as $event)
		<li>{{ $event->title }} - {{ $event->date }} - {{ $event->location }}</li>
	@endforeach
	</ul>

    <p>A member of our admissions team will be following up with you closer to the event. <br/>Should you have any questions feel free to contact us at admissions@brentwood.bc.ca</p>

    <p>Brentwood Admissions<br/>(250) 743-5521<br/>www.brentwood.bc.ca</p>


</div>

</body>

</html>
