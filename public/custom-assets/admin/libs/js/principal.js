$(".am-del-usuario").on("click", function(){
    let id = $(this).data("id");
    let urlBase = $("#url-fixa").val();
    let urlAction = urlBase + "/"+ id;
    $("#frm-deleta-usuario").attr('action', urlAction);
    $("#mdl-deleta-usuario").modal("show");

});