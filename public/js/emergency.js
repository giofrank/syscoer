$(document).ready(function(){

    $(".btnUpdate").on('click', function(){
        var url = '/editemergency'
        var idval = $(this).attr('idval');
        var status = $(this).attr('status');
        var token=$('.token').val();
        var dataAjax = { 'idval':idval}

        $.ajax({
            type: 'post',
            headers: {'X-CSRF-TOKEN': token},
            url: url,
            dataType:'json',
            data: dataAjax,
            success : function(data){
                $("#date").val(data.date);
                $("#district_id").val(data.district_id);
                $("#tittle").val(data.tittle);
                $("#action").val(data.action);
                $("#name").val(data.name);
                $("#description").val(data.description);
                $("#cargo").val(data.cargo);
                $("#phone").val(data.phone);
                $("#latitud").val(data.latitud);
                $("#longuitud").val(data.longuitud);
                $("#ico").val(data.img_ico);
                $("#type_form").val(status);
                $('#pk_emergency').val(data.id);

                if (data) {

                    $('#Model_update').modal({
                        show:true,
                        backdrop:'static'
                    });
                }
            }

        })

        

    });

    $('#newReg').on('click', function(){
        $('#formulario')[0].reset();
        
        var status = $(this).attr('status');
        $("#type_form").val(status);
        $('#Model_update').modal({
            show:true,
            backdrop:'static'
        });
    });

    $('.deleteReg').on('click', function(){
        var url = "/deleteReg";
        var idval = $(this).attr('idval');
        var token=$('.token').val();
        var pregunta = confirm('¿Esta seguro de eliminar este Registro?');

        if(pregunta==true){
            $.ajax({
                type: 'post',
                headers: {'X-CSRF-TOKEN': token},
                url: url,
                dataType:'json',
                data: 'id='+idval,
                success : function(data){
                    return false;
                }
            });
            return false;
        }else{
            return false;
        }


    });



});

function agregaRegistro(){
    var url = '/upemergency';
    var token=$('.token').val();
    var formData = new FormData($('#formulario')[0])
    $.ajax({
        type:'POST',
        headers: {'X-CSRF-TOKEN': token},
        url:url,
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success: function(registro){
            $('#formulario')[0].reset();
            $('#mensaje').addClass('bien').html(registro).show(200).delay(2500).hide(200);
            $('#Model_update').modal('hide');
            return false;
        }
    });
    return false;
};