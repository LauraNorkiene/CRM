<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">Pridėti susitikimą</div>
                <div class="card-body ">
                    <form action="" method="POST">
                        <input type="hidden" name="action" value="insert">
                        <div class="mb-3">
                            <label for="" class="form-label">Klientas</label>
                            <input name="name" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Data</label><br>
                            <input type="date" id="date" name="date">

                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Pokalbis</label>
                            <input name="vat_code" type="text" class="form-control">
                        </div>

                        <button class="btn btn-success">Pridėti</button>
                        <a href="index.php" class="btn btn-info float-end">Atgal</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>

