@extends('template-example')
@section('title', 'Newton pi')
@section('description', '')
@section('content')

<h1>Beräkna pi som Newton</h1>

<div class="bg-green-100 p-8 mb-4">
  <h3 class="text-2xl">Exempel</h3>
  <p>I listan <span class="border">polynomial</span> finns tupler (koefficient, exponent) för utvecklingen av $$(1-x^2)^{1/2}$$ I <span class="border">integrated</span> är det integrerade polynomet.</p>
  <pre><code class="language-python">from math import factorial
n = 1/2

polynomial = [(1,0)]
terms = 20
curr_den, exp = 1, 0

for i in range(terms-1):
    curr_den *= (n-i)
    exp += 1
    coeff = curr_den/factorial(exp)
    #change to x^2
    if exp % 2 == 1: #odd exponent
        coeff *= -1
    polynomial.append( (coeff, exp*2) )
    #print(coeff, exp*2)

integrated = []
for coeff, exp in polynomial:
    exp += 1
    coeff /= exp
    integrated.append( (coeff, exp) )
    #print(coeff, exp)

#integral 0->1
integral_zero_to_one = 0
for coeff, exp in integrated:
    integral_zero_to_one += coeff

#integral 0->1/2
integral_zero_to_half = 0
for coeff, exp in integrated:
    integral_zero_to_half += coeff*(1/2)**exp

print('Using',terms, 'terms.')
print('Integral up to 1, pi = ', integral_zero_to_one*4)
print('Integral up to 1/2, pi = ', (integral_zero_to_half - 3**0.5/8)*12 )</code></pre>
  <div id="example-X-code" class="hidden">from math import factorial
n = 1/2

polynomial = [(1,0)]
terms = 20
curr_den, exp = 1, 0

for i in range(terms-1):
    curr_den *= (n-i)
    exp += 1
    coeff = curr_den/factorial(exp)
    #change to x^2
    if exp % 2 == 1: #odd exponent
        coeff *= -1
    polynomial.append( (coeff, exp*2) )
    #print(coeff, exp*2)

integrated = []
for coeff, exp in polynomial:
    exp += 1
    coeff /= exp
    integrated.append( (coeff, exp) )
    #print(coeff, exp)

#integral 0->1
integral_zero_to_one = 0
for coeff, exp in integrated:
    integral_zero_to_one += coeff

#integral 0->1/2
integral_zero_to_half = 0
for coeff, exp in integrated:
    integral_zero_to_half += coeff*(1/2)**exp

print('Using',terms, 'terms.')
print('Integral up to 1, pi = ', integral_zero_to_one*4)
print('Integral up to 1/2, pi = ', (integral_zero_to_half - 3**0.5/8)*12 )</div>
	<button type="button" id="example-X" class="border border-green-600 bg-green-600 text-white px-4 py-2 mt-2 select-none hover:bg-green-700 focus:outline-none focus:ring modal-open">Testa</button>
</div>


@endsection