import Dropzone from 'dropzone';

const dropzone = new Dropzone('#dropzone', {
    url: '/imagenes',  // Asegúrate de que coincida con tu ruta en Laravel
    dictDefaultMessage: 'Sube aquí tu imagen',
    acceptedFiles: '.jpg, .jpeg, .png, .gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,
    headers: {  // Envía el token CSRF
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    init: function() {
        if (document.querySelector('[name="imagen"]').value.trim()) {
            const imagenPublicada = {
                size: 1234,
                name: document.querySelector('[name="imagen"]').value
            };
            this.emit("addedfile", imagenPublicada);
            this.emit("thumbnail", imagenPublicada, `/uploads/${imagenPublicada.name}`);
            imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
        }
    },
});

// Evento para manejar errores del servidor
dropzone.on('error', function(file, errorMessage, xhr) {
    console.error('Error del servidor:', xhr.responseJSON || errorMessage);
    this.removeFile(file);  // Elimina el archivo si hay error
});


// Eventos en DropZone
// Evento para cuando se está subiendo un archivo
// dropzone.on('sending', function(file, xhr, formData) {
//     console.log('Enviando archivo');
// });

 
// Evento para cuando se ha subido un archivo
dropzone.on('success', function(file, response) {
    //console.log(response.imagen);
    document.querySelector('[name="imagen"]').value = response.imagen;
});

// Evento para cuando ha ocurrido un error al subir un archivo
dropzone.on('error', function(file, message) {
    console.log(message);
});

// Evento para cuando se ha eliminado un archivo
dropzone.on('removedfile', function() {
    document.querySelector('[name="imagen"]').value = "";
});