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
<style>
    body {
        font-family: fantasy;
        line-height: 120%;
        text-align: center;
    }

    .total {
        font-weight: bold;
        color: red;
    }
</style>
    @php
        $books = [];

        $booksArray = json_decode(\Illuminate\Support\Facades\Redis::get('reader_books_'.$reader['_id']));

        $year = date('Y');

        foreach ($booksArray as $bookArray) {
            if(\Carbon\Carbon::parse($bookArray->created_at)->format('Y') == $year) {
                $books[] = $bookArray;
            };
        };
    @endphp
    <div>
        A equipe deseja um feliz aniversário para você, {{$reader['name']}}.
    </div>
    <div>
        Você leu um total de <span class="total">{{count($books)}}</span> livros neste ano, que impressionante!

        @php
            $pages = 0;

            foreach ($books as $book) {
                $pages += $book->pages;
            }
        @endphp

        Total de páginas lidas: <span class="total">{{$pages}}</span>.
    </div>
</body>
</html>
