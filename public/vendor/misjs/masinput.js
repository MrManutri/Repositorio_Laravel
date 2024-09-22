const contenedor = document.querySelector('#dinamic');
const btnAgregar = document.querySelector('#agregar');
const contenedor2 = document.querySelector('#dinamic2');
const btnAgregar2 = document.querySelector('#agregar2');
const contenedor3 = document.querySelector('#dinamic3');
const btnAgregar3 = document.querySelector('#agregar3');
/*const contenedor4 = document.querySelector('#dinamic4');
const btnAgregar4 = document.querySelector('#agregar4');
const contenedor5 = document.querySelector('#dinamic5');
const btnAgregar5 = document.querySelector('#agregar5');*/

let total = 1;

btnAgregar.addEventListener('click', e =>{
    let div = document.createElement('div');
    div.innerHTML = `<br> <input type="text" name="firmador[]" class="form-control form-control-user" id="exampleInputEmail"
    placeholder="" > <button onclick="eliminar(this)" style="border: none; background: none;" ><i class="fa-solid fa-delete-left text-danger"></i> Eliminar</button>`
    contenedor.appendChild(div);
})

btnAgregar2.addEventListener('click', e =>{
    let div = document.createElement('div');
    div.innerHTML = `<br> <input type="text" name="interesado[]" class="form-control form-control-user" id="exampleInputEmail"
    placeholder="" > <button onclick="eliminar2(this)" style="border: none; background: none;" ><i class="fa-solid fa-delete-left text-danger"></i> Eliminar</button>`
    contenedor2.appendChild(div);
})

btnAgregar3.addEventListener('click', e =>{
    let div = document.createElement('div');
    div.innerHTML = `<br> <input type="text" name="creador[]" class="form-control form-control-user" id="exampleInputEmail"
    placeholder="" > <button onclick="eliminar3(this)" style="border: none; background: none;" ><i class="fa-solid fa-delete-left text-danger"></i> Eliminar</button>`
    contenedor3.appendChild(div);
})
/*
btnAgregar4.addEventListener('click', e =>{
    let div = document.createElement('div');
    div.innerHTML = `<br> <input type="text" name="vistos[]" class="form-control form-control-user" id="exampleInputEmail"
    placeholder="" > <button onclick="eliminar4(this)" style="border: none; background: none;" ><i class="fa-solid fa-delete-left text-danger"></i> Eliminar</button>`
    contenedor4.appendChild(div);
})

btnAgregar5.addEventListener('click', e =>{
    let div = document.createElement('div');
    div.innerHTML = `<br> <input type="text" name="conciderando[]" class="form-control form-control-user" id="exampleInputEmail"
    placeholder="" > <button onclick="eliminar5(this)" style="border: none; background: none;" ><i class="fa-solid fa-delete-left text-danger"></i> Eliminar</button>`
    contenedor5.appendChild(div);
})*/

const eliminar = (e) => {
    const divPadre = e.parentNode;
    contenedor.removeChild(divPadre);
    actualizarContador();
}
const eliminar2 = (e) => {
    const divPadre = e.parentNode;
    contenedor2.removeChild(divPadre);
    actualizarContador();
}
const eliminar3 = (e) => {
    const divPadre = e.parentNode;
    contenedor3.removeChild(divPadre);
    actualizarContador();
}/*
const eliminar4 = (e) => {
    const divPadre = e.parentNode;
    contenedor4.removeChild(divPadre);
    actualizarContador();
}
const eliminar5 = (e) => {
    const divPadre = e.parentNode;
    contenedor5.removeChild(divPadre);
    actualizarContador();
}*/