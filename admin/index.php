
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>... Ambiente Restrito: Blotti ...</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="styles.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div class="login">


<form action="autentica.php" method="post" enctype="application/x-www-form-urlencoded" name="login">

<div class="form-group">
    <label for="usuario">Usuário</label>
    <input type="text" name="usuario" class="form-control" id="usuario" aria-describedby="usuario"
     placeholder="">
    
  </div>
  <div class="form-group">
    <label for="senha">Senha</label>
    <input type="password" name="senha" class="form-control" id="senha" placeholder="">
  </div>

  <button type="submit" class="btn btn-secondary btn-block">Entrar</button>
</form>
</div>
</body>
</html>
