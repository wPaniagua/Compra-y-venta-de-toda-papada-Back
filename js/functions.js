//Genera las previsualizaciones
function createPreview(file) {
    var imgCodified = URL.createObjectURL(file);
    //console.log('file '+file);
    var img = $('<div class="col-lg-6 col-md-6 col-sm-6 col-xl-4"><div class="image-container"> <figure> <img src="' + imgCodified + 
    	'" alt="Foto del usuario" style="width: 198px;height: 300px;"> <figcaption> <i class="fas fa-times-circle"></i> </figcaption> </figure> </div></div>');
    $(img).insertBefore("#add-photo-container");
}

