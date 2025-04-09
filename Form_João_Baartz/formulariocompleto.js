//executar mascaras
function mascara(o,f) {// define o objeto e chama funcao
    objeto=o
    funcao=f
    setTimeout("executaMascara()",1)
}

function executaMascara(){
    objeto.value=funcao(objeto.value)
}

//Mascaras
function validarNome(campo) {
    campo.value = campo.value.replace(/[^a-zA-ZÀ-ÿ\s]/g, "");//So aceita letras
    return campo
  }  
//mascara do CPF
function cpf(variavel){
    variavel=variavel.replace(/\D/g,"")// remove tudo que nao e digito
    variavel=variavel.replace(/(\d{3})(\d)/,"$1.$2")//coloca um ponto apos o terceiro digito e o quarto
    variavel=variavel.replace(/(\d{3})(\d)/,"$1.$2")//coloca um ponto apos o sexto digito e o setimo
    variavel=variavel.replace(/(\d{3})(\d{1,2})$/,"$1-$2")//coloca o hifem apos o setimo digito e permite apenas 2 digitos
    return variavel
}
//mascara do rg
function rg(variavel){
    variavel=variavel.replace(/\D/g,"")// remove tudo que nao e digito
    variavel=variavel.replace(/(\d{2})(\d)/,"$1.$2")//coloca um ponto apos o terceiro digito e o quarto
    variavel=variavel.replace(/(\d{3})(\d)/,"$1.$2")//coloca um ponto apos o sexto digito e o setimo
    variavel=variavel.replace(/(\d{3})(\d{1,2})$/,"$1-$2")//coloca o hifem apos o setimo digito e permite apenas 2 digitos
    return variavel
}
//mascaras do bairro e rua para so aceitar letras 
function validarlocal(campo){
    campo.value = campo.value.replace(/[^a-zA-ZÀ-ÿ\s]/g, "");//So aceita letras
    return campo
}
//Mascara do numero da rua
function Nrua(variavel){
    variavel=variavel.replace(/\D/g,"")// remove tudo que nao e digito
    return variavel
}
//Mascara do cep
function cep(variavel){
    variavel = variavel.replace(/\D/g, ""); // remove tudo que não é dígito
    variavel = variavel.replace(/(\d{3})(\d{1,3})$/, "$1-$2"); // coloca outro ponto após os 3 dígitos seguintes
    return variavel;
}


