#!C:\xampp\perl\bin\perl.exe
print "Content-Type: text/html;charset=iso-8859-1;\n\n";
#this is a here-document
print "<html><table border=1><tr><th>ENV_VARIABLES</th><th>Value</th></tr>";
foreach $i(sort keys %ENV)
{
print "<tr><td>$i</td><td>$ENV{$i}</td></tr>";
}
print "</table></html>";