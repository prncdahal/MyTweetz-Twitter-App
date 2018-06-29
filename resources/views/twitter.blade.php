<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My Tweetz</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
      <div class="container">
        <div class="navbar-header">
          <a href="/" class="navbar-brand">MyTweetz</a>
        </div>
      </div>

    </nav>
    <div class="container">
  <form class="" action="{{route('post.tweet')}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      @if(count($errors) > 0)
        @foreach($errors->all() as $error)
          <div class="alert alert-danger">
            {{$error}}
          </div>
        @endforeach
      @endif
  <div class="card mb-4">
    <div class="card-body">
      <div class="form-group">
        <label for="">Tweet Text</label>
        <input type="text" name="tweet" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Upload Images</label>
        <input type="file" name="images[]" multiple class="form-control">
      </div>
      <div class="form-group">
          <button class="btn btn-success">Create Tweet</button>
      </div>
    </div>
  </div>
  </form>



      @if(!empty($data))
        @foreach($data as $key=>$tweet)
        <div class="card mb-4">
          <h4 class="card-header">{{$tweet['text']}}
          </h4>
        <div class=card-body>


          @if(!empty($tweet['extended_entities']['media']))
            @foreach($tweet['extended_entities']['media'] as $i)
            <p>  <img src="{{$i['media_url_https']}}" style="width:350px; height:200px;" ></p>
            @endforeach
          @endif
          <i class="fa fa-heart "></i> {{$tweet['favorite_count']}}
         <i class="fa fa-redo ml-2"></i> {{$tweet['retweet_count']}}
        </div>
        </div>
        @endforeach

      @else
      <p>No tweets found</p>

      @endif
    </div>

  </body>
</html>
