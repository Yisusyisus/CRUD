<?php

    include("db.php");

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query = "SELECT * FROM usuarios WHERE id=$id";
        $result= mysqli_query($conn,$query);
        if (mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre'];
            $apellidos = $row['apellidos'];

        }
    }
    if(isset($_POST['actualiza'])){
        $id = $_GET['id'];
        $nombre=$_POST['nombre'];
        $apellidos=$_POST['apellidos'];
        
        $query = "UPDATE usuarios set nombre='$nombre',apellidos = '$apellidos' WHERE id=$id";
        mysqli_query($conn,$query);
        
        $_SESSION['message'] = 'Registro Actualizado';
        $_SESSION['message_type']='warning';
        header("Location: index.php");

    }
?>


<?php include("includes/header.php") ?>
    <div class="container p-4">
        <div class="$row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                        <input type="text" name="nombre" value="<?php echo $nombre;?>"class="form-control"placehorlder="Actualiza el nombre">
                        </div>
                        <div class="form-group">
                        <textarea name="apellidos" rows ="2" class="form-control"placeholder="Actualiza los apellidos"><?php echo $apellidos; ?></textarea>
                        </div>
                        <button class="btn btn-success" name="actualiza">
                        Actualiza
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include("includes/footer.php") ?>
