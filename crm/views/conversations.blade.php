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
<div class="container mt-5">
    <h1> {{ $title }}</h1>

    <div>
        <a href="newConversation.php" class="btn  btn-primary float-end mb-3">Pridėti naują susitikimą</a>
    </div>
    <table class="table table-warning table-striped mt-3">
        @foreach($conversations as $conversation)
            <tr>
                <td>{{$conversation->getCustomer()->name}}</td>
                <td>{{ $conversation->date }}</td>
                <td>{{ $conversation->conversation }}</td>
                <td>

                </td>
                <!--<td><a href="?delete_id={{ $company->id }}">Istrinti</a> </td>-->
            </tr>
        @endforeach
    </table>
</div>
</body>

</html>
