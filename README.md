### Currently missing stuff: semi-customizable menu, nicer and more reliable css, maybe better search engine

test.html is for checking your browser viewport size and has default spare code of new input box.  
I will put comments in the code when i feel like it. Those that alr have comments just mean i copied it  
One day i might make a version mcm khoon heng that got 1 dbManager n everything use function/class. One day i might  

## Version 1.1  
Main differences from Version 1.0 gdrive version:  
- more advanced and sohai version of authCheck.php  
- senarai now lists out both peserta and hakim instead of only peserta  
- Admin can edit/delete peserta's and hakim's info  
- messages are now jscipt alerts instead of just html words cuz tch wants it  
- some optimization that might not even do anything  
- more organized spacing in code  
- more uniformed css code  

## Version 1.2  
- semak.php now also displays alert msg instead of html words  
- kemaskini.php now updates info individually so u can fill in ur name only instead of filling in everything agn

## Version 1.3 3/7/2022
- Updated css of all textboxes to look more modern n less like 1990s
- Added search query into senarai.php
- Fixed daftar where perempuan cannot be selected (html is stupid)
- Senarai.php now uses its own senarai.css file
- Added zero increment to semak.php and daftar.php
- Fixed time zone error for main menu where system would display "Selamat Petang" when it is morning
- Added a "Selamat Malam" condition in main menu because why not
- Fixed navbar dropdown menu border margin 1 pixel diff error (wasnt even important)
- Test.html now contains a spare code of the textbox css n html
- Updated table.css to no longer include elements from senarai.php
- Renamed 1 element in keputusan.php for more uniform css n html namings
- Removed the commented code and extra html word msg in daftar.php

## Version 1.4 10/7/2022
- Actually fixed time zone error for main menu (php is stupid)
- Readjusted textbox css to fit google chrome instead of mozilla firefox (css is even stupider)
- Senarai.php can now print instead of keputusanPeserta.php. Readjusted html and css according to it
- Created new cetak.php file to handle the printing part

## Version 1.4.1 11/7/2022
- Created daftarAdmin.php to allow registration of new admins. Changed daftar.php according to it
- Added new import.php to allow import of .csv files.
- Created new upload.php to handle backend of importing
- Updated menuAdmin.php and navbar.php to include Daftar Admin and Import
- Unified all font to be Arial except buttons
- updated keputusanPeserta.php's GUI when the peserta's marks have not yet been given to look a bit better.

## Version 1.4.2 18/7/2022
- Unified daftarHakim and daftarAdmin into daftarAhli which also allows admin to register peserta
- Changed form.css, daftar.php, daftarPeeserta.php, navbar.php n maybe some other files according to the new daftarAhli

## Version 1.5 25/7/2022 (Last few updates )
- Unified all background/basic ui css into a a single file called main.css. Integrated it into all corresponding files.
- Renamed Senarai Ahli and Daftar Ahli into Senarai Pengguna and Daftar Pengguna. Changed Import to Import Peserta.
- Optimized keputusanPeserta.php by removing useless PHP Query.
- Added data null check for all Sys backend files possible. Sys folder is now almost entirely inaccessible by altering URL link.
- Added a peserta.csv file for importing peserta info.

## Version 1.5.1 1/8/2022
- Reworked damn search engine. Added a separate searchResult.php page so that an SQL query is used to search instead of jscript in senarai.php.
- Renamed old senarai.php into senaraiOld.php. Current senarai.php does not have the jscript search functions.
- Redid CSS to be more consistent. Reworked table.css to look a little more neat.
- Added upper and lower bound for Komen Hakim in semakHakim.php
- Changed CSS of navBar.php to support a 'mobile view' which shrinks the nav manu into a hamberburger menu when screen is too small. *Value still needs tuning.
