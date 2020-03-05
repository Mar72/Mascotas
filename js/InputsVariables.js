/*<style>
	input[type="file"]{
		display: block;
	}
</style>  */

var inputs = 1;  //número de inputs del formulario

//quitar un input
function removeInput(){
	inputs--;

	fotos.lastElementChild.remove();  //quita el input file
	fotos.lastElementChild.remove();  //quita el input hidden 

	if(inputs<10) mas.removeAttribute('disabled');
	if(inputs<2) menos.setAttribute('disabled','disabled');
}
//función que añade un nuevo input
function addInput() {
    inputs++;

    var hidden = document.createElement('input');
    hidden.setAttribute('type','hidden');
    hidden.setAttribute('name','MAX_FILE_SIZE'); 
    hidden.setAttribute('value','1240000');

    var input = document.createElement('input');
    input.setAttribute('type','file');
    input.setAttribute('accept','image/*');
    input.setAttribute('name','fichero'+inputs);

    fotos.appendChild(hidden);
    fotos.appendChild(input);

    if(inputs>1) menos.removeAttribute('disabled');
    if(inputs>=10) mas.setAttribute('disabled','disabled');
}
