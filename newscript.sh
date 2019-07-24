#!/usr/bin/env bash

count_lines () {
  local f=$1
  l=$(wc -l "$f" | sed 's/^\([0-9]*\).*$/\1/')
}

if [ $# -lt 1 ]
then
  echo "Usage: $0 file ..."
  exit 1
fi

echo "$0 counts the lines of code"
l=0
n=0
s=0
while [ "$*" != ""  ]
do
        count_lines $1
        echo "$1: $l"
        n=$[ $n + 1 ]
        s=$[ $s + $l ]
	shift
done

echo "$n files in total, with $s lines in total"
