@extends('layouts.default')

@section('content')
  <h1>{{ ucfirst($username)}} Questions</h1>

  @if (!$questions)
    <p>You have not posted any questions yet.</p>
  @else
    <ul>
    @foreach($questions as $question) 
      <li>
        {{{ str_limit($question->question) }}} - 
        ({{ count($question->answers) }} {{ str_plural('Answer', count($question->answers)) }})
        {{ ($question->solved) ? ("(Solved)") : ("") }}
        {!! link_to_route('editQuestion', 'Edit', array($question->id) )!!}
        {!! link_to_route('question', 'View', array($question->id) )!!}
      </li>
    @endforeach
    </ul>
    {{ $questions->render() }}
  @endif

@stop