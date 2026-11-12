// Shopping Cart Array
let cart = [];

// Add Product to Cart
function addToCart(name, price) {

    // Check if product already exists
    let product = cart.find(item => item.name === name);

    if (product) {
        product.quantity++;
    } else {
        cart.push({
            name: name,
            price: price,
            quantity: 1
        });
    }

    alert(name + " added to cart!");

    updateCart();
}

// Update Cart
function updateCart() {

    let cartItems = document.getElementById("cart-items");
    let cartCount = document.getElementById("cart-count");
    let totalPrice = document.getElementById("total-price");

    cartItems.innerHTML = "";

    let total = 0;
    let count = 0;

    if (cart.length === 0) {

        cartItems.innerHTML = "<li>Your cart is empty.</li>";
        cartCount.innerHTML = "0";
        totalPrice.innerHTML = "0";
        return;
    }

    cart.forEach((item, index) => {

        let subtotal = item.price * item.quantity;

        total += subtotal;
        count += item.quantity;

        let li = document.createElement("li");

        li.innerHTML = `
            <div>
                <strong>${item.name}</strong><br>
                Price : ₹${item.price}<br>
                Quantity : ${item.quantity}<br>
                Subtotal : ₹${subtotal}
            </div>

            <div>
                <button onclick="increaseQty(${index})">+</button>

                <button onclick="decreaseQty(${index})">-</button>

                <button onclick="removeItem(${index})">Remove</button>
            </div>
        `;

        cartItems.appendChild(li);

    });

    cartCount.innerHTML = count;
    totalPrice.innerHTML = total;

}

// Increase Quantity
function increaseQty(index) {

    cart[index].quantity++;

    updateCart();

}

// Decrease Quantity
function decreaseQty(index) {

    if (cart[index].quantity > 1) {

        cart[index].quantity--;

    } else {

        cart.splice(index,1);

    }

    updateCart();

}

// Remove Product
function removeItem(index) {

    cart.splice(index,1);

    updateCart();

}

// Empty Cart
function clearCart() {

    cart = [];

    updateCart();

}