<html>
<head>
	<title>Toe game</title>
	<style>
	#board {
		display:flex;
		width:600px;
		height:600px;
		flex-direction:row;
		flex-wrap: wrap;
		justify-content: flex-start;
		padding: 20px;
	}
	.square {
		height:200px;
		width:200px;
		box-sizing:border-box;
		border:5px solid gray;
		font-size: 5em;
		display: flex;
		justify-content: center;
	}
	.square:hover {
		cursor:pointer;
		background-color:red;
	}	
	</style>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</head>
<body>
	<div id='board'>
		<div class='square'></div>
		<div class='square'></div>
		<div class='square'></div>
		<div class='square'></div>
		<div class='square'></div>
		<div class='square'></div>
		<div class='square'></div>
		<div class='square'></div>
		<div class='square'></div>
	</div>
	<button>Reset</button>
<script>
	var player_one = 'X';
	var player_two = 'O'
	var currentTurn = player_one;

	var board = $('#board');
	board.on('click', function(e){
		console.log($(this));
		$(e.target).html(currentTurn);	
		currentTurn = currentTurn === player_one ? player_two : player_one;
		console.log(currentTurn);
		if(checkForWinners()){
			alert('combos were found');
		}
		var square = $('.square');
		reset(square);
	});

	$('.square').on('click', function(){
		$(this).css('background', 'red');
	});

	function reset($selector) {
	
		$('button').on('click', function(){
			$selector.text('');
               		 currentTurn = player_one;
			$('.square').css('background', 'white'); 
		});
	 
	}
	function checkForWinners() {
		var symbols = [];
		
		$('.square').each(function(e){
			symbols.push($(this).text());		
		});

		var allPossibleCombos = [[0, 1, 2], [3, 4, 5], [6, 7, 8], [0, 3, 6], [1, 4, 7], [2, 5, 8], [0, 4, 8], [2, 4, 6], [6, 4, 2], [8, 4, 0]];

		console.log(symbols);	

		return allPossibleCombos.find(function(combo){
	
			console.log('Symbols 0 '+ symbols[combo[0]]);
	                console.log('Symbols 1 '+ symbols[combo[1]]); 
			console.log('Symbols 2 '+ symbols[combo[2]]);

			if (symbols[combo[0]] == symbols[combo[1]] && symbols[combo[1]] == symbols[combo[2]]){
				return symbols[combo[0]];
			} else {
				return false;
			} 
		});
	}	
</script>
</body>
</html>
