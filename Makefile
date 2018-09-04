all:
	@echo "no default"

.PHONY: test
test: test/sdk test/util test/hexutil test/hashutil

.PHONY: test/sdk
test/sdk:
	php index_test.php

.PHONY: test/util
test/util:
	php util_test.php

.PHONY: test/hexutil
test/hexutil:
	php hexutil_test.php

.PHONY: test/hashutil
test/hashutil:
	php hashutil_test.php

.PHONY: test/payload
test/payload:
	echo '["setItem", "foo", "bar"]' |  nc localhost 3330
