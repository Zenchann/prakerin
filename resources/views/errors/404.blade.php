<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    body, html{
    margin: 0 auto;
    padding: 0;
    font-weight: 800;
    }

body{
    background: #000;
    font-family: cursive;
}

svg {
    display: block;
    font: 10.5em 'Monoton';
    width: 960px;
    height: 300px;
    margin: 0 auto;
}

.content{
    text-align: center;
}

h1{
    text-align: center;
    font: 2em 'Roboto', sans-serif;
    font-weight: 900;
    color: #2f8f7f;
    opacity: .6;
}

a{
    display: inline-block;
    text-transform: uppercase;
    font: 1em 'Roboto';
    font-weight: 300;
    border: 1px solid #2f8f7f;
    border-radius: 4px;
    color: #2f8f7f;
    margin-top: 10%;
    padding: 8px 14px;
    text-decoration: none;
    opacity: .6;
}

.text {
    fill: none;
    stroke: white;
    stroke-dasharray: 8% 29%;
    stroke-width: 5px;
    stroke-dashoffset: 1%;
    animation: stroke-offset 5.5s infinite linear;
}

.text:nth-child(1){
	stroke: #1c234d;
	animation-delay: -1;
}

.text:nth-child(2){
	stroke: #315b2c;
	animation-delay: -2s;
}

.text:nth-child(3){
	stroke: #2f8f7f;
	animation-delay: -3s;
}

.text:nth-child(4){
	stroke: #2f8f7f;
	animation-delay: -4s;
}

.text:nth-child(5){
	stroke: #da2717;
	animation-delay: -5s;
}

@keyframes stroke-offset{
	100% {
    stroke-dashoffset: -35%;
}
}
</style>
</head>
<
<body>
    svg viewBox="0 0 960 300">
	<symbol id="s-text">
		<text text-anchor="middle" x="50%" y="80%">404</text>
	</symbol>

	<g class = "g-ants">
		<use xlink:href="#s-text" class="text"></use>
		<use xlink:href="#s-text" class="text"></use>
		<use xlink:href="#s-text" class="text"></use>
		<use xlink:href="#s-text" class="text"></use>
		<use xlink:href="#s-text" class="text"></use>
	</g>
</svg>
    <div class="content">
    <h1>Page Not Found</h1>
    <a href="#">Back to Home</a>
    </div>
</body>
</html>
