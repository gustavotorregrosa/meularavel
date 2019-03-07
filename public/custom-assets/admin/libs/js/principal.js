$(".am-del-usuario").on("click", function(){
    let id = $(this).data("id");
    let urlBase = $("#url-fixa").val();
    let urlAction = urlBase + "/"+ id;
    $("#frm-deleta-usuario").attr('action', urlAction);
    $("#mdl-deleta-usuario").modal("show");

});


$("#btn-am-cria-perfil").on("click", function(){
    $("#mdl-cria-perfil").modal("show");

});


$(".btn-am-edita-perfil").on("click", function(){
    let baseUrl = $("#frm-edita-perfil #inp-base-url").val();
    let idPerfil = $(this).data("id");
    let urlAction = baseUrl + "/" + idPerfil;
    let nomePerfil = $(this).parents("tr").find(".nome-perfil").html();
    $('#frm-edita-perfil').attr('action', urlAction);
    $("#frm-edita-perfil #nome-perfil").val(nomePerfil);
    $("#mdl-edita-perfil").modal("show"); 
});

$(".btn-am-inativa-perfil").on("click", function(){
    let baseUrl = $("#frm-inativa-perfil #inp-base-url").val();
    let idPerfil = $(this).data("id");
    let urlAction = baseUrl + "/" + idPerfil;
    $('#frm-inativa-perfil').attr('action', urlAction);
    let nomePerfil = $(this).parents("tr").find(".nome-perfil").html();
    $("#mdl-inativa-perfil #spn-nome-perfil").html(nomePerfil);
    $("#mdl-inativa-perfil").modal("show");
   

});

$(".edita-post").on("click", function(){
    let baseUrl =$("#base-url").val();
    let idPost = $(this).data("id");
    let url = baseUrl + "/" + idPost + "/edit";
    window.location.href = url;
});

$(".btn-am-deleta-post").on("click", function(){
    let baseUrl =$("#base-url").val();
    let idPost = $(this).data("id");
    let url = baseUrl + "/" + idPost;
    $('#frm-deleta-post').attr('action', url);
    $("#mdl-deleta-post").modal("show");
});


