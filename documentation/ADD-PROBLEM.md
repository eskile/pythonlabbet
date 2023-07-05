# Lägg upp ett nytt problem

Säg att vi vill lägga upp ett problem som vi kallar "Rektangelns omkrets".

För att kunna lägga upp ett nytt problem behöver du göra en fork av pythonlabbet och sedan öppna en PR när du har gjort din commit. Se instruktioner för att öppna en PR i [README-filen](../README.md).

1. Börja med att skapa en ny fil i `src/resources/views/problems`. Enklast är att kopiera en existerande, byt namn och ändra i den. I vårt exempel ändrar vi namn till `circumference-rectangle.blade.php`.

2. Lägg till en route till problemet så att det går att nå med webbläsaren. Lägg till 
```
Route::get('/problemlosning/rektangelns-omkrets', function() {
    return view('problems.circumference-rectangle');
})->name('problem.circumference-rectangle');
```
i `src/routes/web.php`.

3. Lägg till metadata om problemet i `src/app/Console/Commands/SeedDatabase.php`

```
Problem::updateOrCreate(
            ['id' => 'problem.circumference-rectangle'],
            ['name' => 'Rektangelns omkrets',
            'age_group' => 1,
            'difficulty' => 1,
            'prerequisite' => 1]
        );
```

Skriv in rimligt id och namn. Välj `age_group` 1-3 där 1 = 10-12 år, 2 = 13-15 år, 3 = 16-18 år. Välj `difficulty` 1-4 där 1 är lättast (grön) och 4 svårast (svart). Sätt också `prerequisite` till 1 (Grundkurs del 1) eller 2 (Grundkurs del 2).

4. Nu är du klar och kan göra en commit och öppna en PR för få ditt problem tillagt.
