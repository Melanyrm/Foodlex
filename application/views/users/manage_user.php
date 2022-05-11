<?php 
$chk = 0;
if(!empty($id) && $id > 0):
$qry = $this->db->get_where('users',array('id'=>$id));
$chk = $qry->num_rows();
$row = $qry->row();
endif;

?>
<form id="user-frm" autocomplete="off">
    <input type="hidden" id="id" name="id" value="<?php echo $id > 0 ? $id : '' ?>">
<div class="col-md-12">
    <div class="form-group row">
        <div class="col-sm-4">
            <label for="firstname" class="control-label" >Nombres</label>
        </div>
        <div class="col-md-8"><input type="text" class="form-control" required id="firstname" name="firstname" value="<?php echo $chk <= 0 ? '' : $row->firstname ?>"></div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4">
            <label for="lastname" class="control-label" >Apellidos</label>
        </div>
        <div class="col-md-8"><input type="text" class="form-control" required id="lastname" name="lastname" value="<?php echo $chk <= 0 ? '' : $row->lastname ?>"></div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4">
            <label for="email" class="control-label" >Correo electrónico</label>
        </div>
        <div class="col-md-8">
        <input type="text" class="form-control" required id="email" name="email" value="<?php echo $chk <= 0 ? '' : $row->email ?>">
        <small style="color:red" class="email_validation"></small>
        </div>

    </div>

    <div class="form-group row">
        <div class="col-sm-4">
            <label for="password" class="control-label" >Contraseña</label>
        </div>
        <div class="col-md-8"><input autocomplete="false" type="password" class="form-control" id="password" name="password"  <?php echo empty($id) ? 'required' : '' ?>>
        <?php if(!empty($id)){ ?>
        <small class="text-muted">*Complete este campo solo cuando desee cambiar su contraseña.</small>
        <?php } ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4">
            <label for="phone_number" class="control-label" >Teléfono / Celular</label>
        </div>
        <div class="col-md-8">
        <input type="number" class="form-control" id="phone_number" name="phone_number" value="<?php echo $chk <= 0 ? '' : $row->phone_number ?>"></div>

    </div>
    <?php if(empty($my_account)): ?>
    <div class="form-group row">
        <div class="col-sm-4">
            <label for="type" class="control-label" >Tipo de usuario</label>
        </div>
        <div class="col-md-8">
        <select type="text" class="form-control" required id="type" name="type">
            <?php if($row->type <= 0 && $chk <= 0){ ?>
            <option value="" selected="selected" disabled>Por favor seleccione</option>
            <?php } ?>
            <option value="1" <?php echo $chk > 0 && $row->type == 1 ? 'selected' : '' ?>>Admin</option>
            <option value="2" <?php echo $chk > 0 && $row->type == 2 ? 'selected' : '' ?>>Cocina</option>
            <option value="3" <?php echo $chk > 0 && $row->type == 3 ? 'selected' : '' ?>>Cajero</option>
            <!-- <option value="4" <?php echo $chk > 0 && $row->type == 4 ? 'selected' : '' ?>>Delivey Side</option> -->
            <option value="5" <?php echo $chk > 0 && $row->type == 5 ? 'selected' : '' ?>>Cliente</option>
            <option value="6" <?php echo $chk > 0 && $row->type == 6 ? 'selected' : '' ?>>Autoservicio</option>
        </select>
        </div>

    </div>
    <?php else: ?>
        <input type="hidden" value="<?php echo $chk <= 0 ? '' : $row->type ?>" name="type">
    <?php endif; ?>
    <hr>

    <div class="row">
        <div class="col-sm-12"><button class="btn btn-primary pull-right">Guardar</button></div>
    </div>
</div>
</form>

<script>
$(document).ready(function(){
    $('#user-frm').submit(function(e){
        e.preventDefault()

        var data = $(this).serialize();

        start_loader()
        $('.email_validation').html('')

        $.ajax({
            url:'<?php echo base_url('cogs/check_email') ?>',
            method:'POST',
            data:{email:$('#email').val(),id:$('#id').val()},
            error:(err)=>{
                Dtoast('Ha ocurrido un error. Por favor inténtelo nuevamente!.','error')
                console.log(err)
                end_loader
                return false;
            },
            success:function(resp){
                if(resp > 0){
                    $('.email_validation').html('* El correo electrónico ya existe.')
                    end_loader()
                }else{
                    $.ajax({
                        url:'<?php echo base_url('cogs/save_user') ?>',
                        method:'POST',
                        data:data,
                        error:err=>{
                            console.log(err)
                            Dtoast('An error occured. Please try to reload this page','error');
                            end_loader();
                        },
                        success:resp=>{
                            if(resp == 1){
                                Dtoast('Data successfully saved.','success')
                                $('.modal').modal('hide')
                                if(typeof 'load_users' =='function'){
                                    load_users();
                                    end_loader()
                                }else{
                                    setTimeout(function(){
                                        location.reload()
                                    },2000)
                                }
                                
                            }else{
                                Dtoast('An error occured. Please try to reload this page','error');
                                end_loader();
                            }
                        }
                    })
                }
            }
        })

        
    })
})
</script>