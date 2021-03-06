<div class="col-md-12">

<div class="row">
<div class="col-sm-2">
    <button class="btn btn-primary" id="add_user" type="button"><i class="fa fa-plus"></i> Agregar Usuario</button>
</div>
</div>
<hr>
    <div class="row">
        <div class="col-sm-12">
           <table class="table table-bordered table-striped" width="100%" id="list-field">
                <thead>
                    <tr>
                        <th class='text-center'>#</th>
                        <th class='text-center'>Correo electrónico</th>
                        <th class='text-center'>Nombres</th>
                        <th class='text-center'>Teléfono #</th>
                        <th class='text-center'>Tipo</th>
                        <th class='text-center'>Acción</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
           </table>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    load_users();
    

    $('#add_user').click(function(){
        AjaxUniModal('35','<?php echo base_url('admin/manage_user/') ?>','Nuevo usuario')
    })
})
window.load_users = function(){
    $('#lsit-field').dataTable().fnDestroy();
    $('#list-field tbody').html('<tr><td colspan="6"><center>Loading data...</center></td></tr>');

    $.ajax({
        url:'<?php echo base_url('admin/user_list') ?>',
        method:'POST',
        data:{},
        error:(err)=>{
            console.log(err)
            Dtoast('An error occured while loading data.','error')
             $('#list-field tbody').html('<tr><td colspan="6"><center>An error occured while loading data.</center></td></tr>');
        },
        success:resp=>{
            if(typeof resp != undefined){
                resp = JSON.parse(resp)

                if(Object.keys(resp).length > 0){
                    $('#list-field tbody').html('');
                    var i =0;
                    Object.keys(resp).map(k=>{
                        i++;
                        var tr = $('<tr></tr>').clone()
                        tr.append('<td class="text-center">'+i+'</td>')
                        if(resp[k].status == 2)
                        tr.append('<td>'+resp[k].email+'&nbsp;<span class="badge badge-danger">Blocked<span></td>');
                        else
                        tr.append('<td>'+resp[k].email+'</td>');
                        tr.append('<td>'+resp[k].name+'</td>')
                        tr.append('<td>'+resp[k].phone_number+'</td>')
                        var utype = '';
                        if(resp[k].type == 1)
                            utype = 'Admin';
                        else if(resp[k].type == 2)
                            utype = 'Kitchen Side';
                        else if(resp[k].type == 3)
                            utype = 'Cashier';
                        else if(resp[k].type == 4)
                            utype = 'Driver Side';
                        else if(resp[k].type == 5)
                            utype = 'Client';
                        tr.append('<td>'+utype+'</td>')
                        ddbtn = '<td><center>'
                        ddbtn += '<div class="dropdown">'+
                                '<button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded=>Acción  </button>'+
                                // '<button type="button" class="btn btn-primary btn-sm"true">'+
                                //     '<span class="sr-only">Toggle Dropdown</span>'+
                                // '</button>'+
                                '<div class="dropdown-menu">'+
                                    '<a class="dropdown-item edit_user" href="javascript:void(0)" data-id="'+resp[k].id+'">Editar</a>'+
                                    '<div class="dropdown-divider"></div>';
                                 if(resp[k].status == 1)
                                    ddbtn +=  '<a class="dropdown-item block_user" href="javascript:void(0)" data-id="'+resp[k].id+'">Bloquear</a>';
                                else
                                    ddbtn +=  '<a class="dropdown-item unblock_user" href="javascript:void(0)" data-id="'+resp[k].id+'">Desbloquear</a>';
                                    ddbtn +='<div class="dropdown-divider"></div>'+
                                    '<a class="dropdown-item remove_user" href="javascript:void(0)" data-id="'+resp[k].id+'" data-name="'+resp[k].email+'">Eliminar</a>'+
                                '</div>'+
                                '</div>';
                        ddbtn += '</center></td>'
                        tr.append(ddbtn)
                        $('#list-field tbody').append(tr);
                    })
                }else{
                    $('#list-field tbody').html('');
                }
                

            }
        },
        complete:()=>{
            load_ufunc();
            $('#list-field').dataTable()
        }
    })
}
window.load_ufunc = function(){
    $('.block_user').each(function(){
        $(this).click(function(){
            AjaxUniModal('20','<?php echo base_url('admin/block_confirm_page/') ?>'+$(this).attr('data-id'),'Block Confirmation')
        })
    })
    $('.unblock_user').each(function(){
        $(this).click(function(){
            AjaxUniModal('20','<?php echo base_url('admin/block_confirm_page/') ?>'+$(this).attr('data-id')+'/unblock','Unblock Confirmation')
        })
    })

    $('.edit_user').each(function(){
        $(this).click(function(){
             AjaxUniModal('35','<?php echo base_url('admin/manage_user/') ?>'+$(this).attr('data-id'),'Editar usuario')

        })
    })
    $('.remove_user').each(function(){
        $(this).click(function(){
            delete_data('Estás seguro de eliminar <b>'+$(this).attr('data-name')+'</b> permanently?','delete_user',[$(this).attr('data-id')])
        })
    })
}

window.delete_user = function($id){
    start_loader()
    $.ajax({

        url:'<?php echo base_url('admin/user_delete') ?>',
        method:'POST',
        data:{id:$id},
        error:err=>{
            console.log(err)
            Dtoast('An error occred.','error');
            end_loader()
        },
        success:resp=>{
            if(resp == 1 ){
                Dtoast('Data successfully deleted','success')
                $('.modal').modal('hide')
                load_users()
                end_loader()

            }else{
                Dtoast('An error occred.','error');
                end_loader()
            }
        }

    })
}
</script>