<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    nama product : {{$products->product_name}}
    <hr>
    <h3>review</h3>

    @foreach ($products->reviews as $review)
        <div class="review">
            <div class="name-user"><p>  {{$review->user->name}}</p></div>
            <div class="content"><p>  {{$review->content}}</p></div>
            <button class="btn-reply" data-id="{{$review->id}}">Balas</button>
        </div>
      <hr>
    @endforeach
</body>
</html>