$('.panel-heading a').click(function (e) {
    $(this).tab('show');
});

$(document).ready(function(){

  if(window.location.hash != "") {
      $('a[href="' + window.location.hash + '"]').click()
  }

});