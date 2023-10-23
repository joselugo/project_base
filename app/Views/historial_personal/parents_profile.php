<style>
    /* Estilos generales */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
    }

    .container {
        display:grid;
        place-items:center;
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 80px;
    }

    /* Estilos del perfil */
    .profile {
        display: flex;
        align-items: center;
    }

    .profile-info {
        text-align: center;
        margin-right: 40px;
    }

    .profile-picture {
        width: 120px;
        height: 120px;
        border-radius: 90%;
        object-fit: cover;
    }

    .profile-name {
        margin: 10px 0;
        font-size: 24px;
        font-weight: bold;
    }

    .profile-title {
        margin: 0;
        font-size: 18px;
        color: #888;
    }

    .profile-location {
        margin: 10px 0;
        font-size: 14px;
        color: #888;
    }

    .profile-details {
        margin-top: 20px;
    }

    .detail-row {
        display: flex;
        margin-bottom: 10px;
    }

    .detail-label {
        flex-basis: content;
        font-weight: bold;
    }

    .detail-value {
        flex-basis: content;
        color: #888;
    }
</style>

<!DOCTYPE html>
<html>

<body>
    <ol class="breadcrumb pull-right d-print-none">
        <li class="breadcrumb-item"><a href="#index/home">Inicio</a></li>
        <li class="breadcrumb-item"><a href="#parents">Lista de padres</a></li>
        <li class="breadcrumb-item active"><?= $row->nametutor ?>(<small>ID: </small><?= $row->parentsID ?>)</li>
    </ol>
    <br><br>
    <div class="container">
        <div class="profile">
            <div class="profile-info">

                <img src="<?= base_url() . 'public/uploads/img_teachers/' . $row->photo ?>" alt="Perfil" class="profile-picture">
                <h1 class="profile-name"><?= $row->nametutor ?></h1>
                <h2 class="profile-title"><?= $row->relationship ?></h2>
              
            </div>
            <div class="profile-details">
                <div class="detail-row">
                    <span class="detail-label">DNI:</span>
                    <span class="detail-value">&nbsp<?= $row->dni ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Día de ingreso:</span>
                    <span class="detail-value">&nbsp<?= $row->create_date ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Nombre de la madre:</span>
                    <span class="detail-value">&nbsp<?= $row->namemother ?></span>
                </div>
              
                <div class="detail-row">
                    <span class="detail-label">Nombre del padre:</span>
                    <span class="detail-value">&nbsp<?= $row->namefather ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Dirección:</span>
                    <span class="detail-value">&nbsp<?= $row->address ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Email:</span>
                    <span class="detail-value">&nbsp<?= $row->email ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Teléfono:</span>
                    <span class="detail-value">&nbsp<?= $row->phone ?></span>
                </div>
               
                <div class="detail-row">
                    <span class="detail-label">Usuario:</span>
                    <span class="detail-value">&nbsp<?= $row->username ?></span>
                </div>


            </div>
        </div>
    </div>
</body>

</html>