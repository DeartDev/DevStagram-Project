import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aquí tu imagen',
    acceptedFiles: '.jpg, .jpeg, .png, .gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,

    init:function(){
        if(document.querySelector('#imagen').value.trim()){
            const imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('#imagen').value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

            imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');

        }
    },
});


// Eventos en DropZone
// Evento para cuando se está subiendo un archivo
dropzone.on('sending', function(file, xhr, formData) {
    console.log('Enviando archivo');
});

 
// Evento para cuando se ha subido un archivo
dropzone.on('success', function(file, response) {
    //console.log(response.imagen);
    document.querySelector('#imagen').value = response.imagen;
});

// Evento para cuando ha ocurrido un error al subir un archivo
dropzone.on('error', function(file, message) {
    console.log(message);
});

// Evento para cuando se ha eliminado un archivo
dropzone.on('removedfile', function() {
    document.querySelector('#imagen').value = "";
});