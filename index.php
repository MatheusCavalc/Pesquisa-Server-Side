<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armazem</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script>
        function getDelete(id) {
			location.href = 'controller.php?acao=remover&id='+id;
        }
    </script>
</head>

<body>
    <main>
        <div class="container py-4 text-center">
            <h2>Empregados</h2>

            <div class="row justify-content-md-center">
                <div class="col-md-4">
                    <form action="" method="POST">
                        <label for="campo">Buscar:</label>
                        <input type="text" name="campo" id="campo">
                    </form>
                </div>
            </div>

            <div class="row py-4">
                <div class="col">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <th>ID do Empregado</th>
                            <th>Nome</th>
                            <th>Sobrenome</th>
                            <th>Data de Nascimento</th>
                            <th>Data de Admissao</th>
                            <th></th>
                        </thead>

                        <!-- Campo de dados-->
                        <tbody id="content">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>
        // chamando a funcao de pesquisa
        getData()

        // a cada tecla colocada no campo de pesquisa a funcao e chamada
        document.getElementById("campo").addEventListener("keyup", getData)

        // Ajax
        function getData() {
            let input = document.getElementById("campo").value
            let content = document.getElementById("content")
            let url = "load.php"
            let formaData = new FormData()
            formaData.append('campo', input)

            fetch(url, {
                    method: "POST",
                    body: formaData
                }).then(response => response.json())
                .then(data => {
                    content.innerHTML = data
                }).catch(err => console.log(err))
        }
    </script>

    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>