function deleteData(categoryId = null) {
   Swal.fire({
      title: 'Are you sure?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
   }).then((result) => {
      if (result.isConfirmed) {
         if (categoryId) {
            document.getElementById('formDelete_' + categoryId).submit();
         } else {
            document.getElementById('formDelete').submit();
         }
      }
   });
}



function previewImage(imageId, imgPreviewId) {
   const image = document.getElementById(imageId);
   const imgPreview = document.getElementById(imgPreviewId);

   if (image.files && image.files[0]) {
      const reader = new FileReader();
      
      reader.onload = function(e) {
         imgPreview.src = e.target.result;
         imgPreview.style.width = '100%';
         imgPreview.style.height = '300px';
         imgPreview.style.objectFit = 'cover';
      }
      
      reader.readAsDataURL(image.files[0]);
   } else {
      imgPreview.src = '';
   }
}


