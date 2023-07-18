function Delete(id){
    if(confirm("¿Desea eliminar el producto?")){
      window.location.href="http://localhost/PaperPlus/?C=Prods_Controller&M=Delete&id="+id;
    }
  }