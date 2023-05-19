<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIODATA</title>
    <link rel="shortcut icon" href="assets/img/logoRA.png">
  <style>
    a {
      color: rgb(0, 0, 0);
      text-decoration: none;
    }

    ul {
      list-style-type: none;
      text-align: center;
    }

    li {
      display: inline;
      justify-content: center;
      padding: 10px;
      font-size: 18px;
    }

    .scroll2 {
      display: flex;
      justify-content: center;
      align-content: center;
    }

    .ikyy {
      width: 250px;
      outline: 8px solid #000;
      outline-offset: calc(250/-2);
      cursor: pointer;
      transition: 0.3s;
      border-radius: 50%;
    }

    .ikyy:hover {
      outline: 8px solid #000;
      outline-offset: 10px;
    }
  </style>
</head>

<body>
  <header>
    <nav>
        <h3 style="text-align: center;">LARAVEL</h3>
        <ul>
            <hr>
            <li><a href="{{ route('user.index') }}">Table User</a></li>|
            <hr>
        </ul>
    </nav>
</header>

<main>
    <section>
        <article>
            <h2 style="text-align: center;">Web Sederhana</h2>
            <div class="scroll2">
                <img src="{{ asset('images/iky.png') }}" alt="iky" class="ikyy">
            </div>
            <h1 style="text-align: center;">Rizky Apriansyah : 4693003</h1>
      </article>
    </section>
  </main>
  <br>
  <footer style="text-align: center;">
    <p>&copy; 2023 Arkatama Elemen Semantik HTML</p>
  </footer>
</body>
</html>
