<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    public function index() {
        $pizzas = Pizza::latest()->get();
        return view('pizzas.index', [
            'pizzas' => $pizzas,
        ]);
    }

    public function show($id) {
        // use the $id variable to query the db for a record
        $selectedPizza = Pizza::findOrFail($id);
        return view('pizzas.show', ['pizza' => $selectedPizza]);
    }

    public function create() {
        return view('pizzas.create');
    }

    public function store(Request $request) {
        dd($request);
        $newPizza = new Pizza();
        $newPizza->name = request('name');
        $newPizza->type = request('type');
        $newPizza->base = request('base');
        $newPizza->toppings = request('toppings');

        $newPizza->save();

        // redirect to welcome page
        return redirect('/')->with('message', 'Thanks for your order!');
    }

    public function destroy($id) {
        $targetPizza = Pizza::findOrFail($id);
        $targetPizza->delete();
        return redirect('/pizzas');
    }
}
