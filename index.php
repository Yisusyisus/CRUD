<?php include ("db.php") //echo "Hola Mundo";?>

<?php include ("includes/header.php")?>
    
<!----<H1>Hola Mundo</h1>---->
<div class="container p-4">
    <div class="row">
    <div class="col-md-4">

        <?php if(isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
    <?= $_SESSION['message'] ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <?php session_unset(); }      ?>



    <div class="card card-body">
    <form action="guardar.php" method="POST">
    <div class="form-group">
        <input type="text" name="nombre" class="form-control" placeholder="Escribe un nombre" autofocus>
    </div>
    <div class="form-group">
    <textarea name="apellidos" rows="2" class="form-control" placeholder="Escribe los apellidos"></textarea>
    </div>
    <input type="submit" class="btn btn-success btn-block" name="guardar" value="Guardar">
    </form>
    </div>
    
    </div>
            <div class="col-md-8">
            <table class="table table-bordered">
            <thead>
            <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Creado</th>
            <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $query = "SELECT * FROM usuarios";
            $resultado_usuarios = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($resultado_usuarios)){ ?>
            <tr>
            <td><?php echo $row['nombre'] ?></td>
            <td><?php echo $row['apellidos'] ?></td>
            <td><?php echo $row['creado'] ?></td>
            <td>
            <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"> </i>
            </a>
            <a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger">
            <i class="far fa-trash-alt"> </i>
            </a>
            </td>
            </tr>
            
            <?php } ?>

            </tbody>
        </div>
    </div>
    </div>
<?php include ("includes/footer.php")?>
