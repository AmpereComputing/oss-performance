Howto: Profiling HHVM
=====================

Facebook et. al have developed a few tools for helping to profile the Open
Source Software (OSS) version of HHVM. This howto will delve into the use
of those tools and strategies on finding areas for improvement.

Strategy Overview
-----------------

Refer back to the following strategy overview while reviewing the remaining
sections.

1.  Run OSS Performance Suite
2.  Basic Profiling
    1.  Run `perf record` manually without callgraphs (`-g`)
    2.  Find not-yet-optimized native system routines (memcpy, etc.)
    3.  Find hhvm native routines not-yet-optimized for your platform
    4.  Compare top symbol ranking against another mature platform
3.  (Optional) Explorative Profiling
    1.  Run `perf record` manually with callgraphs or use `perf.sh`
    2.  Use `perf report` to familiarize yourself with typical call stacks
    3.  Use flame graphs to visualize call stacks and to find heavy routines
        at the top of call stacks
4.  Advanced Profiling
    1.  Use perf rollup to categorize the hhvm-specific symbols
    2.  Compare perf rollup TC helper rankings with another mature platform
    3.  Use TC print to view bytecode statistics and compare rankings with
        another mature platform
    4.  Use TC print to view top translations disassembly along with event
        counts and compare with another mature platform
    5.  Search for non-optimal code generation both top bytcodes and top
        translations and optimize the code generation for those bytecodes


Running OSS Performance Suite
=============================

The OSS Performance Suite contains a set of scripts and PHP web apps used to
measure the performance of an HHVM build. The framework will install each test
in a directory under `/tmp` and will use siege (https://github.com/JoeDog/siege)
to continuously make 200 simultaneous requests for URLs within that web app for
a minute in order to get a score in transactions per second (TPS).

The OSS Performance Suite has a well-written README.md detailing how to use
the scripts. See the **Usage** section to find out how to install and run the
examples. Note: the examples assume that you've installed hhvm to a location
within your `$PATH`. This is the instance of HHVM that runs the `perf.php`
script, but it is not the instance of HHVM being tested. The path to that is
specified with `--hhvm`. You can use the same instance for both, but it can
be useful to have a stable version of hhvm installed to run `perf.php`.

    $ git clone https://github.com/hhvm/oss-performance.git
    $ cd oss-performance
    $ less README.md

After installing the suite and running the example, you can start with some
basic profiling on your platform.


Basic Profiling: `perf`
=======================

Perf is typically the first step for any profiling on a posix system.
Performance counter sampling with perf is also the foundation for all of the
tools and strategies in this guide. Start by setting the `$HHVM_BIN`
environment to point to the instance of hhvm that you'll be testing.

    $ cd oss-performance
    $ export $HHVM_BIN=<path-to-hhvm-binary-to-test>


Running `perf` manually
-----------------------

If you want the most control over how `perf` is called, you can have
`perf.php` run the hhvm server indefinitely after it warms up and then run
`perf` directly on the PID once the final test begins to run.

    $ hhvm perf.php --i-am-not-benchmarking --no-time-limit --mediawiki --hhvm=$HHVM_BIN
    $ perf stat -p <pid>
    <ctrl-c>
    $ perf record -e cycles -p <pid>
    <ctrl-c>
    $ perf report


Using `perf.sh`
---------------

The most straight-forward way to record events for analysis is to
use the `--exec-after-warmup` flag in combination with the `perf.sh` script
provided with the suite. This script is executed after warmup. It waits 5s
to ensure that the server is under siege for the official 1m run. Then it
runs `perf record` for 25s.

Note: `perf.sh` runs `perf record` as root via sudo. It's advisable to set your
user to not require a password when using sudo. Otherwise you'll need to
carefully watch the output from `perf.php` for the password prompt and
enter it before the final 1m test finishes. Another more secure approach is
to set the sudo timeout to something large and ensure that you've verified
your password before starting the run.

To have the script collect `cycles` for 25s:

    $ hhvm perf.php --i-am-not-benchmarking --mediawiki --hhvm=$HHVM_BIN --exec-after-warmup="./scripts/perf.sh -e cycles"

To collect more events, append them with commas to the `-e` parameter.
Collecting this many samples can create huge `perf.data` files. Pass the `-d 5`
flag to `perf.sh` to record samples for 5 seconds. Note: the `-d` parameter is
the only argument that perf.sh directly processes. Every argument after that is
passed along to `perf record`. i.e. `-d` must come before `-e`.

    $ hhvm perf.php --i-am-not-benchmarking --mediawiki --hhvm=$HHVM_BIN --exec-after-warmup="./scripts/perf.sh -d 5 -e cycles,branch-misses,L1-icache-misses,L1-dcache-misses,cache-misses,iTLB-misses,dTLB-misses"

The translations (JIT compiled code) will have symbols, because hhvm produces
a perf map file. `perf.sh` runs `perf record` as root. Also we'll be running
`perf report` and later `perf script` as root, so change the ownership of the
perf map file to root. It will be the most recent `perf-<pid>.map` file under
`/tmp`.

    $ sudo chown root:root /tmp/perf-<pid>.map

The big difference when using `perf.sh`, is that it also passes a `-g` argument
to `perf record`, providing call graph information. The view with `perf report`
is dramatically different as now the topmost symbols are sorted by their
children counts and not by their self counts. However, it is a good way to gain
an understanding of the call stack; as are visualizations like Flame Graphs.

    $ sudo perf report


Flame Graphs
------------

Flame graphs are a top-level visualization for perf data. Take a look at
[Brendan Gregg's page](http://www.brendangregg.com/FlameGraphs/cpuflamegraphs.html).
Get started by downloading FlameGraph.

    $ git clone https://github.com/brendangregg/FlameGraph
    $ export FG_PATH=<path-to-FlameGraph>

Then collect perf data using `perf record` manually (with `-g` option) or by
using the `perf.sh` script.

    $ cd oss-performance
    $ hhvm perf.php --i-am-not-benchmarking --mediawiki --hhvm=$HHVM_BIN --exec-after-warmup="./scripts/perf.sh -d 5 -e cycles"
    $ sudo chown root:root /tmp/perf-<pid>.map

Then to generate the Flame Graph:

    $ sudo perf script | $FG_PATH/stackcollapse-perf.pl > out.perf-folded
    $ sudo $FG_PATH/flamegraph.pl out.perf-folded > perf-hhvm.svg
    
The output is a HUGE svg file that is zoomable and clickable withing a web
browser. Brendan provides a greate writeup on decoding the Flame Graph,
repeated here:

> I'll explain this carefully: it may look similar to other visualizations from profilers, but it is different.
> 
> *   Each box represents a function in the stack (a "stack frame").
> *   The y-axis shows stack depth (number of frames on the stack). The top box shows the function that was on-CPU. Everything beneath that is ancestry. The function beneath a function is its parent, just like the stack traces shown earlier. (Some flame graph implementations prefer to invert the order and use an "icicle layout", so flames look upside down.)
> *   The x-axis spans the sample population. It does not show the passing of time from left to right, as most graphs do. The left to right ordering has no meaning (it's sorted alphabetically to maximize frame merging).
> *   The width of the box shows the total time it was on-CPU or part of an ancestry that was on-CPU (based on sample count). Functions with wide boxes may consume more CPU per execution than those with narrow boxes, or, they may simply be called more often. The call count is not shown (or known via sampling).
> *   The sample count can exceed elapsed time if multiple threads were running and sampled concurrently.
>
> The colors aren't significant, and are usually picked at random to be warm colors (other meaningful palettes are supported). This visualization was called a "flame graph" as it was first used to show what is hot on-CPU, and, it looked like flames. It is also interactive: mouse over the SVGs to reveal details, and click to zoom.

Besides showing a good picture of the call paths, you can find potential symbols
for optimization by finding boxes with widest uncovered sections. However, it's
far more straight-forward to use a simple `perf record` without `-g` and then
use `perf report`.


Advanced Profiling: HHVM-Specific Tools
=======================================

When profiling with JIT symbols, it can be difficult to understand exactly
where and how those symbols are created. There are two particularly nice
tools packaged with HHVM that help organize those symbols further.


Perf Rollup
-----------

This tool organizes symbols into categories and rolls those stats up into those
categories. To start, run `perf.sh` with the event that you're interested in.

    $ export HHVM_SRC=<path-to-hhvm-src>
    $ cd oss-performance
    $ hhvm perf.php --i-am-not-benchmarking --mediawiki --hhvm=$HHVM_BIN --exec-after-warmup="./scripts/perf.sh -d 5 -e cycles"
    $ sudo chown root:root /tmp/perf-<pid>.map

Then run `perf script` while piping the output to `perf-rollup.sh`:

    $ sudo perf script -F comm,ip,sym | hhvm -vEval.EnableHipHopSyntax=true $HHVM_SRC/hphp/tools/perf-rollup.php

First the summary is provided, showing the breakdown between the categories:

*    *TC helpers* - translation cache helpers
*    *TC* - translations
*    *Other*
*    *PCRE JIT* - perl compatible regular expression JIT engine

Then the *TC helpers* subcategories are listed. Finally the symbols under each
of those subcategories are shown. The names of the subcategories and the
symbols within provide ample clues for finding out where they live. The symbols
in the *TC* summary are a different story. For that we'll need another tool.


TC Print
--------

TC Print is a sophisticated tool which uses perf event counters to annotate
each disassmbled line of the translation with the event counters while
showing the HHBC corresponding to that disassembly. It's a very powerful
tool with a critical shortcoming: *skid*. perf event counters trigger data
to be written when counters hit a threshold. That triggering doesn't happen
instanteously, and so there is always an amount of PC skid that occurs. The
effect to TC print is that those annotation on the lines of disassembly might
be a few lines too low. YMMV

Similar to before, we'll start by running `perf.sh`. We'll be passing a new
argument (`--tc-print`) to the `perf.php` script. To record just cycles:

    $ hhvm perf.php --i-am-not-benchmarking --mediawiki --hhvm=$HHVM_BIN --exec-after-warmup="./scripts/perf.sh -e cycles" --tcprint

TC Print has built-in support for several predefined events. Collecting more
than one event can lead to huge perf.data files, so use `-d` to record a
shorter durations. To record all of the events supported by Intel (see note
below about *Intel disassembly*):

    $ hhvm perf.php --i-am-not-benchmarking --mediawiki --hhvm=$HHVM_BIN --exec-after-warmup="./scripts/perf.sh -e cycles,branch-misses,L1-icache-misses,L1-dcache-misses,cache-misses,LLC-store-misses,iTLB-misses,dTLB-misses" --tcprint

To record all of the ARM supported events (ARM doesn't have LLC-store-misses)

    $ hhvm perf.php --i-am-not-benchmarking --mediawiki --hhvm=$HHVM_BIN --exec-after-warmup="./scripts/perf.sh -e cycles,branch-misses,L1-icache-misses,L1-dcache-misses,cache-misses,iTLB-misses,dTLB-misses" --tcprint

Similar to before, change the `perf-<pid>.map` file ownership.

    $ sudo chown root:root /tmp/perf-<pid>.map

We process the perf data before passing it along to tc-print

    $ sudo perf script -f -F hw:comm,event,ip,sym | $HHVM_SRC/hphp/tools/perf-script-raw.py > processed-perf.data

If `perf script` is displaying additional fields, then re-run with -F <-field>,...

    $ sudo perf script -f -F -tid,-pid,-time,-cpu,-period -F hw:comm,event,ip,sym | $HHVM_SRC/hphp/tools/perf-script-raw.py > processed-perf.data

Now you can run tc-print with the generated perf.data. The following will list
every translation.

    $ $HHVM_SRC/hphp/tools/tc-print/tc-print -c /tmp/<TMP DIR FOR BENCHMARK RUN>/conf.hdf -p processed-perf.data

You can also have tc-print just output the top highest translation with the
`-t` argument. It sorts based on the `cycles` event type.

    $ $HHVM_SRC/hphp/tools/tc-print/tc-print -c /tmp/<TMP DIR FOR BENCHMARK RUN>/conf.hdf -p processed-perf.data -t 5
    
As mentioned above, tc-print has a fixed set of predefined events. Run
`tc-print -e list` to see the list. You can then use `-e` to sort by one of
those besides `cycles`:

    $ $HHVM_SRC/hphp/tools/tc-print/tc-print -c /tmp/<TMP DIR FOR BENCHMARK RUN>/conf.hdf -p processed-perf.data -t 5 -e branch-misses

tc-print can also support other events other than the predefined events. These
events are passed with the `-E` flag and that event set completely replaces the
predefined set. So if you recorded cycles, branch-loads, and branch-load-misses
with `perf.sh`, then you'll need to pass cycles along with the new events
on the `-E` argument. You can then sort by one of those new events with `-e`.

    $ $HHVM_SRC/hphp/tools/tc-print/tc-print -c /tmp/<TMP DIR FOR BENCHMARK RUN>/conf.hdf -p processed-perf.data -t 5 -E cycles,branch-loads,branch-load-misses -e branch-loads

Normally, tc-print just analyzes translations from the target code being
executed (e.g. mediawiki). For more inclusive analysis, you can use the (`-i`)
option to also include TC helpers.

    $ $HHVM_SRC/hphp/tools/tc-print/tc-print -c /tmp/<TMP DIR FOR BENCHMARK RUN>/conf.hdf -p processed-perf.data -t 5 -i

Typical profiling involves finding the top symbols and then optimizing them.
When profiling translations, it's also important to find out how and why the
code is being generated in the event that the JIT translator can be optimized.
Instead of looking at individual symbols, it may be more beneficial to look for
optimations for entire bytecodes. The first step is to print out the bytecode
statistics to find those top bytecodes. Note: you can't use the `-b` with some
other options (see note below about *Mutually exclusive options*).

    $ $HHVM_SRC/hphp/tools/tc-print/tc-print -c /tmp/<TMP DIR FOR BENCHMARK RUN>/conf.hdf -p processed-perf.data -b

Once you find interesting bytecodes to track, you can filter by those bytecodes
(eg. `-B SetM`) and rank in conjunction with an event type (e.g. `-e cycles`) to
look at their disassembly.

    $ $HHVM_SRC/hphp/tools/tc-print/tc-print -c /tmp/<TMP DIR FOR BENCHMARK RUN>/conf.hdf -p processed-perf.data -B SetM -e cycles

### Intel disassembly

tc-print is only built if the appropriate disassembly tools are available.  On
x86 this is LibXed.  Consider building hhvm using:

    $ cmake . -DLibXed_INCLUDE_DIR=<path to xed include> -DLibXed_LIBRARY=<path to libxed.a>

### Mutually exclusive options

The following options cannot be used together. They're checked in an
if-then-else loop, so if you do use them together this list is also
their priority. Thought this might save some head scratching.

1.  `-T`
2.  `-t`
3.  `-g`
4.  `-f`
5.  `-b`
6.  `-B`
