// menu.js
function validateForm() {
    const name = document.querySelector('input[name="name"]').value.toLowerCase();
    const type = document.querySelector('select[name="type"]').value.toLowerCase();
    const price = document.querySelector('input[name="price"]').value;

    const availableOrder = ['paneer', 'samosa', 'pizza', 'chicken', 'chicken samosa', 'chicken pizza', 'panner chicken', 'samosa chicken samosa', 'pizza chicken pizza', 'all'];
    const availablePrice = [90, 180, 270, 360, 450, 540];
    const availableDish = ['veg', 'non-veg', 'both'];

    if (!availableOrder.includes(name)) {
        alert("The selected order is not available on the menu.");
        return false;
    }

    if (!availablePrice.includes(parseInt(price))) {
        alert("Please enter a valid price.");
        return false;
    }

    if (name === 'paneer' && parseInt(price) !== 90) {
        alert("The price for Paneer should be $90.");
        return false;
    }
    if (name === 'samosa' && parseInt(price) !== 90) {
        alert("The price for Samosa should be $90.");
        return false;
    }
    if (name === 'pizza' && parseInt(price) !== 90) {
        alert("The price for Pizza should be $90.");
        return false;
    }
    if (name === 'chicken' && parseInt(price) !== 90) {
        alert("The price for Chicken should be $90.");
        return false;
    }
    if (name === 'chicken samosa' && parseInt(price) !== 180) {
        alert("The price for Chicken Samosa should be $180.");
        return false;
    }
    if (name === 'chicken pizza' && parseInt(price) !== 180) {
        alert("The price for Chicken Pizza should be $180.");
        return false;
    }
    if (name === 'all' && parseInt(price) !== 540) {
        alert("The price for all should be $540.");
        return false;
    }

    if (!availableDish.includes(type)) {
        alert("Please enter a valid dish type: 'veg', 'non-veg', or 'both'.");
        return false;
    }

    return true;
}
