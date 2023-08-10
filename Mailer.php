<?php 

class Mailer implements \SplObserver {

    const TIPOS_PARA_EMAIL = [\RuntimeException::class, \SoapFault::class];

    public function update(\SplSubject $subject):void {

        $tipo = $subject->getType;

        if(array_filter(self::TIPOS_PARA_EMAIL, fn($t) => is_a($tipo, $t, true))) {
            echo "mandando email sobre {$subject->getType()} : {$subject->getMessage}";
        }
       
    }

}