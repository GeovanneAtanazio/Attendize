 - Comando para rodas todos os testes não depreciados
./vendor/bin/phpunit
 - Comando para rodar teste específico
   - local_dos_testes + -- filter funcao_a_ser_testada arquivo_da_funcao_a_ser_testada.php
./vendor/bin/phpunit --filter cancels_and_refunds_order_with_single_ticket tests/Feature/OrderCancellation/OrganisationWithoutTaxTest.php

- Coverage
./vendor/bin/phpunit --coverage-html coverage --testsuite Feature
