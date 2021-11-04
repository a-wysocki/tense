Laravel 8
Instalacja:
- chmod 777 folder storage and bootstrap 
- composer install
- php artisan migrate

1. Administracja
a) wyświetlenie wszystkich terminów (GET): 
- http://tense.systemer.pl/api/admin/availabilities?token=bynG0u6BcbZLXLLz8ttrj47oJbHxeklJncNE
b) wyświetlenie zajętych terminów (GET): 
- http://tense.systemer.pl/api/admin/availabilities/busy?token=bynG0u6BcbZLXLLz8ttrj47oJbHxeklJncNE
c) wyświetlenie pojedynczego terminu (GET):
- http://tense.systemer.pl/api/admin/availabilities/1?token=bynG0u6BcbZLXLLz8ttrj47oJbHxeklJncNE
d) dodawanie nowego terminu (POST):
- http://tense.systemer.pl/api/admin/availabilities?token=bynG0u6BcbZLXLLz8ttrj47oJbHxeklJncNE
{"date": "2021-11-12 10:00:00"}
e) usuwanie terminu (DELETE):
- http://tense.systemer.pl/api/admin/availabilities/3?token=bynG0u6BcbZLXLLz8ttrj47oJbHxeklJncNE


2. Użytkownik
a) wyświetl wolne terminy (GET):
- http://tense.systemer.pl/api/availabilities/free
b) zapisz się na wybrany termin (POST):
- http://tense.systemer.pl/api/availabilities/new/1
c) zapisz się na pierwszy wolny termin (POST):
- http://tense.systemer.pl/api/availabilities/first
d) zwolnij termin (DELETE):
- http://tense.systemer.pl/api/availabilities/1

Demo: http://tense.systemer.pl/