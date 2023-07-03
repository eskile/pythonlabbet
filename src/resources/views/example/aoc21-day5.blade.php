@extends('template-example')
@section('title', 'Advent of Code 2021 - dag 5')
@section('description', '')
@section('content')

<h1>Advent of Code 2021 - dag 5</h1>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>Här är min kod för Advent of Code dag 5.</p>
  <pre><code class="language-python">from collections import defaultdict
def run(day):
	f = open('5.in')
	d = defaultdict( lambda: 0 )

	for line in f:
		line = line.strip().split()
		x1,y1 = map(int, line[0].split(','))
		x2,y2 = map(int, line[2].split(','))
		if x1 == x2:
			for y in range(min(y1,y2), max(y1,y2)+1):
				d[(x1,y)] += 1
		elif y1 == y2:
			for x in range(min(x1,x2), max(x1,x2)+1):
				d[(x,y1)] += 1
		else:
			if day == 2:
				if x2 > x1:
					dx = 1
				else:
					dx = -1
				if y2 > y1:
					dy = 1
				else:
					dy = -1
				for i in range(abs(x2-x1)+1):
					d[(x1+i*dx, y1+i*dy)] += 1

	ans = 0
	for t in d:
		if d[t] > 1:
			ans += 1
	return ans

print('Dag 1', run(1))
print('Dag 2', run(2))
</code></pre>
  
</div>


@endsection