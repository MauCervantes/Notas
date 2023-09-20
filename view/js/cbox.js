let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .nav');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

const anio = document.getElementById("dAño")
const dmes = document.getElementById("dMes")
const ddia = document.getElementById("dDia")
const bCancelar = document.getElementById("cancelar")
/*-----------------------------------------------------------------------------------------------*/

//var tipo date
var fecha = new Date()
/*-----------------------------------------------------------------------------------------------*/

//Variables auxiliares
let htmlInsert
let i = 0
let l = 1
let k = 0
let m = 0
let n = 0
/*-----------------------------------------------------------------------------------------------*/

//Meses del año
const mes = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
/*-----------------------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------------------*/
//Agregar el año 2023 por el momento y los meses restantes. 
htmlInsert = "<option>" + fecha.getFullYear() + "</option>"
anio.insertAdjacentHTML("beforeend", htmlInsert)
htmlInsert = ""
/*-----------------------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------------------*/
//Agregar meses del año que aun no transcurren
var j = fecha.getMonth()
if (anio.value == "2023") {
    while (j < mes.length) {
        htmlInsert = "<option>" + mes[j] + "</option>"
        dmes.insertAdjacentHTML("beforeend", htmlInsert)
        htmlInsert = ""
        j++
    }
}
/*-----------------------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------------------*/
//Por defecto mete los días que son en el mes que sale por default...
j = fecha.getMonth()
l = 1
if (dmes.value == 1 || dmes.value == 3 || dmes.value == 5 || dmes.value == 7 || dmes.value == 8 ||
    dmes.value == 10 || dmes.value == 12) {
    k = 31
    postDia(k, l)
} else if (dmes.value == 4 || dmes.value == 6 || dmes.value == 9 || dmes.value == 11) {
    k = 30
    postDia(k, l)
}else if(dmes.value == "--"){
    while (ddia.options.length > 0) {                
        ddia.remove(0);
    }   
}else {
    k = 28
    postDia(k, l)
}

if(dmes.value == mes[fecha.getUTCMonth()-1]){
    l = fecha.getDate() + 1
    postDia(k, l)
}
/*-----------------------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------------------*/
//Evento en el combo mes (al darle click) para dar los días correspondientes 30, 31 o 28
dmes.addEventListener('click', () => {
    j = fecha.getMonth()
    l = 1
    if (dmes.value == 1 || dmes.value == 3 || dmes.value == 5 || dmes.value == 7 || dmes.value == 8 ||
        dmes.value == 10 || dmes.value == 12) {
        k = 31
        postDia(k, l)
    } else if (dmes.value == 4 || dmes.value == 6 || dmes.value == 9 || dmes.value == 11) {
        k = 30
        postDia(k, l)
    }else if(dmes.value == "--"){
        while (ddia.options.length > 0) {                
            ddia.remove(0);
        }   
    }else {
        k = 28
        postDia(k, l)
    }

    if(dmes.value == mes[fecha.getUTCMonth()-1]){
        l = fecha.getDate() + 1
        postDia(k, l)
    }
})
/*-----------------------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------------------*/
//Funcion para meter los días correspondientes al mes elegido.
//Quita los días que han pasado del mes. 
function postDia(num, num2) {
    l = num2
    while (ddia.options.length > 0) {                
        ddia.remove(0);
    }        

    while (l <= num) {
        htmlInsert = "<option>" + l + "</option>"
        ddia.insertAdjacentHTML("beforeend", htmlInsert)
        htmlInsert = ""
        l++
    }
}
/*-----------------------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------------------*/
//Si se le da al boton de cancelar
bCancelar.addEventListener('click', ()=>{
    var d = confirm('¿Seguro que desea cancelar la solicitud?');
    if (d == true){
        window.location.href="../html/menu.php"; //Aqui debe de llevar a la pagina principal de paciente
    }else{}
})
/*-----------------------------------------------------------------------------------------------*/