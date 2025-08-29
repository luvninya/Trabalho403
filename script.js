const barraPesquisa = document.getElementById("barra-pesquisa");
const produtos = document.querySelectorAll(".produto");

barraPesquisa.addEventListener("keyup", () => {
  const termo = barraPesquisa.value.toLowerCase(); 

  produtos.forEach(produto => {
    const nome = produto.querySelector("h3").textContent.toLowerCase();

    if (nome.includes(termo)) {
      produto.style.display = "block"; 
    } else {
      produto.style.display = "none"; 
    }
  });
});
