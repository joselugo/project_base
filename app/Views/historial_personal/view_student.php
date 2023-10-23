<style>
    .profile-picture {
        width: 120px;
        height: 120px;
        border-radius: 90%;
        object-fit: cover;
    }
</style>
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li class="breadcrumb-item"><a href="#index/home">Inicio</a></li>
    <li class="breadcrumb-item"><a href="#estudiantes">Lista de estudiantes</a></li>
    <li class="breadcrumb-item active">Perfil estudiante</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header"><i class="fa fa-user"></i> Perfil Estudiante</h1>
<!-- end page-header -->

<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30">
                    <img src="<?= base_url() . 'public/uploads/img_students/' . $row->photo ?>" class="profile-picture" style="border-radius: 50%;" />
                    <h4 class="card-title m-t-10"><?= $row->name  ?></h4>
                    <h6 class="card-subtitle">Estudiante</h6>
                    <br>
                    <!--   <button type="button" onClick="getfb()" class="btnfb btn btn-xs btn-white" data-toggle="tooltip" title="Obtener Avatar desde Facebook" style="margin-right: 5px;font-size: 10px;padding: 4px 7px;"><i class="fab fa-facebook-f"></i>acebook</button>
                    <button type="button" onClick="gettwitter()" class="btntwitter btn btn-xs btn-white" data-toggle="tooltip" title="Obtener Avatar desde twitter" style="margin-right: 5px;font-size: 10px;padding: 4px 7px;"><i class="fab fa-twitter"></i> Twitter</button>
                    <button type="button" onClick="getgravatar()" class="btngravatar btn btn-xs btn-white" data-toggle="tooltip" title="Obtener Avatar desde Gravatar" style="margin-right: 5px;font-size: 10px;padding: 4px 7px;"><i class="fas fa-camera-retro"></i> Gravatar</button> -->
                </center>

            </div>
            <hr>
            <center class="m-t-30">
                <div class="card-body">
                    <small class="text-muted"><i class="fa fa-bookmark" aria-hidden="true"></i> Matricula</small>
                    <h6><?= $row->dni ?></h6>
                    <small class="text-muted"><i class="far fa-envelope" aria-hidden="true"></i> Email</small>
                    <h6><?= $row->email  ?></h6>
                    <small class="text-muted p-t-30 db"><i class="fas fa-mobile-alt" aria-hidden="true"></i> Teléfono Móvil</small>
                    <h6><?= $row->phone ?></h6>
                </div>
            </center>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">


            <form id="frm-login" class="form-horizontal form-material">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#datos" role="tab" aria-expanded="true">Datos del estudiante</a> </li>
                    <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#configoperdor" role="tab" aria-expanded="false">Configuración</a> </li> -->
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="datos" role="tabpanel" aria-expanded="true">
                        <div class="card-body">
                            <?php
                            // Supongamos que $row->job contiene la fecha en formato yyyy-mm-dd
                            $fecha = $row->job;
                            // Configuramos la localización a español
                            setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'spanish');
                            // Convertimos la fecha en un timestamp
                            $timestamp = strtotime($fecha);
                            // Formateamos la fecha en español
                            $fechaFormateada = strftime("%d de %B del %Y", $timestamp);
                            ?>
                            <div class="form-group">
                                <label class="col-md-12"><i class="far fa-user-o" aria-hidden="true"></i> Fecha nacimiento</label>
                                <div class="col-md-12">
                                    <input name="job" id="job" value="<?= $fechaFormateada ?>" class="form-control form-control-line datetk" readonly />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12"><i class="far fa-user-o" aria-hidden="true"></i> Sexo</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="user-nombre" value="<?= $row->sex ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12"><i class="far fa-user-o" aria-hidden="true"></i> Tipo de sangre</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="user-nombre" value="<?= $row->bloodgroup ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12"><i class="far fa-user-o" aria-hidden="true"></i> Direccion Completa</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="user-nombre" value="<?= $row->address ?>" readonly>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
    <!-- Column -->
</div>