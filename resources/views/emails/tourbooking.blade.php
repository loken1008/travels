<!DOCTYPE html>
<html>
<head>
    <title>Mountain Guide Tour</title>
</head>
<body>
    <h1>{{ $tourbooking['tour_name'] }}</h1>
    <p>Name: {{ $tourbooking['full_name'] }}</p>
    <p>Email: {{ $tourbooking['email'] }}</p>
    <p>Mobile: {{ $tourbooking['mobile'] }}</p>
    <p>Country: {{ $tourbooking['country'] }}</p>
    <p>Number Of People: {{ $tourbooking['number_people'] }}</p>
   <a href="{{route('showbooking.view')}}">View In Site</a>
</body>
</html>