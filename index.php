<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.0.0.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.3.1.js"></script>
    <script type="text/javascript" src="script/jquery.mask.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $("#salario").mask("999.999.990,00", {
            reverse: true
        })
        $('#nascimento').mask("00/00/0000")
    })
    </script>

    <title>Formulario BootStrap</title>
    <style>
    .content {
        width: 80%;
        margin: 10px auto;
    }
    </style>
</head>

<body>
    <div class="content">
        <h2>Cadastro</h2>
        <?php
        $erros = [];

        if(count($_POST)>0){
            if(!filter_input(INPUT_POST,'nome')){
                $erros['nome'] = 'Nome é obrigatório!';
            }
        
        if(!filter_input(INPUT_POST, 'nascimento')){
            $erros['nascimento'] = "Data de nascimento é obrigatória";
        }




        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $erros['email'] = 'E-mail inválido';
        }
        if(!filter_var($_POST['site'],FILTER_VALIDATE_URL)){
            $erros['site'] = 'Site inválido use o formato http://';
        }

        $filhosConfig = [
            "options" => ["min_range"=>0, "max_range" => 20]
            ];

            if(!filter_var($_POST['filhos'], FILTER_VALIDATE_INT, $filhosConfig) && $_POST['filhos'] !=0){
                $erros['filhos'] = 'Quantidade de filhos inválida';
            }

            $salarioConfig = (float) $_POST['salario'];
             if($salarioConfig == 0 || !is_float($salarioConfig)){
                $erros['salario'] = 'Salário inválido!';
             }
             


        }
    
        ?>

        <!-- <?php  foreach($erros as $erro): ?>
        <div class="alert alert-danger" role="alert">
            <?= "" ?>
        </div>
        <?php endforeach ?> -->




        <form action="#" method="post">
            <div class="form-row">
                <div class="form-group col-md-9">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control <?= $erros['nome']? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $erros['nome']?>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="nascimento">Nascimento</label>
                    <input type="text" name="nascimento" id="nascimento" class="form-control <?= $erros['nascimento']? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $erros['nascimento']?>
                    </div>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control <?= $erros['email']? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $erros['email']?>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="site">Site</label>
                    <input type="url" name="site" id="site" class="form-control <?= $erros['site']? 'is-invalid' : '' ?>" placeholder="ex: http://">
                        <div class="invalid-feedback">
                        <?= $erros['site']?>
                    </div>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="filhos">Quantidade de filhos</label>
                    <input type="number" name="filhos" id="filhos" class="form-control <?= $erros['filhos']? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $erros['filhos']?>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="salario">Salário</label>
                    <span class="format-real" > R$ </span><input type="text" name="salario" id="salario"
                        class="form-control real <?= $erros['salario']? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                        <style>
                            .format-real{
                                top:40px;
                            }
                        </style>
                        <?= $erros['salario']?>
                    </div>
                </div>
            </div>
            <button class='btn btn-secondary btn-lg'>Enviar</button>
    </div>

    </form>

    </div>

</body>

</html>