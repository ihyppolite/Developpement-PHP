document.addEventListener("DOMContentLoaded", afterload);

function afterload() {
  let cart = document.querySelectorAll(".addcart");
  //crée un evelemnt de click pour chaque des buttons des produits
  for (let button of cart) {
    button.addEventListener("click", addToCart);
  }
  //fonction qui ajoute au panier
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
        //ajoute 1 a la quantité
        function addMore() {
          quantityValue = quantityValue + 1;
          quantity.innerHTML = quantityValue;
          fetch(
            `http://127.0.0.1:8000/cart/${box.getAttribute(
              "product"
            )}/${quantityValue}`
          );
        }
        //fait -1 a la quantité
        function addLess() {
          if (quantityValue == 0) {
            alert("vous etes a 0 article selectioné");
          } else {
            quantityValue = quantityValue - 1;
            console.log(quantityValue);
          }
          quantity.innerHTML = quantityValue;
          fetch(
            `http://127.0.0.1:8000/cart/${box.getAttribute(
              "product"
            )}/${quantityValue}`
          );
        }
      });
  }
}
