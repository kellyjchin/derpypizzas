@extends('layouts.app')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">  
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-9">
                    
                    <img src="img/pizzahouse.jpg" alt="pizza house logo" srcset="">
                    
                    <div class="title m-b-md">
                        Derpy Pizzas
                    </div>
                    <div class="order-status">
                        <p class="message">{{ session('message') }}</p>
                    </div>
                    <div>
                        <a href="/pizzas/create" style="font-size: 30px; margin-right:10px" class="btn btn-success">Order a Pizza!</a> 
                        <a href="/comments/create" style="font-size: 30px" class="btn btn-primary">Leave a Review!</a>
                    </div>
                    <br/>
                    <p>**Register/Login to see all pending orders that customers have made!**</p>
                </div>

                <div class="col-3 comments-section">
                    <h1>Customer Reviews</h1>
                    @foreach ( $comments as $comment)
                    <div class="comment border border-dark" style="padding: 10px 10px 10px 10px; margin-bottom: 5px">
                        <h3 style="border-bottom: 5px solid #5e2195 ">{{ $comment->name }}</h3>
                        <p>{{ $comment->comment_description }}</p>
                        @if ($comment->rating == "alright")
                            <p>Meh, they aiight!</p>
                        @endif
                        @if ($comment->rating == "loved")
                            <p>Loved it!</p>
                        @endif
                        @if ($comment->rating == "hated")
                            <p>Hated it!</p>
                        @endif
                       
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection