const productContainer = document.getElementById("product-container");
const xhr = new XMLHttpRequest();
xhr.open("GET", "https://fakestoreapi.com/products");
xhr.onload = function() {
  if (xhr.status === 200) {
    const products = JSON.parse(xhr.responseText);
    products.slice(0, 100).forEach((product) => {
      const productElement = document.createElement("div");
      productElement.classList.add("product");
      productElement.innerHTML = `
        <img src="${product.image}" alt="${product.title}">
        <h2>${product.title}</h2>
        <p class="price">$${product.price.toFixed(2)}</p>
        <p class="description">${product.description}</p>
        <button onclick="openModal('${product.image}', '${product.title}', '${product.description}')">View Product</button>
      `;
      productContainer.appendChild(productElement);
    });
  } else {
    console.error("Request failed. Returned status of " + xhr.status);
  }
};
xhr.send();
const container = document.querySelector(".modal");
  container.remove();

function openModal(imageUrl, title, description) {
  const modal = document.createElement("div");
  modal.classList.add("modal");

  const modalContent = `
    <img src="${imageUrl}" alt="${title}">
    <h2>${title}</h2>
    <p>${description}</p>
    <button onclick="closeModal()">Close</button>
  `;

  modal.innerHTML = modalContent;
  document.body.appendChild(modal);
}

function closeModal() {
  const modal = document.querySelector(".modal");
  modal.remove();
}