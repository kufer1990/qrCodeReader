# qrCodeReader
Qr code reader 


Program QrCodeReader to narzędzie służące do skanowania kodów kreskowych "EAN".
Po zeskanowaniu kodu, następuje komunikacja z bazą danych, z której pobierane są informacje o produktach.

Struktura Bazy danych.
tabele: 
COUNTER,
MEMBER
STANY,

  counter - licznnik - 1 kolumna typu int
  
  member - ID,LOGIN, PASSWORD, COMPANY_NUMBER, RANDOM_NUMBER, VERIFICATION, CREATION_DATE
  COMPANY_NUMBER - wartość dowolna, brak dalszego powiązania w imlementacji.
  RANDOM_NUMBER - losowana liczba w celu weryfikacji, po założeniu konta automatycznie zostaje wysłany email z loginem i numerem na wskazany adres.
  Po pierwszym zalogowaniu zostaniemy poproszeni o podanie numeru.
  Numer wysyłany jest na email firmowy aby dostępu do konta nie miały osoby postronne.
  (edycja pliku sendEmail.php)
  
  stany - ID, EAN, NAZWA, STAN, CENA_SPRZEDAZY, DOST 
  import bazy: plik zapisany w excelu, nagłówki powinny być w następującej konfiguracji.
  EAN,NAZWA,STAN,CENA_SPRZEDAZY,MARKA
  
  
  
W aplikacji użyte zostały api: html5-qrcode oraz simplexlsx.
wszelkie informacje odnoście twórców api oraz możliwości ich wykorzystania znajdują się w folderze Api w plikach readme.

Czytniki kodów qr działają na przeglądarkach Google chrome oraz Safari.

Program jest darmowy, Dopuszcza się edycję kodu i korzystanie z niego w dowolny sposób.

QrCodeReader
MercKolN jest moim pierwszym projektem w technologiach webowych. 
Powstał z myślą o przedsiebiorstwie handlowym i jest dedykowany pod jego strukturę.


Kontakt z autorem:
email: jakub.ferdek@gmail.com
tel: 665 484 230
