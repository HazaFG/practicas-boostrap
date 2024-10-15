<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TAILWIND ES MEJOR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Hola, estoy usando bootstrap</h1>
      
        <div class="row h-100">
        <div class="col-md-6 d-none d-md-block">
          <img src="assets/jedi.jpg" class="img-fluid w-100 h-100" style="object-fit: cover;">
        </div>
  
        <div class="col-md-6 d-flex align-items-center justify-content-center">
          <form class="w-75" method="POST" action="app/AuthController.php">
            <div class="mb-3">
                <h1>Hola, inscríbete para ser un Jedi</h1>
                <label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="contrasena">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Mantenme informado</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>

            <input type="hidden" name="action" value="access">
          </form>
        </div>
      </div>
    </div>
</body>
</html>