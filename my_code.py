#!/usr/bin/env python

import sys
import json

XLS_FILE = sys.argv[1]

_result = {}
_result['XLS_FILE'] = XLS_FILE
_result['var'] = 102
_result['var1'] = 102
_result['var2'] = 102
_result['var3'] = 102

print json.dumps(_result)

