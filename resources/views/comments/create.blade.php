@extends('layouts.app')
@section('content')
<div class="wrapper create-pizza">
    <h1>Tell us how we did!</h1>

    <form action="/comments" method="post">
        @csrf
        <label for="name">Your name: </label>
        <input type="text" name="name" id="name" required>

        <label for="comment-desc">How was your experience in 50 characters or less?: </label>
        <input type="text" name="comment-desc" id="comment-desc" max="50" required>


        <label for="rating">How would you rate your order and experience?</label>
        <select name="rating" id="rating" required>
            <option value="loved">Loved it!</option>
            <option value="hated">Hated it!</option>
            <option value="alright">Meh, they aiight!</option>
        </select>
        <br/>
        <input type="submit" value="Leave Review!">
    </form>
</div>
@endsection