<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='css/login.css'>
</head>
<body onload>
    <div class="login ">
	    <h1>Login</h1>
        <form action="processa/processa3.php" method="post">
            <div class="form-check">
                <label class="form-check-label" for="login">
                    Login:
                </label> 
                <input type="text" name="log" required="required"/>
            </div>
            <div class="form-check">
                <label class="form-check-label" for="senha">
                    Senha: 
                </label>
                <input type="password" name="senha" required="required" />
            </div>
                <input type="submit" class="btn btn-primary btn-block btn-large" value="logar" name="logar">
        </form>
    </div>
    

    <a class="nav-link" href="index/indexUsu.php">Cadastro</a>
</body>
</html>