 function factorial(numero) {
     if ((numero == 0) || (numero == 1)) return 1;
     else { var resultado = (numero * factorial(numero - 1)); return resultado; }
 }