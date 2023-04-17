<!DOCTYPE html>
<html>
<head>
	<title>Centered Page Example</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			display: flex;
			align-items: center;
			justify-content: center;
			height: 100vh;
			background-color: #f5f5f5;
		}
		.container {
			text-align: center;
			max-width: 600px;
			padding: 20px;
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0 5px 10px rgba(0,0,0,0.1);
		}
		.container img {
			max-width: 100%;
			height: auto;
			margin-bottom: 20px;
		}
		.container p {
			font-size: 18px;
			line-height: 1.5;
			margin: 0 auto;
			max-width: 80%;
			overflow-wrap: break-word;
			word-wrap: break-word;
			hyphens: auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<img src="dd.gif" alt="Example Image" width="200" height="300">
		<p>
			@if( LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
			{{$val->Description_ar}}
			@else
			{{$val->Description_en}}
			@endif
		</p>
	</div>
</body>
</html>
