$(document).ready(function() { 
    toastr.options = {
        "positionClass": "toast-bottom-right"
    }
  
  // Flashdata
  const flashData = $('.flash-data').data('flashdata');
  if (flashData) {
    toastr.success(flashData);
  }
  
  $(".input-file").filestyle({
    'text' :'Choose File',
    'btnClass' :'btn-light border border-secondary px-4',
    'size' :'nr',
    'input' :true,
    'placeholder':'',
    'buttonBefore' :true,
});
});