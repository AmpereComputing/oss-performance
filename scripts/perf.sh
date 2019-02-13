#!/bin/sh

set -xe

# Switch to scripts dir.
cd "$(dirname "$0")"

DURATION="30s"
if [ "$1" = "-d" ]; then
    DURATION="`expr $2 + 5`s"
    shift 2
fi
ARGS="$@"

echo "Running as $(whoami)"

HHVM_PID="$(pgrep -xn 'hhvm')"
PREV_PID=`expr $HHVM_PID - 1`
if [ ! -f /tmp/perf-$HHVM_PID.map ] && [ -f /tmp/perf-$PREV_PID.map ]; then
    HHVM_PID=$PREV_PID
fi
OSS_DIR=$(pwd)

echo "The optional first arg [-d #] is the time to run perf record in seconds."
echo "The remaining args are passed along to perf record."
echo "Running perf on HHVM pid: $HHVM_PID"


# Go to repo root.
cd "$OSS_DIR/.."
sudo nohup sh -xec "timeout --signal INT $DURATION \
  perf record -a -g -D 5000 $ARGS -p $HHVM_PID" >nohup.out &
