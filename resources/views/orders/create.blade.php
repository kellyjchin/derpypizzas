@extends('layouts.app')

@section('content')
<div class="wrapper create-pizza flex-container">
    <h1>Place your Order!</h1>

    <form action="/orders" method="post">
        @csrf
        <label for="name">Your name: </label>
        <input type="text" name="name" id="name" required>
        <br/><br/>

        {{-- TO DO - MAKE MORE GRANULAR ORDER MENU WITH PRICES, SUB-TOTALS AND SUCH --}}
        <div>   
            <table>
                <tr>
                    <th>Food Item</th>
                    <th>Quantity</th>
                    <th>Sub-Total</th>
                </tr>

                <div class="order-section">
                    <tr class="default-row" id='default-row'>
                        <td style="padding-right: 10px">
                            <select name="food-item[]" class="form-select form-control order-item" id="order-menu-0">
                                <option selected disabled>Select a Food!</option>
                                <option value="cheesy crust">Cheesy Crust - $10</option>
                                <option value="garlic crust">Garlic Crust - $12</option>
                                <option value="thin & crispy">Thin & Crispy - $15</option>
                            </select>
                        </td>
                        <td style="display: none">
                            <p style="display: none">0</p>
                            <p style="display: none">10</p>
                            <p style="display: none">12</p>
                            <p style="display: none">15</p>
                        </td>
                        <td style="padding-right: 10px;"><input type="number" name="quant[]" id="quant-0" class="form-control order-quantity" value="0" min="0">  </td>
                        <td style="padding-right: 10px"><input type="text" name="subtotal[]" id="subtotal-0" readonly class="form-control order-subtotal" value="0">  </td>
                    </tr>
                </div>
   

              
                {{-- Hidden Rows that the user can enable when pressing the add buttom --}}
                @for ($i=1; $i <=10; $i++)
                <tr style="display: none" class="hidden-row" id='hidden-row-{{ $i }}'>
                    <td>
                        <select name="food-item[]" class="form-select form-control order-item" id="order-menu-{{ $i }}">
                            <option selected disabled>Select a Food!</option>
                            <option value="cheesy crust">Cheesy Crust - $10</option>
                            <option value="garlic crust">Garlic Crust - $12</option>
                            <option value="thin & crispy">Thin & Crispy - $15</option>
                        </select> 
                    </td>
                    <td style="display: none">
                        <p style="display: none">0</p>
                        <p style="display: none">10</p>
                        <p style="display: none">12</p>
                        <p style="display: none">15</p>
                    </td>
                    <td style="padding-right: 10px"><input type="number" name="quant[]" id="quant-{{ $i }}" class="form-control order-quantity" value="0" min="0">  </td>
                    <td style="padding-right: 10px"><input type="text" name="subtotal[]" id="subtotal-{{ $i }}" readonly class="form-control order-subtotal" value="0">  </td>
                    <td class="btn btn-success remove-button" style="margin-right: 10px">-</td>
                </tr>
                @endfor
                 


                <tr>
                    <td class="btn btn-success add-button" style="margin-top: 10px">Add Item</td>
                    <td style="text-align: center; font-weight: bold">Grand Total</td>
                    <td style="padding-right: 10px"> 
                        <input type="text" name="total" id="total" readonly class="form-control order-total" value="0">
                    </td>
                </tr>
            </table>
        </div>

        <input type="submit" value="Order Pizza!">
    </form>

</div>
@endsection
