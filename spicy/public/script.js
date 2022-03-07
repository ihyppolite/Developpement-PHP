document.addEventListener("DOMContentLoaded", afterload);

function afterload() {
  let load = false;

  let cart = document.querySelectorAll(".addcart");
  let div = document.querySelector(".cart-modal");

  for (let button of cart) {
    button.addEventListener("click", addToCart);
  }

  function displaycart() {
    fetch(`http://127.0.0.1:8000/cart/`)
      .then(function (response) {
        return response.text();
      })
      .then((html) => {
        console.log(html);

        div.innerHTML = html;
      });
  }

  function addToCart() {
    fetch(
      `http://127.0.0.1:8000/cart/${this.parentNode.getAttribute("product")}/1`
    )
      .then(function (response) {
        return response.text();
      })
      .then((html) => {
        console.log(html);
        let box = this.parentNode;
        this.outerHTML = html;

        let more = box.querySelector(".more");
        let less = box.querySelector(".less");
        let quantity = box.querySelector(".quantity");
        let quantityValue = parseInt(quantity.textContent);

        more.addEventListener("click", addMore);
        less.addEventListener("click", addLess);

        function addMore() {
          console.log("more");
          quantityValue = quantityValue + 1;
          quantity.innerHTML = quantityValue;
          fetch(
            `http://127.0.0.1:8000/cart/${box.getAttribute(
              "product"
            )}/${quantityValue}`
          );
          displaycart();
        }

        function addLess() {
          console.log("less");
          quantity = quantityValue - 1;
          quantity.innerHTML = quantityValue;
          fetch(
            `http://127.0.0.1:8000/cart/${box.getAttribute(
              "product"
            )}/${quantityValue}`
          );
          displaycart();
        }
      });
  }
}
