
let current = 0;
const slides = document.querySelectorAll(".slider img");

function showSlide(index) {
  slides.forEach((slide, i) => {
    slide.classList.remove("active");
    if (i === index) slide.classList.add("active");
  });
}

setInterval(() => {
  current = (current + 1) % slides.length;
  showSlide(current);
}, 2000);

document.addEventListener("DOMContentLoaded", () => {
  showSlide(current);
});
function addToCart(item, price) {
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart.push({ item, price });
  localStorage.setItem('cart', JSON.stringify(cart));
  alert(`${item} added to cart!`);
}

// Show cart
if (document.getElementById('cart-items')) {
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  const cartList = document.getElementById('cart-items');
  let total = 0;
  cart.forEach(({ item, price }) => {
    const li = document.createElement('li');
    li.textContent = `${item} - ₹${price}`;
    cartList.appendChild(li);
    total += price;
  });
  document.getElementById('total').textContent = `Total: ₹${total}`;
}
function addToCart(itemName, price) {
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart.push({ itemName, price });
  localStorage.setItem('cart', JSON.stringify(cart));
  alert(`${itemName} added to cart!`);
}
 // Cart Counter
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartCount = document.getElementById("cartCount");
    cartCount.innerText = cart.length;

    function addToCart(item, price) {
      cart.push({ item, price });
      localStorage.setItem('cart', JSON.stringify(cart));
      cartCount.innerText = cart.length;
      showToast(`${item} added to cart!`);
    }

    function showToast(message) {
      const toast = document.getElementById("toast");
      toast.innerText = message;
      toast.style.display = "block";
      setTimeout(() => toast.style.display = "none", 2000);
    }

    // Search Filter
    const searchBar = document.getElementById('searchBar');
    const cards = document.querySelectorAll('.product-card');

    searchBar.addEventListener('input', e => {
      const val = e.target.value.toLowerCase();
      cards.forEach(card => {
        const name = card.getAttribute('data-name').toLowerCase();
        card.style.display = name.includes(val) ? 'block' : 'none';
      });
    });

    // Loading Spinner
    window.addEventListener('load', () => {
      document.getElementById('loading-spinner').classList.add('hidden');
    });
