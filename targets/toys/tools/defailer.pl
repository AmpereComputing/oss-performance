#!/usr/bin/perl

# Usage: See oss-performance/targets/toys/README.md

my $logFile = shift @ARGV;
my $group;

print STDERR "Processing $logFile\n";

my %passes, %failures;
open(my $in, '<', $logFile)
    or die "Error: Could not open log file, $logFile\n";
while (<$in>) {
    my ($code, $grp, $file) = /(\d{3}) \d+ \d+\.\d+ \"GET \/(quick|slow)\/([\w-\/\.]+) HTTP\/1.1\"/;
    $group = $grp if (! defined $group);
    die "Error: Found results from different groups ($group and $grp)." if ($grp ne $group);
    if ($code eq '200') {
	#print STDERR "Pass: $file\n";
	$passes{$file} = 1;
    } elsif ($code eq '502') {
	#print STDERR "Crash: $file\n";
	$failures{$file} = 1;
	last;
    } else {
	#print STDERR "Fail: $file\n";
	$failures{$file} = 1;
    }
}
close $in;

print STDERR "Paste the following into the .exclude file the $group group.\n";
foreach my $failure (sort keys %failures) {
    print "$failure\n";
}
