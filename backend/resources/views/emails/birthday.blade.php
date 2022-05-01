<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feliz Aniversário!</title>
</head>
<body>
    <div>
        A equipe deseja um feliz aniversário para você! {{$reader->name}}
    </div>
    <div>
        Você leu um total de {{count($reader->books)}} livros neste ano, que impressionante!

        @php
            $pages = 0;

            foreach ($reader->books as $book) {
                $pages += $book->pages;
            }
        @endphp

        Total de páginas lidas: {{$pages}}.
    </div>
</body>
</html>
