<html>
	<head>
		<meta charset="utf-8">
		<title>Tweet, Fun, Share!</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<body>

		<nav class="navbar navbar-default">
			
			<div class="container">
				<div class="navbar-header">	
					<a href="/" class="navbar-brand">Twitty</a>
				</div>

			</div>

		</nav>

		<div class="container">
			<form enctype="multipart/form-data" class="well" action="/tweet" method="post">
				{{csrf_field()}}

			

				<div class="form-group">
					<label>Tweet Text</label>
					<input type="text" class="form-control" name="tweet">
				</div>


				<div class="form-group">
					<label>Upload Images</label>
					<input type="file" name="images[]" class="form-control">
				</div>


				<div class="form-group">
					<button class="btn btn-success">Post!</button>
				</div>


			</form>
			@if(!empty($data))
				
				@foreach($data as $key => $tweet)

				<div class="well">
					
					<h3>{{$tweet['text']}}
						<i class="glyphicon glyphicon-heart">
						</i>
						{{$tweet['favorite_count']}}

						<i class="glyphicon glyphicon-repeat">
						</i>
						{{$tweet['retweet_count']}}
					</h3>
					@if(!empty($tweet['extended_entities']['media']))
						@foreach($tweet['extended_entities']['media'] as $i)
						<img src="{{ $i['media_url_https']}}" style="width:100px;" alt="">
						@endforeach
					@endif
				</div>
					@endforeach
				@else
					<p>NO Tweets Found..</p>
				

			@endif


		</div>
	
	</body>

</html>