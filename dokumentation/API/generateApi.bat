del Export /F /S /Q;

rmdir Export /S /Q

mkdir Export

"C:\xampp\php\php.exe" apigen.phar generate -s "..\.." -d "Export" -q --title "ShareLoc" --tree