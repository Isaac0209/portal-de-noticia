//pegar a div do texto
 const postWrap = document.querySelector(".fullpost-content")

// Criar a barrinha
let bar = document.createElement("div")
// Estilo da barrinha
bar.style.height = "4px"
bar.style.width = "0"
bar.style.backgroundColor = "#333333"
bar.style.position = "fixed"
bar.style.top = "0"
bar.style.left = "0"
bar.style.zIndex = "9999"
bar.style.transition = "0.2s"
// Adiciona no corpo da pagina
document.body.append(bar)



//verificar o movimento do scroll
document.addEventListener("scroll", () => {
  // o tamanho da div que contem o texto
  const textHeight = postWrap.offsetHeight
  // verificar em que posição da pagina eu estou
    const pagePositionY = window.pageYOffset

  // regra de 3
  const updateBar = pagePositionY * 100 / textHeight
  
  bar.style.width = updateBar + "%"

})