const filtro = document.getElementById('filtro').addEventListener('submit', function(event) {
  event.preventDefault(); 
  const categoria = document.getElementById('categoria').value;
  var URL = 'http://localhost/PaperPlus/?C=Public_Controller&M=FiltrarCat&categoria='
  window.location.href = (URL + categoria);
});  