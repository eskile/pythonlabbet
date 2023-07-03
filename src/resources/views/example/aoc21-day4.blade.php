@extends('template-example')
@section('title', 'Advent of Code 2021 - dag 4')
@section('description', '')
@section('content')

<h1>Advent of Code 2021 - dag 4</h1>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Här är min kod för Advent of Code dag 4.</p>
  <pre><code class="language-python"># Skapa en lista boards som innehåller alla bingobräden.
# Varje bingobräde är en 2D-lista med rader och kolumner
# motsvarande brädet.
f = open('4.in')
draws = list(map(int, f.readline().strip().split(',')))
f.readline()
boards = []
board = 0
row = 0
for line in f:
	if line == '\n':
		row = 0
		board += 1
		continue
	if row == 0:
		boards.append([])
	row += 1
	boards[board].append(list(map(int, line.split())))


# check_winner returnerar True om brädet är klart
def check_winner(board):
	# se om det finns en vinnare på en rad
	for row in range(5):
		marked = 0
		for col in range(5):
			if board[row][col] < 0:
				marked += 1
		if marked == 5:
			return True
	# se om det finns en vinnare på en kolumn
	for col in range(5):
		marked = 0
		for row in range(5):
			if board[row][col] < 0:
				marked += 1
		if marked == 5:
			return True

	return False

# Om ett draget nummer finns på brädet, markera det
# det görs genom att göra talet negativt
def mark_draw(board, nr):
	for row in range(5):
		for col in range(5):
			if board[row][col] == nr:
				board[row][col] = -nr
				return

# räkna ihop summan av icke-markerade tal på brädet
def count_unmarked(board):
	res = 0
	for row in range(5):
		for col in range(5):
			if board[row][col] > 0:
				res += board[row][col]
	return res


# räknar ut svaret i del 1
def part_1(draws, boards):
	for draw in draws:
		for b in boards:
			mark_draw(b, draw)
			if check_winner(b) == True:
				return count_unmarked(b) * draw
				

# räknar ut svaret i del 2
def part_2(draws, boards):
	exlude_boards = set()
	last_board = -1
	last_draw = -1
	for draw in draws:
		for i in range(len(boards)):
			if i in exlude_boards:
				continue
			last_draw = draw
			mark_draw(boards[i], draw)
			if check_winner(boards[i]) == True:
				exlude_boards.add(i)
				last_board = i
	return( count_unmarked(boards[last_board]) * last_draw )

print( 'Del 1:', part_1(draws, boards) )
print( 'Del 2:', part_2(draws, boards) )

</code></pre>
  
</div>


@endsection