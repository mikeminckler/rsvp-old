@extends ('layout')

@section ('content')

    <h1>Registrations</h1>

    <div class="section">
        <div class="registration-grid">
            @foreach ($registrations as $registration)
                <div>{{ $registration->name }}</div>
                <div>{{ $registration->email }}</div>
                <div>{{ $registration->event->title }}</div>
                <div>{{ $registration->event->date }}</div>
                <div>{{ $registration->event->location }}</div>
                <div>{{ $registration->event->host_name }}</div>
                <div>{{ $registration->event->host_email }}</div>
            @endforeach
        </div>
    </div>

@endsection
