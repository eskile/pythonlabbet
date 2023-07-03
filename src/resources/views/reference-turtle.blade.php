<div class="mt-3">
                    <div class="text-xl">Turtle</div>
                    <div class="flex p-1">                
                        <div class="w-36 font-bold">Funktion</div>
                        <div class="font-bold">Kort beskrivning</div>
                    </div>

                    <!-- back() -->
                    <div class="odd:bg-white even:bg-gray-100 p-1" id="back-div">
                        <div id="back-main" class="flex cursor-pointer"  onclick="toggleInfo('back')">
                            <div class="w-36" id="back-title">back()</div>
                            <div id="back-short">Förflyttar sköldpaddan bakåt</div>
                        </div>
                        <div id="back" class="mt-2 mb-5 hidden pr-5 pl-10">
                            <div class="mt-4 font-bold">Exempel</div>
                            <pre><code class="language-python">back(100)  #sköldpaddan går 100 steg bakåt
                            </code></pre>
                            <div class="mt-4 font-bold">Förklaring</div>
                            <div>Funktionen <i>back()</i> förflyttar sköldpaddan ett antal steg i motsatt riktning som huvudet pekar.</div>
                            <div class="mt-4 font-bold">Syntax</div>
                            <div><i>back(distance)</i></div>
                            <div class="mt-4 font-bold">Argument</div>
                            <div class="flex">
                                <div class="w-36"><i>distance</i></div>
                                <div>Obligatorisk. Antal steg sköldpaddan går bakåt.</div>
                            </div>
                        </div>
                    </div>

                    <!-- begin_fill() -->
                    <div class="odd:bg-white even:bg-gray-100 p-1" id="begin_fill-div">
                        <div id="begin_fill-main" class="flex cursor-pointer"  onclick="toggleInfo('begin_fill')">
                            <div class="w-36" id="begin_fill-title">begin_fill()</div>
                            <div id="begin_fill-short">Påbörjar ifyllnad av färg</div>
                        </div>
                        <div id="begin_fill" class="mt-2 mb-5 hidden pr-5 pl-10">
                            <div class="mt-4 font-bold">Exempel</div>
                            <pre><code class="language-python">#rita en ifylld cirkel
begin_fill()
circle(50)
end_fill()
                            </code></pre>
                            <div class="mt-4 font-bold">Förklaring</div>
                            <div>Funktionen <i>begin_fill()</i> påbörjar ifyllnad av färg på ett ritat objekt. Börja med <i>begin_fill()</i> och rita sedan. Avsluta med <i>end_fill()</i> för att fylla den ritade figuren med färg.</div>
                            <div class="mt-4 font-bold">Syntax</div>
                            <div><i>begin_fill()</i></div>
                        </div>
                    </div>

                    <!-- circle() -->
                    <div class="odd:bg-white even:bg-gray-100 p-1" id="circle-div">
                        <div id="circle-main" class="flex cursor-pointer"  onclick="toggleInfo('circle')">
                            <div class="w-36" id="circle-title">circle()</div>
                            <div id="circle-short">Ritar en cirkel med valfri radie</div>
                        </div>
                        <div id="circle" class="mt-2 mb-5 hidden pr-5 pl-10">
                            <div class="mt-4 font-bold">Exempel</div>
                            <pre><code class="language-python">circle(100)  #ritar cirkel med radie 100
                            </code></pre>
                            <div class="mt-4 font-bold">Förklaring</div>
                            <div>Funktionen <i>circle()</i> ritar en cirkel med valfri radie. Cirkeln ritas genom att sköldpaddan svänger vänster vilket innebär att cirkeln ritas ovanför sköldpaddan om huvudet pekar åt höger.</div>
                            <div class="mt-4 font-bold">Syntax</div>
                            <div><i>circle(radius)</i></div>
                            <div class="mt-4 font-bold">Argument</div>
                            <div class="flex">
                                <div class="w-36"><i>radius</i></div>
                                <div>Obligatorisk. Radien på cirkeln.</div>
                            </div>
                        </div>
                    </div>

                    <!-- color() -->
                    <div class="odd:bg-white even:bg-gray-100 p-1" id="color-div">
                        <div id="color-main" class="flex cursor-pointer"  onclick="toggleInfo('color')">
                            <div class="w-36" id="color-title">color()</div>
                            <div id="color-short">Bestämmer färgen som sköldpaddan ritar med</div>
                        </div>
                        <div id="color" class="mt-2 mb-5 hidden pr-5 pl-10">
                            <div class="mt-4 font-bold">Exempel #1</div>
                            <pre><code class="language-python">color('blue')  #rita med blå
                            </code></pre>
                            <div class="mt-4 font-bold">Exempel #2</div>
                            <pre><code class="language-python">colormode(255)
color(240, 160, 80)  #rita med orange
                            </code></pre>
                            <div class="mt-4 font-bold">Förklaring</div>
                            <div>Funktionen <i>color()</i> kan användas på ett par olika sätt för att sätta färgen med. Här tas endast upp de vanligaste.</div>
                            <div class="mt-4 font-bold">Syntax #1</div>
                            <div><i>color(colorstring)</i></div>
                            <div class="mt-4 font-bold">Argument #1</div>
                            <div class="flex">
                                <div class="w-36"><i>colorstring</i></div>
                                <div>En sträng som är en giltig färg. <a target="_tab" class="text-green-500 hover:underline" href="https://www.w3schools.com/colors/colors_hex.asp">Se alla giltiga färger här</a>.</div>
                            </div>
                            <div class="mt-4 font-bold">Syntax #2</div>
                            <div><i>color(r,g,b)</i></div>
                            <div class="mt-4 font-bold">Argument #2</div>
                            <div class="flex">
                                <div class="w-36"><i>r</i></div>
                                <div>Hur mycket <span class="text-red-500">rött</span> som ska vara med i färgen (0-255).</div>
                            </div>
                            <div class="flex">
                                <div class="w-36"><i>g</i></div>
                                <div>Hur mycket <span class="text-green-500">grönt</span> som ska vara med i färgen (0-255).</div>
                            </div>
                            <div class="flex">
                                <div class="w-36"><i>b</i></div>
                                <div>Hur mycket <span class="text-blue-500">blått</span> som ska vara med i färgen (0-255).</div>
                            </div>
                        </div>
                    </div>

                    <!-- end_fill() -->
                    <div class="odd:bg-white even:bg-gray-100 p-1" id="end_fill-div">
                        <div id="end_fill-main" class="flex cursor-pointer"  onclick="toggleInfo('end_fill')">
                            <div class="w-36" id="end_fill-title">end_fill()</div>
                            <div id="end_fill-short">Avslutar ifyllnad av färg</div>
                        </div>
                        <div id="end_fill" class="mt-2 mb-5 hidden pr-5 pl-10">
                            <div class="mt-4 font-bold">Exempel</div>
                            <pre><code class="language-python">#rita en ifylld cirkel
begin_fill()
circle(50)
end_fill()
                            </code></pre>
                            <div class="mt-4 font-bold">Förklaring</div>
                            <div>Funktionen <i>end_fill()</i> avslutar ifyllnad av färg på ett ritat objekt. Börja med <i>begin_fill()</i> och rita sedan. Avsluta med <i>end_fill()</i> för att fylla den ritade figuren med färg.</div>
                            <div class="mt-4 font-bold">Syntax</div>
                            <div><i>end_fill()</i></div>
                        </div>
                    </div>

                    <!-- forward() -->
                    <div class="odd:bg-white even:bg-gray-100 p-1" id="forward-div">
                        <div id="forward-main" class="flex cursor-pointer"  onclick="toggleInfo('forward')">
                            <div class="w-36" id="forward-title">forward()</div>
                            <div id="forward-short">Förflyttar sköldpaddan framåt</div>
                        </div>
                        <div id="forward" class="mt-2 mb-5 hidden pr-5 pl-10">
                            <div class="mt-4 font-bold">Exempel</div>
                            <pre><code class="language-python">forward(100)  #sköldpaddan går 100 steg framåt
                            </code></pre>
                            <div class="mt-4 font-bold">Förklaring</div>
                            <div>Funktionen <i>forward()</i> förflyttar sköldpaddan ett antal steg i den riktning som huvudet pekar.</div>
                            <div class="mt-4 font-bold">Syntax</div>
                            <div><i>forward(distance)</i></div>
                            <div class="mt-4 font-bold">Argument</div>
                            <div class="flex">
                                <div class="w-36"><i>distance</i></div>
                                <div>Obligatorisk. Antal steg sköldpaddan går framåt.</div>
                            </div>
                        </div>
                    </div>

                    <!-- goto() -->
                    <div class="odd:bg-white even:bg-gray-100 p-1" id="goto-div">
                        <div id="goto-main" class="flex cursor-pointer"  onclick="toggleInfo('goto')">
                            <div class="w-36" id="goto-title">goto()</div>
                            <div id="goto-short">Förflyttar sköldpaddan till en given koordinat</div>
                        </div>
                        <div id="goto" class="mt-2 mb-5 hidden pr-5 pl-10">
                            <div class="mt-4 font-bold">Exempel</div>
                            <pre><code class="language-python">goto(-100,100)  #gå till (x,y) = (-100,100)
                            </code></pre>
                            <div class="mt-4 font-bold">Förklaring</div>
                            <div>Funktionen <i>goto()</i> förflyttar sköldpaddan till koordinaten (x,y). Mitten av ritytan är (0,0).</div>
                            <div class="mt-4 font-bold">Syntax</div>
                            <div><i>goto(x,y)</i></div>
                            <div class="mt-4 font-bold">Argument</div>
                            <div class="flex">
                                <div class="w-36"><i>x</i></div>
                                <div>Obligatorisk. Var i sidled sköldpaddan ska ta sig.</div>
                            </div>
                            <div class="flex">
                                <div class="w-36"><i>y</i></div>
                                <div>Obligatorisk. Var i höjdled sköldpaddan ska ta sig.</div>
                            </div>
                        </div>
                    </div>
                
                    <!-- hideturtle() -->
                    <div class="odd:bg-white even:bg-gray-100 p-1" id="hideturtle-div">
                        <div id="hideturtle-main" class="flex cursor-pointer"  onclick="toggleInfo('hideturtle')">
                            <div class="w-36" id="hideturtle-title">hideturtle()</div>
                            <div id="hideturtle-short">Döljer sköldpaddan</div>
                        </div>
                        <div id="hideturtle" class="mt-2 mb-5 hidden pr-5 pl-10">
                            <div class="mt-4 font-bold">Exempel</div>
                            <pre><code class="language-python">hideturtle()  #döljer sköldpaddan
                            </code></pre>
                            <div class="mt-4 font-bold">Förklaring</div>
                            <div>Funktionen <i>hideturtle()</i> döljer sköldpaddan eller den figur som ritar. Fungerar att använda både i början och slutet av koden.</div>
                            <div class="mt-4 font-bold">Syntax</div>
                            <div><i>hideturtle()</i></div>
                        </div>
                    </div>

                    <!-- left() -->
                    <div class="odd:bg-white even:bg-gray-100 p-1" id="left-div">
                        <div id="left-main" class="flex cursor-pointer"  onclick="toggleInfo('left')">
                            <div class="w-36" id="left-title">left()</div>
                            <div id="left-short">Svänger sköldpaddan åt vänster ett antal grader</div>
                        </div>
                        <div id="left" class="mt-2 mb-5 hidden pr-5 pl-10">
                            <div class="mt-4 font-bold">Exempel</div>
                            <pre><code class="language-python">left(90)  #sköldpaddan svänger 90 grader åt vänster
                            </code></pre>
                            <div class="mt-4 font-bold">Förklaring</div>
                            <div>Funktionen <i>left()</i> låter sköldpaddan svänga ett antal grader åt vänster.</div>
                            <div class="mt-4 font-bold">Syntax</div>
                            <div><i>left(angle)</i></div>
                            <div class="mt-4 font-bold">Argument</div>
                            <div class="flex">
                                <div class="w-36"><i>angle</i></div>
                                <div>Obligatorisk. Antal grader sköldpaddan svänger vänster.</div>
                            </div>
                        </div>
                    </div>

                    <!-- pendown() -->
                    <div class="odd:bg-white even:bg-gray-100 p-1" id="pendown-div">
                        <div id="pendown-main" class="flex cursor-pointer"  onclick="toggleInfo('pendown')">
                            <div class="w-36" id="pendown-title">pendown()</div>
                            <div id="pendown-short">Sätter ned pennan mot ritytan.</div>
                        </div>
                        <div id="pendown" class="mt-2 mb-5 hidden pr-5 pl-10">
                            <div class="mt-4 font-bold">Exempel</div>
                            <pre><code class="language-python">pendown()  #pennan är nu nere
                            </code></pre>
                            <div class="mt-4 font-bold">Förklaring</div>
                            <div>Funktionen <i>pendown()</i> sätter ned pennan mot ritytan. Endast användbar efter att <i>penup()</i> använts.</div>
                            <div class="mt-4 font-bold">Syntax</div>
                            <div><i>pendown()</i></div>
                        </div>
                    </div>

                    <!-- penup() -->
                    <div class="odd:bg-white even:bg-gray-100 p-1" id="penup-div">
                        <div id="penup-main" class="flex cursor-pointer"  onclick="toggleInfo('penup')">
                            <div class="w-36" id="penup-title">penup()</div>
                            <div id="penup-short">Tar upp pennan från ritytan</div>
                        </div>
                        <div id="penup" class="mt-2 mb-5 hidden pr-5 pl-10">
                            <div class="mt-4 font-bold">Exempel</div>
                            <pre><code class="language-python">penup()  #pennan är nu uppe
                            </code></pre>
                            <div class="mt-4 font-bold">Förklaring</div>
                            <div>Funktionen <i>penup()</i> tar upp pennan från ritytan. Användbar om du vill flytta sköldpaddan utan att den ritar medan den förflyttar sig.</div>
                            <div class="mt-4 font-bold">Syntax</div>
                            <div><i>penup()</i></div>
                        </div>
                    </div>
                    
                    <!-- right() -->
                    <div class="odd:bg-white even:bg-gray-100 p-1" id="right-div">
                        <div id="right-main" class="flex cursor-pointer"  onclick="toggleInfo('right')">
                            <div class="w-36" id="right-title">right()</div>
                            <div id="right-short">Svänger sköldpaddan åt höger ett antal grader</div>
                        </div>
                        <div id="right" class="mt-2 mb-5 hidden pr-5 pl-10">
                            <div class="mt-4 font-bold">Exempel</div>
                            <pre><code class="language-python">right(90)  #sköldpaddan svänger 90 grader åt höger
                            </code></pre>
                            <div class="mt-4 font-bold">Förklaring</div>
                            <div>Funktionen <i>right()</i> låter sköldpaddan svänga ett antal grader åt höger.</div>
                            <div class="mt-4 font-bold">Syntax</div>
                            <div><i>right(angle)</i></div>
                            <div class="mt-4 font-bold">Argument</div>
                            <div class="flex">
                                <div class="w-36"><i>angle</i></div>
                                <div>Obligatorisk. Antal grader sköldpaddan svänger höger.</div>
                            </div>
                        </div>
                    </div>

                    <!-- shape() -->
                    <div class="odd:bg-white even:bg-gray-100 p-1" id="shape-div">
                        <div id="shape-main" class="flex cursor-pointer"  onclick="toggleInfo('shape')">
                            <div class="w-36" id="shape-title">shape()</div>
                            <div id="shape-short">Ändrar figur som ritar</div>
                        </div>
                        <div id="shape" class="mt-2 mb-5 hidden pr-5 pl-10">
                            <div class="mt-4 font-bold">Exempel</div>
                            <pre><code class="language-python">shape()  #standard: en liten pil
shape('turtle')  #sköldpadda
shape('arrow')  #stor pil
shape('circle')  #cirkel
shape('square')  #kvadrat
                            </code></pre>
                            <div class="mt-4 font-bold">Förklaring</div>
                            <div>Funktionen <i>shape()</i> ändrar figur som ritar. </div>
                            <div class="mt-4 font-bold">Syntax</div>
                            <div><i>shape(name)</i></div>
                            <div class="mt-4 font-bold">Argument</div>
                            <div class="flex border">
                                <div class="w-36"><em>name</em></div>
                                <div>En sträng med namn på en giltig figur såsom 'turtle', 'arrow', 'circle', 'square'.</div>
                            </div>
                        </div>
                    </div>

                    <!-- Screen().setup() -->
                    <div class="odd:bg-white even:bg-gray-100 p-1" id="setup-div">
                        <div id="setup-main" class="flex cursor-pointer"  onclick="toggleInfo('setup')">
                            <div class="w-36" id="setup-title">Screen().setup()</div>
                            <div id="setup-short">Skapar en rityta med given storlek</div>
                        </div>
                        <div id="setup" class="mt-2 mb-5 hidden pr-5 pl-10">
                            <div class="mt-4 font-bold">Exempel</div>
                            <pre><code class="language-python">Screen().setup(800,600)  #skapar rityta 800x600
                            </code></pre>
                            <div class="mt-4 font-bold">Förklaring</div>
                            <div>Funktionen <i>Screen().setup()</i> ställer in storleken på ritytan. Som standard är ritytan 400x400.</div>
                            <div class="mt-4 font-bold">Syntax</div>
                            <div><i>Screen().setup(width,height)</i></div>
                            <div class="mt-4 font-bold">Argument</div>
                            <div class="flex">
                                <div class="w-36"><i>width</i></div>
                                <div>Obligatorisk. Bredden på ritytan.</div>
                            </div>
                            <div class="flex">
                                <div class="w-36"><i>height</i></div>
                                <div>Obligatorisk. Höjden på ritytan.</div>
                            </div>
                        </div>
                    </div>

                    <!-- speed() -->
                    <div class="odd:bg-white even:bg-gray-100 p-1" id="speed-div">
                        <div id="speed-main" class="flex cursor-pointer"  onclick="toggleInfo('speed')">
                            <div class="w-36" id="speed-title">speed()</div>
                            <div id="speed-short">Ställer in sköldpaddans rithastighet</div>
                        </div>
                        <div id="speed" class="mt-2 mb-5 hidden pr-5 pl-10">
                            <div class="mt-4 font-bold">Exempel</div>
                            <pre><code class="language-python">speed(5)  #sätter rithastighet till 5
                            </code></pre>
                            <div class="mt-4 font-bold">Förklaring</div>
                            <div>Funktionen <i>speed()</i> ställer in rithastigheten.</div>
                            <div class="mt-4 font-bold">Syntax</div>
                            <div><i>speed(speed)</i></div>
                            <div class="mt-4 font-bold">Argument</div>
                            <div class="flex">
                                <div class="w-36"><i>speed</i></div>
                                <div>Rithastigheten i intervallet 0-10. 1 är långsam och 10 är snabb. 0 ger snabbast möjliga rithastighet.</div>
                            </div>
                        </div>
                    </div>
                    
                    

                </div>