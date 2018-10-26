About
=====

In addition to the simple fibonacci and hello world toys targets, there are two targets packed with unit
tests from hhvm/hphp/test/quick and hhvm/hphp/test/slow. These represent huge code bases with thousands
of URLs. The purpose of these test cases is to provide 100% coverage of all HHBC without any hot loops
like a typical benchmark. Such flat worksloads are helpful in chasing down inefficient HHBC while also
providing a really easy way to invoke the test from the commandline while doing JIT optimization work.


Rebuilding the Targets
======================

Unfortunately, these are moving targets decoupled from the OSS project as the original source lives
in the HHVM project. This means that these targets will often need to be updated before they're used.
This is a quick guide on how to do it.

Build Test List
---------------

This script will remove the test cases files and the URL file. Then it rebuilds the list by `find`ing
all of the test cases making sure to exclude those listed in the exclusions file. The URL file is
rebuilt and all of the test case files are copied over the freshly emptied directory. Also,
there are a tremendous number of namespace collisions amongst these test...seems everyone loves to use
"foo". The script will also update all of the test with their own unique namespace.

    $ export HHVM_SRC=<path-to-hhvm-source-tree>
    $ cd oss-performance/targets/toys
    $ tools/rebuild.pl $HHVM_SRC/hphp/test/<quick|slow>

Cull the Failing Tests
----------------------

Many tests gracefully exit. Others might segfault. Should probably fix those. Any test that doesn't
return an HTTP 200 will be dinged by siege, so you can use this script to find them, update the
exclusions file, remove the URLs, and delete the test files.

    $ cd oss-performance
    $ hhvm perf.php --toys-test-<quick|slow> --hhvm=<path-to-hhvm-bin>

Siege may abort a fair number of times due to socket failures. Once you think all of
the group's tests have run a least once, then <ctrl>-c to kill perf.php and run the following.

    $ cd targets/toys
    $ tools/defailer.pl /tmp/hhvm-nginxXXXXXX/access.log >> Test<Quick|Slow>Target.exclude

This will produce a list of files and paste them into the group's .exclude file. Run rebuild.pl
again to rebuild the target while excluding these new files. Rinse and repeat if you see any
other failures from siege.