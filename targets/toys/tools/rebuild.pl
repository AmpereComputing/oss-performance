#!/usr/bin/perl
#use Data::Dumper;
use File::Basename;

# Usage: See oss-performance/targets/toys/README.md

# Get the argument
my $testPath = shift @ARGV;

# Determine the group (quick|slow)
(my $group) = $testPath =~ /(quick|slow)$/;
die "Can\'t find tests directory. See oss-performance/targets/toys/README.md\n" if !$group;

# Set the URL file and the exclusions file
my $urlFile = "Test".ucfirst($group)."Target.urls";
my $excludeFile = "Test".ucfirst($group)."Target.exclude";

# Read the exlusions into a hash
my %excludes;
open(my $in, '<', $excludeFile)
    or die "Could not open file '$excludeFile' $!";
while (<$in>) {
    chomp;
    $excludes{$_} = 1 if (!/^(\#|\s|$)/);
}
close $in;

# Build a new set of php and inc files
my @phpFiles = `cd $testPath && find . -name "*.php"`;
my @incFiles = `cd $testPath && find . -name "*.inc"`;

# Remove the group's test files and the URL file
system "rm -Rf $group/*";
system "rm $urlFile";

# For all of the php files, add them to the URL and copy the file to the group directory
open(my $out, '>', "$urlFile")
    or die "Could not open file '$urlFile' $!";
foreach my $file (sort @phpFiles) {
    chomp $file;
    $file =~ s/^\.\///;
    if ($excludes{$file} == 1) {
	#print "skipping: $file\n";
    } else {
	print $out "http://__HTTP_HOST__:__HTTP_PORT__/$group/$file\n";
	my $src = "$testPath/$file";
	my $dest = "./$group/$file";
	my $destDir = dirname($dest);
	system "mkdir -p $destDir" if (!(-e $destDir and -d $destDir));
	system "cp $src $dest";
    }
}
close $out;

# For all of the inc files, just copy to the group directory whether we need them or not.
foreach my $file (@incFiles) {
    chomp $file;
    $file =~ s/^\.\///;
    if ($excludes{$file} == 1) {
	#print "skipping: $file\n";
    } else {
	my $src = "$testPath/$file";
	my $dest = "./$group/$file";
	my $destDir = dirname($dest);
	system "mkdir -p $destDir" if (!(-e $destDir and -d $destDir));
	system "cp $src $dest";
    }
}

# Adds a unique namespace to each file. Takes a group of php or inc files, not both. Why?
# Because autoload4.php and autoload4.inc should have the same namespace...for instance.
sub namespacer {

    my ($path, $ref) = @_;
    my @files = @{ $ref };

    # Build a hash of namespaces to file so we can ensure they're unique
    my %namespaces;
    foreach my $file (@files) {
	my ($namespace, $extension) = $file =~ /(.+)\.(php|inc)/;
	$namespace = $group.$namespace;
	$namespace =~ s/\./dot/g;
	$namespace =~ s/[\W_]//g;
	die "Namespaces must be unique! (files: $namespaces{$namespace} and $file)" if ($namespaces{$namespace});
	$namespaces{$namespace} = $file;
	#print "File: $file  Namespace: $namespace  Extension: $extension\n";
    }

    # Add namespace line to each file
    for my $namespace (keys %namespaces) {
	next if ($excludes{$namespaces{$namespace}} == 1);
	my $filename = "$path/$namespaces{$namespace}";
	open(my $in, '<', $filename)
	    or die "Could not open file '$filename' $!";
	open(my $out, '>', "$filename.new")
	    or die "Could not open file '$filename.new' $!";
	my $done = false;
	while (<$in>) {
	    print $out $_;
	    if (/^\<\?(hh|php)/) {
		#print;
		print $out "namespace $namespace;\n";
		$done = true;
	    }
	}
	close $in;
	close $out;
	die "Didn't find prologue in $filename." if (!$done);
	system("rm $filename");
	system("mv $filename.new $filename");
    }
}

# Add namespaces to each php and inc file
namespacer($group, \@phpFiles);
namespacer($group, \@incFiles);
