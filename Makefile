all:
	@echo "no default"

.PHONY: test
test: test/util test/hexutil

.PHONY: test/util
test/util:
	php util_test.php

.PHONY: test/hexutil
test/hexutil:
	php hexutil_test.php
