#!C:\xampp\perl\bin\perl.exe
use strict;
use warnings;
use CGI qw(:standard);

my $cmd=param('name');
my @greet=("Hello","Hi","Nice to meet you");
my $index=int rand scalar@greet;
print"Content-type: text/html;charset=iso-8859-1;\n\n";
print<<"here";
<html>
<center>
<h2>$cmd,$greet[$index]</h2>
</center>
</html>
here

