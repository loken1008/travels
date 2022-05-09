<!DOCTYPE html>
<html>
<head>
    <title>Mountain Guide Tour</title>
</head>
<body>
    <h1>{{ $tourbooking['tour_name'] }}</h1>
    <p>Name: {{ $tourbooking['first_name'] }} {{ $tourbooking['last_name'] }}</p>
    <p>Email: {{ $tourbooking['email'] }}</p>
    <p>Address: {{ $tourbooking['address'] }}</p>
    <p>Telephone: {{ $tourbooking['telephone'] }}</p>
    <p>Mobile: {{ $tourbooking['mobile'] }}</p>
    <p>Country: {{ $tourbooking['country'] }}</p>
    <p>Number Of People: {{ $tourbooking['number_people'] }}</p>
    <p>Arrival Date: {{ $tourbooking['arrival_date'] }}</p>
    <p>Departure Date: {{ $tourbooking['departure_date'] }}</p>
    <p>Message: {{ $tourbooking['message'] }}</p>
   <a href="{{route('showbooking.view')}}">View In Site</a>
</body>
</html>