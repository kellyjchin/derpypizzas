@extends('layouts.app')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        
    <div class="content">
        <img src="img/pizzahouse.png" alt="pizza house logo" srcset="">
        <div class="title m-b-md">
            Derpy Pizzas    
        </div>
        
        <div class="order-status">
            <p class="message">{{ session('message') }}</p>
        </div>
        
        <div class="order-button">
            <a href="/pizzas/create">Order a Pizza!</a>
        </div>
        
    </div>
</div>
@endsection