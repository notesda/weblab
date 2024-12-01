#!C:\xampp\perl\bin\perl.exe
use CGI':standard';
print "Content-type: text/html;charset=iso-8859-1;\n\n";

open(FILE,'<count.txt');
$count=<FILE>;
close(FILE);
$count++;
open(FILE,'>count.txt');
print FILE "$count";
print "This page has been viewed $count times";