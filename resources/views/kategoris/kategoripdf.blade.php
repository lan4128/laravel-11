<!DOCTYPE html>
<style>
    table{
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    td,th{
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    tr:nth-child(even){
        background-color: #dddddd;
    }
</style>
<html>
    <head>
        <title>Laravel 11 Generate PDF Example - ItSolutionStuff.com</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    </head>
    <body>
        <h1>{{ $title }}</h1>
        <p>{{ $date }}</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <table class="table table-bordered">
            <tr>
                <th>NAME</th>
            </tr>
            @foreach($kategoris as $kategori)
            <tr>
                <td>{{ $kategori->name }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>
