$( document ).ready(function() {
  $('#editableTable').SetEditable({
    onBeforeDelete: function(columnsEd) {
    var itemId = columnsEd[0].childNodes[1].innerHTML;
    var hidden = document.getElementById('table');
    var itemTable = hidden.textContent;
    $.ajax({
      type: 'POST',     
      url : "api.php",
      data: {id:itemId, table:itemTable},      
      success: function (response) {
        if(response.status) {
        }     
      }
    });
    },
  });
});