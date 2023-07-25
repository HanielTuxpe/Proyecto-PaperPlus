function Delete(id){
    if(confirm("¿Desea eliminar el usuario?")){
      window.location.href="/PaperPlus/?C=Provs_Controller&M=Delete&id="+id;
    }
}
