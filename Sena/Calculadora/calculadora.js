let pantalla = document.getElementById('display');
let expresion="";

function limpiar(){
    pantalla.innerText="0";
    expresion="";
}
function agregar(num){
    if(pantalla.innerText ==="0" && num!=="." || pantalla.innerText=="Error"){
        pantalla.innerText=num;
        expresion+=num
    }
    else{
        pantalla.innerText+=num;
        expresion+=num
    }
}
function operacion(op){
    pantalla.innerText +=op;
    expresion+=op;
}
function calcular(){
    try {
        let resultado = eval(expresion);
        pantalla.innerText = resultado;
        expresion = resultado.toString();
    } catch (error) {
        pantalla.innerText = "Error";
        expresion = "";
    }
}
function Cambiarsigno(){
  let valor = parseInt(pantalla.innerText);
  if (!isNaN(valor)) {
    valor *= -1;
    pantalla.innerText = valor;
    expresion = valor.toString();
  }
}
function porciento(){
  let valor = parseFloat(pantalla.innerText);
  if (!isNaN(valor)) {
    valor /= 100;
    pantalla.innerText = valor;
    expresion = valor.toString();
  }
}
function raiz(){
  let valor = parseFloat(pantalla.innerText);
  if (!isNaN(valor)) {
    valor = Math.sqrt(valor);
    pantalla.innerText = valor;
    expresion = valor.toString();
  }
}
function logaritmo(){
  let valor = parseFloat(pantalla.innerText);
  if (!isNaN(valor)) {
    valor = Math.log10(valor);
    pantalla.innerText = valor;
    expresion = valor.toString();
  }
}
function potencia(){
  let valor = parseFloat(pantalla.innerText);
  if (!isNaN(valor)) {
    valor = Math.pow(valor, 2);
    pantalla.innerText = valor;
    expresion = valor.toString();
  }
}
function elevadouno(){
  let valor = parseFloat(pantalla.innerText);
  if (!isNaN(valor)) {
    valor = 1 / valor;
    pantalla.innerText = valor;
    expresion = valor.toString();
  }
}
function memoria(){
  let valor = parseFloat(pantalla.innerText);
  if (!isNaN(valor)) {
    localStorage.setItem('memoria', valor);
  }
}
function memoriaSuma(){
  let valor = parseFloat(pantalla.innerText);
  if (!isNaN(valor)) {
    let memoria = parseFloat(localStorage.getItem('memoria'));
    if (!isNaN(memoria)) {
      memoria += valor;
      localStorage.setItem('memoria', memoria);
    } else {
      localStorage.setItem('memoria', valor);
    }
  }
}
function memoriaResta(){
  let valor = parseFloat(pantalla.innerText);
  if (!isNaN(valor)) {
    let memoria = parseFloat(localStorage.getItem('memoria'));
    if (!isNaN(memoria)) {
      memoria -= valor;
      localStorage.setItem('memoria', memoria);
    } else {
      localStorage.setItem('memoria', -valor);
    }
  }
}
function memoriaLimpiar(){
  localStorage.removeItem('memoria');
  pantalla.innerText = "0";

}
function memoriaRecuperar(){
  let memoria = parseFloat(localStorage.getItem('memoria'));
  if (!isNaN(memoria)) {
    pantalla.innerText = memoria;
    expresion = memoria.toString();
  } else {
    pantalla.innerText = "0";
    expresion = "";
  }
}
document.addEventListener('keydown', function(event){
  const key = event.key;
  if (key >= '0' && key <= '9') {
    agregar(key);
  } else if (['+', '-', '*', '/'].includes(key)) {
    operacion(key);
  } else if (key === 'Enter') {
    calcular();
  } else if (key === 'Shift') {
    limpiar();
  } else if (key === '.') {
    agregar('.');
  } else if (key === 'Escape') {
    memoriaLimpiar();
  } else if (key === 'm') {
    memoriaRecuperar();
    }
  });