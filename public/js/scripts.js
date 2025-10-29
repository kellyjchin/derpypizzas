// FUNCTION DECLARATIONS

// This function will be called when a user clicks the "Add Item" Button. On click, it will reveal an order row.
// **BUGGY WHEN RE-ADDING A REMOVED MIDDLE ORDER ROW**
const revealNextHiddenRow = () => {
    let allHiddenRows = document.getElementsByClassName('hidden-row')
    for(let i = 0; i < allHiddenRows.length; i++){
        if(allHiddenRows[i].style.display === "none") {
            allHiddenRows[i].removeAttribute('style')
            break;
        }
    }   
}

// This function is called when an order row's "-" button is clicked. 
// On click, the row will be hidden and the values in the cells will be reset to either 0 or the default item in the case of the select.
const removeOrderRow = () => {
    // clear out the contents of the row
    let resetSubTotal = event.target.previousElementSibling.firstChild.value = 0;
    let resetQuantity = event.target.previousElementSibling.previousElementSibling.firstChild.value = 0;
    let resetFoodItem = event.target.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.firstChild.selectedIndex = 0;
    
    // hide the item
    let targettedRow = event.target.parentNode;
    targettedRow.style.display = 'none';

    let grandTotalCell = document.querySelector('.order-total');
    let subtotalsArray = document.querySelectorAll('.order-subtotal')
    let grandTotalValue = 0;

    subtotalsArray.forEach(subtotal => {
        let numberSubtotal = parseInt(subtotal.value)
        grandTotalValue += numberSubtotal
    })

    grandTotalCell.value = grandTotalValue;
}

// This function is called when either a food item or a quantity of food is changed. 
// On change, the subtotals and grand total will be re-calculated.
const calculateTotals = () => {
    let subtotalCell = event.target.parentNode.parentNode.children[3].firstChild
    let currentItemIndex = event.target.parentNode.parentNode.firstChild.firstChild.selectedIndex
    let price = event.target.parentNode.parentNode.children[1].children[currentItemIndex].innerText
    let quantityOrdered = event.target.parentNode.parentNode.children[2].firstChild.value
    subtotalCell.value = price * quantityOrdered

    let subtotalsArray = document.querySelectorAll('.order-subtotal')
    let grandTotal = 0;
    subtotalsArray.forEach( subtotal => {
        grandTotal += parseInt(subtotal.value)
    })
    
    let grandTotalCell = document.querySelector('.order-total')
    grandTotalCell.value = grandTotal;
}


// Event Listener listening for clicks on either the add or remove buttons for adding or removing an order row
document.addEventListener('click', event => {
    event.target.matches('.add-button') ? revealNextHiddenRow() : () => {return}
    event.target.matches('.remove-button') ? removeOrderRow() : () => {return}
}, false);


// Event Listener for calculating each row's subtotal on change of quantity or food item as well as the grand total
document.addEventListener('change', event => {
    if(event.target.matches('.order-item') || event.target.matches('.order-quantity')) {
        calculateTotals();
    }
}, false)