function imageLoaded(event){
        var image = document.getElementById('imgOutput');
        image.src = URL.createObjectURL(event.target.files[0]);
 }