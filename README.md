# Pythonlabbet
_English description_

Pythonlabbet is a platform for teaching Python programming. Users can write code, run it in the browser and check if the result of a task/problem is correct.
Other features are quizes, ask for help and a teacher part where teachers can create classes and follow the progress of their students. 

It is written in Laravel, with some javascript and Skulpt is used for running Python code. 

Feel free to fork this repo if you want to translate it for any other language.

Check it out at [pythonlabbet.se](https://pythonlabbet.se)

## Om Pythonlabbet
Pythonlabbet är skrivet i Laravel med en del javascript och använder Skulpt för att tolka Pythonkod. Koden körs i användarens webbläsare vilket gör det mycket responsivt. Det finns ett par kurser med runt 10 avsnitt var. Varje avsnitt består av att antal uppgifter som användaren måste klara av för att få en grön bock. Det finns också ett antal fristående problem.

En lärardel kan användas av lärare för att skapa klasser, se elevernas kod och följa deras framsteg. Elever kan också trycka på "Begär hjälp" varpå lärare blir notifierade i webbläsaren och kan sedan kommentera elevens kod.

Se [pythonlabbet.se](https://pythonlabbet.se)

## Om open source
Att Pythonlabbet är open source innebär att all kod som berör sajten finns tillgänglig för alla och alla kan föreslå förändringar. Det betyder **inte** att datan är tillgänglig för alla, den är endast tillgänglig för mig som driver pythonlabbet.se.

## Bidra till Pythonlabbet
Det finns många sätt att hjälpa till att förbättra Pythonlabbet! Från enkla saker som att fixa stavfel, lite svårare som att göra nya problem och nya kurser till svåra som att förbättra själva systemet.

Ett utmärkt sätt för till exempel programmeringslärare att lära sig om hur open source fungerar!

### Gör din första PR
En PR öppnas för att göra ändring i koden. Börja med att göra din första PR (pull request) genom att följa dessa steg:

1. Skapa Github-konto om du inte redan har ett.
2. Klicka på fork på Pythonlabbets github-sida.
3. Lägg till ditt namn i filen I_WAS_HERE.
3. Gör en commit med ändringar på din fork.
4. På Github kan du nu öppna en PR via din fork.
5. När den är godkänd av en administratör har du gjort din första ändring.

På samma sätt kan du göra om du till exempel hittat ett stavfel som behöver fixas. Eller om det finns förklarande text i ett avsnitt som kan göras bättre.

### Ändra i ett innehållet
Det går bra att ändra i ett avsnitt utan att sätta upp en egen utvecklingsmiljö. Se ovan hur du skapar en PR. 

Filerna ligger under `/src/resources/views`. Till exempel ligger första avsnittet om while-satsen i Grundkurs del 1 här: `/src/resources/views/basics/while.blade.php`.

Om du vill ändra i ett problem så ligger de filerna under `/src/resources/views/problems`.

### Sätt upp en utvecklingsmiljö lokalt
Om du vill lägga upp nya problem eller kanske en helt ny kurs så är det en stor fördel att kunna testa lokalt på sin egen dator i en lokal utvecklingsmiljö.

[Instruktion för att sätta upp utvecklingsmiljön](documentation/LOCAL-ENVIRONMENT.md)

### Lägg upp ett nytt problem
Det är hyfsat enkelt att lägga upp ett nytt problem och en lämplig första sak att göra.

Lägg gärna till enkla problem som övar på ett specifikt avsnitt. Se till exempel här:

[While-satsen](https://pythonlabbet.se/grundkurs/while-satsen)

i botten finns ett länk till ett problem där användaren kan öva mer. Det behövas på fler ställen!

[Instruktion för att lägga upp ett eget problem](documentation/ADD-PROBLEM.md)

### Lägg till din egen kurs

Ta gärna kontakt först innan du bestämmer dig för att bygga en ny kurs.

[Instruktion för att lägga upp en ny kurs](documentation/ADD-COURSE.md)

### Allmänna tips
I filen templates.blade.php finns kodsnuttar för diverse olika saker som kan vara användbara.
