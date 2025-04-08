//executar mascaras
function mascara(o,f) {// define o objeto e chama funcao
    objeto=o
    funcao=f
    setTimeout("executaMascara()",1)
}

function executaMascara(){
    objeto.value=funcao(objeto.value)
}

//mascara

//mascara telefone

function telefone(variavel){
    variavel=variavel.replace(/\D/g,"")// remove tudo que nao e digito
    // a linha abaixo e responsavel de adicionar parenteses em volta de dois digitos
    variavel=variavel.replace(/^(\d\d)(\d)/g,"($1) $2")
    // a linha abaixo e responsalvel de adicionar o hifen entre o quartoe quitp digito
    variavel=variavel.replace(/(\d{4})(\d)/,"$1-$2")
    return variavel
}

//mascar do Rg e CPF
function RGeCPF(variavel){
    variavel=variavel.replace(/\d/g,"")//remove tudo que nao e numero
    variavel=variavel.replace(/(\d{3})(\d)/,"$1.$2")//coloca um ponto apos o terceiro digito e o quarto
    variavel=variavel.replace(/(\d{3})(\d)/,"$1.$2")//coloca um ponto apos o sexto digito e o setimo
    variavel=variavel.replace(/(\d{3})(\d{1,2})$/,"$1-$2")//coloca o hifem apos o setimo digito e permite apenas 2 digitos
    return variavel
}

//mascara do cep 
function cep(variavel){
    variavel=variavel.replace(/\D/g,"")// remove tudo que nao e digito
    variavel=variavel.replace(/(\{2})(\d)/,"$1.$2")//coloca a segunda barra
    variavel=variavel.replace(/(\{3})(\d{1,3})$/,"$1-$2")//coloca a segunda barra
    return variavel
}
//mascara data
function data(variavel){
    variavel=variavel.replace(/\D/g,"")//remove tudo que nao e numero
    variavel=variavel.replace(/(\d{3})(\d)/,"$1/$2")
    variavel=variavel.replace(/(\d{2})(\d)/,"$1/$2")
    return variavel
}
