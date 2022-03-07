document.addEventListener("DOMContentLoaded", afterload);

function afterload() {
  let input = document.querySelector(".form-control");
  let data = document.querySelector("#datalistOptions");

  input.addEventListener("keyup", () => {
    fetch(`http://127.0.0.1:8000/search/${input.value}`)
      .then(function (response) {
        return response.text();
      })
      .then((option) => {
        data.innerHTML = option;
      });
  });

  document.addEventListener("keypress", (e) => {
    if (e.code == "Enter") {
      console.log("toto");
      window.location.href = `http://127.0.0.1:8000/product/${input.value}`;
    }
  });
}
