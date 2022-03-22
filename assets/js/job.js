$(document).ready(function() { 
    toastr.options = {
        "positionClass": "toast-bottom-right"
    }
  
  // Flashdata
  const flashData = $('.flash-data').data('flashdata');
  if (flashData) {
    toastr.success(flashData);
  }

});