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
        <a href="newCompany.php" class="btn  btn-primary float-end mb-3">Pridėti naują įmonę</a>
    </div>
<table class="table table-warning table-striped mt-3">
    @foreach($companys as $company)
        <tr>
            <td>{{ $company->name }}</td>
            <td>{{ $company->address }}</td>
            <td>{{ $company->vat_code }}</td>
            <td>{{ $company->company_name }}</td>
            <td>{{ $company->phone }}</td>
            <td>{{ $company->email }}</td>
            <!--<td><a href="?delete_id={{ $company->id }}">Istrinti</a> </td>-->
        </tr>
    @endforeach
</table>
</div>
</body>

</html>