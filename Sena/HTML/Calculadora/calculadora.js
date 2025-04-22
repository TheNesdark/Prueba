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