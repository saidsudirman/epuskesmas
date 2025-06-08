<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form class="form-inline mr-2" method="GET" action="{{ route('informasi.index') }}">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search Judul" value="{{ request('search') }}">
            <div class="input-group-btn">
                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <h1>cai</h1>
</body>
</html>