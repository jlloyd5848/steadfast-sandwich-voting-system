<!-- resources/views/emails/daily_totals.blade.php -->

@extends('layouts.mail')

@section('content')
    <h2>Daily Vote Totals</h2>
    
    <p>Here are the vote totals for today:</p>
    
    <ul>
        @foreach($content as $optionId => $voteCount)
            <li>Option {{ $optionId }} has {{ $voteCount }} votes</li>
        @endforeach
    </ul>
@endsection
